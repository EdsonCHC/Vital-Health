import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    // Event listener for the 'Nueva Categoría' button
    $('#add_category').on('click', function (e) {
        e.preventDefault();

        // Open SweetAlert2 modal
        Swal.fire({
            title: 'Nueva Categoría',
            html: `
                <label for="category_name">Nombre</label>
                <input id="category_name" class="swal2-input" type="text" placeholder="Nombre">
                <label for="category_description">Description</label>
                <textarea id="category_description" class="swal2-textarea" placeholder="Description"></textarea>
                <label for="category_features">Caracteriticas</label>
                <textarea id="category_features" class="swal2-textarea" placeholder="Caracteriticas"></textarea>
            `,
            showCancelButton: true,
            confirmButtonText: 'Agregar',
            cancelButtonText: 'Cancelar',
            preConfirm: () => {
                const name = $('#category_name').val();
                const description = $('#category_description').val();
                const features = $('#category_features').val();

                if (!name || !description || !features) {
                    Swal.showValidationMessage('Por favor completa todos los campos');
                    return false;
                }

                return {
                    name: name,
                    description: description,
                    features: features
                };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const categoryData = result.value;
                console.log('Category Data:', categoryData);
                              $.ajax({
                    url: '/path/to/your/api/endpoint',  
                    method: 'POST',
                    data: categoryData,
                    success: function (response) {
                        // Handle success response
                        console.log('Category added successfully:', response);
                        Swal.fire('Success', 'La categoría se ha agregado exitosamente', 'success');
                    },
                    error: function (error) {
                        // Handle error response
                        console.error('Error adding category:', error);
                        Swal.fire('Error', 'Hubo un error al agregar la categoría', 'error');
                    }
                });
            }
        });
    });
});
