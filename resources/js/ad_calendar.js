$(document).ready(function () {
    // Función para renderizar el calendario
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
        const today = new Date();

        fillCalendarGrid(calendarGrid, startDay, totalDays, date, today);

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
                    <button id="prevMonth" class="px-5 py-3 bg-green-700 text-white text-xl rounded font-bold"><</button>
                    <h2 id="currentMonth" class="text-2xl font-bold text-gray-800">${getMonthName(
                        date.getMonth()
                    )} ${date.getFullYear()}</h2>
                    <button id="nextMonth" class="px-5 py-3 bg-green-700 text-white text-xl rounded">></button>
                `;
        return header;
    }

    function fillCalendarGrid(calendarGrid, startDay, totalDays, date, today) {
        for (let i = 0; i < startDay; i++) {
            calendarGrid.appendChild(createCalendarDay(""));
        }

        for (let day = 1; day <= totalDays; day++) {
            const dayElement = createCalendarDay(day);

            // Check if the current day is today
            if (
                date.getFullYear() === today.getFullYear() &&
                date.getMonth() === today.getMonth() &&
                day === today.getDate()
            ) {
                dayElement.classList.add("bg-vh-green-light");
            }

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
            el.classList.remove("bg-green-700", "text-white")
        );

        // Add the 'selected' class to the clicked day element
        dayElement.classList.add("bg-green-700", "text-white");
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

    // Inicializar el reloj
    function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, "0");
        const minutes = String(now.getMinutes()).padStart(2, "0");
        const timeString = `${hours}:${minutes}`;
        const dateString = now.toLocaleDateString("es-ES", {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric",
        });

        $("#hours").text(hours);
        $("#minutes").text(minutes);
        $("#current-date").text(dateString);
    }

    // Actualizar el reloj cada minuto
    setInterval(updateClock, 1000);
    updateClock();

    // Renderizar el calendario en el contenedor
    renderCalendar(new Date(), document.getElementById("calendarContainer"));
});
