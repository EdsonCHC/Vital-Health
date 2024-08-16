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
                            console.log("Ups, algo ha salido mal :v");
                        },
                    });
                });
            }
        });
    });

    // Manejar el clic en el botón de opciones
    $(".option-button").click(function () {
        showOptionsAlert();
    });
});

// Función para mostrar la alerta de opciones
function showOptionsAlert() {
    Swal.fire({
        title: "Selecciona una opción",
        showConfirmButton: false,
        icon: "info",
        html: `
            <div class="flex justify-center content-center items-center gap-10">
                <button id="option2" class="bg-green-400 swal2-confirm swal2-styled">Crear</button>
                <button id="option3" class="swal2-confirm swal2-styled">Editar</button>
                <button id="option3" class="bg-red-600 swal2-confirm swal2-styled">Eliminar</button>
            </div>
        `,
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Has seleccionado Opción crear",
                icon: "success",
                timer: 2000,
                showConfirmButton: false,
                timerProgressBar: true,
            });
        }
    });

    // Manejo de clics en botones adicionales en el footer
    $(document).on("click", "#option2", function () {
        Swal.fire({
            title: "Has seleccionado Opción editar",
            icon: "info",
            timer: 2000,
            showConfirmButton: false,
            timerProgressBar: true,
        });
    });

    $(document).on("click", "#option3", function () {
        Swal.fire({
            title: "Has seleccionado Opción eliminar",
            icon: "info",
            timer: 2000,
            showConfirmButton: false,
            timerProgressBar: true,
        });
    });
}
