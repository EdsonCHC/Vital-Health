import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

let genre = "";
let date = "";
let blood_type = "";
let imgFile = null;
let step = 0; 

$(document).ready(function () {
    $("#register").click((e) => {
        e.preventDefault();
        handleRegistration();
    });

    async function handleRegistration() {
        if (step === 0) {
            const name = escapeHtml($("#name").val());
            const lastName = escapeHtml($("#lastName").val());
            const mail = escapeHtml($("#mail").val());
            const password = $("#password").val();

            if (
                containsScript(name) ||
                containsScript(lastName) ||
                containsScript(mail)
            ) {
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "La entrada contiene contenido peligroso.",
                });
                return;
            }

            if (!name || !lastName || !mail || !password) {
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
                    text: "El nombre y el apellido solo pueden contener letras.",
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

            if (!validatePassword(password)) {
                Swal.fire({
                    icon: "info",
                    title: "Error...",
                    text: "Por su seguridad la contraseña debe tener al menos 8 caracteres.",
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
                formData.append('_token', token);
                formData.append('name', escapeHtml($("#name").val()));
                formData.append('lastName', escapeHtml($("#lastName").val()));
                formData.append('mail', escapeHtml($("#mail").val()));
                formData.append('gender', gender);
                formData.append('birth', birth);
                formData.append('blood', blood);
                formData.append('password', $("#password").val());
                if (imgFile) {
                    formData.append('img', imgFile);
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
                                text: "Te has registrado correctamente.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(() => {
                                window.location.href = "/login";
                            }, 1500);
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
                        console.error("Error en el registro", response);
                        Swal.fire({
                            icon: "error",
                            title: "Error...",
                            text: "Correo Invalido, ya se encuentra en uso",
                        });
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
            console.log(genre);
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
            console.log(date);
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
            console.log(blood_type);
            return true;
        } else if (result.dismiss === Swal.DismissReason.cancel && step > 3) {
            step--;
            return false;
        }
        return false;
    }

    async function image_input() {
        const { value: file } = await Swal.fire({
            title: 'Selecciona una imagen',
            input: 'file',
            inputAttributes: {
                'accept': 'image/*',
                'aria-label': 'Sube tu imagen de perfil'
            },
            showCancelButton: step === 4,
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Retroceder',
            preConfirm: (file) => {
                if (file) {
                    const reader = new FileReader();
                    return new Promise((resolve) => {
                        reader.onload = (e) => {
                            Swal.fire({
                                title: 'Vista previa de la imagen',
                                html: `<div style="display: flex; justify-content: center; align-items: center; height: 200px;">
                                            <img src="${e.target.result}" alt="Vista previa" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
                                        </div>`,
                                showCancelButton: true,
                                cancelButtonText: 'Retroceder',
                                confirmButtonText: 'Aceptar',
                                preConfirm: () => {
                                    imgFile = file;
                                    resolve(true);
                                }
                            });
                        };
                        reader.readAsDataURL(file);
                    });
                } else {
                    Swal.showValidationMessage('Por favor selecciona una imagen');
                    return false;
                }
            }
        });

        if (file) {
            return true;
        } else if (file === undefined && step > 4) {
            step--;
            return false;
        }
        return false;
    }

    function escapeHtml(unsafe) {
        return String(unsafe).replace(/[&<>"'`=\/]/g, function (s) {
            return entityMap[s];
        });
    }

    const entityMap = {
        "&": "&amp;",
        "<": "&lt;",
        ">": "&gt;",
        '"': "&quot;",
        "'": "&#39;",
        "/": "&#x2F;",
        "`": "&#x60;",
        "=": "&#x3D;",
    };

    function containsScript(input) {
        const scriptPattern =
            /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi;
        return scriptPattern.test(input);
    }

    function validateName(name) {
        const namePattern = /^[a-zA-Z]+$/;
        return namePattern.test(name);
    }

    function validatePassword(password) {
        return password.length >= 8;
    }

    function validateEmail(email) {
        const re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    function validateImage(file) {
        const validImageTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml'];
        return validImageTypes.includes(file.type);
    }
});
