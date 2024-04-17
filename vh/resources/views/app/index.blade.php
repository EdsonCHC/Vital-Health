<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    @vite('resources/css/app.css')
    <!-- @vite(['resources/js/app.js']) not used now  -->
</head>
<body class="w-full h-screen flex flex-col">
    <div class="h-2/5">
        @include('templates.header')
        <div class="">
            <object data="" type="image/svg+xml"></object>
        </div>
    </div>
    <div class="flex bg-vh-gray-light w-full h-52 hidden">
        <div class="w-auto mx-auto mt-8">
            <img src="{{asset('storage/svg/doctor.svg')}}" type="image/svg+xml"/>
        </div>
        <div class="flex flex-col justify-center">
            <div class="w-10 mb-4 ml-4 bg-vh-green-light">a</div>
            <div class="w-12 mb-4 ml-2 bg-vh-green-medium">a</div>
            <div class="w-14 mb-2  bg-vh-green">a</div>
        </div>
    </div>
    <div class="flex flex-col bg-vh-green text-white w-full h-3/5 px-6 py-4">
        <h1 class="text-5xl font-semibold">VITAL</h1>
        <h1 class="text-5xl font-semibold">HEALTH</h1>
        <p class="text-1xl font-bold mb-4">Tus salud nuestro compromiso</p>
        <p class="text-md mb-4">¿Por qué es importante la salud? Existen varios beneficios de tener una vida saludable, pero el principal de ellos que podríamos nombrar es que nuestro cuerpo se libera de las diversas formas de trastornos y complicaciones y, por tanto, se obtiene una vida más larga, sin sufrir ningún tipo de dolores o malestares.</p>
        <a href="/login" target="_self" class="bg-white text-black p-2 font-bold rounded w-1/2 text-center">
            Iniciar Sesión
        </a>
    </div>
    <div class="h-2/5 hidden">
        @include('templates.footer')
        <div class="">
            <object data="" type="image/svg+xml"></object>
        </div>
    </div>
</body>
</html>