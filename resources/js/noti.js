document
    .getElementById("notification-button")
    .addEventListener("click", function (event) {
        event.preventDefault();
        const container = document.getElementById("notification-container");
        container.classList.toggle("hidden");
    });

// Opcional: Cerrar el contenedor al hacer clic fuera de él
document.addEventListener("click", function (event) {
    const container = document.getElementById("notification-container");
    const button = document.getElementById("notification-button");
    if (!container.contains(event.target) && !button.contains(event.target)) {
        container.classList.add("hidden");
    }
});
