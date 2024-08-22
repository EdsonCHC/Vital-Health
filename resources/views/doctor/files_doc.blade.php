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
                <h2 class="text-3xl font-bold text-vh-green">Expedientes de Usuarios</h2>
                <a href=""
                    class="bg-vh-green text-white font-semibold mt-4 lg:mt-0 py-2 px-4 rounded-lg shadow-lg hover:bg-green-600 transition duration-300">
                    Nuevo Expediente
                </a>
            </header>

            <!-- Expediente Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @if ($expedientes->isEmpty())
                    <div class="col-span-1 bg-green-100 rounded-md p-4">
                        <p class="font-bold text-lg text-green-800">No hay expedientes registrados.</p>
                    </div>
                @else
                    @foreach ($expedientes as $expediente)
                        <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col space-y-4">
                            <!-- Header Section -->
                            <div class="flex items-center justify-between">
                                <p class="font-bold text-2xl text-gray-900">Código: {{ $expediente->id }}</p>
                                <a href="#" class="text-gray-600 hover:text-gray-800">
                                    <img src="{{ asset('storage/svg/eye-scan.svg') }}" alt="ver_icon" class="w-8 h-8">
                                </a>
                            </div>

                            <!-- Patient Information -->
                            <div>
                                <p class="font-semibold text-lg text-gray-700">
                                    Paciente:
                                    {{ $expediente->patient_id ? $expediente->patient->name : 'Paciente no disponible' }}
                                </p>
                            </div>

                            <!-- Actions Section -->
                            <div class="flex space-x-4">
                                <button
                                    class="update-file p-2 rounded bg-green-500 text-white hover:bg-green-600 transition"
                                    data-expediente-id="{{ $expediente->id }}">
                                    <img src="{{ asset('storage/svg/upload.svg') }}" alt="update_icon" class="w-6 h-6">
                                    <span class="sr-only">Actualizar expediente</span>
                                </button>
                                <button
                                    class="delete-file p-2 rounded bg-red-500 text-white hover:bg-red-600 transition"
                                    data-id="{{ $expediente->id }}">
                                    <img src="{{ asset('storage/svg/trash.svg') }}" alt="delete_icon" class="w-6 h-6">
                                    <span class="sr-only">Eliminar expediente</span>
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </main>
    </div>
</body>

</html>
