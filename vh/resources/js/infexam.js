$(document).ready(function () {
    $("#examen-sangre").hover(function () {
        mostrarTextoHover('Examen de sangre', 'Texto Lorem ipsum para Examen de sangre.');
    });

    $("#examen-orina").hover(function () {
        mostrarTextoHover('Examen de orina', 'Texto Lorem ipsum para Examen de orina.');
    });

    $("#peso-corporal").hover(function () {
        mostrarTextoHover('Peso Corporal', 'Texto Lorem ipsum para Peso Corporal.');
    });
});

// Función para mostrar texto en hover
function mostrarTextoHover(titulo, texto) {
    Swal.fire({
        title: titulo,
        html: texto,
        showConfirmButton: false,
        customClass: {
            container: "custom-swal-container",
        },
    });
}
