import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    // Usuario
    // Maneja el guardado del expediente

    $(".saveFileUser").click(function () {
        const url = "{{ route('generate.pdf') }}";

        Swal.fire({
            title: "Generar PDF",
            showCancelButton: true,
            confirmButtonText: "Generar",
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
        }).then((result) => {
            if (result.isConfirmed) {
                const url = "{{ route('generate.pdf') }}";
                const _token = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    url: url,
                    type: "GET",
                    headers: {
                        "X-CSRF-TOKEN": _token,
                    },
                    xhrFields: {
                        responseType: "blob",
                    },
                    success(response, status, xhr) {
                        const filename = xhr
                            .getResponseHeader("Content-Disposition")
                            .split("filename=")[1];
                        const blob = new Blob([response], {
                            type: "application/pdf",
                        });
                        const link = document.createElement("a");
                        link.href = URL.createObjectURL(blob);
                        link.download = filename;
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                        Swal.fire("Expediente guardado", "", "success");
                    },
                    error(response) {
                        console.log(response);
                        
                        Swal.fire(
                            "Error al crear el expediente",
                            "No se pudo generar el expediente",
                            "error"
                        );
                    },
                });
            }
        });
    });

    // Doctor
    // Maneja la creacion del expediente
    $(".create-exp-user").click(function () {
        Swal.fire({
            title: "Crear Mi Expediente",
            html: `
                <form id="create-form" class="space-y-4 p-4 bg-white">
                    <button type="button" id="create-expediente" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:w-auto sm:text-sm">
                        Crear Expediente
                    </button>
                </form>
            `,
            showConfirmButton: false,
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
                            url: `/file`,
                            type: "POST",
                            headers: {
                                "X-CSRF-TOKEN": _token,
                            },
                            success(response) {
                                if (response.success) {
                                    Swal.fire(
                                        "Expediente creado correctamente",
                                        "",
                                        "success"
                                    );
                                    // Actualiza el HTML si es necesario
                                } else {
                                    Swal.fire(
                                        "Error al crear el expediente",
                                        response.message ||
                                            "No se pudo crear el expediente",
                                        "error"
                                    );
                                }
                            },
                            error(xhr) {
                                console.log(xhr); // Para depuración
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

    // Maneja la actualizacion del expediente
    $(".update-file").click(function () {
        const expedienteId = $(this).data("expediente-id"); // Obtén el ID del expediente desde el atributo data

        Swal.fire({
            title: "Actualizar Expediente",
            html: `
                <form id="update-form-1" class="space-y-4 p-4 bg-white">
                    <h3 class="text-lg font-semibold">Datos del Paciente</h3>
                    <div class="form-group">
                        <label for="patient_name">Nombre:</label>
                        <input type="text" id="patient_name" name="patient_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="patient_email">Correo:</label>
                        <input type="email" id="patient_email" name="patient_email" class="form-control">
                    </div>
                </form>
                <form id="update-form-2" class="space-y-4 p-4 bg-white hidden">
                    <h3 class="text-lg font-semibold">Exámenes</h3>
                    <div class="form-group">
                        <label for="exam_type">Tipo de Examen:</label>
                        <input type="text" id="exam_type" name="exam_type" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exam_date">Fecha del Examen:</label>
                        <input type="date" id="exam_date" name="exam_date" class="form-control">
                    </div>
                </form>
                <form id="update-form-3" class="space-y-4 p-4 bg-white hidden">
                    <h3 class="text-lg font-semibold">Citas</h3>
                    <div class="form-group">
                        <label for="cita_description">Descripción:</label>
                        <input type="text" id="cita_description" name="cita_description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cita_date">Fecha de la Cita:</label>
                        <input type="date" id="cita_date" name="cita_date" class="form-control">
                    </div>
                </form>
            `,
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            didOpen: () => {
                $.ajax({
                    url: `/files_doc/${expedienteId}`, // Asegúrate de que la URL sea correcta
                    type: "GET",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success(response) {
                        if (response.success) {
                            $("#patient_name").val(
                                response.expediente.patient.name
                            );
                            $("#patient_email").val(
                                response.expediente.patient.mail
                            );
                            // Asigna más datos según sea necesario
                        } else {
                            Swal.fire(
                                "Error al cargar los datos",
                                response.message ||
                                    "No se pudieron cargar los datos del expediente",
                                "error"
                            );
                        }
                    },
                    error(xhr) {
                        console.log("Código de estado:", xhr.status);
                        console.log(
                            "Respuesta del servidor:",
                            xhr.responseText
                        );
                        Swal.fire(
                            "Error al cargar los datos",
                            "No se pudieron cargar los datos del expediente",
                            "error"
                        );
                    },
                });
            },
        });
    });

    // Maneja la eliminación del expediente
    $(".delete-file").click(function () {
        const fileId = $(this).data("id");

        Swal.fire({
            title: "Eliminar Expediente",
            text: "¿Estás seguro de que deseas eliminar este expediente?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                const _token = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    url: `/files_doc/${fileId}`,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": _token,
                    },
                    success(response) {
                        if (response.success) {
                            Swal.fire("Expediente eliminado", "", "success");
                            // Actualiza el HTML si es necesario
                        } else {
                            Swal.fire(
                                "Error al eliminar el expediente",
                                response.message ||
                                    "No se pudo eliminar el expediente",
                                "error"
                            );
                        }
                    },
                    error(xhr) {
                        console.log(xhr); // Para depuración
                        Swal.fire(
                            "Error al eliminar el expediente",
                            "No se pudo eliminar el expediente",
                            "error"
                        );
                    },
                });
            }
        });
    });
});
