import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    // Agregar nueva categoría
    $("#add_category").on("click", function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Nueva Categoría",
            html: `
            <label for="category_name">Nombre</label>
            <input id="category_name" class="swal2-input" type="text" placeholder="Nombre">
            <label for="category_description">Descripción</label>
            <textarea id="category_description" class="swal2-textarea" placeholder="Descripción"></textarea>
            <label for="category_features">Características</label>
            <textarea id="category_features" class="swal2-textarea" placeholder="Características"></textarea>
            <label for="category_img">Imagen</label>
            <input id="category_img" class="swal2-input" type="file" accept="image/*">
        `,
            showCancelButton: true,
            confirmButtonText: "Agregar",
            cancelButtonText: "Cancelar",
            preConfirm: () => {
                const name = $("#category_name").val();
                const description = $("#category_description").val();
                const features = $("#category_features").val();
                const img = $("#category_img").prop("files")[0];

                if (!name || !description || !features) {
                    Swal.showValidationMessage(
                        "Por favor completa todos los campos"
                    );
                    return false;
                }

                const formData = new FormData();
                formData.append("nombre", name);
                formData.append("descripcion", description);
                formData.append("caracteristicas", features);
                if (img) {
                    formData.append("img", img);
                }

                return formData;
            },
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/categorias",
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    processData: false,
                    contentType: false,
                    data: result.value,
                    success: function (response) {
                        console.log(
                            "Categoría agregada exitosamente:",
                            response
                        );
                        Swal.fire("Éxito", response.message, "success").then(
                            () => {
                                location.reload();
                            }
                        );
                    },
                    error: function (error) {
                        console.error("Error al agregar la categoría:", error);
                        Swal.fire(
                            "Error",
                            "Hubo un error al agregar la categoría",
                            "error"
                        );
                    },
                });
            }
        });
    });

    window.deleteCategory = function (categoryId) {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¿Quieres eliminar esta categoría?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/categorias/${categoryId}`,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (response) {
                        Swal.fire(
                            "Eliminado!",
                            response.success,
                            "success"
                        ).then(() => {
                            location.reload();
                        });
                    },
                    error: function (xhr) {
                        Swal.fire(
                            "Error!",
                            "Hubo un problema al eliminar la categoría.",
                            "error"
                        );
                    },
                });
            }
        });
    };

    window.deleteCategory = function (categoryId) {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¿Quieres eliminar esta categoría?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/categorias/${categoryId}`,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (response) {
                        Swal.fire(
                            "Eliminado!",
                            response.success,
                            "success"
                        ).then(() => {
                            location.reload();
                        });
                    },
                    error: function (xhr) {
                        Swal.fire(
                            "Error!",
                            "Hubo un problema al eliminar la categoría.",
                            "error"
                        );
                    },
                });
            }
        });
    };

    // Editar categoría
    window.editCategory = function (id) {
        $.get(`/categorias/${id}/edit`, function (data) {
            Swal.fire({
                title: "Editar Categoría",
                html: `
                    <label for="category_name">Nombre</label>
                    <input id="category_name" class="swal2-input" type="text" value="${data.nombre}" placeholder="Nombre">
                    <label for="category_description">Descripción</label>
                    <textarea id="category_description" class="swal2-textarea" placeholder="Descripción">${data.descripción}</textarea>
                    <label for="category_features">Características</label>
                    <textarea id="category_features" class="swal2-textarea" placeholder="Características">${data.características}</textarea>
                    <label for="category_img">Imagen</label>
                    <input id="category_img" class="swal2-input" type="file" accept="image/*">
                `,
                showCancelButton: true,
                confirmButtonText: "Guardar",
                cancelButtonText: "Cancelar",
                preConfirm: () => {
                    const name = $("#category_name").val();
                    const description = $("#category_description").val();
                    const features = $("#category_features").val();
                    const img = $("#category_img").prop("files")[0];

                    if (!name || !description || !features) {
                        Swal.showValidationMessage(
                            "Por favor completa todos los campos"
                        );
                        return false;
                    }

                    const formData = new FormData();
                    formData.append("_method", "PUT");
                    formData.append("nombre", name);
                    formData.append("descripción", description);
                    formData.append("características", features);
                    if (img) {
                        formData.append("img", img);
                    }

                    return formData;
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    const formData = result.value;

                    $.ajax({
                        url: `/categorias/${id}`,
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function (response) {
                            console.log(
                                "Categoría actualizada exitosamente:",
                                response
                            );
                            Swal.fire(
                                "Éxito",
                                "La categoría se ha actualizado exitosamente",
                                "success"
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function (xhr, status, error) {
                            console.error(
                                "Error al actualizar la categoría:",
                                xhr.responseText
                            );
                            Swal.fire(
                                "Error",
                                "Hubo un error al actualizar la categoría",
                                "error"
                            );
                        },
                    });
                }
            });
        }).fail(function () {
            Swal.fire("Error", "No se pudo encontrar la categoría", "error");
        });
    };

    // Ver categoría
    window.viewCategory = function (id) {
        window.location.href = `/statistics/${id}`;
    };

    // Suspender categoría
    window.suspendCategory = function (id) {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¿Quieres suspender esta categoría? ¡Puedes volver a activarla más tarde!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, suspender!",
        }).then((result) => {
            if (result.isConfirmed) {
                console.log("Suspender categoría con ID:", id);
                $.ajax({
                    url: `/categorias/${id}/suspend`,
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        _method: "PUT",
                        activa: false,
                    },
                    success: function (response) {
                        console.log(
                            "Categoría suspendida exitosamente:",
                            response
                        );
                        Swal.fire(
                            "Suspendida!",
                            "La categoría ha sido suspendida.",
                            "success"
                        ).then(() => {
                            location.reload();
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(
                            "Error al suspender la categoría:",
                            xhr.responseText
                        );
                        Swal.fire(
                            "Error",
                            "Hubo un error al suspender la categoría",
                            "error"
                        );
                    },
                });
            }
        });
    };

    window.activateCategory = function (id) {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¿Quieres activar esta categoría?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, activar!",
        }).then((result) => {
            if (result.isConfirmed) {
                console.log("Activando categoría con ID:", id); // Agregado para depuración
                $.ajax({
                    url: `/categorias/${id}/activate`,
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        _method: "PUT",
                        activa: true, // Usar 'activa' en lugar de 'active'
                    },
                    success: function (response) {
                        console.log(
                            "Categoría activada exitosamente:",
                            response
                        );
                        Swal.fire(
                            "Activada!",
                            "La categoría ha sido activada.",
                            "success"
                        ).then(() => {
                            location.reload();
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(
                            "Error al activar la categoría:",
                            xhr.responseText
                        );
                        Swal.fire(
                            "Error",
                            "Hubo un error al activar la categoría",
                            "error"
                        );
                    },
                });
            }
        });
    };
});
