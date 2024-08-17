import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    // Manejar el clic en el botón de opciones
    $(document).on("click", ".option-button", function () {
        const citaId = $(this).data("cita-id");

        Swal.fire({
            title: "Selecciona una opción",
            showConfirmButton: false,
            icon: "info",
            html: `
                <div class="flex justify-center content-center items-center gap-10">
                    <button id="option-create" class="bg-green-400 text-white rounded px-4 py-2">Crear</button>
                    <button id="option-edit" class="bg-blue-400 text-white rounded px-4 py-2">Editar</button>
                    <button id="option-delete" class="bg-red-600 text-white rounded px-4 py-2">Eliminar</button>
                </div>
            `,
        });

        // Manejar el clic en el botón de crear
        $(document).on("click", "#option-create", function () {
            Swal.fire({
                title: "Crear Nuevo Examen",
                html: `
                    <form id="create-form" style="display: flex; flex-direction: column; gap: 10px;">
                        <select id="create-field1" class="form-select rounded-md border border-solid border-gray-300 p-2">
                            <option value="" disabled selected>Tipo de Examen</option>
                            <option value="blood">Sangre</option>
                            <option value="urine">Orina</option>
                            <option value="stool">Heces</option>
                        </select>
                        <input type="date" id="create-field2" class="form-input rounded-md border border-solid border-gray-300 p-2" placeholder="Fecha">
                        <textarea id="create-field3" class="form-textarea rounded-md border border-solid border-gray-300 p-2 h-24" placeholder="Notas"></textarea>
                    </form>
                `,
                confirmButtonText: "Guardar",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                preConfirm: () => {
                    const popup = Swal.getPopup();
                    const examType =
                        popup.querySelector("#create-field1").value;
                    const examDate =
                        popup.querySelector("#create-field2").value;
                    const notes = popup.querySelector("#create-field3").value;

                    if (!examType || !examDate) {
                        Swal.showValidationMessage(
                            "Por favor, completa todos los campos"
                        );
                        returnfalse;
                    }

                    return {
                        exam_type: examType,
                        exam_date: examDate,
                        notes: notes || "",
                    };
                },
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        const token = $('meta[name="csrf-token"]').attr(
                            "content"
                        );

                        $.ajax({
                            url: `/citas/${citaId}`,
                            type: "POST",
                            headers: {
                                "X-CSRF-TOKEN": token,
                            },
                            data: {
                                exam_type: result.value.exam_type,
                                exam_date: result.value.exam_date,
                                notes: result.value.notes,
                            },
                            success(response) {
                                Swal.fire({
                                    title: "Examen creado",
                                    text: response.message,
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false,
                                    timerProgressBar: true,
                                });
                            },
                            error(xhr, textStatus, errorThrown) {
                                let errorMessage =
                                    "Ocurrió un error al crear el examen";

                                if (xhr.status === 0) {
                                    errorMessage =
                                        "Error de red: No se pudo conectar al servidor";
                                }
                                elseif(xhr.status >= 400 && xhr.status < 500);
                                {
                                    errorMessage =
                                        "Error en la solicitud: " +
                                        (xhr.responseJSON?.message ||
                                            "Revise los datos enviados");
                                }
                                elseif(xhr.status >= 500);
                                {
                                    errorMessage =
                                        "Error del servidor: " +
                                        (xhr.responseJSON?.message ||
                                            "Intente de nuevo más tarde");
                                }

                                console.error("Error en la solicitud AJAX:", {
                                    xhr,
                                    textStatus,
                                    errorThrown,
                                });

                                Swal.fire({
                                    title: "Error",
                                    text: errorMessage,
                                    icon: "error",
                                });
                            },
                        }).fail((jqXHR, textStatus, errorThrown) => {
                            Swal.fire({
                                title: "Error",
                                text:
                                    "Error de red o de conexión: " + textStatus,
                                icon: "error",
                            });
                        });
                    }
                })
                .catch((error) => {
                    Swal.fire({
                        title: "Error",
                        text: "Ocurrió un error inesperado: " + error.message,
                        icon: "error",
                    });
                });
        });
    });
});
