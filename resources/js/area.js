document.getElementById("filtro").addEventListener("change", function () {
    var selectedOption = this.options[this.selectedIndex].text;
    document.getElementById("filtroSeleccionado").textContent = selectedOption;
});

document.getElementById("filtro1").addEventListener("change", function () {
    var selectedOption = this.options[this.selectedIndex].text;
    document.getElementById("filtroSeleccionado1").textContent = selectedOption;
});