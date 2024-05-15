import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $("#make_appointment").click((e) => {
        e.preventDefault();
        secuencia();
    });

    async function genere_input() {
        const { value: result, isConfirmed } = await Swal.fire({
            title: "Agendar Cita",
            html: `
                <h1 class="text-gray-700 text-xl font-bold mb-6">Seleccione una fecha y hora para su cita</h1>
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
                <input type="hidden" id="fecha" name="fecha">
            `,
            customClass: {
                popup: "border-solid border-2 border-vh-green",
                title: "text-2xl font-bold text-gray-800 mb-4",
            },
            showConfirmButton: true,
            confirmButtonText: "Confirmar",
            confirmButtonColor: "#166534",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            didOpen: () =>
                renderCalendar(
                    new Date(),
                    document.getElementById("calendarContainer")
                ),
            preConfirm: () => {
                const selectedDate = document.getElementById("fecha").value;
                const selectedTime = document.getElementById("time").value;
                if (!selectedDate) {
                    Swal.showValidationMessage(
                        "Por favor, seleccione una fecha."
                    );
                    return false;
                }
                if (!selectedTime) {
                    Swal.showValidationMessage(
                        "Por favor, seleccione una hora."
                    );
                    return false;
                }
                return { date: selectedDate, time: selectedTime };
            },
        });

        if (isConfirmed) {
            const selectedDate = `${result.date}`;
            const selectedTime = `${result.time}`;
            Swal.fire({
                position: "bottom-end",
                icon: "info",
                html: `<h1 class="text-gray-700 text-xl font-bold mb-6">Se registro su cita</h1>
                        <div class="flex text-center justify-around">
                        <div>
                            <p class="text-gray-700 text-lg font-bold mb-6">Fecha</p>
                            <p class="text-gray-500 text-base font-bold mb-6">${selectedDate}</p>
                            </div>
                        <div>
                            <p class="text-gray-700 text-lg font-bold mb-6">Hora</p>
                            <p class="text-gray-500 text-base font-bold mb-6">${selectedTime}</p>
                        </div>
                        </div>
                
                `,

                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
            console.log(selectedDateTime);
            return selectedDateTime;
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
        for (let i = 0; i < startDay; i++) {
            calendarGrid.appendChild(createCalendarDay(""));
        }

        for (let day = 1; day <= totalDays; day++) {
            const dayElement = createCalendarDay(day);
            dayElement.addEventListener("click", () =>
                handleDayClick(day, date, dayElement)
            );
            calendarGrid.appendChild(dayElement);
        }
    }

    function createCalendarDay(content) {
        const dayElement = document.createElement("div");
        dayElement.className =
            "p-2 text-center cursor-pointer select-none calendar-day";
        dayElement.textContent = content;
        return dayElement;
    }

    function handleDayClick(day, date, dayElement) {
        const selectedDate = new Date(date.getFullYear(), date.getMonth(), day);
        document.getElementById("fecha").value = selectedDate
            .toISOString()
            .split("T")[0];

        // Remove the 'selected' class from all day elements
        const allDayElements = document.querySelectorAll(".calendar-day");
        allDayElements.forEach((el) =>
            el.classList.remove("bg-vh-green", "text-white")
        );

        // Add the 'selected' class to the clicked day element
        dayElement.classList.add("bg-vh-green", "text-white");
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

    function generateTimeOptions() {
        const times = [];
        for (let hour = 0; hour < 24; hour++) {
            for (let minutes = 0; minutes < 60; minutes += 30) {
                const time = `${String(hour).padStart(2, "0")}:${String(
                    minutes
                ).padStart(2, "0")}`;
                times.push(`<option value="${time}">${time}</option>`);
            }
        }
        return times.join("");
    }

    async function secuencia() {
        const selectedDateTime = await genere_input();
        if (selectedDateTime) {
            // Aquí puedes manejar los datos seleccionados, como enviarlos a un servidor
            console.log("Datos seleccionados:", selectedDateTime);
        }
    }
});
