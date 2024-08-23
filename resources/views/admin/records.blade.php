<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expediente</title>
    @vite(['resources/css/app.css', 'resources/js/expediente.js'])
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
</head>

<body class="w-full h-full bg-vh-alice-blue">
    <div class="w-auto h-auto fixed top-0 z-10">
        @include('templates.header_ad')
    </div>

    <!-- Estilos Desktop -->
    <div class="hidden lg:flex flex-col justify-between items-center ml-40 mt-12">
        <div class="mb-2">
            <h2 class="font-bold text-2xl">
                Expedientes
            </h2>
        </div>
        <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($expedientes as $file)
                <div class="bg-white p-4 rounded-lg shadow-lg space-y-4">
                    <!-- Paciente Información -->
                    <div>
                        <label class="block font-bold text-gray-700">ID</label>
                        <input type="text" class="w-full p-2 border rounded bg-gray-100"
                            value="{{ $file->patient->id }}" readonly>

                        <label class="block font-bold text-gray-700">Nombre</label>
                        <input type="text" class="w-full p-2 border rounded bg-gray-100"
                            value="{{ $file->patient->name }} {{ $file->patient->lastName }}" readonly>
                        
                        <label class="block font-bold text-gray-700">Correo Electronico</label>
                        <input type="text" class="w-full p-2 border rounded bg-gray-100"
                            value="{{ $file->patient->mail }}" readonly>
                    </div>
                    <!-- Botones de acción -->
                    <div class="flex justify-between space-x-2">
                        <button data-id="{{ $file->id }}"
                            class="deleteFileAd w-full bg-red-500 text-white font-semibold py-2 rounded-lg shadow-lg hover:bg-red-600 transition duration-300">
                            Eliminar
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
