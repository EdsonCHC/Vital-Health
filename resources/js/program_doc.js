document.getElementById("show_llamadas").addEventListener("click", function () {
    // Simulación de datos de llamadas (reemplaza con tus datos reales)
    const llamadas = [
        { date: "2023-05-27", roomName: "Sala1", patientName: "Juan José" },
        // Agrega más llamadas aquí...
    ];

    // Obtén el contenedor donde se mostrarán las llamadas
    const llamadasContainer = document.getElementById("llamadas-container");

    // Limpia el contenedor antes de agregar las llamadas
    llamadasContainer.innerHTML = "";

    // Itera sobre las llamadas y crea elementos para mostrarlas
    llamadas.forEach((llamada) => {
        const llamadaElement = document.createElement("div");
        llamadaElement.className =
            "w-76 h-36 m-4 bg-vh-gray-light rounded-lg flex";
        llamadaElement.innerHTML = `
                <!-- Detalles de la llamada -->
                <div class="m-4">
                    <span class="flex justify-center font-semibold text-white text-lg">
    {{ \Carbon\Carbon::parse($videollamada->date)->format('d M') }}
</span>

                    <div class="w-20 h-6 content-center items-center bg-vh-green-light rounded-md">
                        <a class="flex justify-center hover:bg-white font-semibold transition duration-300"
                            href="/videollamada?roomName=${llamada.roomName}">
                            Unirse
                        </a>
                    </div>
                </div>
                <!-- Detalles del paciente -->
                <div class="flex flex-col my-auto">
                    <h3 class="font-bold text-xl">Reunión</h3>
                    <p class="text-emerald-500 text-lg">Paciente: ${llamada.patientName}</p>
                </div>
                <!-- Botón para eliminar -->
                <div class="ml-auto">
                    <button class="m-4 bg-white rounded-md shadow-lg">
                        <img src="/storage/svg/trash.svg" alt="chat" class="w-12 p-1">
                    </button>
                </div>
            `;
        llamadasContainer.appendChild(llamadaElement);
    });
});
