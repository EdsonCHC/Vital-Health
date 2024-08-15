<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <!-- Incluir Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js', 'resources/js/doctor.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
</head>

<body class="w-full h-screen bg-gray-200">
    <!-- Encabezado -->
    <div class="flex w-full">
        <div class="fixed top-0 h-full z-10">
            @include('templates.header_doc')
        </div>

        <!-- Estilos Desktop -->
        <div class="w-full hidden lg:flex flex-col justify-between items-center ml-40 mt-12">
            <div class="flex justify-between items-center w-4/6 mt-4">
                <div class="flex flex-col space-y-4">
                    <h2 class="font-bold text-2xl text-vh-green">Programación</h2>
                    <div class="w-96 max-w-md h-100 bg-white opacity-80 rounded-lg shadow-xl p-4">
                        <h2
                            class="w-full h-10 p-1 text-center text-white font-semibold text-xl bg-green-700 rounded-t-lg">
                            Datos</h2>
                        <div id="calendarContainer" class="p-4"></div>
                    </div>
                    <div
                        class="w-96 max-w-md h-52 bg-white opacity-80 rounded-lg shadow-xl border-2 border-solid border-green-700 p-4">
                        <h2
                            class="w-full h-10 p-1 text-center text-white font-semibold text-xl bg-green-700 rounded-t-lg">
                            Reloj</h2>
                        <div id="clock-container" class="flex justify-center items-center h-full">
                            <div id="clock" class="flex flex-col items-center">
                                <div class="flex items-center space-x-2">
                                    <div id="hours"
                                        class="p-2 bg-gray-200 border border-gray-300 text-3xl font-bold text-gray-800 rounded-lg">
                                    </div>
                                    <div class="text-3xl font-bold text-gray-800">:</div>
                                    <div id="minutes"
                                        class="p-2 bg-gray-200 border border-gray-300 text-3xl font-bold text-gray-800 rounded-lg">
                                    </div>
                                </div>
                                <div id="current-date" class="mt-2 text-lg font-semibold text-gray-700"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Segundo Bloque -->
                <div
                    class="w-112 h-108 m-4 bg-white opacity-80 rounded-lg shadow-xl border-2 border-solid border-vh-green">
                    <div class="flex justify-end content-around">
                        <button target="_self" id="create_staff"
                            class="w-44 h-10 my-4 mx-2 font-semibold text-base text-white bg-vh-green hover:bg-vh-gray transition duration-300 hover:text-black inline-block text-center rounded-sm tracking-wider">
                            Invitaciones
                        </button>
                        <button target="_self" id="create_staff"
                            class="w-44 h-10 my-4 mx-2 font-semibold text-base text-white bg-vh-green hover:bg-vh-gray transition duration-300 hover:text-black inline-block text-center rounded-sm tracking-wider">
                            Nueva Llamada
                        </button>
                    </div>
                    <div class="w-76 h-36 m-4 bg-vh-gray-light rounded-lg flex">
                        <div class="m-4">
                            <div class="w-20 h-20 mb-2 flex-col content-center items-center bg-vh-green rounded-md">
                                <span class="flex justify-center font-semibold text-white text-lg">27</span>
                                <span class="flex justify-center font-semibold text-white text-lg">Feb</span>
                            </div>
                            <div class="w-20 h-6 content-center items-center bg-vh-green-light rounded-md">
                                <a class="flex justify-center hover:bg-white font-semibold transition duration-300"
                                    href="#">
                                    Unirse
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col my-auto">
                            <h3 class="font-bold text-xl">Reunión</h3>
                            <p class="text-emerald-500 text-lg">Paciente: Juan José</p>
                            <span class="font-bold text- opacity-70">Descripción: ..........</span>
                        </div>
                        <div class="ml-auto ">
                            <button class="m-4 bg-white rounded-md shadow-lg">
                                <img src="{{ asset('storage/svg/trash.svg') }}" alt="chat" class="w-12 p-1">
                                <button />
                        </div>
                    </div>
                    <div class="w-76 h-36 m-4 bg-vh-gray-light rounded-lg flex">
                        <div class="m-4">
                            <div class="w-20 h-20 mb-2 flex-col content-center items-center bg-vh-green rounded-md">
                                <span class="flex justify-center font-semibold text-white text-lg">27</span>
                                <span class="flex justify-center font-semibold text-white text-lg">Feb</span>
                            </div>
                            <div class="w-20 h-6 content-center items-center bg-vh-green-light rounded-md">
                                <a class="flex justify-center hover:bg-white font-semibold transition duration-300"
                                    href="#">
                                    Unirse
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col my-auto">
                            <h3 class="font-bold text-xl">Reunión</h3>
                            <p class="text-emerald-500 text-lg">Paciente: Juan José</p>
                            <span class="font-bold text- opacity-70">Descripción: ..........</span>
                        </div>
                        <div class="ml-auto ">
                            <button class="m-4 bg-white rounded-md shadow-lg">
                                <img src="{{ asset('storage/svg/trash.svg') }}" alt="chat" class="w-12 p-1">
                                <button />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Estilos mobile --}}
        <div class="lg:hidden flex justify-center items-center m-4">
            <div class="flex-col items-center mt-4">
                <div class="flex flex-col  justify-center items-center space-y-4">
                    <div class="w-80 max-w-md h-100 bg-white opacity-80 rounded-lg shadow-xl p-4">
                        <h2
                            class="w-full h-10 p-1 text-center text-white font-semibold text-xl bg-green-700 rounded-t-lg">
                            Datos</h2>
                        <div id="calendarContainer" class="p-4"></div>
                    </div>
                    <div
                        class="w-80 max-w-md h-52 bg-white opacity-80 rounded-lg shadow-xl border-2 border-solid border-green-700 p-4">
                        <h2
                            class="w-full h-10 p-1 text-center text-white font-semibold text-xl bg-green-700 rounded-t-lg">
                            Reloj</h2>
                        <div id="clock-container" class="flex justify-center items-center h-full">
                            <div id="clock" class="flex flex-col items-center">
                                <div class="flex items-center space-x-2">
                                    <div id="hours"
                                        class="p-2 bg-gray-200 border border-gray-300 text-3xl font-bold text-gray-800 rounded-lg">
                                    </div>
                                    <div class="text-3xl font-bold text-gray-800">:</div>
                                    <div id="minutes"
                                        class="p-2 bg-gray-200 border border-gray-300 text-3xl font-bold text-gray-800 rounded-lg">
                                    </div>
                                </div>
                                <div id="current-date" class="mt-2 text-lg font-semibold text-gray-700"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Segundo Bloque -->
                <div class="flex-col justify-between mt-4">
                    <div
                        class="w-80 h-auto mx-4 mb-20 bg-white opacity-80 rounded-lg shadow-xl border border-solid border-vh-green">
                        <div class="flex justify-end content-around">
                            <button target="_self" id="create_staff"
                                class="w-44 h-10 my-4 mx-2 font-semibold text-base text-white bg-vh-green hover:bg-vh-gray transition duration-300 hover:text-black inline-block text-center rounded-sm tracking-wider">
                                Invitaciones
                            </button>
                            <button target="_self" id="create_staff"
                                class="w-44 h-10 my-4 mx-2 font-semibold text-base text-white bg-vh-green hover:bg-vh-gray transition duration-300 hover:text-black inline-block text-center rounded-sm tracking-wider">
                                Nueva Llamada
                            </button>
                        </div>
                        <div class="w-76 h-36 m-4 bg-vh-gray-light rounded-lg flex">
                            <div class="m-4">
                                <div
                                    class="w-16 h-16 mb-2 flex-col content-center items-center bg-vh-green rounded-md">
                                    <span class="flex justify-center font-semibold text-white text-lg">27</span>
                                    <span class="flex justify-center font-semibold text-white text-lg">Feb</span>
                                </div>
                                <div class="w-16 h-6 content-center items-center bg-vh-green-light rounded-md">
                                    <a class="flex justify-center hover:bg-white font-semibold transition duration-300"
                                        href="#">
                                        Unirse
                                    </a>
                                </div>
                            </div>
                            <div class="flex flex-col my-auto">
                                <h3 class="font-bold text-xl">Reunión</h3>
                                <p class="text-emerald-500 text-lg">Paciente: Juan José</p>
                                <span class="font-bold text- opacity-70">Descripción: ..........</span>
                            </div>
                            <div class="ml-auto ">
                                <button class="m-4 bg-white rounded-md shadow-lg">
                                    <img src="{{ asset('storage/svg/trash.svg') }}" alt="chat" class="w-14 p-1">
                                    <button />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
