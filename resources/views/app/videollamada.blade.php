<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Videollamada</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/loader.css', 'resources/js/preloader.js', 'resources/js/scroll.js'])
    <script src="https://meet.jit.si/external_api.js"></script>
</head>

<body class="bg-gray-100">
    <section class="text-black flex flex-col h-screen">
        <div class="flex flex-col h-full">
            <header class="flex items-center justify-between p-4">
                <div class="text-lg font-semibold">Videollamada</div>
                <div class="flex items-center space-x-4">
                    <a href="/" class="p-2 mx-auto flex justify-center items-center content-center rounded-full bg-green-800 hover:bg-green-500 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l-4-4m0 0l4-4m-4 4h10m-6-4v1a3 3 0 013 3h4a3 3 0 01-3 3v1" />
                        </svg>
                    </a>
                </div>
            </header>
            <div id="meet" style="height: 800px;"></div>
            <script>
                const roomName = "{{ $roomName }}";
                const domain = "meet.jit.si";
                const options = {
                    roomName: roomName,
                    width: "100%",
                    height: "100%", // Ajusta la altura al 100% del contenedor
                    parentNode: document.querySelector("#meet"),
                };
                const api = new JitsiMeetExternalAPI(domain, options);
            </script>

        </div>
    </section>


</body>

</html>
