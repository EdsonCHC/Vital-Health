import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;
$(document).ready(function () {
    $("#make_appointment").click((e) => {
        e.preventDefault();

        secuencia();
    });

    //funciones
    async function genere_input() {
        const result = await Swal.fire({
            title: "Agendar Cita",
            text: "Selecciona una fecha y una hora en que le gustaria tener la cita",
            html: `
                <form>
                <p class="mb-4">Selecciona una fecha y una hora en que le gustaria tener la cita</p>
            <div class="flex flex-col justify-center items-center ">
            <div class="text-center w-1/2 mb-4">
                <label for="fecha" class="block text-xl font-medium text-gray-700">Fecha:</label>
                <input type="date" id="fecha" name="fecha" class="mt-1 block w-full shadow-lg lg:text-lg border-solid border-2 border-vh-green rounded">
            </div>
            <div class="mb-4">
                <label for="hora" class="block text-xl font-medium text-gray-700">Hora:</label>
                <input type="time" id="hora" name="hora" class="mt-1 block w-full shadow-lg lg:text-lg border-solid border-2 border-vh-green rounded">
            </div>
            </div>
            </form>
                `,
            customClass: {
                popup: "border-solid border-2 border-vh-green",
            },

            showConfirmButton: false,
            showCancelButton: true,
            confirmButtonText: "Seleccionar",
            cancelButtonText: "Cancelar",
        });

        if (result.isConfirmed) {
            const selectOption = result.value;
            console.log(selectOption);
            return true;
        } else {
            return false;
        }
    }

    async function date_input() {
        const result = await Swal.fire({
            title: "Fecha de nacimiento",
            text: "Por favor ingresa tu fecha de nacimiento, servirá más adelante",
            icon: "info",
            customClass: {
                popup: "genere_custom_popup",
                confirmButton: "genere_custom_button",
            },
            input: "date",
            showCancelButton: true,
            confirmButtonText: "Seleccionar",
            cancelButtonText: "Cancelar",
        });

        if (result.isConfirmed) {
            const selectDate = result.value;
            console.log(selectDate);
            return true;
        } else {
            return false;
        }
    }

    async function blood_type() {
        const result = await Swal.fire({
            title: "Tipo de sangre",
            text: "Por favor ingresa tu tipo de sangre, servirá más adelante",
            icon: "info",
            customClass: {
                popup: "genere_custom_popup",
                confirmButton: "genere_custom_button",
            },
            input: "select",
            inputOptions: {
                "A+": "A+",
                "O+": "O+",
                "B+": "B+",
                "AB+": "AB+",
                "A-": "A-",
                "O-": "O-",
                "B-": "B-",
                "AB-": "AB-",
            },
            showCancelButton: true,
            confirmButtonText: "Seleccionar",
            cancelButtonText: "Cancelar",
        });

        if (result.isConfirmed) {
            const selectBlood = result.value;
            console.log(selectBlood);
            return true;
        } else {
            return false;
        }
    }

    async function secuencia() {
        const genereSelected = await genere_input();
        if (genereSelected) {
            const dateSelected = await date_input();
            if (dateSelected) {
                await blood_type();
            }
        }
    }
});
