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
                    timer: 1500,
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

        const mail = $("input[name='mail']").val();
        const address = $("input[name='address']").val();

        // Validación básica
        if (!mail || !address) {
            Swal.fire({
                title: "Error",
                icon: "error",
                text: "El correo y la dirección son requeridos.",
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

                // Verifica los datos de formData
                console.log("Datos enviados:", formData);

                $.ajax({
                    url: "/user/update",
                    type: "PUT",
                    data: formData,
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
                            text: "No se pudieron guardar los cambios.",
                        });
                    },
                });
            } else {
                $("input[name='mail']").attr("readonly", true);
                $("input[name='address']").attr("readonly", true);

                $("#save").addClass("hidden");
                $("#cancel_button").addClass("hidden");
                $("#edit").removeClass("hidden");
            }
        });
    });

    $("#privacy_form").submit(function (e) {
        e.preventDefault();

        const currentPassword = $("input[name='current_password']").val();
        const newPassword = $("input[name='new_password']").val();
        const newPasswordConfirmation = $(
            "input[name='new_password_confirmation']"
        ).val();

        if (newPassword !== newPasswordConfirmation) {
            Swal.fire({
                title: "Error",
                icon: "error",
                text: "Las nuevas contraseñas no coinciden.",
            });
            return;
        }

        const formData = $(this).serializeArray();

        $.ajax({
            url: "/user/update-password",
            type: "PUT",
            data: formData,
            success(response) {
                if (response.success) {
                    Swal.fire({
                        title: "Contraseña actualizada correctamente",
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
                    title: "Error al actualizar la contraseña",
                    icon: "error",
                    text: response.responseJSON.message,
                });
            },
        });
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(".save-img").click(function () {
        Swal.fire({
            title: "Actualizar Avatar",
            html: `
                <form id="image_form" enctype="multipart/form-data" class="w-full max-w-md mx-auto bg-white p-6 rounded-lg">
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-semibold mb-2"></label>
                    <input type="file" name="image" id="image" accept="image/*" required class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-500">
                </div>
                <div class="flex justify-center">
                    <button type="button" id="upload_image"
                        class="px-4 py-2 bg-green-700 text-white rounded-md font-semibold text-lg transition duration-300 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Subir Imagen
                    </button>
                </div>
            </form>
            `,
            showConfirmButton: false,
            showCancelButton: true,
            cancelButtonText: "Cancelar",
        });

        $(document).on("click", "#upload_image", function (e) {
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
