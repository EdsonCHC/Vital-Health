<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laboratorio</title>
    @vite(['resources/css/app.css', 'resources/js/admin.js', 'resources/js/ad_cate.js', 'resources/js/lab.js', 'resources/js/medicine.js'])
</head>

<body class="bg-gray-100 flex flex-col h-screen">
    <header class="bg-white shadow-md p-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-green-600">Bienvenido al Laboratorio</h1>
        <button type="submit" class="flex items-center text-vh-green hover:text-green-200 transition duration-300"
            id="log_out_laboratorio">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span class="ml-2 text-lg font-semibold">Cerrar Sesión</span>
        </button>



    </header>

    <main class="flex-1 p-6">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <!-- Exámenes Card -->
                <!-- Exam Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Exámenes</h3>
                    <p class="mb-4 text-sm text-gray-600 text-center">Administrar los exámenes para pacientes</p>
                    <a href="{{ route('Exam') }}"
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300 w-full text-center block">
                        Ver
                    </a>
                </div>

                <!-- Recetas Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Recetas</h3>
                    <p class="mb-4 text-sm text-gray-600 text-center">Administrar las recetas para pacientes</p>
                    <button
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300 w-full">
                        Ver
                    </button>
                </div>

                <!-- Medicina Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Medicina</h3>
                    <p class="mb-4 text-sm text-gray-600 text-center">Administrar la medicina para pacientes</p>
                    <div class="container mx-auto p-4">
                        <h1 class="text-2xl font-bold mb-4">Medicinas Registradas</h1>
                        <div class="flex flex-col flex-wrap gap-4">
                            @foreach ($medicines as $medicine)
                                <div class="w-full my-4 bg-white shadow-md rounded-lg overflow-hidden relative">
                                    <div class="p-4">
                                        <button
                                            class="up-medicine absolute top-2 right-2 bg-blue-500 text-white px-2 py-1 rounded">Actualizar</button>
                                        <h2 class="text-xl font-bold mb-2">{{ $medicine->name }}</h2>
                                        <p class="text-gray-700 mb-1"><strong>Número de Lote:</strong>
                                            {{ $medicine->batch_number }}</p>
                                        <p class="text-gray-700 mb-1"><strong>Cantidad:</strong>
                                            {{ $medicine->quantity }}</p>
                                        <p class="text-gray-700 mb-1"><strong>Fecha de Expiración:</strong>
                                            {{ $medicine->expiration_date }}</p>
                                        <p class="text-gray-700 mb-1"><strong>Descripción:</strong>
                                            {{ $medicine->description }}</p>
                                        <p class="text-gray-700 mb-1"><strong>ID del Doctor:</strong>
                                            {{ $medicine->doctor_id }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <button
                        class="add-medicine bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300 w-full">
                        Crear
                    </button>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
