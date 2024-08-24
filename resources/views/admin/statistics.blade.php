<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/admin.js'])
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
</head>

<body class="bg-gray-100 flex h-screen">
    <!-- Sidebar -->
    @include('templates.header_ad')

    <!-- Main Content -->
    <main class="flex-1 lg:pl-64 space-y-6">
    <!-- Header -->
    <header class="flex items-center justify-between mb-6 bg-white shadow-md p-4 rounded-lg">
        <div class="text-2xl font-semibold text-gray-700">Dashboard</div>
      
    </header>

    <!-- Content -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Info Cards -->
        <div class="bg-white shadow-lg rounded-lg p-6 flex items-center justify-between space-x-4">
            <div>
                <h3 class="text-xl font-bold text-gray-800">Personal</h3>
                <p class="text-3xl font-semibold text-green-600">10</p>
            </div>
            <img class="w-16 h-16" src="{{ asset('storage/svg/doc-icon-green.svg') }}" alt="Personal Icon" />
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 flex items-center justify-between space-x-4">
            <div>
                <h3 class="text-xl font-bold text-gray-800">Citas</h3>
                <p class="text-3xl font-semibold text-green-600">10</p>
            </div>
            <img class="w-16 h-16" src="{{ asset('storage/svg/file-icon-green.svg') }}" alt="Citas Icon" />
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 flex items-center justify-between space-x-4">
            <div>
                <h3 class="text-xl font-bold text-gray-800">Expedientes</h3>
                <p class="text-3xl font-semibold text-green-600">10</p>
            </div>
            <img class="w-16 h-16" src="{{ asset('storage/svg/file-icon-second-green.svg') }}" alt="Expedientes Icon" />
        </div>

        <!-- Charts -->
        <div class="bg-white shadow-lg rounded-lg p-6 col-span-1 lg:col-span-2">
            <h3 class="text-xl font-bold mb-4 text-gray-800">Usuarios Nuevos</h3>
            <canvas id="users_chart" class="w-full h-64"></canvas>
        </div>

        <!-- Notifications -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-xl font-bold mb-4 text-gray-800">Notificaciones</h3>
            <div class="bg-gray-100 p-4 rounded-md">
                <div class="flex items-center mb-4">
                    <div class="bg-green-600 text-white w-16 h-16 rounded-full flex items-center justify-center text-xl font-bold mr-4">
                        27
                    </div>
                    <div>
                        <div class="text-gray-700 font-semibold">Paciente: Juan Jose</div>
                        <div class="text-gray-600">Hora: 8am</div>
                        <div class="text-gray-600">Fecha: 10 de Marzo</div>
                    </div>
                </div>
                <a href="#" class="bg-green-600 text-white px-4 py-2 rounded-md inline-block">Ir</a>
            </div>
        </div>
    </div>
</main>

</body>

</html>