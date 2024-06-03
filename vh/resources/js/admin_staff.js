import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    // Seleccionar todos los botones con la clase 'assign_appointment' y agregar el evento de clic
    $("#create_staff").click((e) => {
        e.preventDefault();
        secuencia();
    });

    async function genere_input() {
        // Define un array de nombres para el select
        const nombres = [
            "Dr. Juan Pérez",
            "Dr. Ana Gómez",
            "Dr. Luis Martínez",
            "Dr. Carmen Rodríguez",
        ];

        // Genera el HTML para el select
        const selectHTML = nombres
            .map((nombre) => `<option value="${nombre}">${nombre}</option>`)
            .join("");

        // Inserta el select dentro del contenido de la alerta
        const { value: result, isConfirmed } = await Swal.fire({
            title: "Asignar Personal",
            html: `
                <h1 class="text-gray-700 text-xl font-bold mb-6">Codigo de Cita</h1>
                <p class="text-gray-700 text-lg font-bold mb-6">#00000</p>
                <h2 class="text-gray-700 text-xl font-bold mb-6">Seleccione al Doctor</h2>
                <select id="doctorSelect" class="swal2-input appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    ${selectHTML}
                </select>
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
            preConfirm: () => {
                // Retornar el valor seleccionado en el select
                return document.getElementById("doctorSelect").value;
            },
        });

        return { result, isConfirmed };
    }

    async function secuencia() {
        const { result, isConfirmed } = await genere_input();
        if (isConfirmed) {
            const selectedDoctor = result;
            Swal.fire({
                position: "bottom-end",
                html: `
                    <div class="flex text-center justify-around">
                        <div>
                            <p class="text-gray-700 text-lg font-bold mb-6">Doctor Asignado</p>
                            <p class="text-gray-500 text-base font-bold mb-6">${selectedDoctor}</p>
                        </div>
                    </div>
                `,
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
        }
    }
});
