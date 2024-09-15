import Swal from "sweetalert2";
import jQuery from "jquery";
import QRCode from "qrcode";
window.$ = jQuery;

$(document).ready(function () {
    const pendientesSection = document.getElementById("pendientes");
    const finalizadosSection = document.getElementById("finalizados");
    const menuButton = document.getElementById("menu-buttone");

    document
        .getElementById("toggle-examenes")
        .addEventListener("click", function () {
            const pendientes = document.getElementById("pendientes");
            const finalizados = document.getElementById("finalizados");
            const boton = document.getElementById("toggle-examenes");

            if (pendientes.classList.contains("hidden")) {
                pendientes.classList.remove("hidden");
                finalizados.classList.add("hidden");
                boton.textContent = "Ver Exámenes Finalizados";
            } else {
                pendientes.classList.add("hidden");
                finalizados.classList.remove("hidden");
                boton.textContent = "Ver Exámenes Pendientes";
            }
        });

    $(".results").click(function () {
        const div = $(this).closest("div");
        const id = div.data("id");
        console.log(id);

        $.ajax({
            url: `/exams/patient/pdf/${id}`,
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
});
