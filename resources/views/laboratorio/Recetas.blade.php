<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lista de Medicinas</title>
    @vite(['resources/css/app.css', 'resources/js/medicine.js', 'resources/js/receta.js'])
</head>
<body class="bg-gray-100 flex flex-col h-screen">
    <header class="bg-green-800 shadow-md p-4 flex justify-between items-center text-white">
        <h1 class="text-3xl font-bold">Lista de Medicinas</h1>
        <a href="{{ route('index') }}" id="logout"
            class="flex items-center text-white hover:text-green-200 transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span class="ml-2 text-lg font-semibold">Regresar</span>
        </a>
    </header>
    <main class="flex-1 p-6 flex flex-col gap-6">
        
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($recetas as $receta)
                <div data-id="{{ $receta->id }}" data-estado="{{ $receta->estado }}"
                     data-fecha-entrega="{{ $receta->fecha_entrega->format('Y-m-d') }}"
                     data-hora-entrega="{{ $receta->hora_entrega->format('H:i') }}"
                     class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105 medicine-card relative">
                    <button id="info-btn{{ $receta->id }}"
                        class="info-btn absolute top-2 right-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        data-id="{{ $receta->id }}">
                        Información
                    </button>
                    <div class="bg-green-100 border-b border-gray-200 p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $receta->titulo }}</h2>
                    </div>
                    <div class="p-4">
                        <p class="text-gray-600 mb-2">{{ $receta->descripcion }}</p>
                        <p class="text-gray-700 mb-1"><strong>Fecha de Entrega:</strong>
                            {{ $receta->fecha_entrega->format('d-m-Y') }}</p>
                        <p class="text-gray-700 mb-1"><strong>Hora de Entrega:</strong>
                            {{ $receta->hora_entrega->format('H:i') }}</p>
                        <p class="text-gray-700 mb-4"><strong>Código:</strong> {{ $receta->codigo_receta }}</p>
                    </div>
                    <div class="border-t border-gray-200 p-4 flex justify-between items-center">
                        <div id="mensaje-laboratorio-{{ $receta->id }}"
                            class="mensaje-laboratorio hidden text-green-600 mb-4">
                            Medicina en Camino
                        </div>
                        <button id="enviar-btn-{{ $receta->id }}"
                            class="enviar-btn bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500"
                            data-id="{{ $receta->id }}">
                            Enviar
                        </button>
                        <button
                            class="cancelar-btn bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500"
                            data-id="{{ $receta->id }}"
                            style="display: {{ $receta->estado === 'pendiente' ? 'inline-block' : 'none' }};">
                            Cancelar
                        </button>
                        <div id="timer-{{ $receta->id }}" class="text-red-600 mt-4"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>
