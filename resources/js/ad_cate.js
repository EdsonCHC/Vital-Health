import Swal from 'sweetalert2';
import jQuery from 'jquery';
window.$ = jQuery;

$(document).ready(function () {
    $('#add_category').on('click', function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Nueva Categoría',
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
            confirmButtonText: 'Agregar',
            cancelButtonText: 'Cancelar',
            preConfirm: () => {
                const name = $('#category_name').val();
                const description = $('#category_description').val();
                const features = $('#category_features').val();
                const img = $('#category_img').prop('files')[0];

                if (!name || !description || !features) {
                    Swal.showValidationMessage('Por favor completa todos los campos');
                    return false;
                }

                const formData = new FormData();
                formData.append('nombre', name);
                formData.append('descripcion', description);
                formData.append('caracteristicas', features);
                if (img) {
                    formData.append('img', img);
                }

                return formData;
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = result.value;

                $.ajax({
                    url: '/categorias',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (response) {
                        console.log('Categoría agregada exitosamente:', response);
                        Swal.fire('Éxito', 'La categoría se ha agregado exitosamente', 'success')
                            .then(() => {
                                location.reload();
                            });
                    },
                    error: function (error) {
                        console.error('Error al agregar la categoría:', error);
                        Swal.fire('Error', 'Hubo un error al agregar la categoría', 'error');
                    }
                });
            }
        });
    });

    window.editCategory = function (id) {
        $.get(`/categorias/${id}/edit`, function (data) {
            Swal.fire({
                title: 'Editar Categoría',
                html: `
                    <label for="category_name">Nombre</label>
                    <input id="category_name" class="swal2-input" type="text" value="${data.nombre}" placeholder="Nombre">
                    <label for="category_description">Descripción</label>
                    <textarea id="category_description" class="swal2-textarea" placeholder="Descripción">${data.descripcion}</textarea>
                    <label for="category_features">Características</label>
                    <textarea id="category_features" class="swal2-textarea" placeholder="Características">${data.caracteristicas}</textarea>
                    <label for="category_img">Imagen</label>
                    <input id="category_img" class="swal2-input" type="file" accept="image/*">
                `,
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
                preConfirm: () => {
                    const name = $('#category_name').val();
                    const description = $('#category_description').val();
                    const features = $('#category_features').val();
                    const img = $('#category_img').prop('files')[0];

                    if (!name || !description || !features) {
                        Swal.showValidationMessage('Por favor completa todos los campos');
                        return false;
                    }

                    const formData = new FormData();
                    formData.append('_method', 'PUT');
                    formData.append('nombre', name);
                    formData.append('descripcion', description);
                    formData.append('caracteristicas', features);
                    if (img) {
                        formData.append('img', img);
                    }

                    return formData;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const formData = result.value;

                    $.ajax({
                        url: `/categorias/${id}`,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function (response) {
                            console.log('Categoría actualizada exitosamente:', response);
                            Swal.fire('Éxito', 'La categoría se ha actualizado exitosamente', 'success')
                                .then(() => {
                                    location.reload();
                                });
                        },
                        error: function (error) {
                            console.error('Error al actualizar la categoría:', error);
                            Swal.fire('Error', 'Hubo un error al actualizar la categoría', 'error');
                        }
                    });
                }
            });
        });
    }

    window.deleteCategory = function (id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás recuperar esta categoría!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/categorias/${id}`,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        _method: 'DELETE'
                    },
                    success: function (response) {
                        console.log('Categoría eliminada exitosamente:', response);
                        Swal.fire('Eliminado!', 'La categoría ha sido eliminada.', 'success')
                            .then(() => {
                                location.reload();
                            });
                    },
                    error: function (error) {
                        console.error('Error al eliminar la categoría:', error);
                        Swal.fire('Error', 'Hubo un error al eliminar la categoría', 'error');
                    }
                });
            }
        });
    }
});
