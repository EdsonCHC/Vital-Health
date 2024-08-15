<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment</title>
    @vite(['resources/css/app.css', 'resources/js/ad_appointment.js'])
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
</head>

<body class="w-full h-full bg-vh-alice-blue">
    <div class="w-auto h-auto fixed top-0 z-10">
        @include('templates.header_ad')
    </div>

    <div class="flex flex-col justify-center mx-4 lg:mx-40 mt-12">
        <div class="mb-2 flex justify-between items-center lg:pl-28">
            <h2 class="font-bold text-2xl">
                Citas del Área de {{ $categoria->nombre }}
            </h2>
            <a href="#" id="new-appointment-btn"
                class="bg-vh-green text-white font-bold py-2 px-4 rounded-lg shadow-lg hover:bg-vh-green-dark">
                Nuevas Solicitudes
            </a>

        </div>

        <div class="flex flex-col bg-white opacity-80 rounded-xl shadow-xl p-4 lg:w-132 lg:ml-40 lg:mt-4">
            <ul class="w-6/12 lg:w-2/12 mx-auto lg:m-4 border border-solid border-vh-green rounded-3xl">
                <li class="font-semibold p-2 relative group text-center lg:text-left">
                    <a href="/appointment" class="flex justify-center lg:justify-start text-vh-green">
                        Presencial
                        <img id="menu-icon" class="w-4 mx-6" src="{{ asset('storage/svg/filtro.svg') }}" alt="Inicio" />
                    </a>
                </li>
            </ul>

            <!-- Header de la tabla -->
            <div class="grid grid-cols-5 gap-2 bg-vh-alice-blue rounded-md p-2 mt-4 lg:my-5">
    <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">#</p>
    <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">Paciente</p>
    <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">Hora</p>
    <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">Fecha</p>
    <p class="font-semibold text-sm lg:text-xl text-vh-green text-center"></p>
</div>

<!-- Cuerpo de la tabla -->
<div class="grid grid-cols-5 gap-2 bg-vh-green-light rounded-md p-2 my-2">
    <p class="font-bold text-sm lg:text-lg text-center">kj</p>
    <p class="font-bold text-sm lg:text-lg text-center">kj</p>
    <p class="font-bold text-sm lg:text-lg text-center">kj</p>
    <p class="font-bold text-sm lg:text-lg text-center">kj</p>
    <div class="flex items-center justify-center space-x-2">
        <!-- Hidden on large screens -->
        <button class="info-button lg:hidden text-white bg-vh-green py-1 px-2 rounded-md shadow-lg flex items-center justify-center">
            <!-- Magnifying Glass icon SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
        </button>
        <!-- Visible on large screens -->
        <button class="info-button hidden lg:flex text-white bg-vh-green py-1 px-3 rounded-md shadow-lg">
            Información
        </button>
    </div>
</div>

<div class="grid grid-cols-5 gap-2 bg-vh-green-light rounded-md p-2 my-2">
    <p class="font-bold text-sm lg:text-lg text-center">kj</p>
    <p class="font-bold text-sm lg:text-lg text-center">kj</p>
    <p class="font-bold text-sm lg:text-lg text-center">kj</p>
    <p class="font-bold text-sm lg:text-lg text-center">kj</p>
    <div class="flex items-center justify-center space-x-2">
        <!-- Hidden on large screens -->
        <button class="info-button lg:hidden text-white bg-vh-green py-1 px-2 rounded-md shadow-lg flex items-center justify-center">
            <!-- Magnifying Glass icon SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
        </button>
        <!-- Visible on large screens -->
        <button class="info-button hidden lg:flex text-white bg-vh-green py-1 px-3 rounded-md shadow-lg">
            Información
        </button>
    </div>
</div>

        </div>
    </div>
</body>

</html>