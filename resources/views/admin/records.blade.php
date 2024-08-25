<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pacientes</title>
    @vite(['resources/css/app.css', 'resources/js/admin.js'])
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body class="bg-vh-alice-blue">
    <!-- Fixed Header -->
    <div class="fixed top-0 left-0 right-0 w-auto">
        @include('templates.header_ad')
    </div>

    <!-- Main Content -->
    <main class="pt-4 px-4 md:px-8 lg:px-16 py-8 mt-4">
        <header class="mb-6">
            <h2 class="text-3xl font-bold lg:ml-60 text-gray-800">
                Pacientes
            </h2>
        </header>

        <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 lg:pl-60">
            @foreach ($users as $user)
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-transform hover:scale-105">
                    <div class="p-4">
                        <div class="font-semibold text-lg text-gray-800 mb-4">
                            Paciente Información
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-1">ID</label>
                            <input type="text" class="w-full p-2 border border-gray-300 rounded bg-gray-100"
                                value="{{ $user->id }}" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-1">Nombre</label>
                            <input type="text" class="w-full p-2 border border-gray-300 rounded bg-gray-100"
                                value="{{ $user->name }} {{ $user->lastName }}" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-1">Correo Electrónico</label>
                            <input type="text" class="w-full p-2 border border-gray-300 rounded bg-gray-100"
                                value="{{ $user->mail }}" readonly>
                        </div>
                    </div>
                    <div class="p-4 flex justify-end">
                        <button data-id="{{ $user->id }}"
                            class="deleteUser bg-red-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                            Eliminar
                        </button>
                    </div>
                </div>
            @endforeach
        </section>
    </main>
</body>

</html>
