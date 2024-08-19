<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor {{ $doctor->name }}</title>
    <!-- Incluir Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/doctor.js'])
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
</head>

<body class="w-full h-full bg-gray-200">

    <!-- Encabezado -->
    <div class="fixed top-0 h-full z-10 w-full lg:w-64">
        @include('templates.header_doc')
    </div>

    <!-- Contenido -->
    <div class="pt-16 lg:ml-64 lg:pt-0">
        <!-- Bienvenida -->
    <div class="flex flex-col items-center lg:flex-row lg:justify-center px-4 py-6">
        <div class="w-full lg:w-11/12 lg:h-64 rounded-lg shadow-xl relative overflow-hidden bg-green-800 mb-6 lg:mb-0">
            <div class="flex flex-col lg:flex-row items-center lg:items-start lg:justify-start p-4 lg:p-6 h-full">
                <div class="text-center lg:text-left flex flex-col justify-between h-full">
                    <div>
                        <p id="current-date" class="font-bold text-md text-gray-400 mb-2"></p>
                        <h3 class="font-bold text-2xl text-white">{{ $doctor->name }}</h3>
                        <p class="font-bold text-xl text-gray-400">{{ $doctor->category->nombre }}</p>
                    </div>
                    <p id="current-time" class="font-bold text-3xl text-white mt-4 lg:mt-6"></p>
                </div>
            </div>
            <img class="absolute bottom-0 right-5 h-3/4 lg:h-full" src="{{ asset('storage/svg/doc_ind.svg') }}" />
        </div>
    </div>


        <!-- Estadísticas y Notificaciones -->
        <div class="flex flex-col items-center lg:flex-row lg:justify-center px-4 lg:px-0">
            <div class="w-full lg:w-11/12 lg:flex lg:justify-between">
                <!-- Estadísticas -->
                <div class="flex flex-col lg:flex-row lg:justify-between lg:w-4/6 gap-4">
                    <!-- Caja de Usuarios -->
                    <div
                        class="w-full lg:w-72 h-56 bg-white opacity-80 rounded-lg shadow-xl flex flex-col items-center justify-center p-4">
                        <img class="w-16 lg:w-24" src="{{ asset('storage/svg/usuarios.svg') }}" alt="Usuarios" />
                        <div class="text-center mt-2">
                            <h3 class="font-bold text-lg lg:text-2xl">{{ $totalPatients }}</h3>
                            <p class="font-bold text-xs lg:text-sm text-gray-600">Usuarios Creados</p>
                        </div>
                    </div>
                    <!-- Caja de Citas -->
                    <div
                        class="w-full lg:w-72 h-56 bg-white opacity-80 rounded-lg shadow-xl flex flex-col items-center justify-center p-4">
                        <img class="w-16 lg:w-24" src="{{ asset('storage/svg/expedientes.svg') }}" alt="Citas" />
                        <div class="text-center mt-2">
                            <h3 class="font-bold text-lg lg:text-2xl">{{ $totalCitas }}</h3>
                            <p class="font-bold text-xs lg:text-sm text-gray-600">Citas</p>
                        </div>
                    </div>
                    <!-- Caja de Recetas -->
                    <div
                        class="w-full lg:w-72 h-56 bg-white opacity-80 rounded-lg shadow-xl flex flex-col items-center justify-center p-4">
                        <img class="w-16 lg:w-24" src="{{ asset('storage/svg/inter.svg') }}" alt="Recetas" />
                        <div class="text-center mt-2">
                            <h3 class="font-bold text-lg lg:text-2xl">{{ $totalRecetas }}</h3>
                            <p class="font-bold text-xs lg:text-sm text-gray-600">Recetas creadas</p>
                        </div>
                    </div>
                </div>


                <div class="w-full lg:w-1/3 h-auto bg-white rounded-lg shadow-xl lg:ml-4 mt-4 lg:mt-0">

                    <h2 class="font-bold text-xl mb-6 p-4">Notificaciones</h2>
                    <div class="w-auto h-auto m-4 bg-gray-100 rounded-lg flex shadow-lg flex-col lg:flex-row">
                        <div class="flex-none lg:mr-4 mb-4 lg:mb-0">
                            <div class="flex-col bg-green-800 rounded-md w-16 h-16 mb-2 content-center">
                                <span class="flex justify-center font-bold text-white">27</span>
                                <span class="flex justify-center font-bold text-white">Feb</span>
                            </div>
                            <div class="bg-green-200 rounded-md w-16 h-6">
                                <a class="flex font-bold justify-center hover:bg-white transition duration-300" href="#">Nuevo</a>
                            </div>
                        </div>
                        <div class="flex flex-col mt-4 lg:mt-0">
                            <h3 class="font-bold text-base">Notificaciones de cita</h3>
                            <p class="text-vh-green-light mb-2">Paciente: Juan José</p>
                            <span class="font-bold text-sm opacity-70">Hola buenas el motivo de este mensaje es...</span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>

</html>
