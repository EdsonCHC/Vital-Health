import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $("#menu-buttone").click(async function () {
        try {
            const response = await $.ajax({
                url: "/examenes/completados",
                type: "GET",
                dataType: "json",
            });

            let examenesHtml = '<div class="p-4">';
            if (response.length === 0) {
                examenesHtml +=
                    '<p class="text-center text-gray-500">No hay exámenes finalizados.</p>';
            } else {
                examenesHtml += '<ul class="space-y-2">';
                response.forEach((examen) => {
                    examenesHtml += `
                    <li class="bg-white border border-gray-300 rounded-lg p-4 shadow-sm">
                        <div class="flex justify-between mb-2">
                            <span class="font-semibold text-gray-700">Tipo de Examen:</span>
                            <span class="text-gray-600">${examen.exam_type}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="font-semibold text-gray-700">Fecha:</span>
                            <span class="text-gray-600">${examen.exam_date}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold text-gray-700">Notas:</span>
                            <span class="text-gray-600">${examen.notes}</span>
                        </div>
                            <div class="flex justify-between">
                            <span class="font-semibold text-gray-700">Ver resultado</  span>
                            <span class="text-gray-600">                            <a href="${examen.pdf_file}" target="_blank">Resultado</a></span>
                        </div>
                    </li>
                    `;
                });
                examenesHtml += "</ul>";
            }
            examenesHtml += "</div>";

            // Muestra la alerta con los exámenes
            await Swal.fire({
                title: "Exámenes Finalizados",
                html: examenesHtml,
                confirmButtonText: "Cerrar",
                customClass: {
                    container: "custom-swal-container",
                    title: "text-lg font-bold",
                    htmlContainer: "text-sm",
                },
            });
        } catch (error) {
            Swal.fire({
                title: "Error",
                text: "No se pudieron cargar los exámenes.",
                icon: "error",
                confirmButtonText: "Cerrar",
            });
        }
    });
});
