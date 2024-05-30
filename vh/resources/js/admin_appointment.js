import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $("#assign_appointment").click((e) => {
        e.preventDefault();
        secuencia();
    });

    async function genere_input() {
        const { value: result, isConfirmed } = await Swal.fire({
            title: "Asignar Personal",
            html: `
                <h1 class="text-gray-700 text-xl font-bold mb-6">Codigo de Cita</h1>
                <p class="text-gray-700 text-lg font-bold mb-6">#00000</p>
                
                <h2 class="text-gray-700 text-xl font-bold mb-6">Seleccione al Doctor</h2>
                
            `,
            customClass: {
                popup: "border-solid border-3 border-vh-green",
                title: "text-2xl font-bold text-gray-800 mb-4",
            },
            showConfirmButton: true,
            confirmButtonText: "Confirmar",
            confirmButtonColor: "#166534",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
        });
    }

    
    async function secuencia() {
        const selectedDateTime = await genere_input();
        if (selectedDateTime) {
            // Aquí puedes manejar los datos seleccionados, como enviarlos a un servidor
            console.log("Datos seleccionados:", selectedDateTime);
        }
    }
});
