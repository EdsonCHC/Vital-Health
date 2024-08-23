import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    // Usuario
    // Maneja el guardado del expediente
    $(".saveFileUser").click(function () {
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
    // Maneja la creacion del expediente y del usuario
    $(".createFile").click(function () {
        Swal.fire({
            title: "Crear Expediente",
            html: `
                <div class="flex justify-center items-center content-center space-x-4">
                    <button id="register" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:w-auto sm:text-sm">
                        Crear Nuevo Usuario
                    </button>
                </div>
            `,
            showConfirmButton: false,
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            didOpen: () => {
                document
                    .getElementById("register")
                    .addEventListener("click", () => {
                        Swal.fire({
                            title: "Crear Usuario",
                            html: `
                    <form id="register-form" class="space-y-4 p-4 bg-white">
                        <input type="text" id="name" placeholder="Nombre" class="form-input w-full" required>
                        <input type="text" id="lastName" placeholder="Apellido" class="form-input w-full" required>
                        <input type="email" id="mail" placeholder="Email" class="form-input w-full" required>
                        <input type="text" id="address" placeholder="Dirección" class="form-input w-full" required>
                        <label for="gender" class="block text-sm font-medium text-gray-700">Género:</label>
                        <select id="gender" class="form-select w-full" required>
                            <option value="">Seleccionar género</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                            <option value="otro">Otro</option>
                        </select>
                        <section id="blood-section" class="space-y-2">
                            <label for="blood" class="block text-sm font-medium text-gray-700">Tipo de sangre:</label>
                            <select id="blood" class="form-select w-full" required>
                                <option value="">Seleccionar tipo de sangre</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </section>
                        <label for="birth" class="block text-sm font-medium text-gray-700">Fecha de nacimiento:</label>
                        <input type="date" id="birth" class="form-input w-full" required>
                        <input type="password" id="password" placeholder="Contraseña" class="form-input w-full" required>
                    </form>
                `,
                            showCancelButton: true,
                            cancelButtonText: "Cancelar",
                            confirmButtonText: "Registrar",
                            preConfirm: () => {
                                const name =
                                    document.getElementById("name")?.value;
                                const lastName =
                                    document.getElementById("lastName")?.value;
                                const mail =
                                    document.getElementById("mail")?.value;
                                const address =
                                    document.getElementById("address")?.value;
                                const birth =
                                    document.getElementById("birth")?.value;
                                const blood =
                                    document.getElementById("blood")?.value;
                                const gender =
                                    document.getElementById("gender")?.value;
                                const password =
                                    document.getElementById("password")?.value;

                                if (
                                    !name ||
                                    !lastName ||
                                    !mail ||
                                    !address ||
                                    !birth ||
                                    !blood ||
                                    !gender ||
                                    !password
                                ) {
                                    Swal.showValidationMessage(
                                        "Por favor, completa todos los campos requeridos."
                                    );
                                    return false;
                                }

                                const formData = new FormData();
                                formData.append("name", name);
                                formData.append("lastName", lastName);
                                formData.append("mail", mail);
                                formData.append("address", address);
                                formData.append("birth", birth);
                                formData.append("blood", blood);
                                formData.append("gender", gender);
                                formData.append("password", password);

                                const csrfToken = document
                                    .querySelector('meta[name="csrf-token"]')
                                    .getAttribute("content");

                                return fetch("/files_doc", {
                                    method: "POST",
                                    headers: {
                                        "X-CSRF-TOKEN": csrfToken,
                                    },
                                    body: formData,
                                })
                                    .then((response) => response.json())
                                    .then((data) => {
                                        if (data.success) {
                                            return Swal.fire({
                                                icon: "success",
                                                title: "Éxito",
                                                text: data.message,
                                            });
                                        } else {
                                            const errors = data.errors;
                                            let errorMessage =
                                                "Por favor, corrige los siguientes errores:\n";
                                            for (const [
                                                key,
                                                messages,
                                            ] of Object.entries(errors)) {
                                                errorMessage += `${messages.join(
                                                    ", "
                                                )}\n`;
                                            }
                                            Swal.showValidationMessage(
                                                errorMessage
                                            );
                                            return false;
                                        }
                                    })
                                    .catch((error) => {
                                        Swal.showValidationMessage(
                                            "Ocurrió un error al enviar los datos."
                                        );
                                        return false;
                                    });
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
    $(".deleteFile").click(function () {
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

    // Admin
    // Maneja la creacion del expediente y del usuario
    $(".deleteFileAd").click(function () {
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
                    url: `/records/${fileId}`,
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
