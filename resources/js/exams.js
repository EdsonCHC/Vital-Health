import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    // Token CSRF
    const _token = $('meta[name="csrf-token"]').attr("content");

    // Manejar el clic en el botón de opciones
    $(".option-button").click(function () {
        showOptionsAlert();
    });
});

// Función para mostrar la alerta de opciones
function showOptionsAlert() {
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

    $(document).on("click", "#option-create", function () {
        const citaId = $(this).closest(".cita-container").data("cita-id");

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
                const examType = popup.querySelector("#create-field1").value;
                const examDate = popup.querySelector("#create-field2").value;
                const notes = popup.querySelector("#create-field3").value;

                if (!examType || !examDate || !notes) {
                    Swal.showValidationMessage(
                        "Por favor, completa todos los campos"
                    );
                    return false;
                }

                return {
                    exam_type: examType,
                    exam_date: examDate,
                    notes: notes,
                };
            },
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/citas/${citaId}/examenes`,
                    type: "POST",
                    data: {
                        _token: _token,
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
                        console.log("Error en la solicitud AJAX:", {
                            xhr: xhr,
                            textStatus: textStatus,
                            errorThrown: errorThrown,
                        });
                        Swal.fire({
                            title: "Error",
                            text:
                                xhr.responseJSON?.message ||
                                "Ocurrió un error al crear el examen",
                            icon: "error",
                        });
                    },
                });
            }
        });
    });
}
