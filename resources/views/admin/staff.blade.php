<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff</title>
    @vite(['resources/css/app.css', 'resources/js/ad_staff.js'])
</head>

<body class="w-full h-full bg-vh-alice-blue">
    <div class="w-auto h-auto fixed">
        @include('templates.header_ad')
    </div>

    <!-- Estilos Desktop -->
    <div class="hidden lg:flex flex-col justify-between items-center ml-72 mt-12">
        <div class="mb-2">
            <h2 class="text-xl font-bold mb-4">Personal de la Categoria:{{ $categoria->nombre }}</h2>
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
                    <button id="menu_opti" class="flex ml-auto">
                        <img id="menu-icon" class="h-8 w-8 mx-2" src="{{ asset('storage/svg/option-icon.svg') }}"
                            alt="Inicio" />
                    </button>
                    <div id="menuOptions"
                        class="w-32 ml-40 py-2 hidden absolute bg-white border border-gray-300 shadow-lg rounded-md">
                        <a href="#" id="edit_staff" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Editar</a>
                        <a href="#" id="history_staff"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Historial</a>
                    </div>
                </div>
                <div class="flex justify-center items-center flex-col">
                    <div class="bg-green-400 rounded-full w-24 h-24 mb-4"></div>
                    <h3 class="font-bold text-xl p-2">Pediatria</h3>
                    <p class="text-gray-400 mb-4">Disponible</p>
                    <div class="">
                        <button id="delete_doc">
                            <img id="menu-icon" class="h-8 w-8 mx-2 " src="{{ asset('storage/svg/trash-icon.svg') }}"
                                alt="Inicio" />
                        </button>
                    </div>
                </div>
            </div>
            <!-- Demas cartas -->
        </div>
    </div>

    <!-- Estilos Mobile -->
    <div class="w-full lg:hidden flex-col justify-center items-center my-4">
        <div class="w-full mt-10 flex items-center justify-center">
            <h2 class="mr-10 font-bold text-2xl">
                Personal
            </h2>
            <button target="_self" id="create_staff"
                class="w-44 h-10 font-semibold text-white bg-vh-green hover:bg-vh-gray transition duration-300 hover:text-black rounded-lg tracking-wider">
                Nuevo Doctor
            </button>
        </div>
        <div class="w-full my-10 flex flex-wrap">
            <div class="w-40 h-56 mx-4 bg-green-200 py-2 justify-center items-center rounded-xl">
                <div class="relative">
                    <button id="menu_opti" class="menu_opti flex ml-auto">
                        <img id="menu-icon" class="h-8 w-8 mx-2" src="{{ asset('storage/svg/option-icon.svg') }}"
                            alt="Inicio" />
                    </button>
                    <div id="menuOptions"
                        class="w-32 ml-10 py-2 hidden absolute bg-white border border-gray-300 shadow-lg rounded-md">
                        <a href="#" id="edit_staff" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Editar</a>
                        <a href="#" id="history_staff"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Historial</a>
                    </div>
                </div>
                <div class="flex justify-center items-center flex-col">
                    <div class="bg-green-400 rounded-full w-20 h-20"></div>
                    <h3 class="font-bold text-xl my-2 p-2">Pediatria</h3>
                    <div class="flex items-center">
                        <button>
                            <img id="menu-icon" class="h-8 w-10 mx-2 " src="{{ asset('storage/svg/check.svg') }}"
                                alt="Inicio" />
                        </button>
                        <button id="delete_doc">
                            <img id="menu-icon" class="h-6 w-8 mx-2 " src="{{ asset('storage/svg/trash-icon.svg') }}"
                                alt="Inicio" />
                        </button>
                    </div>
                </div>
            </div>
            <!-- Demas Cartas -->
        </div>
    </div>
    <script>
        document.querySelectorAll('#menu_opti, .menu_opti').forEach(function (element) {
            element.addEventListener('click', function (event) {
                event.preventDefault();
                var menuOptions = this.nextElementSibling;
                menuOptions.classList.toggle('hidden');
            });
        });
    </script>
</body>

</html>