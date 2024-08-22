<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expediente</title>
    <!-- Incluir Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/doctor.js', 'resources/js/expediente.js'])
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="lg:fixed lg:top-0 lg:left-0 lg:w-60 lg:h-screen lg:bg-white lg:shadow-lg lg:z-10">
            @include('templates.header_doc')
        </aside>
        <!-- Main content -->
        <main class="lg:ml-60 p-6 w-full min-h-screen bg-gray-100">

            <header class="flex flex-col lg:flex-row items-start lg:items-center justify-between mb-6">
                <h2 class="text-3xl font-bold text-vh-green">Expedientes de Pacientes</h2>
                <button
                    class="createFile bg-vh-green text-white font-semibold mt-4 lg:mt-0 py-2 px-4 rounded-lg shadow-lg hover:bg-green-600 transition duration-300">
                    Nuevo Usuario
                </button>
            </header>
            <!-- Expediente Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($expedientes as $file)
                    <div class="bg-white p-4 rounded-lg shadow-lg space-y-4">
                        <div>
                            <label class="block font-bold text-gray-700">Paciente</label>
                            <input type="text" class="w-full p-2 border rounded bg-gray-100"
                                value="{{ $file->patient->name }} {{ $file->patient->lastName }}" readonly>
                        </div>
                        <!-- Botones de acción -->
                        <div class="flex justify-between space-x-2">
                            <button
                                class="w-full bg-blue-500 text-white font-semibold py-2 rounded-lg shadow-lg hover:bg-blue-600 transition duration-300">
                                PDF
                            </button>
                            <button data-id="{{ $file->id }}"
                                class="deleteFile w-full bg-red-500 text-white font-semibold py-2 rounded-lg shadow-lg hover:bg-red-600 transition duration-300">
                                Eliminar
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

        </main>
    </div>
</body>

</html>
