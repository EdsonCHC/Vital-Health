<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff</title>
    @vite(['resources/css/app.css', 'resources/css/admin_staff.css', 'resources/js/admin_staff.js'])
</head>

<body class="w-full h-full bg-vh-alice-blue">
    <div class="w-auto h-auto fixed">
        @include('templates.header_ad')
    </div>

    <!-- Estilos Desktop -->
    <div class="hidden lg:flex flex-col justify-between items-center ml-72 mt-12">
        <div class="mb-2">
            <h2 class="font-bold text-3xl tracking-wider">
                Personal
            </h2>
        </div>
        <div class="flex ml-auto mr-10">
            <button target="_self" id="create_staff"
                class="w-44 h-10 my-4 font-semibold text-base text-white bg-vh-green hover:bg-vh-gray transition duration-300 hover:text-black inline-block text-center rounded-sm tracking-wider">
                Nuevo Doctor
            </button>
        </div>
        <div class="w-full mx-0 my-10 flex flex-wrap">
            <div class="w-56 h-92 m-5 p-4 bg-green-200 py-5 justify-center items-center rounded-xl">
                <div class="relative">
                    <button id="menuButton" class="flex ml-auto">
                        <a href="#">
                            <img id="menu-icon" class="h-8 w-8 mx-2 " src="{{ asset('storage/svg/option-icon.svg') }}"
                                alt="Inicio" />
                        </a>
                    </button>
                    <div id="menuOptions"
                        class="hidden absolute bg-white border border-gray-300 shadow-lg py-2 w-32 rounded-md">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Editar</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Historial</a>
                    </div>
                </div>
                <div class="flex justify-center items-center flex-col">
                    <div class="bg-green-400 rounded-full w-24 h-24 mb-4"></div>
                    <h3 class="font-bold text-xl p-2">Pediatria</h3>
                    <p class="text-gray-400 mb-4">Disponible</p>
                    <div class="">
                        <button>
                            <img id="menu-icon" class="h-8 w-8 mx-2 " src="{{ asset('storage/svg/trash-icon.svg') }}"
                                alt="Inicio" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estilos Mobile -->
    <div class="lg:hidden flex justify-center items-center m-4">
        <div class="">
            <div class="mb-2">
                <h2 class="text-center font-bold text-2xl">
                    Personal
                </h2>
            </div>
        </div>
    </div>
</body>

</html>
