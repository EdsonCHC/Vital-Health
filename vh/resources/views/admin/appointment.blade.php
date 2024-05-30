<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment</title>
    @vite('resources/css/app.css')

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
                    <!-- <ul class="absolute hidden text-center bg-white mt-2 py-1 px-2 shadow-md w-full z-10 group-hover:block border border-solid border-vh-green rounded-3xl">
                        <li><a href="/appointment" class="w-full h-full block py-1 hover:bg-gray-100">Virtual</a></li>
                    </ul> -->
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
                class="w-128 h-20 flex justify-around items-center my-5 mx-auto bg-vh-green-light opacity-70 rounded-md">
                <p class="font-bold text-lg">#lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <div class="w-2/12 flex justify-around items-center">
                    <a href="#">
                        <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="noti_icon"
                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                    </a>
                    <a href="#">
                        <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="config_icon"
                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                    </a>
                </div>
            </div>
            <div
                class="w-128 h-20 flex justify-around items-center my-5 mx-auto bg-vh-green-light opacity-70 rounded-md">
                <p class="font-bold text-lg">#lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <div class="w-2/12 flex justify-around items-center">
                    <a href="#">
                        <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="noti_icon"
                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                    </a>
                    <a href="#">
                        <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="config_icon"
                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                    </a>
                </div>
            </div>
            <div
                class="w-128 h-20 flex justify-around items-center my-5 mx-auto bg-vh-green-light opacity-70 rounded-md">
                <p class="font-bold text-lg">#lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <div class="w-2/12 flex justify-around items-center">
                    <a href="#">
                        <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="noti_icon"
                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                    </a>
                    <a href="#">
                        <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="config_icon"
                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                    </a>
                </div>
            </div>
            <div
                class="w-128 h-20 flex justify-around items-center my-5 mx-auto bg-vh-green-light opacity-70 rounded-md">
                <p class="font-bold text-lg">#lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <p class="font-bold text-lg">lorem</p>
                <div class="w-2/12 flex justify-around items-center">
                    <a href="#">
                        <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="noti_icon"
                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                    </a>
                    <a href="#">
                        <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="config_icon"
                            class="w-10 h-10 p-2 bg-vh-gray-light rounded">
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>