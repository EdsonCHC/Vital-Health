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
    <script defer src="https://meet.jit.si/external_api.js"></script>
</head>

<body class="bg-gray-100">
    <section class="text-black flex flex-col h-screen">
        <header class="flex items-center justify-between p-4">
            <div class="text-lg font-semibold">Videollamada</div>
            <div class="text-lg font-semibold">Sala: </div>
            <a href="/"
                class="p-2 rounded-full  flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M17 16l-4-4m0 0l4-4m-4 4h10m-6-4v1a3 3 0 013 3h4a3 3 0 01-3 3v1" />
                </svg>
            </a>
        </header>
        
        <div id="meet" class="flex-grow"></div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const roomName = "{{ $roomName }}";
                const domain = "meet.jit.si";
                const options = {
                    roomName: roomName,
                    width: "100%",
                    height: "100%",
                    parentNode: document.querySelector("#meet"),
                };
                const api = new JitsiMeetExternalAPI(domain, options);
            });
        </script>
    </section>
</body>

</html>
