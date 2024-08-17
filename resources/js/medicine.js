import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    document
        .querySelector(".add-medicine")
        .addEventListener("click", function () {
            // Mostrar la alerta para crear un nuevo medicamento
            Swal.fire({
                title: "Registrar Medicamento",
                html: `
                        <form id="medicineForm">
                            <input id="name" class="swal2-input" placeholder="Nombre" type="text" required>
                            <input id="batch_number" class="swal2-input" placeholder="Número de Lote" type="text" required>
                            <input id="quantity" class="swal2-input" placeholder="Cantidad" type="number" required>
                            <input id="expiration_date" class="swal2-input" placeholder="Fecha de Expiración" type="date" required>
                            <textarea id="description" class="swal2-textarea" placeholder="Descripción (opcional)"></textarea>
                            <input id="doctor_id" class="swal2-input" placeholder="ID del Doctor" type="number" required>
                        </form>
                    `,
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: "Registrar",
                preConfirm: () => {
                    const name = document.getElementById("name").value;
                    const batch_number =
                        document.getElementById("batch_number").value;
                    const quantity = document.getElementById("quantity").value;
                    const expiration_date =
                        document.getElementById("expiration_date").value;
                    const description =
                        document.getElementById("description").value;
                    const doctor_id =
                        document.getElementById("doctor_id").value;

                    if (
                        !name ||
                        !batch_number ||
                        !quantity ||
                        !expiration_date ||
                        !doctor_id
                    ) {
                        Swal.showValidationMessage(
                            "Por favor completa todos los campos obligatorios"
                        );
                        return null;
                    }

                    return {
                        name,
                        batch_number,
                        quantity,
                        expiration_date,
                        description,
                        doctor_id,
                    };
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/medicine",
                        method: "POST",
                        data: result.value,
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        success: function (response) {
                            Swal.fire("¡Éxito!", response.message, "success");
                        },
                        error: function (xhr) {
                            let errorMessage =
                                "No se pudo registrar el medicamento.";
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage += ` Error: ${xhr.responseJSON.message}`;
                            }
                            Swal.fire("Error", errorMessage, "error");
                        },
                    });
                }
            });
        });
    document
        .querySelector(".up-medicine")
        .addEventListener("click", function () {
            // Mostrar la alerta para actualizar un medicamento
            Swal.fire({
                title: "Actualizar Medicamento",
                html: `
                        <form id="updateMedicineForm">
                            <input id="update_id" class="swal2-input" placeholder="ID del Medicamento" type="number" required>
                            <input id="update_name" class="swal2-input" placeholder="Nombre" type="text" required>
                            <input id="update_batch_number" class="swal2-input" placeholder="Número de Lote" type="text" required>
                            <input id="update_quantity" class="swal2-input" placeholder="Cantidad" type="number" required>
                            <input id="update_expiration_date" class="swal2-input" placeholder="Fecha de Expiración" type="date" required>
                            <textarea id="update_description" class="swal2-textarea" placeholder="Descripción (opcional)"></textarea>
                            <input id="update_doctor_id" class="swal2-input" placeholder="ID del Doctor" type="number" required>
                        </form>
                    `,
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: "Actualizar",
                preConfirm: () => {
                    const id = document.getElementById("update_id").value;
                    const name = document.getElementById("update_name").value;
                    const batch_number = document.getElementById(
                        "update_batch_number"
                    ).value;
                    const quantity =
                        document.getElementById("update_quantity").value;
                    const expiration_date = document.getElementById(
                        "update_expiration_date"
                    ).value;
                    const description =
                        document.getElementById("update_description").value;
                    const doctor_id =
                        document.getElementById("update_doctor_id").value;

                    if (
                        !id ||
                        !name ||
                        !batch_number ||
                        !quantity ||
                        !expiration_date ||
                        !doctor_id
                    ) {
                        Swal.showValidationMessage(
                            "Por favor completa todos los campos obligatorios"
                        );
                        return null;
                    }

                    return {
                        id,
                        name,
                        batch_number,
                        quantity,
                        expiration_date,
                        description,
                        doctor_id,
                    };
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/medicine/${result.value.id}`,
                        method: "PUT",
                        data: result.value,
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        success: function (response) {
                            Swal.fire("¡Éxito!", response.message, "success");
                        },
                        error: function (xhr) {
                            let errorMessage =
                                "No se pudo actualizar el medicamento.";
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage += ` Error: ${xhr.responseJSON.message}`;
                            }
                            Swal.fire("Error", errorMessage, "error");
                        },
                    });
                }
            });
        });
});
