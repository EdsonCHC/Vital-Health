import Swal from "sweetalert2";
import jQuery from "jquery";
import QRCode from "qrcode";
window.$ = jQuery;

$(document).ready(function () {
    const formTemplates = {
        urine: `
        <form id="urine" class="bg-white rounded-lg shadow-md max-w-4xl mx-auto p-4">
    <table class="w-full text-left">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 text-sm border-b">ANÁLISIS</th>
                <th class="py-2 px-4 text-sm border-b">RESULTADO</th>
                <th class="py-2 px-4 text-sm border-b">VALOR DE REFERENCIA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-2 px-4 border-b text-sm">Color</td>
                <td class="py-2 px-4 border-b text-sm">
                    <select id="color" name="color" class="w-full p-2 text-sm border rounded">
                        <option></option>
                        <option value="amarillo ámbar">Amarillo ámbar</option>
                        <option value="amarillo paja">Amarillo paja</option>
                        <option value="transparente">Transparente</option>
                    </select>
                </td>
                <td class="py-2 px-4 border-b text-sm">Amarillo paja o ámbar</td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b text-sm">Aspecto</td>
                <td class="py-2 px-4 border-b text-sm">
                    <select id="aspecto" name="aspecto" class="w-full p-2 text-sm border rounded">
                        <option></option>
                        <option value="ligeramente turbio">Ligeramente turbio</option>
                        <option value="turbio">Turbio</option>
                        <option value="claro">Claro</option>
                    </select>
                </td>
                <td class="py-2 px-4 border-b text-sm">Transparente o ligeramente turbio</td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b text-sm">Densidad</td>
                <td class="py-2 px-4 border-b text-sm">
                    <select id="densidad" name="densidad" class="w-full p-2 text-sm border rounded">
                        <option></option>
                        <option value="1.030 gr/ml">1.030 gr/ml</option>
                        <option value="1.025 gr/ml">1.025 gr/ml</option>
                        <option value="1.020 gr/ml">1.020 gr/ml</option>
                    </select>
                </td>
                <td class="py-2 px-4 border-b text-sm">1.003-1.030 gr/ml</td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b text-sm">PH</td>
                <td class="py-2 px-4 border-b text-sm">
                    <select id="ph" name="ph" class="w-full p-2 text-sm border rounded">
                        <option></option>
                        <option value="6.0">6.0</option>
                        <option value="5.5">5.5</option>
                        <option value="7.0">7.0</option>
                    </select>
                </td>
                <td class="py-2 px-4 border-b text-sm">5.0 – 7.0</td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b text-sm">Proteínas</td>
                <td class="py-2 px-4 border-b text-sm">
                    <select id="proteínas" name="proteínas" class="w-full p-2 text-sm border rounded">
                        <option></option>
                        <option value="negativo">Negativo</option>
                        <option value="trazas">Trazas</option>
                        <option value="positivo">Positivo</option>
                    </select>
                </td>
                <td class="py-2 px-4 border-b text-sm">Negativo</td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b text-sm">Urobilinógeno</td>
                <td class="py-2 px-4 border-b text-sm">
                    <select id="urobilinogeno" name="urobilinogeno" class="w-full p-2 text-sm border rounded">
                        <option></option>
                        <option value="negativo">Negativo</option>
                        <option value="normal">Normal</option>
                    </select>
                </td>
                <td class="py-2 px-4 border-b text-sm">Normal (0.2 mg/dl)</td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b text-sm">Nitratos</td>
                <td class="py-2 px-4 border-b text-sm">
                    <select id="nitratos" name="nitratos" class="w-full p-2 text-sm border rounded">
                        <option></option>
                        <option value="negativo">Negativo</option>
                        <option value="positivo">Positivo</option>
                    </select>
                </td>
                <td class="py-2 px-4 border-b text-sm">Negativo</td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b text-sm">Hemoglobina</td>
                <td class="py-2 px-4 border-b text-sm">
                    <select id="hemoglobina" name="hemoglobina" class="w-full p-2 text-sm border rounded">
                        <option></option>
                        <option value="negativo">Negativo</option>
                        <option value="positivo">Positivo</option>
                    </select>
                </td>
                <td class="py-2 px-4 border-b text-sm">Negativo</td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b text-sm">Glucosa</td>
                <td class="py-2 px-4 border-b text-sm">
                    <select id="glucosa" name="glucosa" class="w-full p-2 text-sm border rounded">
                        <option></option>
                        <option value="negativo">Negativo</option>
                        <option value="positivo">Positivo</option>
                    </select>
                </td>
                <td class="py-2 px-4 border-b text-sm">Negativo</td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b text-sm">Cuerpos Cetónicos</td>
                <td class="py-2 px-4 border-b text-sm">
                    <select id="cuerpos_cetonicos" name="cuerpos_cetonicos" class="w-full p-2 text-sm border rounded">
                        <option></option>
                        <option value="negativo">Negativo</option>
                        <option value="positivo">Positivo</option>
                    </select>
                </td>
                <td class="py-2 px-4 border-b text-sm">Negativo</td>
            </tr>
        </tbody>
    </table>
        </form>`,
        blood: `<form  id="blood" class="bg-white p-6 rounded-lg shadow-md">
        <table class="table-auto w-full text-sm">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 text-left">Examen</th>
                    <th class="px-4 py-2 text-left">Resultado</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="px-4 py-2">Eritrocitos (x10<sup>6</sup>/mm<sup>3</sup>)</td>
                    <td class="px-4 py-2">
                        <select id="eritrocitos" name="Eritrocitos" class="w-full p-1 border rounded">
                            <option selected disabled></option>
                            <option value="4">4</option>
                            <option value="4.5">4.5</option>
                            <option value="5">5</option>
                            <option value="5.2">5.2</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">Hemoglobina (g/dl)</td>
                    <td class="px-4 py-2">
                        <select id="hemoglobina" name="Hemoglobina" class="w-full p-1 border rounded">
                            <option selected disabled></option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">Hcto (%)</td>
                    <td class="px-4 py-2">
                        <select id="hcto" name="Hcto" class="w-full p-1 border rounded">
                            <option selected disabled></option>
                            <option value="36">36</option>
                            <option value="40">40</option>
                            <option value="46">46</option>
                            <option value="52">52</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">VCM (fl)</td>
                    <td class="px-4 py-2">
                        <select id="vcm" name="VCM" class="w-full p-1 border rounded">
                            <option selected disabled></option>
                            <option value="80">80</option>
                            <option value="85">85</option>
                            <option value="90">90</option>
                            <option value="95">95</option>
                            <option value="100">100</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">HCM (pg)</td>
                    <td class="px-4 py-2">
                        <select id="hcm" name="HCM" class="w-full p-1 border rounded">
                            <option selected disabled></option>
                            <option value="26">26</option>
                            <option value="30">30</option>
                            <option value="34">34</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">Leucocitos (x10<sup>3</sup>/mm<sup>3</sup>)</td>
                    <td class="px-4 py-2">
                        <select id="leucositos" name="Leucositos" class="w-full p-1 border rounded">
                            <option selected disabled></option>
                            <option value="4.3">4.3</option>
                            <option value="5">5</option>
                            <option value="7">7</option>
                            <option value="10.8">10.8</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">Basófilos (%)</td>
                    <td class="px-4 py-2">
                        <select id="basofilos" name="Basofilos" class="w-full p-1 border rounded">
                            <option selected disabled></option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">Eosinófilos (%)</td>
                    <td class="px-4 py-2">
                        <option selected disabled></option>
                        <select id="eusinofilos" name="Eusinofilos" class="w-full p-1 border rounded">
                            <option selected disabled></option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">Neutrófilos (%)</td>
                    <td class="px-4 py-2">
                        <select id="neutrofilos" name="Neutrofilos" class="w-full p-1 border rounded">
                            <option selected disabled></option>
                            <option value="45">45</option>
                            <option value="50">50</option>
                            <option value="55">55</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">Segmentados (%)</td>
                    <td class="px-4 py-2">
                        <select id="segmentados" name="Segmentados" class="w-full p-1 border rounded">
                            <option selected disabled></option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">Linfocitos (%)</td>
                    <td class="px-4 py-2">
                        <select id="linfocitos" name="Linfocitos" class="w-full p-1 border rounded">
                            <option selected disabled></option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                            <option value="35">35</option>
                            <option value="40">40</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">VHS (mm/hrs)</td>
                    <td class="px-4 py-2">
                        <select id="vhs" name="VHS" class="w-full p-1 border rounded">
                            <option selected disabled></option>
                            <option value="1">1</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="29">29</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        </form>`,
        stool: ` <form action="/ruta-a-tu-controlador" id="stool">
            <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Parámetro</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Resultado</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Color</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <select name="color" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option selected disabled></option>
                                <option value="normal">Normal</option>
                                <option value="pale">Pálido</option>
                                <option value="dark">Oscuro</option>
                                <option value="other">Otro</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Consistencia</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <select name="consistencia" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option selected disabled></option>
                                <option value="normal">Normal</option>
                                <option value="loose">Suelta</option>
                                <option value="hard">Dura</option>
                                <option value="other">Otra</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Sangre Oculta</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <select name="sangre_oculta" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option selected disabled></option>
                                <option value="negativo">Negativo</option>
                                <option value="positivo">Positivo</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Moco</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <select name="moco" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option selected disabled></option>
                                <option value="normal">Normal</option>
                                <option value="present">Presente</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Parasitología</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <select name="parasitologia" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option selected disabled></option>
                                <option value="sin_parasitos">Sin Parásitos</option>
                                <option value="con_parasitos">Con Parásitos</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Observaciones</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <textarea name="observaciones" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>`,
    };

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
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
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
                const examType = tr.data("exam-type");
                console.log(examType);
                const formToShow = formTemplates[examType];

                Swal.fire({
                    html: formToShow,
                    showCancelButton: true,
                    confirmButtonText: "Generar PDF",
                    cancelButtonText: "Cancelar",
                    width: "60%",
                    preConfirm: () => {
                        const formData = $(`#${examType}`).serializeArray();
                        console.log(formData);
                        return formData;
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        const formData = new FormData();
                        result.value.forEach((field) => {
                            formData.append(field.name, field.value);
                        });
                        formData.append("exam_id", id);
                        formData.append("exam-type", examType);

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
                                console.log(response);
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
