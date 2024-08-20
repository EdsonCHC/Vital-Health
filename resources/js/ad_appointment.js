import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

// CSRF Token setup
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

    // Delegate click event for delete buttons
    $(document).on('click', '#delete-appointment', function (e) {
        e.preventDefault();
        const appointmentId = $(this).data('id');

        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede deshacer.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/appointments/${appointmentId}`,
                    type: 'DELETE',
                    success: function (response) {
                        Swal.fire(
                            'Eliminado!',
                            'La cita ha sido eliminada.',
                            'success'
                        ).then(() => {
                            window.location.reload();
                        });
                    },
                    error: function (xhr) {
                        Swal.fire(
                            'Error!',
                            'No se pudo eliminar la cita.',
                            'error'
                        );
                    }
                });
            }
        });
    });

    // Event to handle showing appointment info
    $(document).on('click', '.info-button', function (e) {
        e.preventDefault();
        const appointmentId = $(this).data('id');
    
        if (!appointmentId) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'ID de cita no válido.',
                customClass: {
                    container: 'swal-container',
                    popup: 'swal-popup',
                    title: 'swal-title',
                    htmlContainer: 'swal-html',
                    confirmButton: 'swal-confirm-button',
                }
            });
            return;
        }
    
        $.ajax({
            url: '/appointments/details',
            type: 'POST',
            data: { id: appointmentId },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                console.log(response); // Verifica la respuesta en la consola
    
                if (response && response.id) {
                    let stateClass, stateText;
    
                    Swal.fire({
                        title: 'Información de la Cita',
                        html: `
                            <div class="appointment-details">
                                <strong>ID:</strong> ${response.id || 'No disponible'} <br>
                                <strong>Fecha:</strong> ${response.date || 'No disponible'} <br>
                                <strong>Hora:</strong> ${response.hour || 'No disponible'} <br>
                                <strong>Modalidad:</strong> ${response.modo || 'No disponible'} <br>
                                <strong>Descripción:</strong> ${response.description || 'No disponible'} <br>
                                <strong>Paciente:</strong> ${response.patient_name || 'No asignado'} <br>
                                <strong>Categoría:</strong> ${response.category_name || 'No disponible'} <br>
                                <strong>Doctor:</strong> ${response.doctor_name || 'No asignado'} <br>
                                <br>
                            </div>
                        `,
                        customClass: {
                            container: 'swal-container',
                            popup: 'swal-popup',
                            title: 'swal-title',
                            htmlContainer: 'swal-html',
                            confirmButton: 'swal-confirm-button',
                        },
                        confirmButtonColor: "#28a745",
                        confirmButtonText: "Cerrar",
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se obtuvo una respuesta válida.',
                        customClass: {
                            container: 'swal-container',
                            popup: 'swal-popup',
                            title: 'swal-title',
                            htmlContainer: 'swal-html',
                            confirmButton: 'swal-confirm-button',
                        }
                    });
                }
            },
            error: function (xhr) {
                console.error('Error:', xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: `No se pudo obtener la información de la cita. Estado: ${xhr.status}, ${xhr.statusText}`,
                    customClass: {
                        container: 'swal-container',
                        popup: 'swal-popup',
                        title: 'swal-title',
                        htmlContainer: 'swal-html',
                        confirmButton: 'swal-confirm-button',
                    }
                });
            }
        });
    });
    
    





    $(document).on('click', '#new-appointment-btn', async function (e) {
        e.preventDefault();
        const appointmentId = $(this).data('id'); // Obtener el ID de la cita
        const categoryId = $('#category-id').val(); // Obtener el ID de la categoría

        const { value: doctorId, isConfirmed } = await Swal.fire({
            title: 'Seleccione al Doctor',
            html: `
                <h2 class="text-gray-700 text-xl font-bold mb-6">Seleccione al Doctor</h2>
                <select id="doctorSelect" class="swal2-input">
                    <!-- Las opciones se agregarán aquí dinámicamente -->
                </select>
            `,
            customClass: {
                popup: "border-solid border-3 border-vh-green w-11/12 max-w-4xl",
                title: "text-2xl font-bold text-gray-800 mb-4",
                htmlContainer: "py-4",
            },
            showConfirmButton: true,
            confirmButtonText: "Confirmar",
            confirmButtonColor: "#166534",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            preConfirm: () => {
                return document.getElementById("doctorSelect").value;
            },
            didOpen: async () => {
                try {
                    const response = await fetch(`/categorias/${categoryId}/doctores`);
                    const doctors = await response.json();

                    if (Array.isArray(doctors)) {
                        const options = doctors.map(doctor => `<option value="${doctor.id}">${doctor.name}</option>`).join('');
                        $('#doctorSelect').html(options);
                    } else {
                        $('#doctorSelect').html('<option>No hay doctores disponibles</option>');
                    }
                } catch (error) {
                    console.error('Error al cargar los doctores:', error);
                }
            }
        });

        if (isConfirmed && doctorId) {
            $.ajax({
                url: `/citas/${appointmentId}`,
                type: 'PUT',
                data: { doctor_id: doctorId },
                success: function (response) {
                    Swal.fire(
                        'Actualizado!',
                        'La cita ha sido actualizada con el doctor seleccionado.',
                        'success'
                    ).then(() => {
                        window.location.reload();
                    });
                },
                error: function (xhr) {
                    Swal.fire(
                        'Error!',
                        'No se pudo actualizar la cita.',
                        'error'
                    );
                }
            });
        }
    });

});


