<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicina</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/loader.css', 'resources/js/preloader.js', 'resources/js/scroll.js'])
</head>

<body class="flex flex-col overflow-x-hidden">
    @include('templates.loader')

    <div class="w-full h-auto">
        @include('templates.header')
    </div>

    <div class="flex-grow">
        <div class="w-full h-auto flex flex-col md:items-start items-center p-4 gap-2 lg:px-16">
            <h2 class="font-bold text-xl text-vh-green lg:font-bold lg:text-4xl">Medicamento Asignado</h2>
        </div>
        <div class="w-full h-auto flex">
            <div class="bg-cover w-full flex justify-center items-center">
                <div class="w-full bg-white lg:p-5 p-2 bg-opacity-40">
                    <div class="w-12/12 mx-auto rounded-2xl bg-white lg:p-5 p-2">
                        <div class="">
                            @if ($recetas->isEmpty())
                                <p class="text-center text-gray-500">No tienes recetas disponibles.</p>
                            @else
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
                                    @foreach ($recetas as $receta)
                                        <article
                                            class="bg-white p-6 mb-6 shadow-lg transition duration-300 hover:shadow-2xl rounded-lg border">
                                            <div class="flex justify-between items-start pb-4 mb-4 border-b">
                                                <div class="flex items-center">
                                                    <div class="pr-3">
                                                        <object class="h-12 w-12 rounded-full object-cover"
                                                            data="{{ asset('storage/svg/medicine_example.svg') }}"
                                                            type="image/svg+xml"></object>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-semibold">{{ $receta->titulo }}</p>
                                                        <p class="text-sm text-gray-500">Fecha de Entrega:
                                                            {{ $receta->fecha_entrega }}
                                                        </p>
                                                        <p class="text-sm text-gray-500">Estado:
                                                            {{ $receta->estado }}
                                                        </p> <!-- Estado agregado aquí -->
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="font-medium text-xl leading-8 mb-2">
                                                Medicinas:
                                            </h3>
                                            <ul class="list-disc pl-5">
                                                @foreach ($receta->medicinas as $medicina)
                                                    <li>{{ $medicina->nombre }} ({{ $medicina->pivot->cantidad }})</li>
                                                @endforeach
                                            </ul>
                                        </article>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('templates.footer_two')
    @include('templates.chat_ia')
</body>

</html>
