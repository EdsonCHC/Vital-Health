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
    <main class="w-full h-auto lg:px-10 p-4 lg:rounded-md lg:mt-10 mt-16 mx-auto bg-white ">

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
            </div>
        </section>

        <section class="w-full h-auto my-4 font-bold mt-12">

            <div class="flex gap-8 flex-wrap justify-center lg:justify-start">

                <div class="w-72 h-80 py-4 flex flex-col items-center bg-blue-50 rounded-lg ">
                    <div class="flex justify-end w-full">
                        <div class="lg:relative md:relative px-4">
                            <div class="flex items-center justify-end">
                                <button
                                    class="h-8 w-8 flex items-center justify-center bg-gray-300 rounded-full focus:outline-none dropdown-toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="hidden ml-2 mt-8 w-36 bg-white rounded-md shadow-lg dropdown-menu absolute">
                                    <div class="py-1">
                                        <button id="show-alert" href="#"
                                            class="block px-4 py-2 text-sm text-black hover:bg-gray-100 w-full">
                                            <img src="{{asset('storage/svg/info.svg')}}"
                                                class="w-4 h-4 inline-block mr-2" alt="">
                                            Información
                                        </button>
                                        <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-gray-100">
                                            <img src="{{asset('storage/svg/trash.svg')}}"
                                                class="w-4 h-4 inline-block mr-2" alt="">
                                            Eliminar
                                        </a>
                                    </div>
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

            </div>


            <div class="flex justify-end w-full lg:my-16 py-4 px-4 ">

                <div class="flex items-center justify-center mt-8">
                    <div class="lg:relative">
                        <button id="filterButton"
                            class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400 transition duration-300 ease-in-out">
                            Filtrar
                            <span class="hidden md:inline">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline ml-1" viewBox="0 0 20 20"
                                    fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 10l5-5 5 5m0 0l-5 5-5-5">
                                    </path>
                                </svg>
                            </span>


                        </button>
                        <div id="filterMenu"
                            class="absolute bottom-10 right-0 mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-md z-10 hidden">
                            <a href="#"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100 transition duration-300 ease-in-out">Un
                                dia
                            </a>
                            <a href="#"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100 transition duration-300 ease-in-out">Una
                                semana
                            </a>
                            <a href="#"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100 transition duration-300 ease-in-out">Un
                                mes
                            </a>
                        </div>
                    </div>

                    <script>
                        const filterButton = document.getElementById('filterButton');
                        const filterMenu = document.getElementById('filterMenu');

                        filterButton.addEventListener('click', function () {
                            filterMenu.classList.toggle('hidden');
                        });

                        document.addEventListener('click', function (event) {
                            const isClickInside = filterButton.contains(event.target) || filterMenu.contains(event.target);
                            if (!isClickInside) {
                                filterMenu.classList.add('hidden');
                            }
                        });
                    </script>

                    <div class="lg:relative px-2 ">
                        <button id="customMenuButton"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4 12a2 2 0 110-4 2 2 0 010 4zm6 0a2 2 0 110-4 2 2 0 010 4zm6 0a2 2 0 110-4 2 2 0 010 4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <button
                        class="h-8 w-8 flex items-center justify-center bg-gray-300 rounded-full focus:outline-none ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </button>

                    <div class="ml-2 flex items-center justify-center w-8 h-8 bg-white rounded-md shadow-md">
                        <span class="text-sm">1</span>
                    </div>

                    <button
                        class="h-8 w-8 flex items-center justify-center bg-gray-300 rounded-full focus:outline-none ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </div>


        </section>

      
    </main>
  
  
    <div class="w-full h-auto">
        @include('templates.chat_ia')
    </div>
    <div class="w-full h-auto absolute  bottom-0">
        @include('templates.footer')
    </div>
</body>

</html>