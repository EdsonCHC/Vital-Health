import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

let genre = "";
let date = "";
let blood_type = "";

$(document).ready(function () {
    $("#register").click((e) => {
        e.preventDefault();

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

        secuencia().then((success) => {
            if (success) {
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

                $.ajax({
                    url: "/registro",
                    type: "POST",
                    data: {
                        _token: token,
                        name: name,
                        lastName: lastName,
                        mail: mail,
                        gender: gender,
                        birth: birth,
                        blood: blood,
                        password: password,
                    },
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
                                //  login
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
            } else {
                console.error("El usuario canceló la secuencia de entrada.");
            }
        });
    });

    async function secuencia() {
        const genereSelected = await genere_input();
        if (!genereSelected) {
            return false;
        }

        const dateSelected = await date_input();
        if (!dateSelected) {
            return false;
        }

        const bloodTypeSelected = await blood_type_input();
        if (!bloodTypeSelected) {
            return false;
        }

        return true;
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
            showCancelButton: true,
            confirmButtonText: "Seleccionar",
            cancelButtonText: "Cancelar",
        });

        if (result.isConfirmed) {
            genre = escapeHtml(result.value);
            console.log(genre);
            return true;
        } else {
            return false;
        }
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
            showCancelButton: true,
            confirmButtonText: "Seleccionar",
            cancelButtonText: "Cancelar",
        });

        if (result.isConfirmed) {
            date = escapeHtml(result.value);
            console.log(date);
            return true;
        } else {
            return false;
        }
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
            showCancelButton: true,
            confirmButtonText: "Seleccionar",
            cancelButtonText: "Cancelar",
        });

        if (result.isConfirmed) {
            blood_type = escapeHtml(result.value);
            console.log(blood_type);
            return true;
        } else {
            return false;
        }
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
        return password.length > 8;
    }

    function validateEmail(email) {
        const re = /\S+@\S+\.\S+/;
        return re.test(email);
    }
});
