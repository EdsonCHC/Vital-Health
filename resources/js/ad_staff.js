import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

// Editar info del Doc
$(document).ready(function () {
    const url = new URL(window.location.href);
    const pathSegments = url.pathname.split("/");
    const id = pathSegments[pathSegments.length - 1];

    const firstForm = `
                <form id="firstForm" class="space-y-4" autocomplete="off">
                    <div class="flex flex-col">
                        <label class="mr-auto font-semibold text-xl">Nombre</label>
                        <input id="name" name="name" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="text">
                    </div>
                    <div class="flex flex-col">
                        <label class="mr-auto font-semibold text-xl">Apellidos</label>
                        <input id="lastName" name="lastName" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="text">
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
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label class="mr-auto font-semibold text-xl">Edad</label>
                        <input id="age" name="age" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="number" min="18" max="100">
                    </div>
                    <div class="flex flex-col">
                        <label class="mr-auto font-semibold text-xl">Descripción</label>
                        <input id="description" name="description" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="text">
                    </div>
                </form>
            `;

    const secondForm = `
                <form id="secondForm" class="space-y-4" autocomplete="off">
                    <div class="flex flex-col">
                        <label class="mr-auto font-semibold text-xl">Correo</label>
                        <input id="email" name="email" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="email">
                    </div>
                    <div class="flex flex-col">
                        <label class="mr-auto font-semibold text-xl">Contraseña</label>
                        <input id="password" name="password" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="password">
                    </div>
                </form>
            `;

    const firstFormEdit = `
            <form id="firstForm" class="space-y-4" autocomplete="off">
                <div class="flex flex-col">
                    <label class="mr-auto font-semibold text-xl">Nombre</label>
                    <input id="name" name="name" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="text">
                </div>
                <div class="flex flex-col">
                    <label class="mr-auto font-semibold text-xl">Apellidos</label>
                    <input id="lastName" name="lastName" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="text">
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
                    </select>
                </div>
                <div class="flex flex-col">
                    <label class="mr-auto font-semibold text-xl">Edad</label>
                    <input id="age" name="age" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="number" min="18" max="100">
                </div>
                <div class="flex flex-col">
                    <label class="mr-auto font-semibold text-xl">Descripción</label>
                    <input id="description" name="description" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="text">
                </div>
            </form>
        `;

    const secondFormEdit = `
            <form id="secondForm" class="space-y-4" autocomplete="off">
                <div class="flex flex-col">
                    <label class="mr-auto font-semibold text-xl">Correo</label>
                    <input id="email" name="email" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="email">
                </div>
                <div class="flex flex-col">
                    <label class="mr-auto font-semibold text-xl">Contraseña</label>
                    <input id="password" name="password" class="w-full h-10 my-2 px-2 border border-solid rounded-sm" type="password">
                </div>
            </form>
        `;

    // Crear datos del Doc
    $("#create_staff").click((e) => {
        e.preventDefault();
        secuencia();
    });

    async function showFirstForm() {
        const { value: formValues, isConfirmed } = await Swal.fire({
            title: "Datos del Nuevo Doctor",
            html: firstForm,
            showConfirmButton: true,
            confirmButtonText: "Siguiente",
            confirmButtonColor: "#166534",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            preConfirm: () => {
                const form = Swal.getPopup().querySelector("#firstForm");
                const name = form.name.value.trim();
                const lastName = form.lastName.value.trim();
                const phone = form.phone.value.trim();
                const gender = form.gender.value;
                const age = form.age.value;
                const description = form.description.value.trim();
                if (
                    !name ||
                    !lastName ||
                    !phone ||
                    !gender ||
                    !age ||
                    !description
                ) {
                    Swal.showValidationMessage(
                        "Por favor, complete todos los campos"
                    );
                    return false;
                }
                return {
                    name,
                    lastName,
                    phone,
                    gender,
                    age,
                    description,
                };
            },
        });

        return { formValues, isConfirmed };
    }

    async function showSecondForm() {
        const { value: formValues, isConfirmed } = await Swal.fire({
            title: "Credenciales del Nuevo Doctor",
            html: secondForm,
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

    $("#edit_staff").click((e) => {
        e.preventDefault();
        secuencia(doctorId);
    });

    async function showFirstForm(doctorId) {
        const { value: formValues, isConfirmed } = await Swal.fire({
            title: "Datos del Doctor",
            html: firstFormEdit,
            showConfirmButton: true,
            confirmButtonText: "Siguiente",
            confirmButtonColor: "#166534",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            preConfirm: () => {
                const form = Swal.getPopup().querySelector("#firstForm");
                const name = form.name.value.trim();
                const lastName = form.lastName.value.trim();
                const phone = form.phone.value.trim();
                const gender = form.gender.value;
                const age = form.age.value;
                const description = form.description.value.trim();
                if (
                    !name ||
                    !lastName ||
                    !phone ||
                    !gender ||
                    !age ||
                    !description
                ) {
                    Swal.showValidationMessage(
                        "Por favor, complete todos los campos"
                    );
                    return false;
                }
                return {
                    name,
                    lastName,
                    phone,
                    gender,
                    age,
                    description,
                };
            },
        });

        return { formValues, isConfirmed };
    }

    async function showSecondForm(doctorInfo) {
        const { value: formValues, isConfirmed } = await Swal.fire({
            title: "Credenciales del Doctor",
            html: secondFormEdit,
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
                const concatArrays = {
                    ...firstFormValues,
                    ...secondFormValues,
                    category_id: id,
                };
                console.log(concatArrays);
                $.ajax({
                    url: "/staff/{id}",
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ), // Incluye el token CSRF
                    },
                    data: concatArrays,
                    success: (response) => {
                        console.log("Datos enviados", response);
                    },
                    error: (response) => {
                        console.log("error al enviar los Datos", response);
                    },
                });
            }
        }
    } 

    async function secuencia(doctorId) {
        const { formValues: firstFormValues, isConfirmed: firstFormConfirmed } =
            await showFirstForm(doctorId);
        if (firstFormConfirmed) {
            const {
                formValues: secondFormValues,
                isConfirmed: secondFormConfirmed,
            } = await showSecondForm(doctorInfo);
            if (secondFormConfirmed) {
                const concatArrays = {
                    ...firstFormValues,
                    ...secondFormValues,
                    category_id: id,
                };
                console.log(concatArrays);
                $.ajax({
                    url: "/staff/{id}",
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ), // Incluye el token CSRF
                    },
                    data: concatArrays,
                    success: (response) => {
                        console.log("Datos enviados", response);
                    },
                    error: (response) => {
                        console.log("error al enviar los Datos", response);
                    },
                });
            }
        }
    }

    // Ver historial de pacientes del Doc

    $("#history_staff").click(async (e) => {
        e.preventDefault();
        await showTableAlert();
    });

    async function showTableAlert() {
        return new Promise((resolve) => {
            Swal.fire({
                title: "Historial",
                html: `
                    <table border="1" style="width:100%">
                        <thead>
                            <tr>
                                <th>Citas</th>
                                <th>Modalidad</th>
                                <th>Usuario</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#-----</td>
                                <td>Virtual</td>
                                <td>Alvarenga</td>
                                <td>
                                    <button target="_self" class="assign_appointment">
                                        <a href="#">
                                            <img src="/storage/svg/printer-icon.svg" alt="noti_icon"
                                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                                        </a>
                                    </button>
                                    <button target="_self" class="assign_appointment">
                                        <a href="#">
                                            <img src="/storage/svg/option-icon.svg" alt="noti_icon"
                                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                                        </a>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#-----</td>
                                <td>Virtual</td>
                                <td>Alvarenga</td>
                                <td>
                                    <button target="_self" class="assign_appointment">
                                        <a href="#">
                                            <img src="/storage/svg/printer-icon.svg" alt="noti_icon"
                                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                                        </a>
                                    </button>
                                    <button target="_self" class="assign_appointment">
                                        <a href="#">
                                            <img src="/storage/svg/option-icon.svg" alt="noti_icon"
                                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                                        </a>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#-----</td>
                                <td>Virtual</td>
                                <td>Alvarenga</td>
                                <td>
                                    <button target="_self" class="assign_appointment">
                                        <a href="#">
                                            <img src="/storage/svg/printer-icon.svg" alt="noti_icon"
                                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                                        </a>
                                    </button>
                                    <button target="_self" class="assign_appointment">
                                        <a href="#">
                                            <img src="/storage/svg/option-icon.svg" alt="noti_icon"
                                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                                        </a>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                `,
                confirmButtonText: "OK",
                onClose: resolve,
            });
        });
    }

    // Confirmar la eliminación del Doc

    $("#delete_doc").click((e) => {
        e.preventDefault();
        try {
            showConfirmDeleteButton();
        } catch (error) {
            console.error(
                "Error al mostrar la confirmación de eliminación:",
                error
            );
        }
    });

    function showConfirmDeleteButton() {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText: "Sí, eliminarlo",
            confirmButtonColor: "#166534",
            cancelButtonText: "Cancelar",
        })
            .then((result) => {
                if (result.isConfirmed) {
                    console.log("Se eliminó con éxito");
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Acción si se cancela
                }
            })
            .catch((error) => {
                console.error("Error en la promesa de SweetAlert:", error);
            });
    }
});
