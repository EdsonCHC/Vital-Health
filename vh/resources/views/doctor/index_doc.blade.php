<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Incluir Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js'])
</head>

<body class="w-full h-full bg-gray-200">
    <!-- Encabezado -->
    <div class="fixed top-0 h-full z-10">
        @include('templates.header_doc')
    </div>

    <!-- Contenido -->
    <div class="ml-64 mt-"> <!-- Ajusta 64 según el ancho de tu encabezado -->
        <!-- Bienvenida -->
        <div class="flex w-full px-5 justify-center">
            <div class="mt-24 w-11/12 h-64 m-4 rounded-lg shadow-xl relative overflow-hidden bg-green-800">
                <div class="flex justify-start mt-5">
                    <div class="flex-col ml-8 mt-16">
                        <p class="font-bold text-md text-gray-400">Septiembre 4, 2024</p>
                        <h3 class="font-bold text-2xl text-white">Doctor Alejandro Alvarenga</h3>
                        <p class="font-bold text-xl text-gray-400">Área: Cardiología.</p>
                    </div>
                </div>
                <img class="absolute bottom-0 right-5 h-3/4" src="{{asset('storage/svg/doc_ind.svg')}}"
                    type="image/svg+xml" />
            </div>
        </div>

        <!-- Barra de búsqueda -->
        <div class="w-full flex justify-center mt-4">
            <div class="w-11/12">
                <input type="text" placeholder="Buscar..."
                    class="w-full p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
        </div>

        <!-- Bloque de Estadísticas y Notificaciones -->
        <div class="flex flex-col items-center w-full mt-4 relative">
        <h2 class="font-bold text-xl absolute top-0 left-0 right-0 ml-14 mt-2 ">Estadísticas</h2>
            <div class="w-11/12 flex justify-between">
                <div class="flex flex-col items-center w-full mt-4">
                    <div class="w-11/12 flex justify-between">
                        <div class="flex justify-between w-4/6 mt-4">
                            <div class="w-80 h-56 m-4 bg-white opacity-80 rounded-lg shadow-xl">
                                <div class="flex flex-col justify-center items-center h-full">
                                    <img class="w-24" src="{{ asset('storage/svg/usuarios.svg') }}" alt="Inicio" />
                                    <div class="flex flex-col items-center">
                                        <h3 class="font-bold text-2xl">1k</h3>
                                        <p class="font-bold text-sm text-gray-600">Nuevos usuarios</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-80 h-56 m-4 bg-white opacity-80 rounded-lg shadow-xl">
                                <div class="flex flex-col justify-center items-center h-full">
                                    <img class="w-24" src="{{ asset('storage/svg/expedientes.svg') }}" alt="Inicio" />
                                    <div class="flex flex-col items-center">
                                        <h3 class="font-bold text-2xl">2,562</h3>
                                        <p class="font-bold text-sm text-gray-600">Total de Expedientes Generados</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-80 h-56 m-4 bg-white opacity-80 rounded-lg shadow-xl">
                                <div class="flex flex-col justify-center items-center h-full">
                                    <img class="w-24" src="{{ asset('storage/svg/inter.svg') }}" alt="Inicio" />
                                    <div class="flex flex-col items-center">
                                        <h3 class="font-bold text-2xl">3k</h3>
                                        <p class="font-bold text-sm text-gray-600">Interacciones con Pacientes</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full h-108 m-4 bg-white rounded-lg shadow-xl">
                            <h2 class="font-bold text-xl mb-6 p-4">Notificaciones</h2>
                            <div class="w-auto h-32 m-4 bg-gray-100 rounded-lg flex shadow-lg">
                                <div class="mt-4 lg:ml-auto">
                                    <div class="flex-col bg-green-800 rounded-md w-16 h-16 mb-2 content-center">
                                        <span class="flex justify-center font-bold text-white">27</span>
                                        <span class="flex justify-center font-bold text-white">Feb</span>
                                    </div>
                                    <div class="bg-green-200 rounded-md w-16 h-6">
                                        <a class="flex font-bold justify-center hover:bg-white transition duration-300"
                                            href="#">Nuevo</a>
                                    </div>
                                </div>
                                <div class="flex flex-col mt-4 mx-auto">
                                    <h3 class="font-bold text-base">Notificaciones de cita</h3>
                                    <p class="text-vh-green-light mb-2">Paciente: Juan José</p>
                                    <span class="font-bold text-sm opacity-70">Hola buenas el motivo de este mensaje
                                        es...</span>
                                </div>
                            </div>
                            <div class="w-auto h-32 m-4 bg-gray-100 rounded-lg flex shadow-lg ">
                                <div class="mt-4 lg:ml-auto">
                                    <div class="flex-col bg-green-800 rounded-md w-16 h-16 mb-2 content-center">
                                        <span class="flex justify-center font-bold text-white">27</span>
                                        <span class="flex justify-center font-bold text-white">Feb</span>
                                    </div>
                                    <div class="bg-green-200 rounded-md w-16 h-6">
                                        <a class="flex font-bold justify-center hover:bg-white transition duration-300"
                                            href="#">Nuevo</a>
                                    </div>
                                </div>
                                <div class="flex flex-col mt-4 mx-auto">
                                    <h3 class="font-bold text-base">Notificaciones de cita</h3>
                                    <p class="text-vh-green-light mb-2">Paciente: Juan José</p>
                                    <span class="font-bold text-sm opacity-70">Hola buenas el motivo de este mensaje
                                        es...</span>
                                </div>
                            </div>
                            <div class="w-auto h-32 m-4 bg-gray-100 rounded-lg flex shadow-lg ">
                                <div class="mt-4 lg:ml-auto">
                                    <div class="flex-col bg-green-800 rounded-md w-16 h-16 mb-2 content-center">
                                        <span class="flex justify-center font-bold text-white">27</span>
                                        <span class="flex justify-center font-bold text-white">Feb</span>
                                    </div>
                                    <div class="bg-green-200 rounded-md w-16 h-6">
                                        <a class="flex font-bold justify-center hover:bg-white transition duration-300"
                                            href="#">Nuevo</a>
                                    </div>
                                </div>
                                <div class="flex flex-col mt-4 mx-auto">
                                    <h3 class="font-bold text-base">Notificaciones de cita</h3>
                                    <p class="text-vh-green-light mb-2">Paciente: Juan José</p>
                                    <span class="font-bold text-sm opacity-70">Hola buenas el motivo de este mensaje
                                        es...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>