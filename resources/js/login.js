import $ from "jquery";
import Swal from "sweetalert2";

$(document).ready(() => {
    $("#login_btn").on("click", function (e) {
        e.preventDefault();

        const _token = $("#_token").val();
        const mail = $("#mail").val();
        const password = $("#password").val();

        if (!mail || !password) {
            Swal.fire({
                icon: "warning",
                title: "Campos requeridos",
                text: "Por favor, ingrese su correo y contraseña.",
            });
            return;
        }

        $.post("/login", {
            _token: _token,
            mail: mail,
            password: password,
        })
            .done((response) => {
                if (response.success) {
                    window.location.href = response.redirect_url;
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error de autenticación",
                        text: response.message || "Credenciales incorrectas.",
                    });
                }
            })
            .fail((response) => {
                let errorMessage = response.responseJSON ? response.responseJSON.message : "Ocurrió un error";

                // Mostrar la alerta de error
                Swal.fire({
                    icon: "error",
                    title: "Ops",
                    text: errorMessage,
                });
            });
    });
});
