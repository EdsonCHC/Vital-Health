import Swal from 'sweetalert2';
import jQuery from 'jquery';

window.$ = jQuery;

$(document).ready(function () {
    $(document).on('click', '#add_medicine', function () {
        Swal.fire({
            title: 'Registrar Medicina',
            html: `
                <form id="medicineForm">
                    <input id="name" class="swal2-input" placeholder="Nombre" type="text" required>
                    <textarea id="description" class="swal2-textarea" placeholder="Descripción (opcional)"></textarea>
                    <select id="tipo" class="swal2-select" required>
                        <option value="">Selecciona un tipo</option>
                        <option value="tableta">Tableta</option>
                        <option value="jarabe">Jarabe</option>
                    </select>
                    <input id="stock" class="swal2-input" placeholder="Stock" type="number" required>
                    <select id="estado" class="swal2-select" required>
                        <option value="Disponible">Disponible</option>
                        <option value="No Disponible">No Disponible</option>
                    </select>
                </form>
            `,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Registrar',
            preConfirm: () => {
                const name = document.getElementById('name').value;
                const description = document.getElementById('description').value;
                const tipo = document.getElementById('tipo').value;
                const stock = document.getElementById('stock').value;
                const estado = document.getElementById('estado').value;

                if (!name || !tipo || !stock || !estado) {
                    Swal.showValidationMessage('Por favor completa todos los campos obligatorios');
                    return null;
                }

                return { name, description, tipo, stock, estado };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('/medicinas', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: JSON.stringify(result.value)
                })
                .then(response => response.json())
                .then(data => {
                    Swal.fire('¡Éxito!', 'Medicina registrada exitosamente.', 'success').then(() => {
                        window.location.href = '/medicinas'; 
                    });
                })
                .catch(error => {
                    Swal.fire('Error', 'No se pudo registrar la medicina.', 'error');
                });
            }
        });
    });

    $(document).on('click', '.edit-medicine', function () {
        const id = $(this).data('id');

        fetch(`/medicinas/${id}/edit`)
            .then(response => response.json())
            .then(data => {
                Swal.fire({
                    title: 'Actualizar Medicina',
                    html: `
                        <form id="updateMedicineForm">
                            <input id="update_id" class="swal2-input" value="${data.id}" type="hidden">
                            <input id="update_name" class="swal2-input" placeholder="Nombre" value="${data.nombre}" type="text" required>
                            <textarea id="update_description" class="swal2-textarea" placeholder="Descripción (opcional)">${data.descripcion}</textarea>
                            <select id="update_tipo" class="swal2-select" required>
                                <option value="tableta" ${data.tipo === 'tableta' ? 'selected' : ''}>Tableta</option>
                                <option value="jarabe" ${data.tipo === 'jarabe' ? 'selected' : ''}>Jarabe</option>
                            </select>
                            <input id="update_stock" class="swal2-input" placeholder="Stock" value="${data.stock}" type="number" required>
                            <select id="update_estado" class="swal2-select" required>
                                <option value="Disponible" ${data.estado === 'Disponible' ? 'selected' : ''}>Disponible</option>
                                <option value="No Disponible" ${data.estado === 'No Disponible' ? 'selected' : ''}>No Disponible</option>
                            </select>
                        </form>
                    `,
                    focusConfirm: false,
                    showCancelButton: true,
                    confirmButtonText: 'Actualizar',
                    preConfirm: () => {
                        const id = document.getElementById('update_id').value;
                        const name = document.getElementById('update_name').value;
                        const description = document.getElementById('update_description').value;
                        const tipo = document.getElementById('update_tipo').value;
                        const stock = document.getElementById('update_stock').value;
                        const estado = document.getElementById('update_estado').value;

                        if (!id || !name || !tipo || !stock || !estado) {
                            Swal.showValidationMessage('Por favor completa todos los campos obligatorios');
                            return null;
                        }

                        return { id, name, description, tipo, stock, estado };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/medicinas/${result.value.id}`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            body: JSON.stringify(result.value)
                        })
                        .then(response => response.json())
                        .then(data => {
                            Swal.fire('¡Éxito!', 'Medicina actualizada exitosamente.', 'success').then(() => {
                                window.location.href = '/medicinas'; 
                            });
                        })
                        .catch(error => {
                            Swal.fire('Error', 'No se pudo actualizar la medicina.', 'error');
                        });
                    }
                });
            })
            .catch(error => {
                Swal.fire('Error', 'No se pudo cargar la información de la medicina.', 'error');
            });
    });
    $(document).on('click', '.delete-medicine', function (event) {
        event.preventDefault();
        const form = $(this).closest('form');
        const actionUrl = form.attr('action');
    
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esta acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: actionUrl,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function () {
                        Swal.fire('¡Eliminado!', 'La medicina ha sido eliminada.', 'success').then(() => {
                            window.location.href = '/medicinas'; 
                        });
                    },
                    error: function () {
                        Swal.fire('Error', 'No se pudo eliminar la medicina.', 'error');
                    }
                });
            }
        });
    });
    
    $(document).on('click', '.toggle-status', function (event) {
        event.preventDefault();
        const form = $(this).closest('form');
        const actionUrl = form.attr('action');
        const currentStatus = $(this).text().trim();
    
        Swal.fire({
            title: '¿Estás seguro?',
            text: `¿Deseas ${currentStatus.toLowerCase()} esta medicina?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: `Sí, ${currentStatus.toLowerCase()}`
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: actionUrl,
                    type: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function () {
                        Swal.fire('¡Éxito!', `Estado de la medicina ${currentStatus.toLowerCase()}.`, 'success').then(() => {
                            window.location.href = '/medicinas'; 
                        });
                    },
                    error: function () {
                        Swal.fire('Error', 'No se pudo cambiar el estado de la medicina.', 'error');
                    }
                });
            }
        });
    });
    
        
   
});
