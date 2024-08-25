import Swal from "sweetalert2";
import $ from "jquery";
window.$ = $;

$(document).ready(function () {
    // Set up CSRF token for jQuery
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Handle delete button click
    $(".delete-order").on("click", function () {
        const recetaId = $(this).data("id");

        Swal.fire({
            title: "¿Estás seguro?",
            text: "¡No podrás recuperar este pedido!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/recetas/${recetaId}`,
                    type: "DELETE",
                    success: function () {
                        Swal.fire(
                            "Eliminado!",
                            "El pedido ha sido eliminado.",
                            "success"
                        ).then(() => {
                            location.reload(); // Reload the page to update the view
                        });
                    },
                    error: function () {
                        Swal.fire(
                            "Error!",
                            "Hubo un problema al eliminar el pedido.",
                            "error"
                        );
                    },
                });
            }
        });
    });
});
