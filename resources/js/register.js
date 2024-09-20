import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

let genre = "";
let date = "";
let blood_type = "";
let imgFile = null;
let step = 0;

$(document).ready(function () {
    let is_opaque = false;

    $("#see_password_label").click((e) => {
        const pass = $("#password");
        const pass_img = $("#see_password_img");

        const pass_type =
            pass.attr("type") === "password" ? "text" : "password";
        pass.attr("type", pass_type);

        pass_img.css("opacity", is_opaque ? "1" : "0.5");
        is_opaque = !is_opaque;
    });

    $("#register").click((e) => {
        e.preventDefault();
        handleRegistration();
    });

    async function handleRegistration() {
        if (step === 0) {
            const name = escapeHtml($("#name").val());
            const lastName = escapeHtml($("#lastName").val());
            const mail = escapeHtml($("#mail").val());
            const address = escapeHtml($("#address").val());
            const password = $("#password").val();

            // Validation
            if (
                containsScript(name) ||
                containsScript(lastName) ||
                containsScript(mail) ||
                containsScript(address)
            ) {
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "La entrada contiene contenido peligroso.",
                });
                return;
            }

            if (!name || !lastName || !mail || !address || !password) {
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "Todos los campos son obligatorios",
                });
                return;
            }

            if (!validateName(name) || !validateName(lastName)) {
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "El nombre y el apellido solo pueden contener letras y un espacio.",
                });
                return;
            }

            if (!validateEmail(mail)) {
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "Ingresa un correo electrónico válido",
                });
                return;
            }

            if (!validateAddress(address)) {
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "La dirección solo puede contener números, letras, # y -.",
                });
                return;
            }

            const result = validatePassword();
            if (!result.valid) {
                Swal.fire({
                    icon: "info",
                    title: "Error...",
                    text: result.message,
                });
                return;
            }

            step = 1;
            await secuencia();
        } else {
            await secuencia();
        }
    }

    async function secuencia() {
        switch (step) {
            case 1:
                const genereSelected = await genere_input();
                if (!genereSelected) return;

                step = 2;
                await secuencia();
                break;

            case 2:
                const dateSelected = await date_input();
                if (!dateSelected) return;

                step = 3;
                await secuencia();
                break;

            case 3:
                const bloodTypeSelected = await blood_type_input();
                if (!bloodTypeSelected) return;

                step = 4;
                await secuencia();
                break;

            case 4:
                const imageSelected = await image_input();
                if (!imageSelected) return;

                const token = $("#_token").val();
                const gender = genre;
                const birth = date;
                const blood = blood_type;

                if (!gender || !birth || !blood) {
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "Debes completar todos los campos antes de continuar",
                    });
                    return;
                }

                const formData = new FormData();
                formData.append("_token", token);
                formData.append("name", escapeHtml($("#name").val()));
                formData.append("lastName", escapeHtml($("#lastName").val()));
                formData.append("mail", escapeHtml($("#mail").val()));
                formData.append("address", escapeHtml($("#address").val()));
                formData.append("gender", gender);
                formData.append("birth", birth);
                formData.append("blood", blood);
                formData.append("password", $("#password").val());
                if (imgFile) {
                    formData.append("img", imgFile);
                }

                $.ajax({
                    url: "/registro",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: (response) => {
                        if (response.success) {
                            Swal.fire({
                                icon: "success",
                                title: "Registro exitoso!",
                                text: "Te has registrado correctamente. Ahora puedes iniciar sesión",
                                showConfirmButton: false,
                                timer: 2500,
                            });
                            setTimeout(() => {
                                window.location.href = "/login";
                            }, 2500);
                        } else {
                            if (response.errors) {
                                let errorMessage =
                                    "Hubo un problema con tu registro:";
                                for (const errorField in response.errors) {
                                    errorMessage += `${response.errors[errorField]}<br>`;
                                }
                                Swal.fire({
                                    icon: "error",
                                    title: "Error...",
                                    html: errorMessage,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Error...",
                                    text: "Hubo un problema con tu registro, por favor intenta de nuevo.",
                                });
                            }
                        }
                    },
                    error: (response) => {
                        console.error(response.responseJSON);

                        if (response.responseJSON && response.responseJSON.errors) {
                            // Accede directamente al primer error de la primera clave
                            const firstErrorField = Object.keys(response.responseJSON.errors)[0];
                            const firstErrorMessage = response.responseJSON.errors[firstErrorField][0];

                            Swal.fire({
                                icon: "error",
                                title: "Error...",
                                text: firstErrorMessage, // Solo el primer mensaje de error
                            }).then(() => {
                                $("#mail").focus(); // Focaliza el campo de correo
                            });
                        }
                    },
                });
                break;

            default:
                console.error("Paso desconocido");
        }
    }

    async function genere_input() {
        const result = await Swal.fire({
            title: "Género",
            text: "Por favor selecciona tu género.",
            icon: "info",
            input: "select",
            inputOptions: {
                Masculino: "Masculino",
                Femenino: "Femenino",
            },
            showCancelButton: step === 1,
            confirmButtonText: "Seleccionar",
            cancelButtonText: step === 1 ? "Cancelar" : "Retroceder",
        });

        if (result.isConfirmed) {
            genre = escapeHtml(result.value);
            return true;
        } else if (result.dismiss === Swal.DismissReason.cancel && step > 1) {
            step--;
            return false;
        }
        return false;
    }

    async function date_input() {
        const today = new Date();
        today.setDate(today.getDate() - 1);
        const day = today.toISOString().split("T")[0];

        const result = await Swal.fire({
            title: "Fecha de nacimiento",
            text: "Por favor ingresa tu fecha de nacimiento.",
            icon: "info",
            input: "date",
            inputAttributes: {
                min: "1950-01-01",
                max: day,
            },
            showCancelButton: step === 2,
            confirmButtonText: "Seleccionar",
            cancelButtonText: step === 2 ? "Retroceder" : "Cancelar",
        });

        if (result.isConfirmed) {
            date = escapeHtml(result.value);
            return true;
        } else if (result.dismiss === Swal.DismissReason.cancel && step > 2) {
            step--;
            return false;
        }
        return false;
    }

    async function blood_type_input() {
        const result = await Swal.fire({
            title: "Tipo de sangre",
            text: "Por favor selecciona tu tipo de sangre.",
            icon: "info",
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
            showCancelButton: step === 3,
            confirmButtonText: "Seleccionar",
            cancelButtonText: step === 3 ? "Retroceder" : "Cancelar",
        });

        if (result.isConfirmed) {
            blood_type = escapeHtml(result.value);
            return true;
        } else if (result.dismiss === Swal.DismissReason.cancel && step > 3) {
            step--;
            return false;
        }
        return false;
    }

    async function image_input() {
        const { value: file } = await Swal.fire({
            title: "Selecciona una imagen",
            text: "La imagen es obligatoria.",
            input: "file",
            inputAttributes: {
                accept: "image/*",
                "aria-label": "Sube tu imagen de perfil",
            },
            showCancelButton: step === 4,
            confirmButtonText: "Aceptar",
            cancelButtonText: "Retroceder",
            preConfirm: (file) => {
                return new Promise((resolve, reject) => {
                    if (!file) {
                        Swal.showValidationMessage(
                            "Por favor selecciona una imagen."
                        );
                        reject();
                        return;
                    }

                    // Validar tipo de archivo
                    const validImageTypes = [
                        "image/jpeg",
                        "image/png",
                        "image/svg+xml",
                    ];
                    if (!validImageTypes.includes(file.type)) {
                        Swal.showValidationMessage(
                            "El archivo seleccionado no es un tipo de imagen válido."
                        );
                        reject();
                        return;
                    }

                    // Validar tamaño de archivo (máximo 2MB)
                    const maxSizeInMB = 5;
                    if (file.size / 1024 / 1024 > maxSizeInMB) {
                        Swal.showValidationMessage(
                            `El tamaño de la imagen debe ser menor a ${maxSizeInMB}MB.`
                        );
                        reject();
                        return;
                    }

                    // Si todo es válido, mostrar vista previa
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        Swal.fire({
                            title: "Vista previa de la imagen",
                            html: `<div style="display: flex; justify-content: center;">
                                    <img src="${e.target.result}" alt="Vista previa" style="max-width: 100%; max-height: 300px;"/>
                                    </div>`,
                            showCancelButton: true,
                            confirmButtonText: "Aceptar",
                            cancelButtonText: "Cancelar",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                imgFile = file;
                                resolve(file);
                            } else {
                                resolve(null);
                            }
                        });
                    };
                    reader.readAsDataURL(file);
                });
            },
        });

        if (file === null) {
            Swal.fire({
                icon: "error",
                title: "Error...",
                text: "Debes seleccionar una imagen válida para continuar.",
            });
        }

        return file !== null;
    }

    function containsScript(value) {
        const scriptRegex =
            /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi;
        return scriptRegex.test(value);
    }

    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    function validateName(name) {
        return /^[a-zA-Z\s]+$/.test(name);
    }

    function validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function validateAddress(address) {
        return /^[a-zA-Z0-9#\- ]+$/.test(address);
    }

    function validatePassword() {
        const password = $("#password").val();
        if (password.length < 6) {
            return {
                valid: false,
                message: "La contraseña debe tener al menos 6 caracteres.",
            };
        }
        if (!/[A-Z]/.test(password)) {
            return {
                valid: false,
                message:
                    "La contraseña debe contener al menos una letra mayúscula.",
            };
        }
        if (!/[a-z]/.test(password)) {
            return {
                valid: false,
                message:
                    "La contraseña debe contener al menos una letra minúscula.",
            };
        }
        if (!/[0-9]/.test(password)) {
            return {
                valid: false,
                message: "La contraseña debe contener al menos un número.",
            };
        }
        return { valid: true, message: "" };
    }
});
