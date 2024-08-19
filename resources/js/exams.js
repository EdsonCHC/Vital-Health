import Swal from "sweetalert2";
import jQuery from "jquery";
import QRCode from "qrcode";
window.$ = jQuery;

$(document).ready(function () {
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

                Swal.fire({
                    title: "Selecciona un archivo",
                    input: "file",
                    inputAttributes: {
                        accept: ".pdf",
                        "aria-label": "Sube El pdf",
                    },
                }).then((file) => {
                    if (file.value) {
                        const selectedFile = file.value;
                        const formData = new FormData();
                        formData.append("file", selectedFile);
                        $.ajax({
                            url: `/exams/pdf/${id}`,
                            type: "POST",
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
