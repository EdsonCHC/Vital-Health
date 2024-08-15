import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $("#new-appointment-btn").click((e) => {
        e.preventDefault();
        showAppointmentTable();
    });

    async function showAppointmentTable() {
        const nombres = [
            "Dr. Juan Pérez",
            "Dr. Ana Gómez",
            "Dr. Luis Martínez",
            "Dr. Carmen Rodríguez",
        ];

        const selectHTML = nombres
            .map((nombre) => `<option value="${nombre}">${nombre}</option>`)
            .join("");

        Swal.fire({
            title: "Nueva Solicitud de Cita",
            html: `
                <div class="table-container">
                    <div class="grid grid-cols-5 gap-2 bg-vh-alice-blue rounded-md px-4 py-3 mt-4 lg:my-5">
                        <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">#</p>
                        <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">Paciente</p>
                        <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">Hora</p>
                        <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">Fecha</p>
                        <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">Acciones</p>
                    </div>
                    <!-- Cuerpo de la tabla -->
                    <div class="grid grid-cols-5 gap-2 bg-vh-green-light rounded-md p-4 my-4">
                        <p class="font-bold text-sm lg:text-lg text-center">kj</p>
                        <p class="font-bold text-sm lg:text-lg text-center">kj</p>
                        <p class="font-bold text-sm lg:text-lg text-center">kj</p>
                        <p class="font-bold text-sm lg:text-lg text-center">kj</p>
                        <div class="flex justify-around col-span-5 lg:col-span-1 lg:ml-auto mt-2 lg:mt-0">
                            <button class="assign_appointment">
                                <img src="/storage/svg/check-icon.svg" alt="accept_icon" class="w-8 h-8 lg:w-10 lg:h-10 p-2 bg-white shadow-xl rounded">
                            </button>
                            <button>
                                <a href="#">
                                    <img src="/storage/svg/trash-icon.svg" alt="delete_icon" class="w-8 h-8 lg:w-10 lg:h-10 p-2 bg-white shadow-xl rounded">
                                </a>
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-5 gap-2 bg-vh-green-light rounded-md p-4 my-4">
                        <p class="font-bold text-sm lg:text-lg text-center">kj</p>
                        <p class="font-bold text-sm lg:text-lg text-center">kj</p>
                        <p class="font-bold text-sm lg:text-lg text-center">kj</p>
                        <p class="font-bold text-sm lg:text-lg text-center">kj</p>
                        <div class="flex justify-around col-span-5 lg:col-span-1 lg:ml-auto mt-2 lg:mt-0">
                            <button class="assign_appointment">
                                <img src="/storage/svg/check-icon.svg" alt="accept_icon" class="w-8 h-8 lg:w-10 lg:h-10 p-2 bg-white shadow-xl rounded">
                            </button>
                            <button>
                                <a href="#">
                                    <img src="/storage/svg/trash-icon.svg" alt="delete_icon" class="w-8 h-8 lg:w-10 lg:h-10 p-2 bg-white shadow-xl rounded">
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            `,
            customClass: {
                popup: "border-solid border-3 border-vh-green w-11/12 max-w-4xl",
                title: "text-2xl font-bold text-gray-800 mb-4",
                htmlContainer: "py-4",
                confirmButton: "absolute bottom-2 right-2",
                content: "mb-6", // Adjusted margin at the bottom
                // Add any additional styles to the table container here if needed
            },
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            confirmButtonColor: "#166534",
            didOpen: () => {
                // Attach click event to dynamically created buttons
                $(".assign_appointment").click(() => {
                    handleAssignAppointmentClick();
                });

                // Add event listener for the close button
                $(".swal2-confirm").click(() => {
                    Swal.close();
                });
            },
        });
    }

    async function handleAssignAppointmentClick() {
        const nombres = [
            "Dr. Juan Pérez",
            "Dr. Ana Gómez",
            "Dr. Luis Martínez",
            "Dr. Carmen Rodríguez",
        ];

        const selectHTML = nombres
            .map((nombre) => `<option value="${nombre}">${nombre}</option>`)
            .join("");

        const { value: result, isConfirmed } = await Swal.fire({
            title: "Seleccione al Doctor",
            html: `
                <h2 class="text-gray-700 text-xl font-bold mb-6">Seleccione al Doctor</h2>
                <select id="doctorSelect" class="swal2-input appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    ${selectHTML}
                </select>
            `,
            customClass: {
                popup: "border-solid border-3 border-vh-green w-11/12 max-w-4xl",
                title: "text-2xl font-bold text-gray-800 mb-4",
                htmlContainer: "py-4",
            },
            showConfirmButton: true,
            confirmButtonText: "Confirmar",
            confirmButtonColor: "#166534",
            showCancelButton: true,
            cancelButtonText: "Retroceder",
            preConfirm: () => {
                return document.getElementById("doctorSelect").value;
            },
        });

        if (isConfirmed) {
            const selectedDoctor = result;
            Swal.fire({
                position: "bottom-end",
                title: "Cita Confirmada",
                html: `
                    <div class="flex text-center justify-around">
                        <div>
                            <p class="text-gray-700 text-lg font-bold mb-6">Doctor Asignado</p>
                            <p class="text-gray-500 text-base font-bold mb-6">${selectedDoctor}</p>
                        </div>
                    </div>
                `,
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
        } else {
            // Show the first alert again if "Retroceder" is clicked
            showAppointmentTable();
        }
    }
});
