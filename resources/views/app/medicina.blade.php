<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicina</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/loader.css', 'resources/js/preloader.js', 'resources/js/scroll.js'])
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex-grow: 1;
        }

        .footer-container {
            margin-top: auto;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen overflow-x-hidden">
    @include('templates.loader')

    <div class="w-full h-auto">
        @include('templates.header')
    </div>

    <main class="flex-grow">
        <div class="w-full h-auto flex flex-col md:items-start items-center p-4 gap-2 lg:px-16">
            <h2 class="font-bold text-xl text-vh-green lg:font-bold lg:text-3xl">Medicamento Asignado</h2>
        </div>
        <div class="w-full h-auto flex">
            <div class="bg-cover w-full flex justify-center items-center">
                <div class="w-full bg-white lg:p-5 p-2 bg-opacity-40">
                    <div class="w-12/12 mx-auto rounded-2xl bg-white lg:p-5 p-2">
                        <div>
                            @if ($recetas->isEmpty())
                                <p class="text-center text-gray-500">No tienes recetas disponibles.</p>
                            @else
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
                                    @foreach ($recetas as $receta)
                                        <article
                                            class="w-80 bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105 border mb-6">
                                            <div class="h-48 bg-gray-200 flex items-center justify-center">
                                                <object class="h-full w-full object-cover"
                                                    data="{{ asset('storage/svg/medicine_example.svg') }}"
                                                    type="image/svg+xml"></object>
                                            </div>
                                            <div class="p-6 flex flex-col h-full">
                                                <h3 class="text-xl font-semibold mb-2">{{ $receta->titulo }}</h3>
                                                <p class="text-gray-600 mb-2">Fecha de Entrega:
                                                    {{ $receta->hora_entrega }}</p>
                                                <p class="text-gray-600 mb-2">Estado: {{ $receta->estado }}</p>
                                                <h4 class="font-medium text-lg leading-8 mb-2">Medicinas:</h4>
                                                <ul class="list-disc pl-5 mb-4">
                                                    @foreach ($receta->medicinas as $medicina)
                                                        <li>{{ $medicina->nombre }} ({{ $medicina->pivot->cantidad }})
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div class="mt-auto flex justify-center">
                                                    <a href="#"
                                                        class="py-2.5 px-5 text-lg font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                                                        Descargar Receta
                                                    </a>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <div class="w-full h-auto footer-container">
        @include('templates.footer')
    </div>

    <aside class="bg-gray-100">
        @include('templates.chat_ia')
    </aside>
</body>

</html>
