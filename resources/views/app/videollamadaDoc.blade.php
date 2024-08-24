<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Videollamada Doctor</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/loader.css'])
    <script src="https://meet.jit.si/external_api.js"></script>
</head>

<body class="bg-gray-100 font-sans">
    <section class="flex flex-col h-screen">
        <!-- Header -->
        <header class="bg-white shadow-md p-4 flex items-center justify-between">
            <div class="text-xl font-semibold text-gray-800">
                Videollamada
            </div>

            <div class="text-lg font-semibold text-gray-800">
                Sala: <span class="font-bold text-vh-green">{{ $roomName }}</span>
            </div>

            <a href="/doctor"
                class="p-2 rounded-full flex items-center justify-center bg-blue-500 hover:bg-blue-600 transition-colors duration-300 ease-in-out">
                <img src="{{ asset('storage/svg/arrow.svg') }}" alt="Ir al doctor"
                    class="w-8 h-8 p-1 bg-white rounded-full shadow-md">
            </a>
        </header>
        
        <!-- Video Container -->
        <div id="meet" class="flex-grow bg-black"></div>

        <!-- Script -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const roomName = "{{ $roomName }}";

                if (!roomName) {
                    console.error("El nombre de la sala es inválido o no se proporcionó.");
                    return;
                }

                const domain = "meet.jit.si";
                const options = {
                    roomName: roomName,
                    width: "100%",
                    height: "100%",
                    parentNode: document.querySelector("#meet"),
                };

                try {
                    const api = new JitsiMeetExternalAPI(domain, options);
                } catch (error) {
                    console.error("No se pudo cargar la API de Jitsi:", error);
                }
            });
        </script>
    </section>
</body>

</html>
