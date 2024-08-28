import Swal from "sweetalert2";
import jQuery from "jquery";
import QRCode from "qrcode";
window.$ = jQuery;

$(document).ready(function () {
    // Usuario
    // Maneja el guardado del expediente
    $(".saveFileUser").click(function () {
        const userId = $(this).data("id");
        const pdfUrl = `/fileUser`; // URL para descargar el PDF y generar el QR

        Swal.fire({
            title: "Resultado de mi Expediente",
            html: `
        <div class="flex flex-col items-center justify-center w-full h-full">
            <img id="qr_code" alt="Código QR">
            <br>
            <a id="download_pdf" href="${pdfUrl}?user_id=${userId}" download="Expediente_${userId}.pdf" class="text-blue-500 underline mt-4">Descargar PDF</a>
        </div>
        `,
            showConfirmButton: false,
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            didOpen: () => {
                QRCode.toDataURL(
                    `${pdfUrl}?user_id=${userId}`, // Usa la URL del PDF para el QR
                    {
                        width: 250,
                        color: {
                            dark: "#000000",
                            light: "#FFFFFF",
                        },
                        margin: 1,
                    },
                    (err, url) => {
                        if (err) {
                            console.error(err);
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Hubo un error al generar el código QR. Por favor, intenta de nuevo.",
                            });
                        } else {
                            document.getElementById("qr_code").src = url;
                            console.log("Código QR generado!");
                        }
                    }
                );
            },
        });
    });


    // Doctor
    // Maneja la creacion del expediente y del usuario
    $(".saveFileDoc").click(function () {
        const patientId = $(this).data("patient-id");
        const pdf_url = `/generate-pdf-doc?patient_id=${patientId}`;
        console.log(patientId);

        Swal.fire({
            title: "Expediente del Paciente",
            html: `
        <div class="flex flex-col items-center justify-center w-full h-full">
            <canvas id="qr_code"></canvas>
            <br>
            <a id="download_pdf" href="${pdf_url}" download="expediente_${patientId}.pdf" class="text-blue-500 underline mt-4">Descargar PDF</a>
        </div>
        `,
            showConfirmButton: false,
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            didOpen: () => {
                const qrCodeCanvas = document.getElementById("qr_code");

                // Generar el código QR en el canvas
                QRCode.toCanvas(
                    qrCodeCanvas,
                    pdf_url,
                    { width: 200 },
                    (err) => {
                        if (err) console.error(err);
                        console.log("Código QR generado!");
                    }
                );
            },
        });
    });

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
                            title: "Crear un Usuario",
                            html: `
                            <form id="register-form" class="space-y-4 p-4 bg-white text-left">
                                <label class="block">
                                    <span class="text-lg font-semibold">Nombre</span>
                                    <input type="text" id="name" name="name"
                                    class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100 text-input" required>
                                </label>
                                <label class="block">
                                    <span class="text-lg font-semibold">Apellido</span>
                                    <input type="text" id="lastName" name="lastName"
                                    class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100 text-input" required>
                                </label>
                                <label class="block">
                                    <span class="text-lg font-semibold">Correo Electronico</span>
                                    <input type="email" id="mail"
                                    class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100 text-input" required>
                                </label>
                                <label class="block">
                                    <span class="text-lg font-semibold">Dirección</span>
                                    <input type="text" id="address"
                                    class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100 text-input" required>
                                </label>
                                <label for="gender" class="block text-lg font-semibold mt-4">Género
                                    <select id="gender" class="form-select w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" required>
                                        <option value="masculino">Masculino</option>
                                        <option value="femenino">Femenino</option>
                                        <option value="otro">Otro</option>
                                    </select>
                                </label>
                                <label for="blood" class="block text-lg font-semibold">Tipo de sangre
                                    <select id="blood" class="form-select w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" required>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </label>
                                <label class="block">
                                    <span class="text-lg font-semibold">Fecha de Nacimiento</span>
                                    <input type="date" id="birth"
                                    class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100 text-input" required>
                                </label>
                                <label class="block">
                                    <span class="text-lg font-semibold">Contraseña</span>
                                    <input type="password" id="password"
                                    class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100 text-input" required>
                                </label>
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

    // Maneja la actualización del expediente
    $(".unassignedFile").click(function () {
        const fileId = $(this).data("id");
        const patientId = $(this).data("patient-id"); // Obtener patient_id del botón

        Swal.fire({
            title: "Deshabilitar Expediente",
            text: "¿Estás seguro de que deseas deshabilitar el expediente del paciente?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sí, deshabilitar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                const _token = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    url: `/files_doc/${fileId}`,
                    type: "PUT",
                    headers: {
                        "X-CSRF-TOKEN": _token,
                    },
                    data: {
                        patient_id: patientId, // Enviar el patient_id al controlador
                        state: "1", // Cambiar el estado a "0" como cadena
                    },
                    success(response) {
                        if (response.success) {
                            Swal.fire(
                                "Expediente deshabilitado",
                                "",
                                "success"
                            );
                            // Actualiza el HTML si es necesario
                        } else {
                            Swal.fire(
                                "Error al deshabilitar el expediente",
                                response.message ||
                                    "No se pudo deshabilitar el expediente",
                                "error"
                            );
                        }
                    },
                    error(response) {
                        console.log(response); // Para depuración
                        Swal.fire(
                            "Error al deshabilitar el expediente",
                            "No se pudo deshabilitar el expediente",
                            "error"
                        );
                    },
                });
            }
        });
    });

    $(".assignFile").click(function () {
        const fileId = $(this).data("id");
        const patientId = $(this).data("patient-id"); // Obtener patient_id del botón

        Swal.fire({
            title: "Habilitar Expediente",
            text: "¿Estás seguro de que deseas habilitar el expediente del paciente?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#00c04b",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sí, habilitar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                const _token = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    url: `/files_doc/${fileId}`,
                    type: "PUT",
                    headers: {
                        "X-CSRF-TOKEN": _token,
                    },
                    data: {
                        patient_id: patientId, // Enviar el patient_id al controlador
                        state: "0", // Cambiar el estado a "1" como cadena
                    },
                    success(response) {
                        if (response.success) {
                            Swal.fire("Expediente habilitado", "", "success");
                            // Actualiza el HTML si es necesario
                        } else {
                            Swal.fire(
                                "Error al habilitar el expediente",
                                response.message ||
                                    "No se pudo habilitar el expediente",
                                "error"
                            );
                        }
                    },
                    error(response) {
                        console.log(response); // Para depuración
                        Swal.fire(
                            "Error al habilitar el expediente",
                            "No se pudo habilitar el expediente",
                            "error"
                        );
                    },
                });
            }
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
});
