import Swal from "sweetalert2";
import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $("#history_staff").click(async (e) => {
        e.preventDefault();
        await showTableAlert();
    });

    async function showTableAlert() {
        return new Promise((resolve) => {
            Swal.fire({
                title: "Historial",
                html: `
                    <table border="1" style="width:100%">
                        <thead>
                            <tr>
                                <th>Citas</th>
                                <th>Modalidad</th>
                                <th>Usuario</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#-----</td>
                                <td>Virtual</td>
                                <td>Alvarenga</td>
                                <td>
                                    <button target="_self" class="assign_appointment">
                                        <a href="#">
                                            <img src="/storage/svg/printer-icon.svg" alt="noti_icon"
                                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                                        </a>
                                    </button>
                                    <button target="_self" class="assign_appointment">
                                        <a href="#">
                                            <img src="/storage/svg/option-icon.svg" alt="noti_icon"
                                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                                        </a>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#-----</td>
                                <td>Virtual</td>
                                <td>Alvarenga</td>
                                <td>
                                    <button target="_self" class="assign_appointment">
                                        <a href="#">
                                            <img src="/storage/svg/printer-icon.svg" alt="noti_icon"
                                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                                        </a>
                                    </button>
                                    <button target="_self" class="assign_appointment">
                                        <a href="#">
                                            <img src="/storage/svg/option-icon.svg" alt="noti_icon"
                                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                                        </a>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#-----</td>
                                <td>Virtual</td>
                                <td>Alvarenga</td>
                                <td>
                                    <button target="_self" class="assign_appointment">
                                        <a href="#">
                                            <img src="/storage/svg/printer-icon.svg" alt="noti_icon"
                                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                                        </a>
                                    </button>
                                    <button target="_self" class="assign_appointment">
                                        <a href="#">
                                            <img src="/storage/svg/option-icon.svg" alt="noti_icon"
                                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                                        </a>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                `,
                confirmButtonText: "OK",
                onClose: resolve,
            });
        });
    }
});
