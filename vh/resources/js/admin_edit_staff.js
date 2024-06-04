import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $("#edit_staff").click((e) => {
        e.preventDefault();
        secuencia();
    });

    async function showFirstForm() {
        const { value: formValues, isConfirmed } = await Swal.fire({
            title: "Datos del Doctor",
            html: `
                <form id="firstForm" class="space-y-4">
                    <div class="flex flex-col">
                        <label class="mr-auto font-semibold text-xl">Nombre</label>
                        <input id="name" name="name" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="text">
                    </div>
                    <div class="flex flex-col">
                        <label class="mr-auto font-semibold text-xl">Apellidos</label>
                        <input id="lastname" name="lastname" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="text">
                    </div>
                    <div class="flex flex-col">
                        <label class="mr-auto font-semibold text-xl">Número Telefónico</label>
                        <input id="phone" name="phone" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="text">
                    </div>
                    <div class="flex flex-col">
                        <label class="mr-auto font-semibold text-xl">Género</label>
                        <select id="gender" name="gender" class="w-full h-10 my-2 px-2 border border-solid rounded-sm">
                            <option value="" disabled selected>Seleccione un género</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label class="mr-auto font-semibold text-xl">Edad</label>
                        <input id="age" name="age" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="number">
                    </div>
                    <div class="flex flex-col">
                        <label class="mr-auto font-semibold text-xl">Dirección</label>
                        <input id="address" name="address" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="text">
                    </div>
                </form>
            `,
            showConfirmButton: true,
            confirmButtonText: "Siguiente",
            confirmButtonColor: "#166534",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            preConfirm: () => {
                const form = Swal.getPopup().querySelector("#firstForm");
                const name = form.name.value.trim();
                const lastname = form.lastname.value.trim();
                const phone = form.phone.value.trim();
                const gender = form.gender.value;
                const age = form.age.value;
                const address = form.address.value.trim();
                if (
                    !name ||
                    !lastname ||
                    !phone ||
                    !gender ||
                    !age ||
                    !address
                ) {
                    Swal.showValidationMessage(
                        "Por favor, complete todos los campos"
                    );
                    return false;
                }
                return { name, lastname, phone, gender, age, address };
            },
        });

        return { formValues, isConfirmed };
    }

    async function showSecondForm() {
        const { value: formValues, isConfirmed } = await Swal.fire({
            title: "Credenciales del Doctor",
            html: `
                <form id="secondForm" class="space-y-4">
                    <div class="flex flex-col">
                        <label class="mr-auto font-semibold text-xl">Correo</label>
                        <input id="email" name="email" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="email">
                    </div>
                    <div class="flex flex-col">
                        <label class="mr-auto font-semibold text-xl">Contraseña</label>
                        <input id="password" name="password" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="password">
                    </div>
                </form>
            `,
            showConfirmButton: true,
            confirmButtonText: "Crear",
            confirmButtonColor: "#166534",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            preConfirm: () => {
                const form = Swal.getPopup().querySelector("#secondForm");
                const email = form.email.value.trim();
                const password = form.password.value.trim();
                if (!email || !password) {
                    Swal.showValidationMessage(
                        "Por favor, complete todos los campos"
                    );
                    return false;
                }
                return { email, password };
            },
        });

        return { formValues, isConfirmed };
    }

    async function secuencia() {
        const { formValues: firstFormValues, isConfirmed: firstFormConfirmed } =
            await showFirstForm();
        if (firstFormConfirmed) {
            const {
                formValues: secondFormValues,
                isConfirmed: secondFormConfirmed,
            } = await showSecondForm();
            if (secondFormConfirmed) {
                console.log("Datos del Doctor:", firstFormValues);
                console.log("Credenciales del Doctor:", secondFormValues);
            }
        }
    }
});
