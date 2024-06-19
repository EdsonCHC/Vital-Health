<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expediente</title>
    <!-- Incluir Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js'])
</head>

<body class="w-full h-screen bg-gray-200">
    <!-- Encabezado -->
    <div class="flex w-full">
        <div class="fixed top-0 h-full z-10">
            @include('templates.header_doc')
        </div>
        <div class="ml-60 w-full h-auto">
            <div class="w-auto h-auto my-4 mx-4 lg:mx-16 lg:mt-10 ">
                <div class=" md:w-full w-full ">
                    <h2 class=" font-bold  text-2xl text-vh-green">Expedientes de Usuarios </h2>
                    <div class="w-full">
                        <form method="get" action="#" class="relative">
                            <div class="relative mt-5">
                                <input type="text" name="s" id="s"
                                    class="block w-full h-12 pl-16 py-2 border border-gray-200 rounded-md leading-5 bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:text-gray-900 sm:text-sm transition duration-150 ease-in-out"
                                    placeholder="Buscar ">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                    <object data="{{asset('storage/svg/lupa.svg')}}" type="image/svg+xml"></object>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class=" md:w-full w-full ">
                    <div class="flex-col p-4 h-auto  bg-white  rounded-xl shadow- mt-4 ">
                        <div class=" md:w-full w-full lg:items-end lg:justify-end">
                            <a href="/" target="_self"
                                class="w-2/5 lg:text-base text-base p-2 lg:w-40 h-12 text-white font-semibold bg-vh-green tracking-wide shadow-xl lg:my-2 lg:mx-4 rounded-lg hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center content-center">
                                Nuevo Expediente </a>
                        </div>
                        <div class="w-auto h-14 flex justify-around items-center my-5 mx-4 bg-vh-alice-blue rounded-md">
                            <p class="font-semibold text-xl text-vh-green">Codigo</p>
                            <p class="font-semibold text-xl text-vh-green">Paciente</p>
                            <p class="font-semibold text-xl text-vh-green">Expediente</p>
                            <div class="w-2/12">
                                <p class="font-semibold text-xl text-vh-green">Herramientas</p>
                            </div>
                        </div>
                        <div class="w-auto h-16 flex justify-around items-center my-5 mx-4 bg-green-200 rounded-md">
                            <p class="font-bold text-lg">lorem</p>
                            <p class="font-bold text-lg">lorem</p>
                            <button target="_self" class="assign_appointment">
                                <a href="#">
                                    <img src="{{ asset('storage/svg/eye-icon.svg') }}" alt="noti_icon"
                                        class="w-10 h-10 p-2 ">
                                </a>
                            </button>
                            <div class="w-2/12 flex items-center space-x-10">
                                <button target="_self" class="assign_appointment ml-4">
                                    <a href="#">
                                        <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="noti_icon"
                                            class="w-10 h-10 p-2  rounded">
                                    </a>
                                </button>
                                <button>
                                    <a href="#">
                                        <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="config_icon"
                                            class="w-10 h-10 p-2 rounded">
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>