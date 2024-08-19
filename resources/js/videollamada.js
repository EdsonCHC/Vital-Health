import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $(".createVideollamada").click(function () {
        const citaId = $(this).data("cita-id");
        const patientId = $(`#patient_id_${citaId}`).data("patient-id");
        const doctorId = $(this).data("doctor-id");

        Swal.fire({
            title: "Crear una nueva reunión",
            html: `
            <form id="create-form" class="space-y-4 p-4 bg-white">
    <div>
        <label for="roomName" class="block text-xl font-medium text-gray-700">Nombre de la Sala:</label>
        <input type="text" id="roomName" name="roomName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
    <div>
        <label for="date" class="block text-xl font-medium text-gray-700">Fecha:</label>
        <input type="date" id="date" name="date" min="${
            new Date().toISOString().split("T")[0]
        }" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
    <div>
        <label for="hour" class="block text-xl font-medium text-gray-700">Hora:</label>
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
                const doctorId = $(`#doctor_id_${citaId}`).data("doctor-id");

                $.ajax({
                    url: `/citas/${citaId}/${doctorId}/videollamada`,
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": _token,
                    },
                    data: result.value,
                    success(response) {
                        if (response.success) {
                            console.log(response.success);
                            Swal.fire(
                                "Videollamada creada correctamente",
                                "",
                                "success"
                            );
                            window.location.href = `/videollamada?roomName=${response.room_name}`;
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
});
