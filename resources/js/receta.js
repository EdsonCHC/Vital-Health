import Swal from "sweetalert2";
import axios from "axios";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $('.info-btn').click(function () {
        const id = $(this).data('id');

        axios.get(`/recetas/${id}`)
            .then(response => {
                const receta = response.data.receta;
                const medicinasList = receta.medicinas.map(medicina => 
                    `<li>${medicina.nombre} (${medicina.pivot.cantidad})</li>`
                ).join('');

                Swal.fire({
                    title: 'Medicinas en esta receta',
                    html: `<ul>${medicinasList}</ul>`,
                    icon: 'info',
                    confirmButtonText: 'Aceptar'
                });
            })
            .catch(error => {
                console.error('Hubo un error:', error);
                Swal.fire({
                    title: 'Error',
                    text: 'No se pudo cargar la información de la receta.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            });
    });

    // Función para manejar el envío de la receta
    $('.enviar-btn').click(function () {
        const id = $(this).data('id');

        Swal.fire({
            title: '¿Está seguro?',
            text: "¿Quiere mandar la medicina al paciente?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, enviar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post(`/recetas/${id}/enviar`)
                    .then(response => {
                        const receta = response.data.receta;

                        Swal.fire({
                            title: 'Receta Enviada',
                            text: 'La medicina está en camino.',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        }).then(() => {
                            $(`#enviar-btn-${id}`).hide();
                            $(`#mensaje-laboratorio-${id}`).text('Medicina en Camino').show();

                            // Actualiza el temporizador para mostrar la entrega
                            updateTimer(id, receta.fecha_entrega, receta.hora_entrega);
                        });
                    })
                    .catch(error => {
                        console.error('Hubo un error:', error);
                    });
            }
        });
    });

    // Función para manejar la cancelación de la receta
    $('.cancelar-btn').click(function () {
        const id = $(this).data('id');

        Swal.fire({
            title: '¿Está seguro?',
            text: "¿Quiere cancelar esta receta?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, cancelar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(`/recetas/${id}/cancelar`)
                    .then(response => {
                        Swal.fire(
                            'Cancelado',
                            'La receta ha sido cancelada.',
                            'success'
                        ).then(() => {
                            $(`div[data-id="${id}"]`).remove(); // Elimina el elemento de la vista
                        });
                    })
                    .catch(error => {
                        console.error('Hubo un error:', error);
                    });
            }
        });
    });

    // Función para actualizar el temporizador
    function updateTimer(id, fechaEntrega, horaEntrega) {
        const fechaEntregaDate = new Date(`${fechaEntrega}T${horaEntrega}`);
        const timerDiv = $(`#timer-${id}`);

        const timer = setInterval(() => {
            const now = new Date();
            const diff = fechaEntregaDate - now;
            if (diff <= 0) {
                timerDiv.text('Medicina Entregada');
                clearInterval(timer);
                // Opcional: Puedes ocultar los botones si es necesario
                $(`#enviar-btn-${id}`).hide();
                $(`#cancelar-btn-${id}`).hide();
            } else {
                const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((diff % (1000 * 60)) / 1000);
                timerDiv.text(`${days}d ${hours}h ${minutes}m ${seconds}s`);
            }
        }, 1000);
    }

    // Mostrar solo el botón si el estado es pendiente
    $('.medicine-card').each(function() {
        const estado = $(this).data('estado');

        if (estado !== 'pendiente') {
            $(this).find('.enviar-btn').hide();
            $(this).find('.cancelar-btn').hide();
            $(this).find('.mensaje-laboratorio').text('Medicina en Camino').show();
            
            const id = $(this).data('id');
            const fechaEntrega = $(this).data('fecha-entrega');
            const horaEntrega = $(this).data('hora-entrega');
            
            updateTimer(id, fechaEntrega, horaEntrega);
        }
    });
});
