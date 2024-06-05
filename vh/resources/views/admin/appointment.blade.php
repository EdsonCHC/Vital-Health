<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment</title>
    @vite(['resources/css/app.css', 'resources/js/ad_appointment.js'])
</head>

<body class="w-full h-full bg-vh-alice-blue">
    <div class="w-auto h-auto fixed top-0 z-10">
        @include('templates.header_ad')
    </div>

    <!-- Estilos Desktop -->
    <div class="hidden lg:flex flex-col justify-between items-center ml-40 mt-12">
        <div class="mb-2">
            <h2 class="font-bold text-2xl">
                Citas del Area de Pediatria
            </h2>
        </div>
        <div class="flex-col w-132 h-auto m-4 bg-white opacity-80 rounded-xl shadow-xl mt-4 ">
            <ul class="w-2/12 h-10 flex m-4 border border-solid border-vh-green rounded-3xl">
                <li class="font-semibold ml-2 p-2 relative group">
                    <a href="/appointment" class="flex text-vh-green">Presencial <img id="menu-icon" class="w-4 mx-6"
                            src="{{ asset('storage/svg/filtro.svg') }}" alt="Inicio" /></a>
                </li>
            </ul>
            <div class="w-128 h-14 flex justify-around items-center my-5 mx-auto bg-vh-alice-blue rounded-md">
                <p class="font-semibold text-xl text-vh-green">#</p>
                <p class="font-semibold text-xl text-vh-green">Paciente</p>
                <p class="font-semibold text-xl text-vh-green">Hora</p>
                <p class="font-semibold text-xl text-vh-green">Fecha</p>
                <div class="w-2/12">
                    <p class="font-semibold text-xl text-vh-green">Herramientas</p>
                </div>
            </div>
            <div
                class="w-128 h-20 flex justify-around items-center my-5 mx-auto bg-vh-green-light rounded-md">
                <p class="font-bold text-lg">#00000</p>
                <p class="font-bold text-lg">lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <div class="w-2/12 flex justify-around items-center">
                    <button target="_self" class="assign_appointment">
                        <a href="#">
                            <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="noti_icon"
                                class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                        </a>
                    </button>
                    <button>
                        <a href="#">
                            <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="config_icon"
                                class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                        </a>
                    </button>
                </div>
            </div>
            <div
                class="w-128 h-20 flex justify-around items-center my-5 mx-auto bg-vh-green-light rounded-md">
                <p class="font-bold text-lg">#lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <div class="w-2/12 flex justify-around items-center">
                    <button target="_self" class="assign_appointment">
                        <a href="#">
                            <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="noti_icon"
                                class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                        </a>
                    </button>
                    <button>
                        <a href="#">
                            <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="config_icon"
                                class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                        </a>
                    </button>
                </div>
            </div>
            <div
                class="w-128 h-20 flex justify-around items-center my-5 mx-auto bg-vh-green-light  rounded-md">
                <p class="font-bold text-lg">#lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <div class="w-2/12 flex justify-around items-center">
                    <button target="_self" class="assign_appointment">
                        <a href="#">
                            <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="noti_icon"
                                class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                        </a>
                    </button>
                    <button>
                        <a href="#">
                            <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="config_icon"
                                class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                        </a>
                    </button>
                </div>
            </div>
            <div
                class="w-128 h-20 flex justify-around items-center my-5 mx-auto bg-vh-green-light rounded-md">
                <p class="font-bold text-lg">#lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <div class="w-2/12 flex justify-around items-center">
                    <button target="_self" class="assign_appointment">
                        <a href="#">
                            <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="noti_icon"
                                class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                        </a>
                    </button>
                    <button>
                        <a href="#">
                            <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="config_icon"
                                class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Estilos Mobile -->
    <div class="lg:hidden flex justify-center items-center m-4">
        <div class="">
            <div class="mb-2">
                <h2 class="text-center font-bold text-2xl">
                    Citas del Area de Pediatria
                </h2>
            </div>
            <div class="flex-col w-80 h-auto p-2 mb-20 bg-white opacity-80 rounded-xl shadow-xl">
                <div class="pt-4">
                    <ul class="w-6/12  mx-4 border border-solid border-vh-green rounded-3xl">
                        <li class="font-semibold ml-2 p-2 relative group">
                            <a href="/appointment" class="flex text-vh-green">Presencial <img id="menu-icon"
                                    class="w-4 mx-6" src="{{ asset('storage/svg/filtro.svg') }}" alt="Inicio" /></a>
                        </li>
                    </ul>
                </div>

                <div class="w-72 h-16 flex justify-around items-center mt-10 mx-auto bg-vh-alice-blue rounded-md">
                    <p class="font-semibold text-xl text-vh-green">#00000</p>
                    <div class="w-4/12 flex justify-around items-center">
                        <button target="_self" class="assign_appointment">
                            <a href="#">
                                <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="noti_icon"
                                    class="w-10 h-10 p-2 bg-white shadow-xl rounded">
                            </a>
                        </button>
                        <button>
                            <a href="#">
                                <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="config_icon"
                                    class="w-10 h-10 p-2 bg-white shadow-xl rounded">
                            </a>
                        </button>
                    </div>
                </div>
                <div class="w-72 h-10 flex justify-around items-center my-2 mx-auto bg-vh-green-light  rounded-md">
                    <p class="font-semibold text-xl text-black">Paciente</p>
                    <p class="font-semibold text-xl text-vh-green">Juan Jose</p>
                </div>
                <div class="w-72 h-10 flex justify-around items-center my-2 mx-auto bg-vh-green-light  rounded-md">
                    <p class="font-semibold text-xl text-black">Hora</p>
                    <p class="font-semibold text-xl text-vh-green">10 am</p>
                </div>
                <div class="w-72 h-10 flex justify-around items-center my-2 mx-auto bg-vh-green-light  rounded-md">
                    <p class="font-semibold text-xl text-black">Fecha</p>
                    <p class="font-semibold text-xl text-vh-green">31/05/2024</p>
                </div>


                <div class="w-72 h-16 flex justify-around items-center mt-10 mx-auto bg-vh-alice-blue rounded-md">
                    <p class="font-semibold text-xl text-vh-green">#00000</p>
                    <div class="w-4/12 flex justify-around items-center">
                        <button target="_self" class="assign_appointment">
                            <a href="#">
                                <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="noti_icon"
                                    class="w-10 h-10 p-2 bg-white shadow-xl rounded">
                            </a>
                        </button>
                        <button>
                            <a href="#">
                                <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="config_icon"
                                    class="w-10 h-10 p-2 bg-white shadow-xl rounded">
                            </a>
                        </button>
                    </div>
                </div>
                <div class="w-72 h-10 flex justify-around items-center my-2 mx-auto bg-vh-green-light  rounded-md">
                    <p class="font-semibold text-xl text-black">Paciente</p>
                    <p class="font-semibold text-xl text-vh-green">Juan Jose</p>
                </div>
                <div class="w-72 h-10 flex justify-around items-center my-2 mx-auto bg-vh-green-light  rounded-md">
                    <p class="font-semibold text-xl text-black">Hora</p>
                    <p class="font-semibold text-xl text-vh-green">10 am</p>
                </div>
                <div class="w-72 h-10 flex justify-around items-center my-2 mx-auto bg-vh-green-light  rounded-md">
                    <p class="font-semibold text-xl text-black">Fecha</p>
                    <p class="font-semibold text-xl text-vh-green">31/05/2024</p>
                </div>

                <div class="w-72 h-16 flex justify-around items-center mt-10 mx-auto bg-vh-alice-blue rounded-md">
                    <p class="font-semibold text-xl text-vh-green">#00000</p>
                    <div class="w-4/12 flex justify-around items-center">
                        <button target="_self" class="assign_appointment">
                            <a href="#">
                                <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="noti_icon"
                                    class="w-10 h-10 p-2 bg-white shadow-xl rounded">
                            </a>
                        </button>
                        <button>
                            <a href="#">
                                <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="config_icon"
                                    class="w-10 h-10 p-2 bg-white shadow-xl rounded">
                            </a>
                        </button>
                    </div>
                </div>
                <div class="w-72 h-10 flex justify-around items-center my-2 mx-auto bg-vh-green-light  rounded-md">
                    <p class="font-semibold text-xl text-black">Paciente</p>
                    <p class="font-semibold text-xl text-vh-green">Juan Jose</p>
                </div>
                <div class="w-72 h-10 flex justify-around items-center my-2 mx-auto bg-vh-green-light  rounded-md">
                    <p class="font-semibold text-xl text-black">Hora</p>
                    <p class="font-semibold text-xl text-vh-green">10 am</p>
                </div>
                <div class="w-72 h-10 flex justify-around items-center my-2 mx-auto bg-vh-green-light  rounded-md">
                    <p class="font-semibold text-xl text-black">Fecha</p>
                    <p class="font-semibold text-xl text-vh-green">31/05/2024</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>