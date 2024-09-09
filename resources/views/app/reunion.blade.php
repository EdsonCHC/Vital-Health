<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reuniones</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js', 'resources/css/loader.css', 'resources/js/preloader.js', 'resources/js/videollamada.js'])
</head>

<body class="w-full h-full bg-gray-100">
    @include('templates.loader')

    <div class="w-full h-auto">
        @include('templates.header')
    </div>

    <main class="w-full max-w-6xl mx-auto mb-24 px-4 py-6 lg:px-10 lg:py-8">
        <section class="mb-6">
            <h2 class="text-2xl font-bold text-center">Mis Reuniones</h2>
        </section>

        <section class="w-full mb-12">
            <div class="flex flex-wrap gap-8 justify-center lg:justify-start">
                @foreach ($videollamadas as $videollamada)
                    <div
                        class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pb-10">
                            <div
                                class="w-28 h-28 mt-10 bg-gray-500 text- rounded-full flex flex-col items-center justify-center mb-2">
                                <span class="text-lg font-semibold">
                                    {{ \Carbon\Carbon::parse($videollamada->date)->format('d M') }}
                                </span>
                                <span class="text-lg font-semibold">
                                    {{ \Carbon\Carbon::parse($videollamada->hour)->format('h:i A') }} </span>
                            </div>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                                {{ $videollamada->patient->name }}</h5>
                            <span class="text-lg text-gray-500 dark:text-gray-400">Sala:
                                {{ $videollamada->room_name }}</span>
                            <span class="text-lg text-gray-500 dark:text-gray-400">Doctor:
                                {{ $videollamada->doctor->name }} {{ $videollamada->doctor->lastName }}</span>
                            <div class="flex mt-4 md:mt-6">
                                <button data-roomName="{{ $videollamada->room_name }}"
                                    class="joinRoomButtonUser inline-flex items-center px-4 py-2 text-lg font-medium text-center text-black bg-blue-800 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-white dark:hover:bg-gray-600 duration-100 dark:focus:ring-blue-800">
                                    Unirse
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    <div class="w-full bg-white shadow-md">
        @include('templates.chat_ia')
    </div>

    <div class="w-full bg-white shadow-md">
        @include('templates.footer')
    </div>
</body>

</html>
