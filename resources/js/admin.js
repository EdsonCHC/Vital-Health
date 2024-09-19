import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    const _token = $('meta[name="csrf-token"]').attr('content');

    $(".deleteUser").click(function () {
        const userId = $(this).data("id");

        Swal.fire({
            title: "Eliminar Paciente",
            text: "¿Estás seguro de que deseas eliminar este paciente?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                const _token = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    url: `/records/${userId}`,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": _token,
                    },
                    success(response) {
                        if (response.success) {
                            Swal.fire("Paciente eliminado", "", "success");
                            // Actualiza el HTML si es necesario
                        } else {
                            Swal.fire(
                                "Error al eliminar el paciente",
                                response.message ||
                                    "No se pudo eliminar el paciente",
                                "error"
                            );
                        }
                    },
                    error(response) {
                        console.log(response); // Para depuración
                        Swal.fire(
                            "Error al eliminar el paciente",
                            "No se pudo eliminar el paciente",
                            "error"
                        );
                    },
                });
            }
        });
    });

    $("#log_out_admin").click((e) => {
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
                    timer: 1500,
                    showConfirmButton: false,
                    timerProgressBar: true,
                }).then(() => {
                    $.ajax({
                        url: "/admin/logout",
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
