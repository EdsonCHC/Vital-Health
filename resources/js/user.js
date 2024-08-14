import Swal from "sweetalert2";
import jQuery, { error } from "jquery";
window.$ = jQuery;

const menuLinks = document.querySelectorAll(".menu-link");
const contents = document.querySelectorAll(".content");

menuLinks.forEach((link) => {
    link.addEventListener("click", () => {
        menuLinks.forEach((link) => link.classList.remove("active"));
        link.classList.add("active");

        contents.forEach((content) => content.classList.add("hidden"));
        const target = document.querySelector(`#${link.dataset.target}`);
        if (target) {
            target.classList.remove("hidden");
        }
    });
});

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

    $("#edit").click((e) => {
        e.preventDefault();
        $(".text-input").removeAttr("readonly");
        $("#edit").addClass("hidden");
        $("#save, #cancel_button").removeClass("hidden");
    });

    $("#cancel_button").click((e) => {
        e.preventDefault();
        location.reload();
    });

    $("#save").click((e) => {
        e.preventDefault();

        Swal.fire({
            title: "¿Desea Editar y guardar su información?",
            icon: "question",
            showCancelButton: true,
            showConfirmButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/user/update",
                    type: "PUT",
                    data: $("#user_form").serialize(),
                    success(response) {
                        if (response.success) {
                            Swal.fire({
                                title: "Información actualizada correctamente",
                                icon: "success",
                                timer: 2000,
                                showConfirmButton: false,
                                timerProgressBar: true,
                            }).then(() => {
                                location.reload();
                            });
                        }
                    },
                    error(response) {
                        Swal.fire({
                            title: "Error al actualizar la información",
                            icon: "error",
                            text: response.responseJSON.message,
                        });
                    },
                });
            } else {
                $(".text-input").attr("readonly", true);
                $("#save, #cancel_button").addClass("hidden");
                $("#edit").removeClass("hidden");
            }
        });
    });
});

// Mostrar por defecto la primera opción (Perfil)
document.addEventListener("DOMContentLoaded", () => {
    const defaultContent = document.getElementById("opcion1");
    defaultContent.classList.remove("hidden");
});
