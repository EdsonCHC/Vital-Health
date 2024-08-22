import Swal from "sweetalert2";
import jQuery from "jquery";
import QRCode from "qrcode";
window.$ = jQuery;

$(document).ready(function () {
    const orinaForm = `
        <form id="orinaForm" class="bg-white rounded-lg shadow-md max-w-4xl mx-auto">
    <table class="w-full text-left">
        <thead>
            <tr>
                <th class="py-4 px-6 text-lg border-b">ANÁLISIS</th>
                <th class="py-4 px-6 text-lg border-b">RESULTADO</th>
                <th class="py-4 px-6 text-lg border-b">VALOR DE REFERENCIA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-4 px-6 border-b">Color</td>
                <td class="py-4 px-6 border-b">
                    <select id="color" name="color" class="w-full p-3 text-lg border rounded">
                        <option></option>
                        <option value="amarillo ámbar">Amarillo ámbar</option>
                        <option value="amarillo paja">Amarillo paja</option>
                        <option value="transparente">Transparente</option>
                    </select>
                </td>
                <td class="py-4 px-6 border-b">Amarillo paja o ámbar</td>
            </tr>
            <tr>
                <td class="py-4 px-6 border-b">Aspecto</td>
                <td class="py-4 px-6 border-b">
                    <select id="aspecto" name="aspecto" class="w-full p-3 text-lg border rounded">
                        <option></option>
                        <option value="ligeramente turbio">Ligeramente turbio</option>
                        <option value="turbio">Turbio</option>
                        <option value="claro">Claro</option>
                    </select>
                </td>
                <td class="py-4 px-6 border-b">Transparente o ligeramente turbio</td>
            </tr>
            <tr>
                <td class="py-4 px-6 border-b">Densidad</td>
                <td class="py-4 px-6 border-b">
                    <select id="densidad" name="densidad" class="w-full p-3 text-lg border rounded">
                        <option></option>
                        <option value="1.030 gr/ml">1.030 gr/ml</option>
                        <option value="1.025 gr/ml">1.025 gr/ml</option>
                        <option value="1.020 gr/ml">1.020 gr/ml</option>
                    </select>
                </td>
                <td class="py-4 px-6 border-b">1.003-1.030 gr/ml</td>
            </tr>
            <tr>
                <td class="py-4 px-6 border-b">PH</td>
                <td class="py-4 px-6 border-b">
                    <select id="ph" name="ph" class="w-full p-3 text-lg border rounded">
                        <option></option>
                        <option value="6.0">6.0</option>
                        <option value="5.5">5.5</option>
                        <option value="7.0">7.0</option>
                    </select>
                </td>
                <td class="py-4 px-6 border-b">5.0 – 7.0</td>
            </tr>
            <tr>
                <td class="py-4 px-6 border-b">Proteínas</td>
                <td class="py-4 px-6 border-b">
                    <select id="proteínas" name="proteínas" class="w-full p-3 text-lg border rounded">
                        <option></option>
                        <option value="negativo">Negativo</option>
                        <option value="trazas">Trazas</option>
                        <option value="positivo">Positivo</option>
                    </select>
                </td>
                <td class="py-4 px-6 border-b">Negativo</td>
            </tr>
            <tr>
                <td class="py-6 px-6 border-b">Urobilinógeno</td>
                <td class="py-4 px-6 border-b">
                    <select id="urobilinogeno" name="urobilinogeno" class="w-full p-3 text-lg border rounded">
                        <option></option>
                        <option value="negativo">Negativo</option>
                        <option value="normal">Normal</option>
                    </select>
                </td>
                <td class="py-4 px-6 border-b">Normal (0.2 mg/dl)</td>
            </tr>
            <tr>
                <td class="py-4 px-6 border-b">Nitratos</td>
                <td class="py-4 px-6 border-b">
                    <select id="nitratos" name="nitratos" class="w-full p-3 text-lg border rounded">
                        <option></option>
                        <option value="negativo">Negativo</option>
                        <option value="positivo">Positivo</option>
                    </select>
                </td>
                <td class="py-4 px-6 border-b">Negativo</td>
            </tr>
            <tr>
                <td class="py-4 px-6 border-b">Hemoglobina</td>
                <td class="py-4 px-6 border-b">
                    <select id="hemoglobina" name="hemoglobina" class="w-full p-3 text-lg border rounded">
                        <option></option>
                        <option value="negativo">Negativo</option>
                        <option value="positivo">Positivo</option>
                    </select>
                </td>
                <td class="py-4 px-6 border-b">Negativo</td>
            </tr>
            <tr>
                <td class="py-4 px-6 border-b">Glucosa</td>
                <td class="py-4 px-6 border-b">
                    <select id="glucosa" name="glucosa" class="w-full p-3 text-lg border rounded">
                        <option></option>
                        <option value="negativo">Negativo</option>
                        <option value="positivo">Positivo</option>
                    </select>
                </td>
                <td class="py-4 px-6 border-b">Negativo</td>
            </tr>
            <tr>
                <td class="py-4 px-6 border-b">Cuerpos Cetónicos</td>
                <td class="py-4 px-6 border-b">
                    <select id="cuerpos_cetonicos" name="cuerpos_cetonicos" class="w-full p-3 text-lg border rounded">
                        <option></option>
                        <option value="negativo">Negativo</option>
                        <option value="positivo">Positivo</option>
                    </select>
                </td>
                <td class="py-4 px-6 border-b">Negativo</td>
            </tr>
        </tbody>
    </table>
</form>

    `;

    $(".option-button").click(function () {
        const citaId = $(this).data("cita-id");
        const patientId = $(`#patient_id_${citaId}`).data("patient-id");

        showExamsInModal(citaId, patientId);
    });

    $(".results").click(function () {
        const tr = $(this).closest("tr");
        const id = tr.data("id");

        $.ajax({
            url: `/exams/pdf/${id}`,
            type: "get",
            success(response) {
                const pdf_url = response.message;

                Swal.fire({
                    title: "Resultado del examen",
                    html: `
                    <div class="flex flex-col items-center justify-center w-full h-full">
                        <canvas class="flex items-center" id="qr_code"></canvas>
                        <br>
                        <a id="download_pdf" href="${pdf_url}" download="resultado_examen.pdf">Descargar PDF</a>
                    </div>
                `,
                    showConfirmButton: true,
                    confirmButtonText: "Ver",
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
                    preConfirm: () => {
                        // Abrir el PDF en una nueva pestaña
                        window.open(pdf_url, "_blank");
                    },
                });
            },
            error(response) {
                console.log(response);
            },
        });
    });

    $(".delete-btn").click(function () {
        const tr = $(this).closest("tr");
        const id = tr.data("id");

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
                    url: `/exams/delete/${id}`,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success(response) {
                        Swal.fire({
                            title: "Examen eliminado correctamente",
                            timer: 1500,
                        }).then(() => {
                            window.location.reload();
                        });
                    },
                    error(response) {
                        console.log(response);
                        Swal.fire("Error al eliminar el examen");
                    },
                });
            }
        });
    });

    $(".end-btn").click(function () {
        Swal.fire({
            icon: "question",
            title: "¿Desea finalizar este examen?",
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: "Sí, finalizar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                const tr = $(this).closest("tr");
                const id = tr.data("id");
                console.log(id)
                Swal.fire({
                    html: orinaForm, //formulario que proporcionastes
                    showCancelButton: true,
                    confirmButtonText: "Generar PDF",
                    cancelButtonText: "Cancelar",
                    width: "60%",
                    preConfirm: () => {
                        const formData = $("#orinaForm").serializeArray();
                        return formData;
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        const formData = new FormData();
                        result.value.forEach((field) => {
                            formData.append(field.name, field.value);
                        });
                        formData.append('exam_id', id);

                        $.ajax({
                            url: `/generate-pdf`,
                            type: "post",
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            processData: false,
                            contentType: false,
                            data: formData,
                            success(response) {
                                console.log(response)
                                $.ajax({
                                    url: `/exams/end/${id}`,
                                    type: "PATCH",
                                    headers: {
                                        "X-CSRF-TOKEN": $(
                                            'meta[name="csrf-token"]'
                                        ).attr("content"),
                                    },
                                    success(response) {
                                        console.log(response);
                                        Swal.fire({
                                            icon: "success",
                                            title: "Examen Finalizado",
                                            timer: 1500,
                                        }).then(() => {
                                            window.location.reload();
                                        });
                                    },
                                    error(response) {
                                        console.log(response);
                                    },
                                });
                            },
                            error(response) {
                                console.log(response);
                            },
                        });
                    }
                });
            }
        });
    });
});
