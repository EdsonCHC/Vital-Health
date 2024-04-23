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
    <div class="flex justify-center items-center">
    <div class="w-1/2">
        <div class="ml-4 mt-4 mb-2">
            <span class="font-bold text-lg">Brindamos Ayuda</span>
            <span class="font-bold text-lg">En tu Futuro</span>
        </div>
        <a href="/login" target="_self" class="w-4/5 h-8 text-white bg-vh-green text-sm shadow-xl mb-10 rounded-full lg:w-2/5 hover:bg-white hover:text-vh-green inline-block text-center pt-1 mx-4">
            Logueate ahora
        </a>
    </div>
    <div class="w-1/2">
        <p class="text-xs text-justify mb-4 font-bold text-gray-400 mx-4 -mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    </div>
</div>
<div class="flex justify-center text-center flex-col items-center">
    <h2 class="font-bold text text-xl">Lorem Ipsum</h2>
    <p class="text-sm font-bold text-gray-400 mx-4 mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    <div class="mx-4 bg-green-100 py-4 my-4 rounded-lg shadow-lg px-8 ">
          <h2 class="text-lg font-bold mb-2">Juan Jose Galdamez</h2>
          <p class="text-sm font-bold text-gray-400 mt-2">Primary Care Doctor</p>
          <a class="text-xs sm:text-sm text-justify text-normal block">Very personable and good listener.
          Makes you feel comfortable and open immediately. Felt well taken care...</a>
    </div>
</div>
    <div class="h-2/5 hidden">
        @include('templates.footer')
        <div class="">
            <object data="" type="image/svg+xml"></object>
        </div>
    </div>
</body>
</html>