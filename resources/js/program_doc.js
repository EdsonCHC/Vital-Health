document.addEventListener("DOMContentLoaded", function () {
    const currentMonthElement = document.getElementById("currentMonth");
    const calendarElement = document.getElementById("calendar");
    const prevMonthButton = document.getElementById("prevMonth");
    const nextMonthButton = document.getElementById("nextMonth");

    let currentDate = new Date();

    function renderCalendar() {
        const month = currentDate.getMonth();
        const year = currentDate.getFullYear();

        currentMonthElement.textContent = currentDate.toLocaleDateString(
            "es-ES",
            {
                month: "long",
                year: "numeric",
            }
        );

        calendarElement.innerHTML = "";

        const firstDayOfMonth = new Date(year, month, 1).getDay();
        const lastDateOfMonth = new Date(year, month + 1, 0).getDate();

        for (let i = 0; i < firstDayOfMonth; i++) {
            calendarElement.innerHTML += `<div class="py-2"></div>`;
        }

        for (let day = 1; day <= lastDateOfMonth; day++) {
            calendarElement.innerHTML += `
                        <div class="py-2 cursor-pointer rounded-lg hover:bg-vh-green hover:text-white transition duration-300">${day}</div>`;
        }

        const days = calendarElement.querySelectorAll("div");
        days.forEach((day) => {
            day.addEventListener("click", () => {
                days.forEach((d) =>
                    d.classList.remove("bg-vh-green", "text-white")
                );
                day.classList.add("bg-vh-green", "text-white");
            });
        });
    }

    prevMonthButton.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    });

    nextMonthButton.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    });

    renderCalendar();
});
