<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/register.js','resources/css/loader.css', 'resources/js/preloader.js'])
</head>

<body class="w-full h-screen">
    @include('templates.loader')
    <div class="w-full h-screen p-2 flex flex-col bg-white lg:flex-row">
        <div class="flex flex-col w-full h-full lg:w-3/5 lg:order-2">
            <div class="flex flex-col items-center w-full h-full lg:justify-center">
                <a href="/" class="">
                    <img src="{{asset('storage/svg/logo.svg')}}" type="image/svg+xml"></img><!--LOGO-->
                </a>
                <h1 class="font-bold text-2xl mb-4">Registrarse</h1>
                <form action="/" class="w-4/5 lg:flex flex-col items-center">
                    @csrf
                    <input type="hidden" id="_token" value="{{csrf_token()}}">
                    <input class="block w-full p-2 outline outline-1 outline-vh-green mb-4 lg:w-2/5 " type="text "
                        placeholder="Nombres" id="name">
                    <input class="block w-full p-2 outline outline-1 outline-vh-green mb-4 lg:w-2/5 " type="text"
                        placeholder="Apellidos" id="lastName">
                    <input class="block w-full p-2 outline outline-1 outline-vh-green mb-4 lg:w-2/5 " type="email"
                        placeholder="Email" id="mail">
                    <input class="block w-full p-2 outline outline-1 outline-vh-green mb-10 lg:w-2/5 " type="password"
                        placeholder="Contraseña" id="password">
                    <button id="register" class="w-full p-2 rounded-md bg-vh-green text-white font-bold  lg:w-2/5"
                        id="show-alert">Registrarse</button>
                </form>
                <p class="my-8">¿Ya posees una cuenta?
                    <a href="/login" class="text-vh-green font-bold">
                        Iniciar Sesión
                    </a>
                </p>
            </div>
            <p class="flex grow items-end text-vh-green text-center lg:block">© 2024 Vital Health Todos los derechos
                reservados</p>
        </div>
        <div class="hidden lg:block bg-vh-green w-2/5 rounded-xl p-11 order-1">
            <div class="lg:bg-black opacity-20 w-full h-full rounded-xl"></div>
            <div class="">
                <img src="{{asset('storage/svg/kid.svg')}}" alt="doctor_svg" class="absolute start-2 bottom-2">
            </div>
        </div>
    </div>
</body>

</html>