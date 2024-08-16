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
    $(document).on('click', '#delete-appointment', function(e) {
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
    $(document).on('click', '.info-button', function(e) {
        e.preventDefault();
        const appointmentId = $(this).data('id');

        $.ajax({
            url: `/appointments/${appointmentId}`,
            type: 'GET',
            success: function (response) {
                Swal.fire({
                    title: 'Información de la Cita',
                    html: `
                        <strong>ID:</strong> ${response.id || 'No disponible'} <br>
                        <strong>Fecha:</strong> ${response.date || 'No disponible'} <br>
                        <strong>Hora:</strong> ${response.hour || 'No disponible'} <br>
                        <strong>Modalidad:</strong> ${response.modalidad || 'No disponible'} <br>
                        <strong>Descripción:</strong> ${response.description || 'No disponible'} <br>
                        <strong>Estado:</strong> ${response.state || 'No disponible'} <br>
                        <strong>Paciente ID:</strong> ${response.patient_id || 'No disponible'} <br>
                        <strong>Categoría ID:</strong> ${response.category_id || 'No disponible'} <br>
                        <strong>Doctor ID:</strong> ${response.doctor_id ? response.doctor_id : 'No asignado'} <br>
                    `,
                    customClass: {
                        popup: "border-solid border-3 border-vh-green w-11/12 max-w-4xl",
                        title: "text-2xl font-bold text-gray-800 mb-4",
                        htmlContainer: "py-4",
                    },
                    confirmButtonColor: "#166534",
                    confirmButtonText: "Cerrar",
                });
            },
            error: function (xhr) {
                Swal.fire(
                    'Error!',
                    'No se pudo obtener la información de la cita.',
                    'error'
                );
            }
        });
    });

    // Event to handle assigning a doctor to an appointment
    $(document).on('click', '#new-appointment-btn', async function(e) {
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

        if (isConfirmed) {
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

