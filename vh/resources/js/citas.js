import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;
$(document).ready(function () {
    $("#show-alert").click((e) => {
        e.preventDefault();

        mostrarAlerta();
    });

    // Función para mostrar la alerta
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
                container:"custom-swal-container",
                confirmButton:"hover:bg-vh-green text-white font-bold py-2 px-4 rounded"          
            },
        });
    }

    // Event listener para cambiar el estilo de los botones de requisitos al hacer clic
    $(document).on("click", ".btn-requisito", function () {
        $(this).toggleClass("btn-requisito-selected");
    });
});

