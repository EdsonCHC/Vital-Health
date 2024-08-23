import Swal from "sweetalert2";
import jQuery from "jquery";
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

        const _token = $('meta[name="csrf-token"]').attr("content");

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
                            console.log("Ups, algo ha salido mal :v");
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

        const name = $("input[name='name']").val();
        const lastName = $("input[name='lastName']").val();
        const address = $("input[name='address']").val();

        // Front-End Validation
        if (/\s/.test(name) || /\s/.test(lastName)) {
            Swal.fire({
                title: "Error",
                icon: "error",
                text: "El nombre y el apellido no pueden contener espacios.",
            });
            return;
        }

        if (/[^a-zA-Z\s]/.test(name) || /[^a-zA-Z\s]/.test(lastName)) {
            Swal.fire({
                title: "Error",
                icon: "error",
                text: "El nombre y el apellido no pueden contener números, comillas, o comas.",
            });
            return;
        }

        // Validate address for forbidden patterns
        if (/script|sql/gi.test(address)) {
            Swal.fire({
                title: "Error",
                icon: "error",
                text: "La dirección no puede contener palabras reservadas como 'script' o 'sql'.",
            });
            return;
        }

        Swal.fire({
            title: "¿Desea Editar y guardar su información?",
            icon: "question",
            showCancelButton: true,
            showConfirmButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = $("#user_form").serializeArray();
                const sanitizedData = sanitizeFormData(formData);

                $.ajax({
                    url: "/user/update",
                    type: "PUT",
                    data: sanitizedData,
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
                            text: "No se permiten caracteres extraños.",
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

    $(".save-img").click(({

    }));

    $("#upload_button").click(function () {
        $("#profile_image_input").click();
    });

    $("#upload_image").click((e) => {
        e.preventDefault();

        let formData = new FormData($("#image_form")[0]);

        $.ajax({
            url: "/user/update-image",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success(response) {
                if (response.success) {
                    Swal.fire({
                        title: "Imagen actualizada correctamente",
                        icon: "success",
                        timer: 2000,
                        showConfirmButton: false,
                        timerProgressBar: true,
                    }).then(() => {
                        // Actualizar la imagen en la vista
                        $("img[alt='Perfil']").attr(
                            "src",
                            "/storage/users-avatar/" + response.image
                        );
                    });
                }
            },
            error(response) {
                Swal.fire({
                    title: "Error al actualizar la imagen",
                    icon: "error",
                    text:
                        response.responseJSON.message ||
                        "Hubo un error inesperado.",
                });
            },
        });
    });
});

// Function to sanitize form data
function sanitizeFormData(formData) {
    return formData.map((field) => {
        if (field.name === "name" || field.name === "lastName") {
            field.value = field.value
                .replace(/[0-9'"',]/g, "") // Remove numbers, quotes, and commas
                .replace(/\s+/g, "") // Remove all spaces
                .replace(/script|sql/gi, ""); // Remove specific words
        } else if (field.name === "address") {
            field.value = field.value
                .replace(/[0-9'"',]/g, "") // Remove numbers, quotes, and commas
                .replace(/script|sql/gi, ""); // Remove specific words
        }
        return field;
    });
}

// Mostrar por defecto la primera opción (Perfil)
document.addEventListener("DOMContentLoaded", () => {
    const defaultContent = document.getElementById("opcion1");
    defaultContent.classList.remove("hidden");
});
