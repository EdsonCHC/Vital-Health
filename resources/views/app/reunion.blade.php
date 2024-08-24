<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reuniones</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js', 'resources/css/loader.css', 'resources/js/preloader.js', 'resources/js/videollamada.js'])
</head>

<body class="w-full h-full bg-gray-100">
    @include('templates.loader')

    <div class="w-full bg-white shadow-md">
        @include('templates.header')
    </div>

    <main class="w-full max-w-6xl mx-auto px-4 py-6 lg:px-10 lg:py-8">
        <section class="mb-6">
            <h2 class="text-2xl font-bold text-vh-green text-center">Mis Reuniones</h2>
        </section>

        <section class="w-full mb-12">
            <div class="flex flex-wrap gap-8 justify-center lg:justify-start">
                @foreach ($videollamadas as $videollamada)
                    <div
                        class="w-full lg:w-80 bg-vh-gray-light rounded-lg shadow-md flex flex-col lg:flex-row mb-6 lg:mb-0">
                        <div class="p-4 flex flex-col items-center lg:w-1/3">
                            <div
                                class="w-20 h-20 bg-vh-green text-white rounded-full flex items-center justify-center mb-2">
                                <span class="text-lg font-semibold">
                                    {{ \Carbon\Carbon::parse($videollamada->date)->format('d M') }}
                                </span>
                            </div>
                            <div class="w-20 h-6 bg-vh-green-light rounded-md flex items-center justify-center">
                                <button data-roomName="{{ $videollamada->room_name }}"
                                    class="joinRoomButtonUser font-semibold transition duration-300">
                                    Unirse
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center p-4 lg:w-2/3">
                            <h3 class="text-xl font-bold">Reunión</h3>
                            <p class="text-lg">{{ $videollamada->room_name }}</p>
                            <p class="text-emerald-500 text-lg">Paciente: {{ $videollamada->patient->name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <div class="flex justify-center items-center space-x-2">
            <button id="customMenuButton"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4 12a2 2 0 110-4 2 2 0 010 4zm6 0a2 2 0 110-4 2 2 0 010 4zm6 0a2 2 0 110-4 2 2 0 010 4z"
                        clip-rule="evenodd" />
                </svg>
            </button>

            <button class="h-8 w-8 flex items-center justify-center bg-gray-300 rounded-full focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <div class="flex items-center justify-center w-8 h-8 bg-white rounded-md shadow-md">
                <span class="text-sm">1</span>
            </div>

            <button class="h-8 w-8 flex items-center justify-center bg-gray-300 rounded-full focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </main>

    <div class="w-full bg-white shadow-md">
        @include('templates.chat_ia')
    </div>

    <div class="w-full bg-white shadow-md">
        @include('templates.footer_two')
    </div>
</body>

</html>
