import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    // Token CSRF
    const _token = $("#_token").val();

    // Manejar el clic en el botón de cerrar sesión
    $("#log_out").click((e) => {
        e.preventDefault();

        // Confirmación de SweetAlert
        Swal.fire({
            title: "¿Desea cerrar la sesión?",
            showCancelButton: true,
            showConfirmButton: true,
            icon: "question",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Sera enviado al inicio en breve",
                    icon: "success",
                    timer: 3000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                }).then(() => {
                    // Realizar la solicitud AJAX para cerrar sesión
                    $.ajax({
                        url: "/doctor/logout",  // Endpoint para cerrar sesión del doctor
                        type: "POST",
                        data: {
                            _token: _token,
                        },
                        success(response) {
                            if (response.success) {
                                window.location.href = response.url;
                            }
                        },
                        error(response) {
                            console.log("Ups, algo ha salido mal :v");
                        },
                    });
                });
            }
        });
    });
});
