<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Exámenes</title>
    @vite(['resources/css/app.css', 'resources/js/admin.js'])
</head>

<body class="bg-gray-100 flex flex-col h-screen">
    <header class="bg-green-800 shadow-md p-4 flex justify-between items-center text-white">
        <h1 class="text-3xl font-bold">Exámenes</h1>
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

        <div class="bg-white shadow-lg rounded-lg border border-gray-200 overflow-x-auto">
            <table class="w-full text-sm text-gray-700">
                <thead class="bg-gradient-to-r from-green-700 to-green-800 text-white">
                    <tr>
                        <th class="py-4 px-6 border-b text-left font-medium">ID</th>
                        <th class="py-4 px-6 border-b text-left font-medium">Paciente</th>
                        <th class="py-4 px-6 border-b text-left font-medium">Doctor</th>
                        <th class="py-4 px-6 border-b text-left font-medium">Tipo de Examen</th>
                        <td class="py-3 px-6 border-b">Resultado</td>
                        <th class="py-4 px-6 border-b text-left font-medium">Dia</th>
                        <th class="py-4 px-6 border-b  font-medium text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    <tr class="hover:bg-green-50 transition duration-300">
                        <td class="py-3 px-6 border-b text-gray-800">1</td>
                        <td class="py-3 px-6 border-b">John Doe</td>
                        <td class="py-3 px-6 border-b">Dr. Smith</td>
                        <td class="py-3 px-6 border-b">Blood Test</td>
                        <td class="py-3 px-6 border-b">Resultado</td>
                        <td class="py-3 px-6 border-b">2024-08-14</td>
                        <td class="py-3 px-6 border-b text-center">
                            <a href="#"
                                class="inline-block px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600 font-medium transition-colors duration-300">Actualizar</a>
                            <span class="mx-2">|</span>
                            <a href="#"
                                class="inline-block px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600 font-medium transition-colors duration-300">Finalizar</a>
                            <span class="mx-2">|</span>
                            <a href="#"
                                class="inline-block px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600 font-medium transition-colors duration-300">Eliminar</a>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>