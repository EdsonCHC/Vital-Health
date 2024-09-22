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
            title: "¿Cerrar Sesión?",
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText: "Confirmar",
            confirmButtonColor: "#166534",
            icon: "question",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    toast: true,
                    title: "Cerrando Sesión",
                    position: "bottom-end",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                }).then(() => {
                    // Realizar la solicitud AJAX para cerrar sesión
                    $.ajax({
                        url: "/doctor/logout", // Endpoint para cerrar sesión del doctor
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
                            console.log(response);
                            Swal.fire({
                                toast: true,
                                title: "Error al Cerrar Sesión",
                                position: "bottom-end",
                                icon: "error",
                                timer: 2000,
                                showConfirmButton: false,
                                timerProgressBar: true,
                            });
                        },
                    });
                });
            }
        });
    });

    // Eliminar cita
    $(document).on("click", ".delete-cita", function () {
        const citaId = $(this).data("cita-id"); // Obtener el ID de la cita
        const _token = $("#_token").val(); // Token CSRF

        Swal.fire({
            title: "¿Estás seguro de que quieres eliminar esta cita?",
            text: "Esta acción no se puede deshacer",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Eliminar",
            confirmButtonColor: "#",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                // Realizar la solicitud AJAX para eliminar la cita
                $.ajax({
                    url: `/citas/${citaId}`,
                    type: "DELETE",
                    data: {
                        _token: _token,
                    },
                    success(response) {
                        if (response.success) {
                            Swal.fire({
                                toast: true,
                                title: "Cita Eliminada",
                                position: "bottom-end",
                                icon: "success",
                                timer: 2000,
                                showConfirmButton: false,
                                timerProgressBar: true,
                            }).then(() => {
                                // Remover la cita de la vista
                                $(`#cita-${citaId}`).remove();
                            });
                        } else {
                            Swal.fire({
                                title: "Error al eliminar la cita",
                                text: response.message,
                                icon: "error",
                            });
                        }
                    },
                    error(response) {
                        Swal.fire({
                            title: "Error interno del servidor",
                            text: response.responseJSON.message,
                            icon: "error",
                        });
                    },
                });
            }
        });
    });
    function updateDateTime() {
        const now = new Date();
        const options = {
            year: "numeric",
            month: "long",
            day: "numeric",
            weekday: "long",
        };
        const dateString = now.toLocaleDateString("es-ES", options);
        const timeString = now.toLocaleTimeString("es-ES", {
            hour: "2-digit",
            minute: "2-digit",
            second: "2-digit",
        });

        document.getElementById("current-date").textContent = dateString;
        document.getElementById("current-time").textContent = timeString;
    }

    window.onload = function () {
        updateDateTime();
        setInterval(updateDateTime, 1000);
    };
});
