import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

let genre = "";
let date = "";
let blood_type = "";

$(document).ready(function () {
    $("#register").click((e) => {
        e.preventDefault();

        secuencia().then((success) => {
            if (success) {
                const token = $("#_token").val();
                const name = $("#name").val();
                const lastName = $("#lastName").val();
                const mail = $("#mail").val();
                const password = $("#password").val();

                $.ajax({
                    url: "/registro",
                    type: "POST",
                    data: {
                        _token: token,
                        name: name,
                        lastName: lastName,
                        mail: mail,
                        gender: genre,
                        birth: date,
                        blood: blood_type,
                        password: password
                    },
                    success: (response) => {
                        if (response.success) {
                            window.location.href = response.redirect_url;
                        } else {
                            //  validation errors 
                            console.log('Registration failed');
                        }
                    },
                    error: (response) => {
                        // Manejar la respuesta de error
                        console.error("Error en el registro", response);
                    },
                });
            } else {
                console.error("El usuario canceló la secuencia de entrada.");
            }
        });
    });

    // Funciones asíncronas
    async function genere_input() {
        const result = await Swal.fire({
            title: "Género",
            text: "Por favor selecciona tu género, servirá más adelante",
            icon: "info",
            customClass: {
                popup: "genere_custom_popup",
                confirmButton: "genere_custom_button",
            },
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
            genre = result.value;
            console.log(genre);
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
            date = result.value;
            console.log(date);
            return true;
        } else {
            return false;
        }
    }

    async function blood_type_input() {
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
            blood_type = result.value;
            console.log(blood_type);
            return true;
        } else {
            return false;
        }
    }

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
});
