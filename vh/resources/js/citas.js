import Swal from 'sweetalert2';
import jQuery from 'jquery';
window.$ = jQuery;
$(document).ready(function () {
    
    $("#citas").click((e) => {
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
                        <p class="alert-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
                    </div>
                    <div class="requirements-container bg-gray-200 border border-black p-4 mt-4 rounded-lg justify-center">
                        <h2 class="font-bold text-lg text-vh-green-medium">Requerimientos:</h2>
                        <div class="btn-container">
                            <button id="requisito1" class="btn-requisito bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Requisito 1</button>
                            <button id="requisito2" class="btn-requisito bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Requisito 2</button>
                            <button id="requisito3" class="btn-requisito bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Requisito 3</button>
                        </div>
                    </div>
                    <div class="recommendations-container bg-gray-200 border border-black p-4 mt-4 rounded-lg">
                        <h2 class="font-bold text-lg text-vh-green-medium">Recomendaciones:</h2>
                        <ul>
                            <li>Llega 15 minutos antes de la cita.</li>
                            <li>Lleva contigo cualquier documento médico relevante.</li>
                        </ul>
                    </div>
                </div>
            `,
            icon: "info",
            showCancelButton: true,
            confirmButtonText: "Confirmar",
            cancelButtonText: "Cancelar",
            customClass: {
                container: 'custom-swal-container'
            }
        });

        if (result.isConfirmed) {
            console.log("La cita ha sido confirmada.");
        }
    }

    // Event listener para cambiar el estilo de los botones de requisitos al hacer clic
    $(document).on('click', '.btn-requisito', function() {
        $(this).toggleClass('btn-requisito-selected');
    });
});
