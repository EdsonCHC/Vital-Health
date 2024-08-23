import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    // Datos ficticios para los signos vitales
    let vitals = [
        { id: 1, type: "pressure", value: "120/80", date: "2024-08-20" },
        { id: 2, type: "temperature", value: "37°C", date: "2024-08-21" }
    ];

    // Función para mostrar signos vitales en una alerta
    function showVitalsAlert() {
        let vitalsHtml = '';
        if (vitals.length > 0) {
            vitals.forEach((vital) => {
                vitalsHtml += `
                    <div class="vital-item p-4 border-b border-gray-200" data-vital-id="${vital.id}">
                        <h4 class="text-lg font-semibold">${vital.type === "pressure" ? "Presión" : "Temperatura"}</h4>
                        <p>Valor: ${vital.value}</p>
                        <p>Fecha: ${vital.date}</p>
                        <div class="flex gap-2 mt-2">
                            <button class="bg-red-600 text-white rounded px-4 py-2 w-32 btn-delete-vital">Eliminar</button>
                        </div>
                    </div>
                `;
            });
        } else {
            vitalsHtml = "<p>No hay signos vitales registrados.</p>";
        }

        Swal.fire({
            title: "Lista de Signos Vitales",
            html: vitalsHtml,
            showConfirmButton: false,
            showCancelButton: false,
            footer: '<button id="add-new-vital" class="btn btn-primary">Agregar Nuevo Signo Vital</button>'
        });
    }

    // Mostrar la lista de signos vitales al hacer clic en el botón #add-vitals
    $(document).on("click", "#add-vitals", function () {
        showVitalsAlert();
    });

    // Mostrar el formulario para agregar signos vitales al hacer clic en el botón #add-new-vital
    $(document).on("click", "#add-new-vital", function () {
        Swal.fire({
            title: "Agregar Signos Vitales",
            html: `
                <form id="vitals-form">
                    <div class="mb-4">
                        <label for="vital-type" class="block text-sm font-medium text-gray-700">Tipo de Signo Vital</label>
                        <select id="vital-type" class="form-select">
                            <option value="" disabled selected>Selecciona un tipo</option>
                            <option value="pressure">Presión</option>
                            <option value="temperature">Temperatura</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="vital-value" class="block text-sm font-medium text-gray-700">Valor</label>
                        <input type="text" id="vital-value" class="form-input" placeholder="Introduce el valor">
                    </div>
                </form>
            `,
            confirmButtonText: "Guardar",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            preConfirm: () => {
                const vitalType = document.querySelector("#vital-type").value;
                const vitalValue = document.querySelector("#vital-value").value;

                if (!vitalType || !vitalValue) {
                    Swal.showValidationMessage("Por favor, completa todos los campos");
                    return false;
                }

                return {
                    type: vitalType,
                    value: vitalValue
                };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Agregar el nuevo signo vital a los datos ficticios
                const newVital = {
                    id: vitals.length + 1, // Simple incremento para ID
                    type: result.value.type,
                    value: result.value.value,
                    date: new Date().toISOString().split('T')[0] // Fecha actual
                };
                vitals.push(newVital);

                Swal.fire({
                    title: "Signo Vital Agregado",
                    text: `Tipo: ${result.value.type}\nValor: ${result.value.value}`,
                    icon: "success"
                });

                showVitalsAlert(); // Actualizar la lista de signos vitales
            }
        });
    });

    // Manejar la eliminación de signos vitales
    $(document).on("click", ".btn-delete-vital", function () {
        const vitalId = $(this).closest(".vital-item").data("vital-id");

        Swal.fire({
            title: "Eliminar Signo Vital",
            text: "¿Estás seguro de que deseas eliminar este signo vital?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                // Eliminar el signo vital de los datos ficticios
                vitals = vitals.filter(vital => vital.id !== vitalId);

                Swal.fire("Signo vital eliminado correctamente", "", "success");
                showVitalsAlert(); // Actualizar la lista de signos vitales
            }
        });
    });
});


