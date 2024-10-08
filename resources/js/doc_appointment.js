import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $(".info_doc").click(function (e) {
        e.preventDefault();
        const doctorDescription = $(this).data("description");

        Swal.fire({
            title: "<strong>Información del Doctor</strong>",
            icon: "info",
            html: `<p>Categoría: ${doctorDescription}</p>`,
            showCloseButton: true,
            focusConfirm: false,
            confirmButtonText: "Cerrar",
        });
    });

    $("#genere_input").click(async (e) => {
        e.preventDefault();

        const doctorId = $(e.currentTarget).data("doctor-id");

        try {
            const doctorResponse = await $.ajax({
                url: `/citas/${doctorId}`,
                type: 'GET',
                dataType: 'json'
            });

            console.log("Respuesta del doctor:", doctorResponse);

            const categoryId = doctorResponse.category_id;

            const result = await genere_input();
            if (result) {
                const dataToSend = {
                    date: result.date,
                    hour: result.hour, // La hora ya debe estar en formato H:i
                    modalidad: result.modalidad,
                    description: result.description || "",
                    doctor_id: doctorId,
                    category_id: categoryId,
                    patient_id: result.patient_id,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                };
                console.log("Datos enviados:", dataToSend);

                try {
                    const response = await $.ajax({
                        url: "/citas",
                        type: "POST",
                        data: dataToSend,
                        dataType: "json",
                    });

                    console.log("Éxito:", response);
                    Swal.fire({
                        icon: "success",
                        title: "Cita Agendada",
                        text: "Tu cita ha sido programada con éxito.",
                    }).then(() => {
                        window.location.reload();
                    });
                    
                } catch (error) {
                    console.error("Error al enviar la cita:", error);
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Hubo un problema al programar la cita. Por favor, inténtalo de nuevo.",
                    });
                }
            }
        } catch (error) {
            console.error("Error al obtener la categoría del doctor:", error);
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "No se pudo obtener la categoría del doctor. Intenta de nuevo.",
            });
        }
    });

    async function genere_input() {
        const { value: result, isConfirmed } = await Swal.fire({
            title: "Agendar Cita",
            html:
                `<h1 class="text-gray-700 text-xl font-bold mb-6">Seleccione una fecha y hora para su cita</h1>
                <div id="calendarContainer" class="mb-4"></div>
                <div id="timeContainer" class="mb-4">
                    <label for="time" class="block text-gray-700 text-xl font-bold mb-2">Seleccione una hora</label>
                    <div class="relative">
                        <select id="time" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            ${generateTimeOptions()}
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M10 12l-5-5h10l-5 5z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="patient-search" class="block text-gray-700 text-xl font-bold mb-2">Buscar paciente</label>
                    <input type="text" id="patient-search" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 rounded shadow leading-tight focus:outline-none focus:shadow-outline" placeholder="Escribe el nombre del paciente">
                    <div id="patient-results" class="mt-2 max-h-48 overflow-auto border border-gray-300 rounded"></div>
                    <input type="hidden" id="patient-id" name="patient_id">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-xl font-bold mb-2">Modalidad</label>
                    <input type="radio" id="radio-pre" name="modalidad" value="Presencial" class="mr-2">
                    <label for="radio-pre" class="mr-4">Presencial</label>
                    <input type="radio" id="radio-virtual" name="modalidad" value="Virtual" class="mr-2">
                    <label for="radio-virtual">Virtual</label>
                </div>
                <input type="hidden" id="fecha" name="fecha">`,
            customClass: {
                popup: "border-solid border-3 border-vh-green",
                title: "text-2xl font-bold text-gray-800 mb-4",
            },
            showConfirmButton: true,
            confirmButtonText: "Confirmar",
            confirmButtonColor: "#166534",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            didOpen: async () => {
                renderCalendar(new Date(), document.getElementById("calendarContainer"));

                const patients = await fetchPatients();
                const patientSearchInput = document.getElementById("patient-search");
                const patientResults = document.getElementById("patient-results");

                // Handle patient search input
                patientSearchInput.addEventListener("input", () => {
                    const query = patientSearchInput.value.toLowerCase();
                    const filteredPatients = patients.filter(patient => 
                        patient.name.toLowerCase().includes(query)
                    );

                    patientResults.innerHTML = filteredPatients.map(patient =>
                        `<div class="cursor-pointer p-2 hover:bg-gray-200" data-id="${patient.id}" data-name="${patient.name}" data-lastname="${patient.lastName}" data-birth="${patient.birth}">
                            ${patient.name} ${patient.lastName} (Nacimiento: ${patient.birth})
                        </div>`
                    ).join('');

                    // Handle patient selection
                    patientResults.querySelectorAll("div").forEach(item => {
                        item.addEventListener("click", () => {
                            patientSearchInput.value = `${item.getAttribute("data-name")} ${item.getAttribute("data-lastname")}`;
                            document.getElementById("patient-id").value = item.getAttribute("data-id");
                            patientResults.innerHTML = '';
                        });
                    });
                });
            },
            preConfirm: () => {
                const selectedDate = document.querySelector(".selected-date")?.dataset.date;
                const selectedTime = document.getElementById("time").value;
                const selectedModalidad = document.querySelector('input[name="modalidad"]:checked')?.value;
                const selectedPatient = document.getElementById("patient-id").value;

                if (!selectedDate) {
                    Swal.showValidationMessage("Por favor, seleccione una fecha.");
                    return false;
                }
                if (!selectedTime) {
                    Swal.showValidationMessage("Por favor, seleccione una hora.");
                    return false;
                }
                if (!selectedModalidad) {
                    Swal.showValidationMessage("Por favor, seleccione una modalidad.");
                    return false;
                }
                if (!selectedPatient) {
                    Swal.showValidationMessage("Por favor, seleccione un paciente.");
                    return false;
                }

                // Formatea la hora al formato H:i
                const formattedTime = selectedTime.split(":").map(part => part.padStart(2, '0')).join(':');

                return {
                    date: selectedDate,
                    hour: formattedTime,
                    modalidad: selectedModalidad,
                    patient_id: selectedPatient,
                };
            },
        });

        if (isConfirmed) {
            Swal.fire({
                position: "bottom-end",
                icon: "info",
                html: `<h1 class="text-gray-700 text-xl font-bold mb-6">Se registró su cita</h1>
                      <div class="flex text-center justify-around">
                        <div>
                            <p class="text-gray-700 text-lg font-bold mb-6">Fecha</p>
                            <p class="text-gray-500 text-base font-bold mb-6">${result.date}</p>
                        </div>
                        <div>
                            <p class="text-gray-700 text-lg font-bold mb-6">Hora</p>
                            <p class="text-gray-500 text-base font-bold mb-6">${result.hour}</p>
                        </div>
                        <div>
                            <p class="text-gray-700 text-lg font-bold mb-6">Modalidad</p>
                            <p class="text-gray-500 text-base font-bold mb-6">${result.modalidad}</p>
                        </div>
                      </div>`,
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });

            return {
                date: result.date,
                hour: result.hour,
                modalidad: result.modalidad,
                patient_id: result.patient_id,
            };
        } else {
            return false;
        }
    }

    function renderCalendar(date, container) {
        container.innerHTML = "";
    
        const calendarHeader = createCalendarHeader(date);
        container.appendChild(calendarHeader);
    
        const calendarGrid = document.createElement("div");
        calendarGrid.className = "grid grid-cols-7 gap-2";
        container.appendChild(calendarGrid);
    
        const firstDayOfMonth = new Date(date.getFullYear(), date.getMonth(), 1);
        const lastDayOfMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0);
        const startDay = firstDayOfMonth.getDay();
        const totalDays = lastDayOfMonth.getDate();
        const today = new Date();
    
        fillCalendarGrid(calendarGrid, startDay, totalDays, date, today);
    
        calendarHeader.querySelector("#prevMonth").addEventListener("click", () => {
            date.setMonth(date.getMonth() - 1);
            renderCalendar(date, container);
        });
    
        calendarHeader.querySelector("#nextMonth").addEventListener("click", () => {
            date.setMonth(date.getMonth() + 1);
            renderCalendar(date, container);
        });
    }
    
    function fillCalendarGrid(grid, startDay, totalDays, date, today) {
        grid.innerHTML = '';
    
        for (let i = 0; i < startDay; i++) {
            const emptyCell = document.createElement("div");
            grid.appendChild(emptyCell);
        }
    
        for (let day = 1; day <= totalDays; day++) {
            const dayCell = document.createElement("div");
            const cellDate = new Date(date.getFullYear(), date.getMonth(), day);
            const isFutureDate = cellDate > today;
            dayCell.innerText = day;
            dayCell.className = "p-2 cursor-pointer text-center hover:bg-gray-200 rounded-lg";
            if (isFutureDate) {
                dayCell.dataset.date = `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, "0")}-${day.toString().padStart(2, "0")}`;
                dayCell.addEventListener("click", () => {
                    document.querySelectorAll(".selected-date").forEach(cell => {
                        cell.classList.remove("bg-green-500", "text-white");
                        cell.classList.add("cursor-pointer");
                    });
    
                    dayCell.classList.remove("cursor-pointer");
                    dayCell.classList.add("selected-date", "bg-green-500", "text-white");
                    document.getElementById("fecha").value = dayCell.dataset.date;
                });
            } else {
                dayCell.classList.add("text-gray-400");
                dayCell.classList.add("cursor-not-allowed");
            }
            grid.appendChild(dayCell);
        }
    }
    
    function createCalendarHeader(date) {
        const header = document.createElement("div");
        header.className = "flex justify-between items-center mb-4";

        const prevButton = document.createElement("button");
        prevButton.id = "prevMonth";
        prevButton.className = "bg-gray-200 hover:bg-gray-300 p-2 rounded";
        prevButton.innerText = "<";
        header.appendChild(prevButton);

        const title = document.createElement("span");
        title.innerText = `${date.toLocaleString("default", { month: "long" })} ${date.getFullYear()}`;
        title.className = "text-gray-800 font-bold text-lg";
        header.appendChild(title);

        const nextButton = document.createElement("button");
        nextButton.id = "nextMonth";
        nextButton.className = "bg-gray-200 hover:bg-gray-300 p-2 rounded";
        nextButton.innerText = ">";
        header.appendChild(nextButton);

        return header;
    }

    function generateTimeOptions() {
        let options = "";
        for (let i = 8; i < 18; i++) {
            options += `<option value="${i.toString().padStart(2, '0')}:00">${i.toString().padStart(2, '0')}:00</option>`;
            options += `<option value="${i.toString().padStart(2, '0')}:30">${i.toString().padStart(2, '0')}:30</option>`;
        }
        return options;
    }

    async function fetchPatients() {
        try {
            const response = await $.ajax({
                url: '/pacientes',
                type: 'GET',
                dataType: 'json',
            });
            return response.patients; 
        } catch (error) {
            console.error('Error fetching patients:', error);
            return [];
        }
    }
});
