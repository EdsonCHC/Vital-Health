import Swal from "sweetalert2";
import $ from "jquery";

$(document).ready(function () {
    // Manejador para mostrar la información del doctor
    $(".info_doc").click(showDoctorInfo);

    // Manejador para agendar una cita
    $("#make_appointment, .make_appointment").click((e) => {
        e.preventDefault();
        secuencia(); // Llamamos directamente a secuencia
    });

    function showDoctorInfo(e) {
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
    }

    async function genere_input() {
        const { value: result, isConfirmed } = await Swal.fire({
            title: "Agendar Cita",
            html: generateAppointmentForm(),
            customClass: {
                popup: "border-solid border-3 border-vh-green",
                title: "text-2xl font-bold text-gray-800 mb-4",
            },
            showConfirmButton: true,
            confirmButtonText: "Confirmar",
            confirmButtonColor: "#166534",
            showCancelButton: true,
            didOpen: () =>
                renderCalendar(
                    new Date(),
                    document.getElementById("calendarContainer")
                ),
            preConfirm: validateAppointmentForm,
        });

        if (isConfirmed) {
            return result; // Retornamos el resultado sin mostrar confirmación aquí
        }
        return false;
    }

    function generateAppointmentForm() {
        return `
            <h1 class="text-gray-700 text-xl font-bold mb-6">Seleccione una fecha y hora para su cita</h1>
            <div id="calendarContainer" class="mb-4"></div>
            ${generateTimeSelect()}
            <div class="mb-4">
                <label class="block text-gray-700 text-xl font-bold mb-2">Modalidad</label>
                <input type="radio" id="radio-pre" name="modalidad" value="Presencial" class="mr-2">
                <label for="radio-pre" class="mr-4">Presencial</label>
                <input type="radio" id="radio-virtual" name="modalidad" value="Virtual" class="mr-2">
                <label for="radio-virtual">Virtual</label>
            </div>
            <input type="hidden" id="fecha" name="fecha">
        `;
    }

    function generateTimeSelect() {
        return `
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
        `;
    }

    function validateAppointmentForm() {
        const selectedDate = document.getElementById("fecha").value;
        const selectedTime = document.getElementById("time").value;
        const selectedModalidad = document.querySelector(
            'input[name="modalidad"]:checked'
        )?.value;

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
        return {
            date: selectedDate,
            hour: selectedTime,
            modalidad: selectedModalidad,
        };
    }

    // Función que hace el POST de la cita y muestra confirmación
    async function secuencia() {
        const result = await genere_input(); // Obtenemos el input sin mostrar confirmación de cita
        if (result) {
            try {
                const response = await $.ajax({
                    url: "/appointments",
                    type: "POST",
                    data: {
                        date: result.date,
                        hour: result.hour,
                        modalidad: result.modalidad,
                        category_id: getCategoryId(),
                        _token: $('meta[name="csrf-token"]').attr("content"),
                    },
                    dataType: "json",
                });

                // Muestra una confirmación de éxito al agendar la cita
                Swal.fire({
                    toast: true,
                    title: "Cita Agendada",
                    position: "bottom-end",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                });
            } catch (error) {
                // Muestra una alerta de error si la cita no se puede agendar
                Swal.fire({
                    toast: true,
                    title: "Error al agendar la cita",
                    position: "bottom-end",
                    icon: "error",
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                });
            }
        }
    }

    //
    // Calendar
    //

    // Obtiene el ID de la categoría de la cita seleccionada
    function getCategoryId() {
        return $("#category_id").val();
    }

    function generateTimeOptions() {
        const options = [];
        for (let i = 8; i <= 17; i++) {
            options.push(`<option value="${i}:00">${i}:00</option>`);
            options.push(`<option value="${i}:30">${i}:30</option>`);
        }
        return options.join("");
    }

    function renderCalendar(date, container) {
        container.innerHTML = "";
        const calendarHeader = createCalendarHeader(date);
        container.appendChild(calendarHeader);

        const calendarGrid = document.createElement("div");
        calendarGrid.className = "grid grid-cols-7 gap-2";
        container.appendChild(calendarGrid);

        const firstDayOfMonth = new Date(
            date.getFullYear(),
            date.getMonth(),
            1
        );
        const lastDayOfMonth = new Date(
            date.getFullYear(),
            date.getMonth() + 1,
            0
        );
        const startDay = firstDayOfMonth.getDay();
        const totalDays = lastDayOfMonth.getDate();

        fillCalendarGrid(calendarGrid, startDay, totalDays, date);

        calendarHeader
            .querySelector("#prevMonth")
            .addEventListener("click", () => {
                date.setMonth(date.getMonth() - 1);
                renderCalendar(date, container);
            });

        calendarHeader
            .querySelector("#nextMonth")
            .addEventListener("click", () => {
                date.setMonth(date.getMonth() + 1);
                renderCalendar(date, container);
            });
    }

    function createCalendarHeader(date) {
        const header = document.createElement("div");
        header.className = "flex justify-between items-center mb-4";
        header.innerHTML = `
            <button id="prevMonth" class="px-5 py-3 bg-vh-green text-white rounded font-bold"><</button>
            <h2 id="currentMonth" class="text-2xl font-bold text-gray-800">${getMonthName(
                date.getMonth()
            )} ${date.getFullYear()}</h2>
            <button id="nextMonth" class="px-5 py-3 bg-vh-green text-white rounded">></button>
        `;
        return header;
    }

    function fillCalendarGrid(calendarGrid, startDay, totalDays, date) {
        const today = new Date();

        for (let i = 0; i < startDay; i++) {
            calendarGrid.appendChild(createCalendarDay("", true));
        }

        for (let day = 1; day <= totalDays; day++) {
            const dayElement = createCalendarDay(day);
            const currentDate = new Date(
                date.getFullYear(),
                date.getMonth(),
                day
            );

            if (currentDate < today) {
                dayElement.classList.add(
                    "bg-gray-300",
                    "cursor-not-allowed",
                    "opacity-50"
                );
            } else {
                dayElement.addEventListener("click", () =>
                    handleDayClick(day, date, dayElement)
                );
            }

            calendarGrid.appendChild(dayElement);
        }
    }

    function createCalendarDay(day, isBlank = false) {
        const dayElement = document.createElement("div");
        dayElement.className = `text-center p-2 font-bold rounded ${
            isBlank ? "opacity-0" : "cursor-pointer hover:bg-green-200"
        }`;
        dayElement.textContent = day;
        return dayElement;
    }

    function handleDayClick(day, date, dayElement) {
        document.querySelectorAll(".bg-green-500").forEach((el) => {
            el.classList.remove("bg-green-500");
        });
        dayElement.classList.add("bg-green-500");
        document.getElementById(
            "fecha"
        ).value = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(
            2,
            "0"
        )}-${String(day).padStart(2, "0")}`;
    }

    function getMonthName(monthIndex) {
        const months = [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre",
        ];
        return months[monthIndex];
    }
});
