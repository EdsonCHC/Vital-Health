import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $(".option-button").click(function () {
        const citaId = $(this).data("cita-id");
        const patientId = $(`#patient_id_${citaId}`).data("patient-id");
        showExamsInModal(citaId, patientId);
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
                    <div class="exam-item p-4 border-b border-gray-200" data-exam-id="${
                        exam.id
                    }" data-cita-id="${citaId}">
                        <h4 class="text-lg font-semibold">${exam.exam_type}</h4>
                        <p>Fecha: ${exam.exam_date}</p>
                        <p>Notas: ${exam.notes || "N/A"}</p>
                        <div class="flex gap-2 mt-2">
                            <button class="bg-red-600 text-white rounded px-4 py-2 w-32 btn-delete">Eliminar</button>
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
                            <button id="option-create" data-cita-id="${citaId}" class="bg-green-400 text-white rounded px-4 py-2 w-32">Crear</button>
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

    $(document).on('click','#option-create',function () {
        const citaId = $(this).data("cita-id");

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
                const examType = document.querySelector("#create-field1").value;
                const examDate = document.querySelector("#create-field2").value;
                const notes = document.querySelector("#create-field3").value;

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

    $(".btn-delete").click(function () {
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

    //eliminar examen
    $(".delete-btn").click(function () {
        Swal.fire({
            icon: "warning",
            title: "¿Esta seguro?",
            text: "Esta acción no puede revertirse",
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: "Si, eliminar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                const tr = $(this).closest("tr");
                const id = tr.data('id');
                console.log(id);
                $.ajax({
                    url: `/exams/delete/${id}`,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success(response) {
                        console.log(response);
                        Swal.fire({
                            icon: "success",
                            title: "Examen eliminado",
                            timer: 1500,
                        }).then(() => {
                            window.location.reload();
                        });
                    },
                    error(response) {
                        console.log(response);
                    },
                });
            }
        });
    });

    $(".end-btn").click(function () {
        Swal.fire({
            icon: 'question',
            title: '¿Desea eliminar este examen?',
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'Si, Finalizar'
        }).then((result)=>{
            if(result.isConfirmed){
                const tr = $(this).closest("tr");
                const id = tr.data('id');
                $.ajax({
                    url: `/exams/end/${id}}`,
                    type: 'patch',
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success(response){
                        console.log(response);
                        Swal.fire({
                            icon: "success",
                            title: "Examen Finalizado",
                            timer: 1500,
                        }).then(() => {
                            window.location.reload();
                        });
                    },
                    error(response){
                        console.log(response);
                    }
                })
            }
        });
    });

    $('.add-results').click(function(){
        Swal.fire({
            title: "Resultado del examen",
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
            </form>`
        });
    });
});
