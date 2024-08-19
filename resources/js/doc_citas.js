import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $(".option-button").click(function () {
        const citaId = $(this).data("cita-id");
        const patientId = $(`#patient_id_${citaId}`).data("patient-id");
        showExamsInModal(citaId, patientId);
    });

    $(document).on("click", "#aceptar", function () {
        const citaId = $(this).closest("[data-cita-id]").data("cita-id");

        $.ajax({
            url: `/citas/${citaId}/check-end`,
            type: "GET",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        }).done(function (response) {
            if (response.success) {
                Swal.fire({
                    title: "Terminar Cita",
                    text: "Todos los exámenes están completos. ¿Deseas terminar la cita y editar su descripción?",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonText: "Sí, continuar",
                    cancelButtonText: "Cancelar",
                }).then(function (result) {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Editar Descripción de la Cita",
                            input: "textarea",
                            inputLabel: "Descripción",
                            inputPlaceholder: "Escribe la descripción aquí...",
                            inputValidator: (value) => {
                                if (!value.trim()) {
                                    return "La descripción no puede estar vacía";
                                }
                            },
                            showCancelButton: true,
                            confirmButtonText: "Guardar",
                            cancelButtonText: "Cancelar",
                        }).then(function (result) {
                            if (result.isConfirmed) {
                                const descripcion = result.value.trim();

                                $.ajax({
                                    url: `/citas/${citaId}/end`,
                                    type: "POST",
                                    data: {
                                        description: descripcion,
                                        _token: $(
                                            'meta[name="csrf-token"]'
                                        ).attr("content"),
                                    },
                                    headers: {
                                        "X-CSRF-TOKEN": $(
                                            'meta[name="csrf-token"]'
                                        ).attr("content"),
                                    },
                                }).done(function () {
                                    Swal.fire({
                                        title: "Descripción Actualizada",
                                        text: "La descripción ha sido actualizada exitosamente.",
                                        icon: "success",
                                        showCancelButton: true,
                                        cancelButtonText: "Finalizar Cita",
                                        confirmButtonText: "Crear Receta",
                                        confirmButtonColor: "#28a745",
                                        reverseButtons: true,
                                    }).then(function (result) {
                                        if (result.isConfirmed) {
                                            $.ajax({
                                                url: `/recetas/fetch-prescription-form-data`,
                                                type: "GET",
                                                data: {
                                                    cita_id: citaId,
                                                    doctor_id:
                                                        response.doctor_id,
                                                    paciente_id:
                                                        response.paciente_id,
                                                },
                                                headers: {
                                                    "X-CSRF-TOKEN": $(
                                                        'meta[name="csrf-token"]'
                                                    ).attr("content"),
                                                },
                                            }).done(function (data) {
                                                const {
                                                    doctor_id,
                                                    patient_id,
                                                    medicinas,
                                                } = data;

                                                Swal.fire({
                                                    title: "Crear Receta",
                                                    html: `
                                                        <div class="flex max-w-4xl mx-auto">
                                                            <div class="flex-1 mr-6">
                                                                <form id="receta-form" class="space-y-4 p-4 bg-white border border-gray-300 rounded-md shadow-md">
                                                                    <input type="hidden" name="cita_id" value="${citaId}">
                                                                    <input type="hidden" name="doctor_id" value="${doctor_id}">
                                                                    <input type="hidden" name="patient_id" value="${patient_id}">
                                                                    <div class="form-group">
                                                                        <label for="fecha_entrega" class="block text-lg font-semibold text-gray-700">Fecha de Entrega</label>
                                                                        <input type="date" name="fecha_entrega" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" min="${
                                                                            new Date()
                                                                                .toISOString()
                                                                                .split(
                                                                                    "T"
                                                                                )[0]
                                                                        }" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="hora_entrega" class="block text-lg font-semibold text-gray-700">Hora de Entrega</label>
                                                                        <input type="time" name="hora_entrega" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="titulo" class="block text-lg font-semibold text-gray-700">Título</label>
                                                                        <input type="text" name="titulo" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="descripcion" class="block text-lg font-semibold text-gray-700">Descripción</label>
                                                                        <textarea name="descripcion" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"></textarea>
                                                                    </div>
                                                                    <div id="codigo-receta-container" class="mt-4">
                                                                        <label class="block text-lg font-semibold text-gray-700">Código:</label>
                                                                        <span id="codigo-receta" class="block text-xl font-semibold text-gray-900">Generar código para ver aquí</span>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="flex-1">
                                                                <div class="p-4 bg-white border border-gray-300 rounded-md shadow-md">
                                                                    <h3 class="text-lg font-semibold text-gray-700">Listado de Medicinas</h3>
                                                                    <div id="medicinas-list" class="space-y-3 mt-2 border border-gray-300 rounded-md p-4 bg-gray-50 max-h-60 overflow-y-auto">
                                                                        ${medicinas
                                                                            .map(
                                                                                (
                                                                                    med
                                                                                ) => `
                                                                            <div class="flex items-center justify-between space-x-3 p-2 border border-gray-200 rounded-md bg-white medicina-item">
                                                                                <span class="text-gray-700 medicina-nombre">${med.nombre}</span>
                                                                                <button type="button" data-id="${med.id}" class="add-medicina-btn bg-green-500 text-white px-4 py-1 rounded-md hover:bg-green-600">Añadir</button>
                                                                            </div>
                                                                        `
                                                                            )
                                                                            .join(
                                                                                ""
                                                                            )}
                                                                    </div>
                                                                </div>
                                                                <div class="mt-4 p-4 bg-white border border-gray-300 rounded-md shadow-md">
                                                                    <h3 class="text-lg font-semibold text-gray-700">Medicinas Seleccionadas</h3>
                                                                    <ul id="selected-medicinas-list" class="space-y-2 mt-2 border border-gray-300 rounded-md p-4 bg-gray-50 max-h-60 overflow-y-auto">
                                                                    </ul>
                                                                </div>
                                                                <button id="generate-code" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Generar Código</button>
                                                            </div>
                                                        </div>
                                                    `,
                                                    width: "80%",
                                                    customClass: {
                                                        container:
                                                            "custom-swal-container",
                                                        popup: "custom-swal-popup",
                                                    },
                                                    focusConfirm: false,
                                                    showCancelButton: true,
                                                    cancelButtonText:
                                                        "Cancelar",
                                                    confirmButtonText:
                                                        "Guardar Receta",
                                                    confirmButtonColor:
                                                        "#28a745",
                                                    preConfirm: function () {
                                                        const form =
                                                            document.querySelector(
                                                                "#receta-form"
                                                            );
                                                        if (
                                                            form.checkValidity()
                                                        ) {
                                                            const formData =
                                                                new FormData(
                                                                    form
                                                                );
                                                            const data =
                                                                Object.fromEntries(
                                                                    formData.entries()
                                                                );
                                                            data.medicinas = [];

                                                            $(
                                                                "#selected-medicinas-list li"
                                                            ).each(function () {
                                                                const medicinaId =
                                                                    $(this)
                                                                        .find(
                                                                            'input[name$="[id]"]'
                                                                        )
                                                                        .val();
                                                                const cantidad =
                                                                    $(this)
                                                                        .find(
                                                                            'input[name$="[cantidad]"]'
                                                                        )
                                                                        .val();
                                                                if (
                                                                    medicinaId &&
                                                                    cantidad
                                                                ) {
                                                                    data.medicinas.push(
                                                                        {
                                                                            id: medicinaId,
                                                                            cantidad,
                                                                        }
                                                                    );
                                                                }
                                                            });

                                                            console.log(
                                                                "Datos enviados:",
                                                                JSON.stringify(
                                                                    data
                                                                )
                                                            );

                                                            return $.ajax({
                                                                url: "/recetas",
                                                                type: "POST",
                                                                data: JSON.stringify(
                                                                    data
                                                                ),
                                                                processData: false,
                                                                contentType:
                                                                    "application/json",
                                                                headers: {
                                                                    "X-CSRF-TOKEN":
                                                                        $(
                                                                            'meta[name="csrf-token"]'
                                                                        ).attr(
                                                                            "content"
                                                                        ),
                                                                },
                                                            })
                                                                .done(function (
                                                                    response
                                                                ) {
                                                                    Swal.fire({
                                                                        title: "Receta Creada",
                                                                        text: "La receta se ha creado exitosamente.",
                                                                        icon: "success",
                                                                    });
                                                                })
                                                                .fail(function (
                                                                    jqXHR
                                                                ) {
                                                                    console.error(
                                                                        "Error en la petición:",
                                                                        jqXHR.responseText
                                                                    );
                                                                    Swal.fire({
                                                                        title: "Error",
                                                                        text: "Hubo un problema al crear la receta.",
                                                                        icon: "error",
                                                                    });
                                                                });
                                                        } else {
                                                            form.reportValidity();
                                                        }
                                                    },
                                                });
                                            });
                                        }
                                    });
                                });
                            }
                        });
                    }
                });
            } else {
                Swal.fire({
                    title: "Error",
                    text: "No se pudo terminar la cita.",
                    icon: "error",
                });
            }
        });
    });

    // Función para mostrar exámenes en el modal
    function showExamsInModal(citaId, patientId) {
        $.ajax({
            url: `/citas/${citaId}/exams`,
            type: "GET",
            data: { patient_id: patientId },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        }).done(function (data) {
            // Lógica para mostrar los exámenes en el modal
        });
    }

    // Manejar el click en el botón "Añadir Medicina"
    $(document).on("click", ".add-medicina-btn", function () {
        const id = $(this).data("id");
        const nombre = $(this)
            .closest(".medicina-item")
            .find(".medicina-nombre")
            .text();
        const item = `
            <li class="flex items-center justify-between p-2 border border-gray-200 rounded-md bg-white">
                <span>${nombre}</span>
                <input type="hidden" name="medicinas[][id]" value="${id}">
                <input type="number" name="medicinas[][cantidad]" placeholder="Cantidad" class="ml-2 px-2 py-1 border border-gray-300 rounded-md">
                <button type="button" class="remove-medicina-btn ml-2 bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600">Eliminar</button>
            </li>
        `;
        $("#selected-medicinas-list").append(item);
    });

    // Manejar el click en el botón "Eliminar Medicina"
    $(document).on("click", ".remove-medicina-btn", function () {
        $(this).closest("li").remove();
    });

    // Manejar el click en el botón "Generar Código"
    $(document).on("click", "#generate-code", function () {
        const code = generateRandomCode();
        $("#codigo-receta").text(`Código: ${code}`);
        $("#receta-form").append(
            `<input type="hidden" name="codigo_receta" value="${code}">`
        );
    });
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
    // Función para generar un código aleatorio
    function generateRandomCode() {
        return "RC-" + Math.random().toString(36).substr(2, 9).toUpperCase();
    }

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
                      <p>Estado: ${
                          exam.state === "1" ? "En proceso" : "Finalizado"
                      }</p>
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

    $(document).on("click", "#option-create", function () {
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
        <input type="date" id="create-field2" class="form-input" placeholder="Fecha" min="${
            new Date().toISOString().split("T")[0]
        }">
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

    $('#show-citas').click(function () {
        let doctorId = 1;

        $.ajax({
            url: `/historical-appointments/${doctorId}`,
            method: 'GET',
            success: function (response) {
                if (response.length === 0) {
                    Swal.fire('Sin Historial', 'No se encuentran citasr.', 'info');
                    return;
                }

                let citasHtml = response.map(cita => `
                    <div style="margin-bottom: 10px; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <p><strong>Paciente:</strong> ${cita.patient.name} ${cita.patient.lastName}</p>
                        <p><strong>Fecha:</strong> ${cita.date}</p>
                        <p><strong>Hora:</strong> ${cita.hour}</p>
                    </div>
                `).join('');

                Swal.fire({
                    title: 'Citas Terminadas',
                    html: citasHtml,
                    confirmButtonText: 'Cerrar',
                    
                });
            },
            error: function () {
                Swal.fire('Error', 'Hubo un error al obtener las citas.', 'error');
            }
        });
    });
});
