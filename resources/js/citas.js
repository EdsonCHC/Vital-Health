import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;
$(document).ready(function () {
    $("#show-alert").click((e) => {
        e.preventDefault();

        mostrarAlerta();
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(document).on("click", ".delete-btn", async function (e) {
        e.preventDefault();

        const citaId = $(this).data("id");

        // Confirmación de eliminación
        const result = await Swal.fire({
            title: "Confirmar Cancelar",
            text: "¿Estás seguro de que deseas cancelar esta cita?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
            customClass: {
                confirmButton:
                    "bg-red-600 text-white font-bold py-2 px-4 rounded",
                cancelButton:
                    "bg-gray-300 text-black font-bold py-2 px-4 rounded",
            },
        });

        if (result.isConfirmed) {
            try {
                await $.ajax({
                    url: `/citas/${citaId}/eliminar`,
                    type: "DELETE",
                    dataType: "json",
                    success: function (response) {
                        Swal.fire({
                            title: "Éxito",
                            text: "La cita ha sido eliminada.",
                            icon: "success",
                            confirmButtonText: "Cerrar",
                        });
                        // Opcional: Actualiza la vista o elimina el elemento de la lista
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            title: "Error",
                            text: "No se pudo eliminar la cita. Inténtalo de nuevo.",
                            icon: "error",
                            confirmButtonText: "Cerrar",
                        });
                    },
                });
            } catch (error) {
                Swal.fire({
                    title: "Error",
                    text: "No se pudo conectar con el servidor.",
                    icon: "error",
                    confirmButtonText: "Cerrar",
                });
            }
        }
    });

    async function mostrarAlerta() {
        const result = await Swal.fire({
            title: "Registro de Citas",
            html: `
            <div class="alert-container justify-start ">
            <div class="description-container bg-gray-200 border border-black p-4 rounded-lg">
                <h2 class="font-bold text-lg text-vh-green-medium">Descripción:</h2>
                <p class="alert-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean
                    euismod bibendum laoreet.</p>
            </div>
            <div class="bg-gray-200 border border-black p-4 mt-4 rounded-lg items-center">
                <h2 class="font-bold text-lg text-vh-green-medium">Requerimientos:</h2>
                <div class="flex flex-row space-x-4 justify-center mt-2">
                    <div class="flex flex-col w-44 space-y-2">
                        <button class="bg-green-600 text-white font-bold p-2 rounded-full">Examen de sangre</button>
                        <button class="bg-green-600 text-white font-bold p-2 rounded-full">Examen de orina</button>
                        <button class="bg-red-600 text-white font-bold p-2 rounded-full">Peso Corporal</button>
                    </div>
                </div>
            </div>

            <div class="bg-gray-200 border border-black p-4 mt-4 rounded-lg">
                <h2 class="font-bold text-lg text-vh-green-medium">Recomendaciones:</h2>
                <ul>
                    <li class="flex items-center space-x-2">
                        <img src="storage/svg/check.svg" alt="check" class="w-8 h-8">
                        <span>Llega 15 minutos antes de la cita.</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <img src="storage/svg/check.svg" alt="check" class="w-8 h-8">
                        <span>Llevar documento médico relevante.</span>
                    </li>
                </ul>
            </div>
        </div>
            `,
            confirmButtonText: "Aceptar",
            customClass: {
                container: "custom-swal-container",
                confirmButton:
                    "hover:bg-vh-green text-white font-bold py-2 px-4 rounded",
            },
        });
    }
    $("#menu-button").click(async function () {
        try {
            const response = await $.ajax({
                url: "/citas/completadas",
                type: "GET",
                dataType: "json",
            });

            let citasHtml = '<div class="p-4">';
            if (response.length === 0) {
                citasHtml +=
                    '<p class="text-center text-gray-500">No hay citas finalizadas.</p>';
            } else {
                citasHtml += '<ul class="space-y-2">';
                response.forEach((cita) => {
                    citasHtml += `
                    <li class="bg-white border border-gray-300 rounded-lg p-4 shadow-sm">
                        <div class="flex justify-between mb-2">
                            <span class="font-semibold text-gray-700">Fecha:</span>
                            <span class="text-gray-600">${cita.date}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="font-semibold text-gray-700">Hora:</span>
                            <span class="text-gray-600">${cita.hour}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold text-gray-700">Descripción:</span>
                            <span class="text-gray-600">${cita.description}</span>
                        </div>
                    </li>
                    `;
                });
                citasHtml += "</ul>";
            }
            citasHtml += "</div>";

            // Muestra la alerta con las citas
            await Swal.fire({
                title: "Citas Finalizadas",
                html: citasHtml,
                confirmButtonText: "Cerrar",
                customClass: {
                    container: "custom-swal-container",
                    title: "text-lg font-bold",
                    htmlContainer: "text-sm",
                },
            });
        } catch (error) {
            Swal.fire({
                title: "Error",
                text: "No se pudieron cargar las citas.",
                icon: "error",
                confirmButtonText: "Cerrar",
            });
        }
    });

    // Event listener para cambiar el estilo de los botones de requisitos al hacer clic
    $(document).on("click", ".btn-requisito", function () {
        $(this).toggleClass("btn-requisito-selected");
    });

    document.addEventListener("click", function (event) {
        const dropdownToggles = document.querySelectorAll(".dropdown-toggle");
        dropdownToggles.forEach(function (toggle) {
            const dropdownMenu = toggle.nextElementSibling;
            if (
                toggle.contains(event.target) &&
                dropdownMenu.classList.contains("hidden")
            ) {
                dropdownMenu.classList.remove("hidden");
            } else {
                dropdownMenu.classList.add("hidden");
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("menu-items").classList.add("hidden");
    });

    var menuButton = document.getElementById("menu-button");
    var menuItems = document.getElementById("menu-items");

    menuButton.addEventListener("click", function () {
        var expanded = this.getAttribute("aria-expanded") === "true";
        this.setAttribute("aria-expanded", !expanded);
        menuItems.classList.toggle("hidden");
    });

    document.addEventListener("click", function (event) {
        var isClickInsideMenu =
            menuButton.contains(event.target) ||
            menuItems.contains(event.target);
        if (!isClickInsideMenu) {
            menuItems.classList.add("hidden");
        }
    });
});
