import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    // Unirse a la videollanada
    // Seleccionar todos los botones con la clase joinRoomButton
    // Seleccionar todos los botones con la clase joinRoomButton
    document.querySelectorAll(".joinRoomButton").forEach((button) => {
        button.addEventListener("click", function () {
            // Obtener el ID de la videollamada desde data-roomName
            const roomName = this.getAttribute("data-roomName");

            // Redirigir a la URL con el roomName usando GET
            window.location.href = `/videollamadaDoc?roomName=${roomName}`;
        });
    });

    document.querySelectorAll(".joinRoomButton").forEach((button) => {
        button.addEventListener("click", function () {
            // Obtener el ID de la videollamada desde data-roomName
            const roomName = this.getAttribute("data-roomName");

            // Redirigir a la URL con el roomName usando GET
            window.location.href = `/videollamadaDoc?roomName=${roomName}`;
        });
    });

    $(".createVideollamada").click(function () {
        const citaId = $(this).data("cita-id");
        const patientId = $(`#patient_id_${citaId}`).data("patient-id");
        const doctorId = $(this).data("doctor-id");

        Swal.fire({
            title: "Crear una nueva reunión",
            html: `
        <form id="create-form" class="space-y-4 p-4 bg-white">
            <div>
                <label for="roomName" class="block text-xl font-medium text-gray-700">Nombre de la Sala</label>
                <input type="text" id="roomName" name="roomName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="date" class="block text-xl font-medium text-gray-700">Fecha</label>
                <input type="date" id="date" name="date" min="${
                    new Date().toISOString().split("T")[0]
                }" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="hour" class="block text-xl font-medium text-gray-700">Hora</label>
                <input type="time" id="hour" name="hour" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        </form>
        `,
            confirmButtonText: "Crear",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            preConfirm: () => {
                const roomName = document.querySelector("#roomName").value;
                const date = document.querySelector("#date").value;
                const hour = document.querySelector("#hour").value;

                if (!roomName || !date || !hour) {
                    Swal.showValidationMessage(
                        "Por favor, completa todos los campos"
                    );
                    return false;
                }

                if (roomName.length < 8) {
                    Swal.showValidationMessage(
                        "El nombre de la sala debe ser más largo"
                    );
                    return false;
                }

                if (new Date(date) < new Date()) {
                    Swal.showValidationMessage(
                        "Fecha incorrecta, agrega una fecha futura"
                    );
                    return false;
                }

                return {
                    roomName: roomName,
                    date: date,
                    hour: hour,
                    cita_id: citaId,
                    patient_id: patientId,
                    doctor_id: doctorId,
                };
            },
        }).then((result) => {
            if (result.isConfirmed) {
                const _token = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    url: `/citas/${citaId}/${doctorId}/videollamada`,
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": _token,
                    },
                    data: result.value,
                    success(response) {
                        if (response.success) {
                            Swal.fire(
                                "Videollamada creada correctamente",
                                "",
                                "success"
                            );
                            window.location.href = `/videollamadaDoc?roomName=${response.room_name}`;
                        } else {
                            Swal.fire(
                                "Error al crear la videollamada",
                                response.message ||
                                    "No se pudo crear la videollamada",
                                "error"
                            );
                        }
                    },
                    error(response) {
                        console.log(response);
                        Swal.fire(
                            "Error",
                            "Error al crear la videollamada",
                            "error"
                        );
                    },
                });
            }
        });
    });

    $(".deleteVideollamada").click(function () {
        const _token = $('meta[name="csrf-token"]').attr("content");
        const videollamadaId = $(this).data("videollamada-id");

        Swal.fire({
            title: "¿Estás seguro?",
            text: "Esta acción eliminará la videollamada. ¿Deseas continuar?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/program_doc/${videollamadaId}`,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": _token,
                    },
                    success: function (response) {
                        Swal.fire(
                            "Eliminado!",
                            response.success,
                            "success"
                        ).then(() => {
                            location.reload(); // Recargar la página para reflejar los cambios
                        });
                    },
                    error: function (xhr, response) {
                        console.log(xhr, response);
                        Swal.fire(
                            "Error!",
                            "Hubo un problema al eliminar la reunión.",
                            "error"
                        );
                    },
                });
            }
        });
    });
});
