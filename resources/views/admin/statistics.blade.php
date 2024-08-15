<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Statistics</title>
    @vite(['resources/css/app.css', 'resources/js/admin.js'])
    <!-- @vite(['resources/css/app.css', 'resources/js/stats_chart.js']) -->
        <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">

</head>

<body class="w-full h-full bg-vh-alice-blue">
    <div class="w-auto h-auto fixed top-0 z-10">
        @include('templates.header_ad')
    </div>

    <!-- Estilos Desktop -->
    <div class="hidden lg:flex flex-col justify-between items-center ml-40 mt-12">
        <div class="mb-2">
            <h2 class="text-xl font-bold mb-4">{{ $categoria->nombre }}</h2>
            <p class="mb-4">{{ $categoria->descripcion }}</p>
            <p class="mb-4">{{ $categoria->caracteristicas }}</p>
        </div>
        <div class="flex justify-between w-4/6 mt-4">
            <div class="w-80 max-w-80 h-auto m-4 bg-white opacity-80 rounded-lg shadow-xl">
                <div class="flex justify-evenly mt-5">
                    <div class="flex-col">
                        <h3 class="font-bold text-2xl mb-6">Personal</h3>
                        <p class="font-bold text-3xl text-vh-green">10</p>
                    </div>
                    <div>
                        <img class="w-24" src="{{ asset('storage/svg/doc-icon-green.svg') }}" alt="Inicio" />
                    </div>
                </div>
            </div>
            <div class="w-80 max-w-80 h-auto m-4 bg-white opacity-80 rounded-lg shadow-xl">
                <div class="flex justify-evenly">
                    <div class="flex-col">
                        <h3 class="font-bold text-2xl my-6">Citas</h3>
                        <p class="font-bold text-3xl text-vh-green">10</p>
                    </div>
                    <div class="mb-2">
                        <img class="w-36" src="{{ asset('storage/svg/file-icon-green.svg') }}" alt="Inicio" />
                    </div>
                </div>
            </div>
            <div class="w-80 max-w-80 h-auto m-4 bg-white opacity-80 rounded-lg shadow-xl">
                <div class="flex justify-evenly mt-5">
                <div class="flex justify-evenly mt-5">
                    <div class="flex-col">
                        <h3 class="font-bold text-2xl mb-6">Expedientes</h3>
                        <p class="font-bold text-3xl text-vh-green">10</p>
                    </div>
                    <div>
                        <img class="w-32 mb-6" src="{{ asset('storage/svg/file-icon-second-green.svg') }}" alt="Inicio" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Segundo Bloque -->
        <div class="flex justify-between w-4/6 mt-4">
            <div class="w-118 h-108 m-4 bg-white opacity-80 rounded-lg shadow-xl">
                <h2 class="font-bold text-xl mb-6 p-4">Usuarios Nuevos</h2>
                <div class="w-full h-auto">
                    <canvas id="users_chart"></canvas>
                </div>
            </div>
            <div class="w-80 h-108 m-4 bg-white opacity-80 rounded-lg shadow-xl">
                <h2 class="font-bold text-xl mb-6 p-4">Notificaciones</h2>
                <div class="w-76 h-32 m-4 bg-vh-gray-light rounded-lg flex">
                    <div class="mt-4 lg:ml-auto">
                        <div class="flex-col bg-vh-green rounded-md w-16 h-16 mb-2 content-center">
                            <span class="flex justify-center font-bold text-white">27</span>
                            <span class="flex justify-center font-bold text-white">Feb</span>
                        </div>
                        <div class="bg-vh-green-light rounded-md w-16 h-6">
                            <a class="flex font-bold justify-center hover:bg-white transition duration-300"
                                href="#">
                                Ir
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-col mt-4 mx-auto">
                        <h3 class="font-bold text-base">Notificaciones de cita</h3>
                        <p class="text-vh-green-light mb-2">Paciente: Juan Jose</p>
                        <span class="font-bold text-sm opacity-70">Hora: 8am</span>
                        <span class="font-bold text-sm opacity-70">Fecha: 10 de Marzo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estilos mobile -->
    <div class="lg:hidden flex justify-center items-center m-4">
        <div>
            <div class="mb-2">
                <h2 class="text-center font-bold text-2xl">Administrador</h2>
            </div>
            <div class="flex-col w-full mt-4">
                <div class="w-80 h-36 m-4 bg-white opacity-80 rounded-lg shadow-xl border border-solid border-vh-green">
                    <div class="flex justify-evenly text-center">
                        <div class="flex-col my-auto">
                            <h3 class="font-bold text-2xl mx-auto">Personal</h3>
                            <p class="font-bold text-3xl mx-7 text-vh-green">10</p>
                        </div>
                        <div class="my-4">
                            <img class="w-20" src="{{ asset('storage/svg/doc-icon-green.svg') }}" alt="Inicio" />
                        </div>
                    </div>
                </div>
                <div class="w-80 h-36 m-4 bg-white opacity-80 rounded-lg shadow-xl border border-solid border-vh-green">
                    <div class="flex justify-evenly text-center">
                        <div class="flex-col my-auto">
                            <h3 class="font-bold text-2xl mx-auto">Citas</h3>
                            <p class="font-bold text-3xl text-vh-green">10</p>
                        </div>
                        <div>
                            <img class="w-32" src="{{ asset('storage/svg/file-icon-green.svg') }}" alt="Inicio" />
                        </div>
                    </div>
                </div>
                <div class="w-80 max-w-80 h-36 m-4 bg-white opacity-80 rounded-lg shadow-xl border border-solid border-vh-green">
                    <div class="flex justify-evenly text-center">
                        <div class="flex-col my-auto">
                            <h3 class="font-bold text-2xl mx-auto">Expediente</h3>
                            <p class="font-bold text-3xl text-vh-green">10</p>
                            <p class="font-bold text-3xl text-vh-green">10</p>
                        </div>
                        <div class="my-5">
                            <img class="w-28" src="{{ asset('storage/svg/file-icon-second-green.svg') }}" alt="Inicio" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Segundo Bloque -->
            <div class="flex-col justify-between mt-4">
                <div class="w-80 h-auto m-4 bg-white opacity-80 rounded-lg shadow-xl border border-solid border-vh-green">
                    <h2 class="font-bold text-xl mb-4 p-4">Nuevos Usuarios</h2>
                </div>
                <div class="w-80 h-auto mx-4 mb-20 bg-white opacity-80 rounded-lg shadow-xl border border-solid border-vh-green">
                    <h2 class="font-bold text-xl p-4">Notificaciones</h2>
                    <div class="w-76 h-28 m-4 bg-vh-gray-light rounded-lg flex border border-solid border-vh-green">
                        <div class="my-6 mx-4 lg:ml-auto">
                            <div class="flex-col bg-vh-green rounded-md w-16 h-16 mb-2 content-center">
                                <span class="flex justify-center font-bold text-white">27</span>
                                <span class="flex justify-center font-bold text-white">Feb</span>
                            </div>
                        </div>
                        <div class="flex flex-col mt-2 mx-auto">
                            <h3 class="font-bold text-base">Notificaciones de cita</h3>
                            <p class="text-vh-green-light mb-1">Paciente: Juan Jose</p>
                            <span class="font-bold text-sm opacity-70">Hora: 8am</span>
                            <span class="font-bold text-sm opacity-70">Fecha: 10 de Marzo</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

</body>

</html>

