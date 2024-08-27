<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicina</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/doctor.js', 'resources/js/recetpas.js'])
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
</head>

<body class="w-full h-screen bg-gray-200">
    <div class="flex w-full h-full">
        <div class="fixed top-0 h-full z-10">
            @include('templates.header_doc')
        </div>

        <div class="ml-4 w-full lg:ml-40 h-full overflow-y-auto flex-grow">
            <div class="w-full max-w-6xl mx-auto h-auto my-4 lg:my-5 px-4 lg:px-16">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-bold text-xl lg:text-3xl text-vh-green">Recetas - Medicinas</h2>
                    <button id="open-modal" class="mt-4 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                        Crear
                    </button>
                </div>

                <!-- Contenedor principal para recetas y medicinas -->
                <div class="flex flex-col lg:flex-row gap-6">
                    <!-- Columna de recetas -->
                    <div class="w-full lg:w-1/2">
                        <h3 class="text-2xl font-semibold text-vh-green mb-4">Recetas</h3>
                        @if ($recetas->isEmpty())
                            <p class="text-center font-semibold text-sm lg:text-lg text-vh-green my-4">No hay recetas disponibles para mostrar.</p>
                        @else
                            @foreach ($recetas as $receta)
                                <div class="bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 mb-4">
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-vh-green mb-2">{{ $receta->titulo }}</h3>
                                        <p class="text-sm text-gray-600"><strong>Código:</strong> {{ $receta->codigo_receta }}</p>
                                        <p class="text-sm text-gray-600"><strong>Paciente:</strong> {{ $receta->patient->name }}</p>
                                        <p class="text-sm text-gray-600"><strong>Fecha:</strong> {{ $receta->fecha_entrega->format('Y-m-d') }}</p>
                                        <p class="text-sm text-gray-600"><strong>Hora:</strong> {{ $receta->hora_entrega->format('H:i') }}</p>
                                        <p class="text-sm text-gray-600"><strong>Descripción:</strong> {{ $receta->descripcion }}</p>
                                    </div>
                                    <div class="p-4 border-t border-gray-200 flex justify-end">
                                        <button class="delete-order bg-red-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-red-600 transition-colors duration-300" data-id="{{ $receta->id }}">
                                            Eliminar
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Columna de medicinas -->
                    <div class="w-full lg:w-1/2">
                        <h3 class="text-2xl font-semibold text-vh-green mb-4">Medicinas</h3>
                        @if ($medicinas->isEmpty())
                            <p class="text-center font-semibold text-sm lg:text-lg text-vh-green my-4">No hay medicinas creadas.</p>
                        @else
                            @foreach ($medicinas as $medicina)
                                <div class="bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 mb-4">
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-vh-green mb-2">{{ $medicina->nombre }}</h3>
                                        <p class="text-sm text-gray-600"><strong>Descripción:</strong> {{ $medicina->descripcion }}</p>
                                        <p class="text-sm text-gray-600"><strong>Tipo:</strong> {{ $medicina->tipo }}</p>
                                        <p class="text-sm text-gray-600"><strong>Cantidad:</strong> {{ $medicina->stock }}</p>
                                        <p class="text-sm text-gray-600"><strong>Estado:</strong> {{ $medicina->estado }}</p>
                                    </div>
                                    <div class="p-4 border-t border-gray-200 flex justify-end">
                                        <button class="deleteMedicine bg-red-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-red-600 transition-colors duration-300" data-id="{{ $medicina->id }}">
                                            Eliminar
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
