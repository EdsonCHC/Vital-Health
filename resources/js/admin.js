import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    // Obtener el token CSRF desde el meta tag
    const _token = $("meta[name='csrf-token']").attr("content");

    // Manejar el clic en el botón de cerrar sesión
    $("#log_out_admin").click((e) => {
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
                    $.ajax({
                        url: "/admin/logout",  // Endpoint específico para cerrar sesión del admin
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': _token  // Incluye el token CSRF en los encabezados
                        },
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
