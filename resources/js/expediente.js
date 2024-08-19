import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $(".create-exp").click(function () {
        const citaId = $(this).data("cita-id");
        const doctorId = $(this).data("doctor-id");
        const patientId = $(this).data("patient-id");
        const examId = $(this).data("exam-id");

        Swal.fire({
            title: "Crear un expediente",
            html: `
                <form id="create-form" class="space-y-4 p-4 bg-white">
                    <p>ID del Usuario: ${patientId}</p>
                    <button type="button" id="create-expediente" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Crear Expediente
                    </button>
                </form>
            `,
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            didOpen: () => {
                document
                    .getElementById("create-expediente")
                    .addEventListener("click", () => {
                        const _token = $('meta[name="csrf-token"]').attr(
                            "content"
                        );

                        $.ajax({
                            url: `/files_doc`,
                            type: "POST",
                            headers: {
                                "X-CSRF-TOKEN": _token,
                            },
                            data: {
                                patient_id: patientId,
                                cita_id: citaId,
                                doctor_id: doctorId,
                                exam_id: examId,
                            },
                            success(response) {
                                if (response.success) {
                                    Swal.fire(
                                        "Expediente creado correctamente",
                                        "",
                                        "success"
                                    );
                                    // Aquí puedes actualizar el HTML para mostrar el expediente registrado
                                    // Por ejemplo, puedes agregar el nuevo expediente a una lista en la página
                                    const expedienteHtml = `
                                    <div class="w-auto h-16 flex justify-around items-center my-5 mx-4 bg-green-200 rounded-md">
                                        <p class="font-bold text-lg">${response.expediente.id}</p>
                                        <p class="font-bold text-lg">${response.expediente.patient.nombre}</p>
                                        <button target="_self" class="assign_appointment">
                                            <a href="#">
                                                <img src="{{ asset('storage/svg/eye-icon.svg') }}" alt="noti_icon" class="w-10 h-10 p-2">
                                            </a>
                                        </button>
                                        <div class="w-2/12 flex items-center space-x-10">
                                            <button target="_self" class="assign_appointment ml-4">
                                                <a href="#">
                                                    <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="noti_icon" class="w-10 h-10 p-2 rounded">
                                                </a>
                                            </button>
                                            <button>
                                                <a href="#">
                                                    <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="config_icon" class="w-10 h-10 p-2 rounded">
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                `;
                                    $("#expedientes-list").append(
                                        expedienteHtml
                                    );
                                } else {
                                    Swal.fire(
                                        "Error al crear el expediente",
                                        response.message ||
                                            "No se pudo crear el expediente",
                                        "error"
                                    );
                                }
                            },
                            error() {
                                Swal.fire(
                                    "Error al crear el expediente",
                                    "No se pudo crear el expediente",
                                    "error"
                                );
                            },
                        });
                    });
            },
        });
    });
});
