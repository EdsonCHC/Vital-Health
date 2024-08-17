<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Medicina</title>
    @vite(['resources/css/app.css', 'resources/js/medicina.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gray-100 flex flex-col h-screen">
    <header class="bg-green-800 shadow-md p-4 flex justify-between items-center text-white">
        <h1 class="text-3xl font-bold">Medicina</h1>
        <a href="{{ route('index') }}" id="logout" class="flex items-center text-white hover:text-green-200 transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span class="ml-2 text-lg font-semibold">Regresar</span>
        </a>
    </header>

    <main class="flex-1 p-6 flex flex-col gap-6">
        <div class="mb-4">
            <a href="#" id="add_medicine" class="bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 transition duration-300">
                Nuevo
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-lg border border-gray-200 overflow-x-auto">
            <table class="w-full text-sm text-gray-700">
                <thead class="bg-gradient-to-r from-green-700 to-green-800 text-white">
                    <tr>
                        <th class="py-4 px-6 border-b text-left font-medium">ID</th>
                        <th class="py-4 px-6 border-b text-left font-medium">Nombre</th>
                        <th class="py-4 px-6 border-b text-left font-medium">Descripción</th>
                        <th class="py-4 px-6 border-b text-left font-medium">Tipo</th>
                        <th class="py-4 px-6 border-b text-left font-medium">Dosis</th>
                        <th class="py-4 px-6 border-b text-left font-medium">Estado</th>
                        <th class="py-4 px-6 border-b text-left font-medium">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($medicinas as $medicina)
                        <tr class="hover:bg-green-50 transition duration-300">
                            <td class="py-3 px-6 border-b text-gray-800">{{ $medicina->id }}</td>
                            <td class="py-3 px-6 border-b">{{ $medicina->nombre }}</td>
                            <td class="py-3 px-6 border-b">{{ $medicina->descripcion }}</td>
                            <td class="py-3 px-6 border-b">{{ $medicina->tipo }}</td>
                            <td class="py-3 px-6 border-b">{{ $medicina->dosis }}</td>
                            <td class="py-3 px-6 border-b">{{ $medicina->estado }}</td>
                            <td class="py-3 px-6 border-b text-center">
                                <a href="#" class="edit-button text-blue-600 hover:text-blue-800 font-medium" data-id="{{ $medicina->id }}">Editar</a> |
                                <a href="#" class="delete-button text-red-600 hover:text-red-800 font-medium" data-id="{{ $medicina->id }}">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal para nuevo medicamento -->
    <div id="medicine-modal" class="fixed inset-0  items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-xl font-bold mb-4">Nuevo Medicamento</h2>
            <form id="medicine-form">
                <input type="hidden" id="medicina-id" name="medicina_id">
                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
                    <input type="text" id="tipo" name="tipo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="dosis" class="block text-sm font-medium text-gray-700">Dosis</label>
                    <input type="text" id="dosis" name="dosis" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                    <select id="estado" name="estado" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="Disponible">Disponible</option>
                        <option value="No Disponible">No Disponible</option>
                    </select>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 transition duration-300">Guardar</button>
                    <button type="button" id="cancel-btn" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg shadow-md hover:bg-gray-400 transition duration-300">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/medicina.js') }}"></script>
</body>

</html>
