<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js', 'resources/css/loader.css', 'resources/js/preloader.js'])
    <style>
        .transition-max-height {
            transition: max-height 0.3s ease-out;
        }
        .rotate-90 {
            transform: rotate(90deg);
        }
        footer {
            margin-top: 2rem; /* Ajusta el valor según sea necesario */
        }
    </style>
</head>
<body class="font-sans bg-gray-200 flex flex-col min-h-screen">
    @include('templates.loader')

    <header class="w-full bg-white shadow-md">
        @include('templates.header')
    </header>

    <main class="flex-1 w-full lg:px-8 p-4 lg:rounded-md lg:mt-8 mt-12  lg:mb-60 mx-auto bg-white shadow-lg mb-16">
        <section class="flex justify-between items-center mb-8">
            <h2 class="font-bold text-center text-2xl text-gray-800">Menú de Citas</h2>
            <div class="lg:relative inline-block text-left">
                <button type="button"
                    class="inline-flex items-center justify-center gap-x-1.5 rounded-md bg-green-600 px-4 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-green-500"
                    id="menu-button" aria-expanded="false" aria-haspopup="true">
                    <h2>Citas Finalizadas</h2>
                </button>
            </div>
        </section>

        <section class="w-full h-auto my-4">
            <div class="flex gap-8 flex-wrap justify-center lg:justify-start">
                @if(isset($citas) && $citas->isEmpty())
                    <p class="text-gray-700">No tienes citas programadas.</p>
                @else
                    <div class="w-full space-y-4">
                        @foreach ($citas as $cita)
                            <article class="bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden">
                                <div class="p-4 bg-gray-100 flex justify-between items-center cursor-pointer transition-colors hover:bg-gray-200"
                                     onclick="toggleContent('{{ $cita->id }}')">
                                    <h2 class="text-xl font-semibold text-gray-800">Categoría: {{ $cita->category->nombre ?? 'No disponible' }}</h2>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 transition-transform" id="icon-{{ $cita->id }}" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                                <div id="content-{{ $cita->id }}" class="card-content max-h-0 overflow-hidden transition-max-height">
                                    <div class="p-4 text-start">
                                        <h3 class="text-lg text-gray-800 mb-2">Doctor: {{ $cita->doctor->name ?? 'No disponible' }}</h3>
                                        <button class="bg-yellow-300 text-yellow-700 rounded-md font-bold py-1 px-3 mt-2">En Proceso</button>
                                        <h4 class="mt-2 text-gray-600">Hora: {{ !empty($cita->hour) ? (new DateTime($cita->hour))->format('h:i A') : 'No disponible' }}</h4>
                                        <h4 class="text-gray-600">Fecha: {{ !empty($cita->date) ? (new DateTime($cita->date))->format('j \d\e F \d\e Y') : 'No disponible' }}</h4>
                                        <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-100 mt-4 rounded-md delete-btn" data-id="{{ $cita->id }}">
                                            <img src="{{ asset('storage/svg/trash.svg') }}" class="w-4 h-4 inline-block mr-2" alt="Eliminar"> Eliminar
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </main>

    <footer class="w-full bg-white  shadow-md">
        @include('templates.chat_ia')
        @include('templates.footer_two')
    </footer>

    <script>
        function toggleContent(id) {
            const content = document.getElementById('content-' + id);
            const icon = document.getElementById('icon-' + id);
            if (content.classList.contains('max-h-0')) {
                content.classList.remove('max-h-0');
                content.classList.add('max-h-screen');
                icon.classList.add('rotate-90');
            } else {
                content.classList.remove('max-h-screen');
                content.classList.add('max-h-0');
                icon.classList.remove('rotate-90');
            }
        }
    </script>
</body>
</html>
