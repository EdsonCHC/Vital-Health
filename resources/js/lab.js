import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    const _token = $('meta[name="csrf-token"]').attr('content');

    $("#log_out_laboratorio").click((e) => {
        e.preventDefault();

        Swal.fire({
            title: "¿Desea cerrar la sesión?",
            showCancelButton: true,
            showConfirmButton: true,
            icon: "question",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Será enviado al inicio en breve",
                    icon: "success",
                    timer: 3000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                }).then(() => {
                    $.ajax({
                        url: "/laboratorio/logout",
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
