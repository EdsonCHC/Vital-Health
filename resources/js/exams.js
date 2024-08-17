import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    function getCitaId() {
        return $("#cita_id").val();
    }

    $(document).on("click", ".option-button", function () {
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
            Swal.fire({
                title: "Crear Nuevo Examen",
                html: `
            <form id="create-form">
                <select id="create-field1" class="form-select">
                    <option value="" disabled selected>Tipo de Examen</option>
                    <option value="blood">Sangre</option>
                    <option value="urine">Orina</option>
                    <option value="stool">Heces</option>
                </select>
                <input type="date" id="create-field2" class="form-input" placeholder="Fecha">
                <textarea id="create-field3" class="form-textarea h-24" placeholder="Notas"></textarea>
            </form>
        `,
                confirmButtonText: "Guardar",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                preConfirm: () => {
                    const examType =
                        document.querySelector("#create-field1").value;
                    const examDate =
                        document.querySelector("#create-field2").value;
                    const notes =
                        document.querySelector("#create-field3").value;

                    if (!examType || !examDate) {
                        Swal.showValidationMessage(
                            "Por favor, completa todos los campos"
                        );
                        return false;
                    }

                    return {
                        exam_type: examType,
                        exam_date: examDate,
                        notes: notes || "",
                    };
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    const token = $('meta[name="csrf-token"]').attr("content");
                    const citaId = getCitaId();

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
                            Swal.fire(
                                "Examen guardado correctamente",
                                "",
                                "success"
                            );
                        },
                        error() {
                            Swal.fire(
                                "Error al guardar el examen",
                                "",
                                "error"
                            );
                        },
                    });
                }
            });
        });
    });
});
