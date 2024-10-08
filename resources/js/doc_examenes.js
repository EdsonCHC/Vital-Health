import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $(".option-button").click(function () {
        const citaId = $(this).data("cita-id");
        const patientId = $(`#patient_id_${citaId}`).data("patient-id");
        showExamsInModal(citaId, patientId);
    });
    function showExamsInModal(citaId, patientId) {
        $.ajax({
            url: `/citas/${citaId}/exams`,
            type: "GET",
            data: { patient_id: patientId },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        }).done(function (data) {});
    }
    $(document).on("click", ".btn-delete", function () {
        const examId = $(this).closest(".exam-item").data("exam-id");
        const citaId = $(this).closest(".exam-item").data("cita-id");

        Swal.fire({
            title: "Eliminar Examen",
            text: "¿Estás seguro de que deseas eliminar este examen?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/citas/${citaId}/exams/${examId}`,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success(response) {
                        if (response.success) {
                            Swal.fire(
                                "Examen eliminado correctamente",
                                "",
                                "success"
                            );
                            showExamsInModal(
                                citaId,
                                $(`#patient_id_${citaId}`).data("patient-id")
                            );
                        } else {
                            Swal.fire(
                                "Error",
                                response.message ||
                                    "No se pudo eliminar el examen",
                                "error"
                            );
                        }
                    },
                    error(response) {
                        console.log(response);
                        Swal.fire("Error al eliminar el examen");
                    },
                });
            }
        });
    });

    function showExamsInModal(citaId, userId) {
        const url = `/citas/${citaId}/exams/${userId}`;
        $.ajax({
            url: url,
            type: "GET",
        })
            .done((response) => {
                if (response.success) {
                    let examsHtml = '<div class="mb-4">';
                    if (response.exams.length > 0) {
                        response.exams.forEach((exam) => {
                            examsHtml += `
                                <div class="p-6 border rounded-lg border-gray-200 bg-white shadow-md mb-4 flex flex-col">
                                    <h4 class="text-2xl font-semibold mb-2">
                                        ${exam.exam_type}
                                    </h4>
                                    <p class="text-gray-700 mb-1"><strong>Fecha:</strong> ${
                                        exam.exam_date
                                    }</p>
                                    <p class="text-gray-700 mb-1"><strong>Estado:</strong> ${
                                        exam.state === "1"
                                            ? "En proceso"
                                            : "Finalizado"
                                    }</p>
                                    <p class="text-gray-700 mb-4"><strong>Notas:</strong> ${
                                        exam.notes || "N/A"
                                    }</p>
                                    <div class="flex justify-end mt-auto">
                                        <button class="bg-red-600 text-white rounded-lg px-4 py-2 font-semibold hover:bg-red-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-500">
                                            Eliminar
                                        </button>
                                    </div>
                                </div>
                            `;
                        });
                    } else {
                        examsHtml =
                            "<p>No hay exámenes para esta cita. Puedes crear uno nuevo.</p>";
                    }
                    examsHtml += "</div>";

                    Swal.fire({
                        title: "Lista de Exámenes",
                        html: `
                    ${examsHtml}
                    <div class="flex flex-wrap justify-center items-center gap-4 p-4">
                        <button id="option-create" data-cita-id="${citaId}" class="bg-green-700 text-white rounded px-4 py-2 w-32">Crear</button>
                    </div>
                `,
                        showConfirmButton: false,
                        showCancelButton: false,
                    });
                } else {
                    Swal.fire({
                        title: "Error",
                        text: "No se pudieron cargar los exámenes",
                        icon: "error",
                    });
                }
            })
            .fail((response) => {
                console.log(response);
                Swal.fire({
                    title: "Error",
                    text: "No se pudieron cargar los exámenes",
                    icon: "error",
                });
            });
    }

    $(document).on("click", "#option-create", function () {
        const citaId = $(this).data("cita-id");

        Swal.fire({
            title: "Crear Nuevo Examen",
            html: `
                <form id="create-form" class="space-y-4 bg-white text-left">
                    <!-- Select field -->
                    <label for="create-field1" class="block">
                        <span class="text-lg font-semibold">Tipo de Examen</span>
                        <select id="create-field1" class="form-select w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100">
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="blood">Sangre</option>
                            <option value="urine">Orina</option>
                            <option value="stool">Heces</option>
                        </select>
                    </label>
                    <!-- Date input -->
                    <label for="create-field2" class="block">
                        <span class="text-lg font-semibold">Fecha</span>
                        <input type="date" id="create-field2" class="form-input w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100 text-input" placeholder="Fecha" min="${
                            new Date().toISOString().split("T")[0]
                        }">
                    </label>
                    <label for="create-field3" class="block">
                        <span class="text-lg font-semibold">Notas</span>
                        <textarea id="create-field3" class="form-input w-full h-32 border rounded-lg p-2 mt-1 bg-gray-100 text-input" placeholder="Notas"></textarea>
                    </label>

                </form>
            `,
            confirmButtonText: "Guardar",
            confirmButtonColor: "#166534",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            preConfirm: () => {
                const examType = document.querySelector("#create-field1").value;
                const examDate = document.querySelector("#create-field2").value;
                const notes = document.querySelector("#create-field3").value;

                if (!examType || !examDate) {
                    Swal.showValidationMessage(
                        "Por favor, completa todos los campos"
                    );
                    return false;
                }

                if (new Date(examDate) < new Date()) {
                    Swal.showValidationMessage(
                        "Fecha incorrecta ,Agregar fecha para futuro"
                    );
                    return false;
                }

                return {
                    exam_type: examType,
                    exam_date: examDate,
                    notes: notes || "",
                    cita_id: citaId,
                };
            },
        }).then((result) => {
            if (result.isConfirmed) {
                const _token = $('meta[name="csrf-token"]').attr("content");
                const doctorId = $(`#doctor_id_${citaId}`).data("doctor-id");

                if (!doctorId) {
                    Swal.fire("Error", "Doctor ID no está definido", "error");
                    return;
                }

                $.ajax({
                    url: `/citas/${citaId}/${doctorId}/exams`,
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": _token,
                    },
                    data: result.value,
                    success(response) {
                        if (response.success) {
                            Swal.fire(
                                "Examen creado correctamente",
                                "",
                                "success"
                            );
                            showExamsInModal(
                                citaId,
                                $(`#patient_id_${citaId}`).data("patient-id")
                            );
                        } else {
                            Swal.fire(
                                "Error al crear el examen",
                                response.message ||
                                    "No se pudo crear el examen",
                                "error"
                            );
                        }
                    },
                    error(response) {
                        console.log(response);
                        Swal.fire("Error al crear el examen");
                    },
                });
            }
        });
    });
});
