import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    // Unirse a la videollanada
    // Seleccionar todos los botones con la clase joinRoomButton
    document.querySelectorAll(".joinRoomButton").forEach((button) => {
        button.addEventListener("click", function () {
            const roomName = this.getAttribute("data-roomName");
            console.log("Room Name Doc:", roomName); // Verifica el valor de roomName
            window.location.href = `/videollamadaDoc?roomName=${roomName}`;
        });
    });

    document.querySelectorAll(".joinRoomButtonUser").forEach((button) => {
        button.addEventListener("click", function () {
            const roomName = this.getAttribute("data-roomName");
            console.log("Room Name User:", roomName); // Verifica el valor de roomName
            window.location.href = `/videollamadaUser?roomName=${roomName}`;
        });
    });

    $(".createVideollamada").click(function () {
        const citaId = $(this).data("cita-id");
        const patientId = $(`#patient_id_${citaId}`).data("patient-id");
        const doctorId = $(this).data("doctor-id");

        Swal.fire({
            title: "Crear una nueva reunión",
            html: `
                <form id="create-form" class="space-y-4 p-4 bg-white text-left">
                    <label class="block">
                        <span class="text-lg font-semibold">Nombre de la Sala</span>
                        <input type="text" id="roomName" name="roomName"
                            class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100 text-input" required>
                    </label>
                    <label class="block">
                        <span class="text-lg font-semibold">Fecha</span>
                        <input type="date" id="date" name="date" min="${
                            new Date().toISOString().split("T")[0]
                        }"
                            class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100 text-input" required>
                    </label>
                    <label class="block">
                        <span class="text-lg font-semibold">Hora</span>
                        <input type="time" id="hour" name="hour"
                            class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100 text-input" required>
                    </label>
                </form>
            `,
            confirmButtonText: "Guardar",
            confirmButtonColor: "#166534",
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
