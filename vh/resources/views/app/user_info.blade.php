<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de Usuario</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/loader.css', 'resources/js/preloader.js', 'resources/js/scroll.js', 'resources/js/user.js'])
</head>

<body class="w-full h-screen overflow-scroll">
    @include('templates.loader')
    <div class="w-full h-auto">
        @include('templates.header')
    </div>

    <!-- Menu -->
    <div class="pt-8 pb-2 px-20 bg-vh-gray-light border-b border-gray-300">
        <h1 class="text-2xl font-bold mb-4">Configuración</h1>
        <nav class="pt-4">
            <ul class="flex space-x-8">
                <li><button data-target="opcion1"
                        class="menu-link active text-lg font-semibold text-vh-green tracking-wide">Perfil</button></li>
                <li><button data-target="opcion2"
                        class="menu-link text-lg font-semibold text-vh-green tracking-wide">Notificación</button></li>
                <li><button data-target="opcion3"
                        class="menu-link text-lg font-semibold text-vh-green tracking-wide">Privacidad</button></li>
            </ul>
        </nav>
    </div>

    <!-- Contenido -->
    <div id="contentContainer" class="pt-8">
        <div id="opcion1" class="content bg-white">
            <div class="mt-20 mx-auto lg:w-4/5 h-auto flex flex-col justify-center items-center lg:gap-20 lg:flex-row">
                <section class="w-full lg:w-2/5 h-auto flex flex-col items-center lg:gap-10 p-2 lg:border-r-2">
                    <h1 class="font-bold text-3xl">Perfil</h1>
                    <div class="w-56 h-56 rounded-full border border-solid border-vh-green overflow-hidden">
                        <img src="{{ asset('storage/svg/pic_male.svg') }}" alt="Perfil"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex flex-col items-center">
                        <h1 class="text-3xl">John Doe</h1>
                        <p class="text-lg text-vh-green">Paciente</p>
                        <button
                            class="w-40 h-10 p-2 text-white font-bold bg-vh-green rounded-lg mt-4 flex justify-center gap-4">
                            <img src="{{ asset('storage/svg/upload.svg') }}" alt="Subir foto" class="w-6 h-6">
                            <p>Nueva foto</p>
                        </button>
                    </div>
                </section>
                <hr class="w-4/5 mx-auto my-5 border lg:hidden">
                <section class="w-full lg:w-1/2 h-auto flex flex-col items-center">
                    <h1 class="mr-auto font-bold text-3xl">Información</h1>
                    <form class="w-4/5 md:w-1/2 lg:w-full">
                        @csrf
                        <div class="w-full flex justify-end mb-5 border-b-2 p-2">
                            <div class="flex">
                                <button
                                    class="mx-2 p-2 border border-vh-green-medium rounded-md text-lg transition hover:bg-vh-green hover:text-white">Cancelar</button>
                                <button
                                    class="mx-2 p-2 border border-vh-green-medium rounded-md text-lg transition hover:bg-vh-green hover:text-white">Guardar</button>
                            </div>
                        </div>
                        <div class="flex gap-5 mt-5">
                            <label class="w-1/2 block text-lg font-semibold">
                                Nombre *
                                <input type="text" readonly value="{{ $user->name }}"
                                    class="w-full h-10 font-normal border-2 border-solid border-vh-green rounded-lg p-2">
                            </label>
                            <label class="w-1/2 block text-lg font-semibold">
                                Apellido *
                                <input type="text" readonly value="{{ $user->lastName }}"
                                    class="w-full h-10 font-normal border-2 border-solid border-vh-green rounded-lg p-2">
                            </label>
                        </div>
                        <div class="flex gap-5 mt-5">
                            <label class="w-1/2 block text-lg font-semibold">
                                Género *
                                <input type="text" readonly value="{{ $user->gender }}"
                                    class="w-full h-10 font-normal border-2 border-solid border-vh-green rounded-lg p-2">
                            </label>
                            <label class="w-1/2 block text-lg font-semibold">
                                Fecha de nacimiento *
                                <input type="text" readonly value="{{ $user->birth }}"
                                    class="w-full h-10 font-normal border-2 border-solid border-vh-green rounded-lg p-2">
                            </label>
                        </div>
                        <div class="flex gap-5 mt-5">
                            <label class="w-1/2 block text-lg font-semibold">
                                Correo *
                                <input type="text" readonly value="{{ $user->mail }}"
                                    class="w-full h-10 font-normal border-2 border-solid border-vh-green rounded-lg p-2">
                            </label>
                        </div>
                        <input type="hidden" id="_token" value="{{ csrf_token() }}">
                        <div class="w-full">
                            <button type="submit" id="log_out"
                                class="w-auto h-auto mt-10 ml-auto block border border-red-600 text-lg transition hover:bg-red-600 hover:text-white p-2 rounded-lg">Cerrar
                                Sesión</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
        <div id="opcion2" class="content hidden bg-white p-6">
            <h2 class="text-xl font-semibold mb-2">Contenido de la Opción 2</h2>
            <p>Este es el contenido que se muestra para la opción 2.</p>
        </div>
        <div id="opcion3" class="content hidden bg-white p-6">
            <h2 class="text-xl font-semibold mb-2">Contenido de la Opción 3</h2>
            <p>Este es el contenido que se muestra para la opción 3.</p>
        </div>
    </div>

    <div class="w-full h-auto absolute bottom-0">
        @include('templates.footer')
    </div>

    <script src="resources/js/user.js"></script>
</body>

</html>