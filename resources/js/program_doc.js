import Swal from "sweetalert2";
import jQuery from "jquery";
import QRCode from "qrcode";
window.$ = jQuery;

$(document).ready(function () {
    $(".createHomework").click(function () {
        const doctorId = $(this).data("doctor-id"); // Obtener el doctor_id del botón

        Swal.fire({
            title: "Nueva Tarea",
            html: `
            <form id="register-form" class="space-y-4 p-4 bg-white text-left">
                <label class="block">
                    <input type="text" id="homework" name="homeworks"
                    class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100 text-input" required>
                </label>
            </form>
        `,
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonText: "Guardar",
            confirmButtonColor: "#166534",
        }).then((result) => {
            if (result.isConfirmed) {
                const _token = $('meta[name="csrf-token"]').attr("content");
                const homework = $("#homework").val(); // Obtener el valor del campo

                $.ajax({
                    url: `/program_doc/${doctorId}`, // Se incluye el doctor_id en la URL
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": _token,
                    },
                    data: { homeworks: homework },
                    success(response) {
                        if (response.success) {
                            window.location.reload();
                        } else {
                            Swal.fire(
                                "Error al crear la tarea",
                                response.message || "No se pudo crear la tarea",
                                "error"
                            );
                        }
                    },
                    error(response) {
                        console.log(response); // Para depuración
                        Swal.fire(
                            "Error al crear la tarea",
                            "No se pudo crear la tarea",
                            "error"
                        );
                    },
                });
            }
        });
    });

    $(".deleteHomework").click(function () {
        const homeworkId = $(this).data("id");
        const doctorId = $(this).data("doctor-id");

        Swal.fire({
            title: "Eliminar tarea",
            text: "¿Estás seguro de que deseas eliminar esta tarea?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                const _token = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    url: `/program_doc/${doctorId}/${homeworkId}`,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": _token,
                    },
                    success(response) {
                        if (response.success) {
                            window.location.reload();
                        } else {
                            Swal.fire(
                                "Error al eliminar la tarea",
                                response.message ||
                                    "No se pudo eliminar la tarea",
                                "error"
                            );
                        }
                    },
                    error(xhr) {
                        console.log(xhr); // Para depuración
                        Swal.fire(
                            "Error al eliminar la tarea",
                            "No se pudo eliminar la tarea",
                            "error"
                        );
                    },
                });
            }
        });
    });
});

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
