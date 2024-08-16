import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    // Token CSRF
    const _token = $("#_token").val();

    // Manejar el clic en el botón de cerrar sesión
    $("#log_out").click((e) => {
        e.preventDefault();

        // Confirmación de SweetAlert
        Swal.fire({
            title: "¿Desea cerrar la sesión?",
            showCancelButton: true,
            showConfirmButton: true,
            icon: "question",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Será enviado al inicio en breve",
                    icon: "success",
                    timer: 3000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                }).then(() => {
                    // Realizar la solicitud AJAX para cerrar sesión
                    $.ajax({
                        url: "/doctor/logout", // Endpoint para cerrar sesión del doctor
                        type: "POST",
                        data: {
                            _token: _token,
                        },
                        success(response) {
                            if (response.success) {
                                window.location.href = response.url;
                            }
                        },
                        error(response) {
                            console.log("Ups, algo ha salido mal :v");
                        },
                    });
                });
            }
        });
    });

    // Manejar el clic en el botón de opciones
    $(".option-button").click(function () {
        showOptionsAlert();
    });
});

// Función para mostrar la alerta de opciones
function showOptionsAlert() {
    Swal.fire({
        title: "Selecciona una opción",
        showConfirmButton: false,
        icon: "info",
        html: `
            <div class="flex justify-center content-center items-center gap-10">
                <button id="option-create" class="bg-green-400 text-white rounded px-4 py-2">Crear</button>
                <button id="option-edit" class="bg-blue-400 text-white rounded px-4 py-2">Editar</button>
                <button id="option-delete" class="bg-red-600 text-white rounded px-4 py-2">Eliminar</button>
            </div>
        `,
    });

    // Manejo de clics en botones adicionales
    $(document).on("click", "#option-create", function () {
        Swal.fire({
            title: "Crear Nuevo Examen",
            html: `
                <form id="create-form" style="display: flex; flex-direction: column; gap: 10px;">
                    <input type="text" id="create-field1" class="swal2-input" placeholder="Tipo de Examen" style="border-radius: 5px; padding: 10px;">
                    <input type="date" id="create-field2" class="swal2-input" placeholder="Fecha" style="border-radius: 5px; padding: 10px;">
                    <textarea id="create-field3" class="swal2-textarea" placeholder="Notas" style="border-radius: 5px; padding: 10px; height: 100px;"></textarea>
                </form>
            `,
            confirmButtonText: "Guardar",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            preConfirm: () => {
                const field1 =
                    Swal.getPopup().querySelector("#create-field1").value;
                const field2 =
                    Swal.getPopup().querySelector("#create-field2").value;
                const field3 =
                    Swal.getPopup().querySelector("#create-field3").value;
                if (!field1 || !field2 || !field3) {
                    Swal.showValidationMessage(
                        "Por favor, completa todos los campos"
                    );
                }
                return { field1: field1, field2: field2, field3: field3 };
            },
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Nueva entrada creada",
                    text: `Campo 1: ${result.value.field1}, Campo 2: ${result.value.field2}, Notas: ${result.value.field3}`,
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                });
            }
        });
    });

    $(document).on("click", "#option-edit", function () {
        Swal.fire({
            title: "Editar Examen",
            html: `
                <form id="edit-form" style="display: flex; flex-direction: column; gap: 10px;">
                    <input type="text" id="edit-field1" class="swal2-input" placeholder="Tipo de Examen" style="border-radius: 5px; padding: 10px;">
                    <input type="date" id="edit-field2" class="swal2-input" placeholder="Fecha" style="border-radius: 5px; padding: 10px;">
                    <textarea id="edit-field3" class="swal2-textarea" placeholder="Notas" style="border-radius: 5px; padding: 10px; height: 100px;"></textarea>
                </form>
            `,
            confirmButtonText: "Guardar",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            preConfirm: () => {
                const field1 =
                    Swal.getPopup().querySelector("#edit-field1").value;
                const field2 =
                    Swal.getPopup().querySelector("#edit-field2").value;
                const field3 =
                    Swal.getPopup().querySelector("#edit-field3").value;
                if (!field1 || !field2 || !field3) {
                    Swal.showValidationMessage(
                        "Por favor, completa todos los campos"
                    );
                }
                return { field1: field1, field2: field2, field3: field3 };
            },
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Entrada editada",
                    text: `Campo 1: ${result.value.field1}, Campo 2: ${result.value.field2}, Notas: ${result.value.field3}`,
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                });
            }
        });
    });

    $(document).on("click", "#option-delete", function () {
        Swal.fire({
            title: "¿Estás seguro de que quieres eliminar los datos?",
            text: "Esta acción no se puede deshacer",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                // Aquí puedes agregar lógica para eliminar los datos del formulario
                $("#create-form").find("input[type=text], textarea").val(""); // Limpia los campos del formulario de creación
                $("#edit-form").find("input[type=text], textarea").val(""); // Limpia los campos del formulario de edición

                Swal.fire({
                    title: "Datos eliminados",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                });
            }
        });
    });
}
