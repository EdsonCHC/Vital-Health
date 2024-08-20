<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js', 'resources/css/loader.css', 'resources/js/preloader.js'])
</head>

<body class="w-full h-full">
    @include('templates.loader')
    <div class="w-full h-auto">
        @include('templates.header')
    </div>
    <main class="w-full h-auto lg:px-10 p-4 lg:rounded-md lg:mt-10 mt-16 mx-auto bg-white ">

        <section class="flex justify-between">
            <h2 class="font-bold text-center text-2xl text-vh-green">Menu de Citas</h2>
            <div class="lg:relative inline-block text-left">
                <div>
                    <button type="button"
                        class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-vh-green px-3 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-vh-green-medium"
                        id="menu-button" aria-expanded="false" aria-haspopup="true">
                        <h2>Citas Finalizadas</h2>
                    </button>

                </div>
            </div>
        </section>

        <section class="w-full h-auto my-4 font-bold mt-12">
            <div class="flex gap-8 flex-wrap justify-center lg:justify-start">
                @if(isset($citas) && $citas->isEmpty())
                    <p>No tienes citas programadas.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($citas as $cita)
                            <div class="bg-green-50 p-4 flex flex-col items-center rounded-lg shadow-md">
                                <div class="flex justify-end w-full mb-2">
                                    <div class="relative">
                                        <button
                                            class="h-8 w-8 flex items-center justify-center bg-gray-100 rounded-full focus:outline-none dropdown-toggle">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>
                                        <div class="hidden ml-2 mt-2 w-36 bg-white rounded-md shadow-lg dropdown-menu absolute">

                                            <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-gray-100 delete-btn"
                                                data-id="{{ $cita->id }}">
                                                <img src="{{ asset('storage/svg/trash.svg') }}"
                                                    class="w-4 h-4 inline-block mr-2" alt="">
                                                Cancelar
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-20 h-20 bg-green-300 rounded-full mb-4"></div>

                                <div class="text-center border border-gray-300 rounded-lg p-4 bg-white">
                                    <h2 class="text-xl font-semibold">Categoría:
                                        {{ $cita->category->nombre ?? 'No disponible' }}
                                    </h2>
                                    <h3 class="text-lg">Doctor: {{ $cita->doctor->name ?? 'No disponible' }}</h3>
                                    <button class="bg-green-200 rounded-md text-vh-green font-bold p-1 px-2 mt-2">En
                                        Proceso</button>
                                    <h4 class="mt-2">
                                        Hora:
                                        {{ !empty($cita->hour) ? (new DateTime($cita->hour))->format('h:i A') : 'No disponible' }}
                                    </h4>
                                    <h4>
                                        Fecha:
                                        {{ !empty($cita->date) ? (new DateTime($cita->date))->format('j \d\e F \d\e Y') : 'No disponible' }}
                                    </h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="flex justify-end w-full lg:my-16 py-4 px-4 ">
                    <div class="flex items-center justify-center mt-8">

                        <div class="lg:relative px-2 ">
                            <button id="customMenuButton"
                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 12a2 2 0 110-4 2 2 0 010 4zm6 0a2 2 0 110-4 2 2 0 010 4zm6 0a2 2 0 110-4 2 2 0 010 4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <button
                            class="h-8 w-8 flex items-center justify-center bg-gray-300 rounded-full focus:outline-none ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7">
                                </path>
                            </svg>
                        </button>
                        <div class="ml-2 flex items-center justify-center w-8 h-8 bg-white rounded-md shadow-md">
                            <span class="text-sm">1</span>
                        </div>
                        <button
                            class="h-8 w-8 flex items-center justify-center bg-gray-300 rounded-full focus:outline-none ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                    </div>
        </section>
    </main>

    <div class="w-full h-auto">
        @include('templates.chat_ia')
    </div>
    <div class="w-full h-auto">
        @include('templates.footer_two')
    </div>
</body>

</html>