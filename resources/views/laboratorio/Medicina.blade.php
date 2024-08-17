<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lista de Medicinas</title>
    @vite(['resources/css/app.css', 'resources/js/medicine.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <div class="mb-4">
            <a href="#" id="add_medicine"
                class="bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 transition duration-300">
                Nuevo
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-6">
            @foreach($medicinas as $medicina)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $medicina->nombre }}</h2>
                        <p class="text-gray-600 mb-2">{{ $medicina->descripcion }}</p>
                        <p class="text-gray-700 mb-1"><strong>Tipo:</strong> {{ $medicina->tipo }}</p>
                        <p class="text-gray-700 mb-1"><strong>Stock:</strong> {{ $medicina->stock }}</p>
                        <p class="text-gray-700 mb-4"><strong>Estado:</strong> {{ $medicina->estado }}</p>
                    </div>
                    <div class="flex justify-between px-4 pb-4">
                        <form action="{{ route('medicinas.toggleStatus', $medicina) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 toggle-status">
                                {{ $medicina->estado === 'Disponible' ? 'Desactivar' : 'Activar' }}
                            </button>
                        </form>

                        <a href="#"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 edit-medicine"
                            data-id="{{ $medicina->id }}">
                            Editar
                        </a>
                        <form action="{{ route('medicinas.destroy', $medicina) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 delete-medicine">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>


    </main>

</body>

</html>