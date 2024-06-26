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
                            console.log("ups, algo ha salido mal :v");
                        },
                    });
                });
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const menuLinks = document.querySelectorAll(".menu-link");
    const contents = document.querySelectorAll(".content");

    // Mostrar por defecto la primera opción (Perfil)
    const defaultContent = document.getElementById("opcion1");
    defaultContent.classList.remove("hidden");

    menuLinks.forEach((link) => {
        link.addEventListener("click", (event) => {
            event.preventDefault();
            // Ocultar todo el contenido
            contents.forEach((content) => {
                content.classList.add("hidden");
            });

            // Quitar clase 'active' de todos los enlaces
            menuLinks.forEach((link) => {
                link.classList.remove("active");
            });

            // Mostrar el contenido seleccionado y añadir clase 'active' al enlace
            const targetId = link.getAttribute("data-target");
            const targetContent = document.getElementById(targetId);
            if (targetContent) {
                targetContent.classList.remove("hidden");
                link.classList.add("active");
            }
        });
    });
});
