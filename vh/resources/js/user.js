import Swal from "sweetalert2";
import jQuery, { error } from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    const _token = $("#_token").val();

    $("#log_out").click((e) => {
        e.preventDefault();

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
                    $.ajax({
                        url: "/user",
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
                            console.log("ups, algo ha salido mal :v")
                        },
                    });
                });
            }
        });
    });
});
