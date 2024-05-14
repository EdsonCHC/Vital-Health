<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area</title>
    @vite('resources/css/app.css')
    <!-- @vite(['resources/js/app.js']) not used now  -->
</head>

<body>
    <div class="w-full h-full absolute top-0 z-10">
        @include('templates.header')
    </div>
    <div class="w-full ">

        <div class=" hidden lg:flex  px-44  pt-40 ">
            <h2 class="font-bold text-2xl lg:text-4xl  mb-6">
                Servicios</h2>
        </div>

        <div class=" hidden lg:flex px-44  py-8 ">
            <div class="w-3/4">
                <form method="get" action="#" class="relative z-50">
                    <div class="relative ml-26">
                        <input type="text" name="s" id="s"
                            class="block w-full  pl-16 py-2 border border-gray-200 rounded-md leading-5 bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:text-gray-900 sm:text-sm transition duration-150 ease-in-out"
                            placeholder="Buscar chat">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <object data="{{asset('storage/svg/lupa.svg')}}" type="image/svg+xml"></object>
                        </span>
                    </div>
                </form>
            </div>
            <div class="w-40 ml-4">
                <label for="filtro"
                    class="border-4 border-green-900 rounded-full flex items-center p-2 relative cursor-pointer">
                    <select id="filtro" name="filtro"
                        class="absolute inset-0 w-full h-full border-none cursor-pointer bg-transparent appearance-none z-10 right-0 focus:outline-none opacity-0">
                        <option value="todos" selected>Todos</option>
                        <option value="c1">Ascedente</option>
                        <option value="c2">Descendente</option>
                        <option value="c3">Silenciados</option>
                    </select>
                    <div class="flex justify-center items-center w-full">
                        <div class="relative flex items-center">
                            <span id="filtroSeleccionado" class="flex pr-2 text-gray-700">Todos</span>
                            <object data="{{asset('storage/svg/filtro.svg')}}" type="image/svg+xml"></object>
                        </div>
                    </div>
                </label>
            </div>

            <script>
                document.getElementById("filtro").addEventListener("change", function () {
                    var selectedOption = this.options[this.selectedIndex].text;
                    document.getElementById("filtroSeleccionado").textContent = selectedOption;
                });
            </script>
        </div>
        <div class=" lg:hidden px-8  pt-28 ">
            <div class="w-full">
                <form method="get" action="#" class="relative z-50">
                    <div class="relative ml-26">
                        <input type="text" name="s" id="s"
                            class="block w-full  pl-16 py-2 border border-gray-200 rounded-md leading-5 bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:text-gray-900 sm:text-sm transition duration-150 ease-in-out"
                            placeholder="Buscar chat">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <object data="{{asset('storage/svg/lupa.svg')}}" type="image/svg+xml"></object>
                        </span>
                    </div>
                </form>
            </div>

        </div>

        <div class="lg:hidden w-full px-8 my-5 flex ">
            <div class="w-1/2 flex items-center ">
                <h2 class="font-bold text-2xl lg:text-4xl mb-6">Servicios</h2>
            </div>
            <div class="ml-4 w-1/2 flex justify-end">
                 <label for="filtro1"
                    class="border-4 border-green-900 rounded-full flex items-center p-2 relative cursor-pointer">
                    <select id="filtro1" name="filtro1"
                        class="absolute inset-0 w-full h-full border-none cursor-pointer bg-transparent appearance-none z-10 right-0 focus:outline-none opacity-0">
                        <option value="todos" selected>Todos</option>
                        <option value="c1">Ascedente</option>
                        <option value="c2">Descendente</option>
                        <option value="c3">Silenciados</option>
                    </select>
                    <div class="flex justify-center items-center w-full">
                        <div class="relative flex items-center">
                            <span id="filtroSeleccionado1" class="flex pr-2 text-gray-700">Todos</span>
                            <object data="{{asset('storage/svg/filtro.svg')}}" type="image/svg+xml"></object>
                        </div>
                    </div>
                </label>
            </div>
        </div>
        <script>
            document.getElementById("filtro1").addEventListener("change", function () {
                var selectedOption = this.options[this.selectedIndex].text;
                document.getElementById("filtroSeleccionado1").textContent = selectedOption;
            });
        </script>


        <div class="flex flex-wrap m-4 lg:m-16">
            <div class="w-full lg:w-1/4 p-4">
                <div class="bg-green-50 py-5 justify-center items-center rounded-3xl">
                    <div class="flex justify-center items-center flex-col">
                        <div class="bg-green-200 rounded-full h-28 w-24 lg:h-40 lg:w-36"></div>
                        <h3 class="font-bold text-xl p-2">Pediatria</h3>
                        <p class="text-gray-400"> Disponible</p>
                        <div class="bg-vh-green rounded-full h-16 w-16 lg:h-16 lg:w-16 m-6 lg:m-6"></div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/4 p-4"> 
                <div class="bg-green-50 py-5 justify-center items-center rounded-3xl">
                    <div class="flex justify-center items-center flex-col">
                        <div class="bg-green-200 rounded-full h-28 w-24 lg:h-40 lg:w-36"></div>
                        <h3 class="font-bold text-xl p-2">Pediatria</h3>
                        <p class="text-gray-400"> Disponible</p>
                        <div class="bg-vh-green rounded-full h-16 w-16 lg:h-16 lg:w-16 m-6 lg:m-6"></div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/4 p-4">
                <div class="bg-green-50 py-5 justify-center items-center rounded-3xl">
                    <div class="flex justify-center items-center flex-col">
                        <div class="bg-green-200 rounded-full h-28 w-24 lg:h-40 lg:w-36"></div>
                        <h3 class="font-bold text-xl p-2">Pediatria</h3>
                        <p class="text-gray-400"> Disponible</p>
                        <div class="bg-vh-green rounded-full h-16 w-16 lg:h-16 lg:w-16 m-6 lg:m-6"></div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/4 p-4">
                <div class="bg-green-50 py-5 justify-center items-center rounded-3xl">
                    <div class="flex justify-center items-center flex-col">
                        <div class="bg-green-200 rounded-full h-28 w-24 lg:h-40 lg:w-36"></div>
                        <h3 class="font-bold text-xl p-2">Pediatria</h3>
                        <p class="text-gray-400"> Disponible</p>
                        <div class="bg-vh-green rounded-full h-16 w-16 lg:h-16 lg:w-16 m-6 lg:m-6"></div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/4 p-4">
                <div class="bg-green-50 py-5 justify-center items-center rounded-3xl">
                    <div class="flex justify-center items-center flex-col">
                        <div class="bg-green-200 rounded-full h-28 w-24 lg:h-40 lg:w-36"></div>
                        <h3 class="font-bold text-xl p-2">Pediatria</h3>
                        <p class="text-gray-400"> Disponible</p>
                        <div class="bg-vh-green rounded-full h-16 w-16 lg:h-16 lg:w-16 m-6 lg:m-6"></div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/4 p-4 ">
                <div class="bg-green-50 py-5 justify-center items-center rounded-3xl">
                    <div class="flex justify-center items-center flex-col">
                        <div class="bg-green-200 rounded-full h-28 w-24 lg:h-40 lg:w-36"></div>
                        <h3 class="font-bold text-xl p-2">Pediatria</h3>
                        <p class="text-gray-400"> Disponible</p>
                        <div class="bg-vh-green rounded-full h-16 w-16 lg:h-16 lg:w-16 m-6 lg:m-6"></div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/4 p-4">
                <div class="bg-green-50 py-5 justify-center items-center rounded-3xl">
                    <div class="flex justify-center items-center flex-col">
                        <div class="bg-green-200 rounded-full h-28 w-24 lg:h-40 lg:w-36"></div>
                        <h3 class="font-bold text-xl p-2">Pediatria</h3>
                        <p class="text-gray-400"> Disponible</p>
                        <div class="bg-vh-green rounded-full h-16 w-16 lg:h-16 lg:w-16 m-6 lg:m-6"></div>
                    </div>
                </div>
            </div>
        </div>





    </div>
    @include('templates.footer') 

</body>

</html>