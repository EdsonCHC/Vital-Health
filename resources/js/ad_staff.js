import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

// Editar info del Doc
$(document).ready(function () {
    const url = new URL(window.location.href);
    const pathSegments = url.pathname.split("/");
    const id = pathSegments[pathSegments.length - 1];

    const firstForm = `
                <form id="firstForm" class="space-y-4 p-4 bg-white text-left" autocomplete="off">
                    <div class="flex flex-col">
                        <label class="text-lg font-semibold">Nombre</label>
                        <input id="name" name="name" class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" type="text" placeholder="Introduce el nombre" required>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-lg font-semibold">Apellidos</label>
                        <input id="lastName" name="lastName" class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" type="text" placeholder="Introduce los apellidos" required>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-lg font-semibold">Número Telefónico</label>
                        <input id="phone" name="phone" class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" type="text" placeholder="Introduce el número telefónico" required>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-lg font-semibold">Género</label>
                        <select id="gender" name="gender" class="form-select w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" required>
                            <option value="" disabled selected>Seleccione un género</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-lg font-semibold">Edad</label>
                        <input id="age" name="age" class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" type="number" min="18" max="100" placeholder="Introduce la edad" required>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-lg font-semibold">Descripción</label>
                        <textarea id="description" name="description" class="form-input w-full h-24 border rounded-lg p-2 mt-1 bg-gray-100" placeholder="Introduce la descripción" required></textarea>
                    </div>
                </form>
            `;

    const secondForm = `
                <form id="secondForm" class="space-y-4 p-4 bg-white text-left" autocomplete="off">
                    <div class="flex flex-col">
                        <label class="text-lg font-semibold">Correo</label>
                        <input id="email" name="email" class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" type="email" placeholder="Introduce tu correo" required>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-lg font-semibold">Contraseña</label>
                        <input id="password" name="password" class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" type="password" placeholder="Introduce tu contraseña" required>
                    </div>
                </form>
            `;

    function firstFormEdit(doctorInfo) {
        return `
            <form id="firstForm" class="space-y-4 p-4 bg-white text-left" autocomplete="off">
    <div class="flex flex-col">
        <label class="text-lg font-semibold">Nombre</label>
        <input id="name" name="name" class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" type="text" value="${
            doctorInfo.name
        }" placeholder="Introduce el nombre">
    </div>
    <div class="flex flex-col">
        <label class="text-lg font-semibold">Apellidos</label>
        <input id="lastName" name="lastName" class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" type="text" value="${
            doctorInfo.lastName
        }" placeholder="Introduce los apellidos">
    </div>
    <div class="flex flex-col">
        <label class="text-lg font-semibold">Número Telefónico</label>
        <input id="phone" name="phone" class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" type="text" value="${
            doctorInfo.number
        }" placeholder="Introduce el número telefónico">
    </div>
    <div class="flex flex-col">
        <label class="text-lg font-semibold">Género</label>
        <select id="gender" name="gender" class="form-select w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100">
            <option value="" ${
                !doctorInfo.gender ? "selected" : ""
            } disabled>Seleccione un género</option>
            <option value="Masculino" ${
                doctorInfo.gender === "Masculino" ? "selected" : ""
            }>Masculino</option>
            <option value="Femenino" ${
                doctorInfo.gender === "Femenino" ? "selected" : ""
            }>Femenino</option>
        </select>
    </div>
    <div class="flex flex-col">
        <label class="text-lg font-semibold">Edad</label>
        <input id="age" name="age" class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" type="number" min="18" max="100" value="${
            doctorInfo.age
        }" placeholder="Introduce la edad">
    </div>
    <div class="flex flex-col">
        <label class="text-lg font-semibold">Descripción</label>
        <textarea id="description" name="description" class="form-input w-full h-24 border rounded-lg p-2 mt-1 bg-gray-100" placeholder="Introduce la descripción">${
            doctorInfo.description
        }</textarea>
    </div>
</form>

        `;
    }

    function secondFormEdit(doctorInfo) {
        return `
            <form id="secondForm" class="space-y-4 p-4 bg-white text-left" autocomplete="off">
                <div class="flex flex-col">
                    <label class="text-lg font-semibold">Correo</label>
                    <input id="email" name="email" class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" type="email" value="${doctorInfo.mail}" placeholder="Introduce el correo">
                </div>
                <div class="flex flex-col">
                    <label class="text-lg font-semibold">Contraseña</label>
                    <input id="password" name="password" class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" type="password" placeholder="Introduce la contraseña">
                </div>
            </form>
        `;
    }

    // Crear datos del Doc
    $("#create_staff").click((e) => {
        e.preventDefault();
        crearSecuencia();
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

                // Validaciones
                const nameRegex = /^[a-zA-Z\s]+$/;
                const phoneRegex = /^\d{8}$/;
                const descriptionRegex = /^[^\s'"“”]+.*$/;
                if (
                    !name ||
                    !lastName ||
                    !phone ||
                    !gender ||
                    !age ||
                    !description
                ) {
                    Swal.showValidationMessage("Complete todos los campos.");
                    return false;
                }
                if (!nameRegex.test(name)) {
                    Swal.showValidationMessage(
                        "Nombre inválido. Solo se permiten letras y espacios."
                    );
                    return false;
                }
                if (!nameRegex.test(lastName)) {
                    Swal.showValidationMessage(
                        "Apellidos inválidos. Solo se permiten letras y espacios."
                    );
                    return false;
                }
                if (!phoneRegex.test(phone)) {
                    Swal.showValidationMessage(
                        "Número telefónico inválido. Debe tener 8 dígitos."
                    );
                    return false;
                }
                if (!gender) {
                    Swal.showValidationMessage("Seleccione un género.");
                    return false;
                }
                if (!age || age < 25 || age > 80) {
                    Swal.showValidationMessage(
                        "Edad inválida. Debe estar entre 25 y 80 años."
                    );
                    return false;
                }
                if (!descriptionRegex.test(description)) {
                    Swal.showValidationMessage(
                        "Descripción inválida. No se permiten comillas y caracteres especiales."
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
            confirmButtonText: "Guardar",
            confirmButtonColor: "#166534",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            preConfirm: () => {
                const form = Swal.getPopup().querySelector("#secondForm");
                const email = form.email.value.trim();
                const password = form.password.value.trim();

                // Validaciones
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const passwordRegex =
                    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$.!%*?&]{8,}$/;
                if (!email || !password) {
                    Swal.showValidationMessage("Complete todos los campos.");
                    return false;
                }
                if (!emailRegex.test(email)) {
                    Swal.showValidationMessage("Correo electrónico inválido.");
                    return false;
                }
                if (!passwordRegex.test(password)) {
                    Swal.showValidationMessage(
                        "Contraseña inválida. Debe tener al menos 8 caracteres, incluir una letra mayúscula, una minúscula y un dígito."
                    );
                    return false;
                }

                return { email, password };
            },
        });

        return { formValues, isConfirmed };
    }

    $(document).on("click", ".edit_staff", function (e) {
        e.preventDefault();
        const id = $(this).data("id");

        $.ajax({
            url: `/staff/doctor/${id}`,
            type: "GET",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success(response) {
                let doctorInfo = response;
                actualizarSecuencia(doctorInfo);
            },
            error(response) {
                console.error(
                    "Error al obtener la información del doctor:",
                    response
                );

                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "No se pudo obtener la información del doctor.",
                });
            },
        });
    });

    async function showFirstFormEdit(doctorInfo) {
        const { value: formValues, isConfirmed } = await Swal.fire({
            title: "Datos del Doctor",
            html: firstFormEdit(doctorInfo),
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
                // Validaciones
                const nameRegex = /^[a-zA-Z\s]+$/;
                const phoneRegex = /^\d{8}$/;
                const descriptionRegex = /^[^\s'"“”]+.*$/;
                if (
                    !name ||
                    !lastName ||
                    !phone ||
                    !gender ||
                    !age ||
                    !description
                ) {
                    Swal.showValidationMessage("Complete todos los campos.");
                    return false;
                }
                if (!nameRegex.test(name)) {
                    Swal.showValidationMessage(
                        "Nombre inválido. Solo se permiten letras y espacios."
                    );
                    return false;
                }
                if (!nameRegex.test(lastName)) {
                    Swal.showValidationMessage(
                        "Apellidos inválidos. Solo se permiten letras y espacios."
                    );
                    return false;
                }
                if (!phoneRegex.test(phone)) {
                    Swal.showValidationMessage(
                        "Número telefónico inválido. Debe tener 8 dígitos."
                    );
                    return false;
                }
                if (!gender) {
                    Swal.showValidationMessage("Seleccione un género.");
                    return false;
                }
                if (!age || age < 25 || age > 80) {
                    Swal.showValidationMessage(
                        "Edad inválida. Debe estar entre 25 y 80 años."
                    );
                    return false;
                }
                if (!descriptionRegex.test(description)) {
                    Swal.showValidationMessage(
                        "Descripción inválida. No se permiten comillas y caracteres especiales."
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

    async function showSecondFormEdit(doctorInfo) {
        const { value: formValues, isConfirmed } = await Swal.fire({
            title: "Credenciales del Doctor",
            html: secondFormEdit(doctorInfo),
            showConfirmButton: true,
            confirmButtonText: "Guardar",
            confirmButtonColor: "#166534",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            preConfirm: () => {
                const form = Swal.getPopup().querySelector("#secondForm");
                const email = form.email.value.trim();
                const password = form.password.value.trim();
                // Validaciones
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const passwordRegex =
                    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$.!%*?&]{8,}$/;
                if (!email || !password) {
                    Swal.showValidationMessage("Complete todos los campos.");
                    return false;
                }
                if (!emailRegex.test(email)) {
                    Swal.showValidationMessage("Correo electrónico inválido.");
                    return false;
                }
                if (!passwordRegex.test(password)) {
                    Swal.showValidationMessage(
                        "Contraseña inválida. Debe tener al menos 8 caracteres, incluir una letra mayúscula, una minúscula y un dígito."
                    );
                    return false;
                }
                return { email, password };
            },
        });

        return { formValues, isConfirmed };
    }

    async function crearSecuencia() {
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
                        window.location.reload();
                    },
                    error: (response) => {
                        console.log("error al enviar los Datos", response);
                    },
                });
            }
        }
    }

    async function crearSecuencia() {
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
                        Swal.fire({
                            toast: true,
                            position: "bottom-end",
                            icon: "success",
                            title: "Dotor creado",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                        setTimeout(() => {
                            window.location.reload();
                        }, 3000);
                    },
                    error: (response) => {
                        console.log("error al enviar los Datos", response);
                    },
                });
            }
        }
    }

    async function actualizarSecuencia(doctorInfo) {
        const { formValues: firstFormValues, isConfirmed: firstFormConfirmed } =
            await showFirstFormEdit(doctorInfo);
        if (firstFormConfirmed) {
            const {
                formValues: secondFormValues,
                isConfirmed: secondFormConfirmed,
            } = await showSecondFormEdit(doctorInfo);
            if (secondFormConfirmed) {
                const concatArrays = {
                    ...firstFormValues,
                    ...secondFormValues,
                    category_id: id,
                };
                console.log(concatArrays);
                $.ajax({
                    url: `/staff/${doctorInfo.id}`,
                    type: "PUT",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ), // Incluye el token CSRF
                    },
                    data: concatArrays,
                    success: (response) => {
                        console.log("Datos enviados", response);
                        Swal.fire({
                            toast: true,
                            position: "bottom-end",
                            icon: "success",
                            title: "Doctor actualizado",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                        setTimeout(() => {
                            window.location.reload();
                        }, 3000);
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

    $(document).on("click", ".delete_doc", function (e) {
        e.preventDefault();
        const id = $(this).data("id");
        try {
            showConfirmDeleteButton(id);
        } catch (error) {
            console.error(
                "Error al mostrar la confirmación de eliminación:",
                error
            );
        }
    });

    function showConfirmDeleteButton(id) {
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
                    try {
                        $.ajax({
                            url: `/staff/${id}`,
                            type: "delete",
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"), // Incluye el token CSRF
                            },
                            success(response) {
                                console.log(response);
                                Swal.fire({
                                    toast: true,
                                    position: "bottom-end",
                                    icon: "success",
                                    title: "Doctor Eliminado",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                setTimeout(() => {
                                    window.location.reload();
                                }, 3000);
                            },
                            error(response) {
                                console.log(response);
                            },
                        });
                    } catch (error) {}
                }
            })
            .catch((error) => {
                console.error("Error en la promesa de SweetAlert:", error);
            });
    }
});
