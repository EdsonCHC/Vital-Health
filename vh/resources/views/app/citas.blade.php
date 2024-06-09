<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>

    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js', 'resources/css/loader.css', 'resources/js/preloader.js'])
</head>

<body class="w-full h-full">
    @include('templates.loader')
    <div class="w-full h-auto">
        @include('templates.header')
    </div>
    <main class="w-full max-w-6xl h-auto p-4 lg:rounded-md mt-24 mx-auto bg-white sm:bg-blue-100">

        <section class="flex justify-between">
            <h2 class="font-bold text-center text-2xl text-vh-green">Menu de Citas</h2>
            <div class="lg:relative inline-block text-left">
                <div>
                    <button type="button"
                        class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-vh-green px-3 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-vh-green-medium "
                        id="menu-button" aria-expanded="false" aria-haspopup="true">
                        <h2>Opciones de búsqueda</h2>
                        <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <div id="menu-items"
                    class="absolute right-0 mt-2 w-36 origin-top-right rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-10 hidden"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1 bg-green-50 rounded-xl" role="none">
                        <a href="#" class="block px-4 py-2 text-sm text-black font-bold hover:bg-green-200 rounded-md"
                            role="menuitem" tabindex="-1" id="menu-item-0">Todos</a>
                        <a href="#" class="block px-4 py-2 text-sm text-black font-bold hover:bg-green-200 rounded-md"
                            role="menuitem" tabindex="-1" id="menu-item-1">Completados</a>
                        <a href="#" class="block px-4 py-2 text-sm text-black font-bold hover:bg-green-200 rounded-md"
                            role="menuitem" tabindex="-1" id="menu-item-2">En proceso</a>
                    </div>
                </div>
            </div>
        </section>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("menu-items").classList.add("hidden");
            });

            var menuButton = document.getElementById("menu-button");
            var menuItems = document.getElementById("menu-items");

            menuButton.addEventListener("click", function () {
                var expanded = this.getAttribute("aria-expanded") === "true";
                this.setAttribute("aria-expanded", !expanded);
                menuItems.classList.toggle("hidden");
            });

            document.addEventListener("click", function (event) {
                var isClickInsideMenu = menuButton.contains(event.target) || menuItems.contains(event.target);
                if (!isClickInsideMenu) {
                    menuItems.classList.add("hidden");
                }
            });
        </script>



        <section class="w-full h-auto my-4 font-bold mt-12">
            <div class="flex gap-8 flex-wrap justify-center lg:justify-start">
                <div class="w-72 h-64 py-4 flex flex-col items-center bg-gray-100 rounded-lg relative sm:bg-white">
                    <div class="absolute top-0 right-0 mt-2 mr-2">
                        <div class="relative">
                            <button
                                class="h-8 w-8 flex items-center justify-center bg-gray-300 rounded-full focus:outline-none dropdown-toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="hidden absolute right-0 mt-2 w-36 bg-white rounded-md shadow-lg dropdown-menu">
                                <div class="py-1">
                                    <button id="show-alert" href="#"
                                        class="block px-4 py-2 text-sm text-black hover:bg-gray-100 w-full">
                                        <img src="{{asset('storage/svg/info.svg')}}" class="w-4 h-4 inline-block mr-2"
                                            alt="">
                                        Información
                                    </button>
                                    <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-gray-100">
                                        <img src="{{asset('storage/svg/trash.svg')}}" class="w-4 h-4 inline-block mr-2"
                                            alt="">
                                        Eliminar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-20 h-20 bg-purple-300 rounded-full"></div>
                    <div class="w-9/12 h-28 p-2 text-center">
                        <h2>Odontología</h2>
                        <h3>Doc: Alejandro García</h3>
                        <button class="bg-green-200 rounded-md text-vh-green font-bold p-1 px-2 mt-2">En
                            Proceso</button>
                        <h4 class="mt-2">Hora: 8:00 A.M</h4>
                        <h4>Fecha: 8 de junio de 2024</h4>
                    </div>
                </div>

                <!-- Second Container -->
                <div class="w-72 h-64 py-4 flex flex-col items-center bg-gray-100 rounded-lg relative sm:bg-white">
                    <div class="absolute top-0 right-0 mt-2 mr-2">
                        <div class="relative">
                            <button
                                class="h-8 w-8 flex items-center justify-center bg-gray-300 rounded-full focus:outline-none dropdown-toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="hidden absolute right-0 mt-2 w-36 bg-white rounded-md shadow-lg dropdown-menu">
                                <div class="py-1">
                                    <button class="block px-4 py-2 text-sm text-black hover:bg-gray-100">
                                        <img src="{{asset('storage/svg/info.svg')}}" class="w-4 h-4 inline-block mr-2"
                                            alt="">
                                        Información
                                    </button>
                                    <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-gray-100">
                                        <img src="{{asset('storage/svg/trash.svg')}}" class="w-4 h-4 inline-block mr-2"
                                            alt="">
                                        Eliminar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-20 h-20 bg-purple-300 rounded-full"></div>
                    <div class="w-9/12 h-28 p-2 text-center">
                        <h2>Odontología</h2>
                        <h3>Doc: Alejandro García</h3>
                        <button class="bg-blue-200 rounded-md text-blue-700 font-bold p-1 px-2 mt-2"
                            id="show-alert">Completado</button>
                        <h4 class="mt-2">Hora: 8:00 A.M</h4>
                        <h4>Fecha: 8 de junio de 2024</h4>
                    </div>
                </div>
            </div>
        </section>


        <script>
            document.addEventListener("click", function (event) {
                const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
                dropdownToggles.forEach(function (toggle) {
                    const dropdownMenu = toggle.nextElementSibling;
                    if (toggle.contains(event.target) && dropdownMenu.classList.contains('hidden')) {
                        dropdownMenu.classList.remove('hidden');
                    } else {
                        dropdownMenu.classList.add('hidden');
                    }
                });
            });
        </script>


    </main>
    <div class="w-full h-auto lg:bottom-0 lg:absolute">
        @include('templates.footer')
    </div>
</body>

</html>