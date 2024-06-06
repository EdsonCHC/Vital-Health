<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Incluir Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js'])
</head>

<body class="w-full h-screen bg-gray-200">
    <!-- Contenedor principal -->
    <div class="flex w-full h-full">
        <!-- Encabezado -->
        <div class="h-full">
            @include('templates.header_doc')
        </div>
        <!-- Contenido principal -->
        <div class="w-full h-full overflow-y-auto flex-grow">
            <div class="w-auto h-auto my-4 mx-4 lg:mx-16  lg:mt-10 ">
                <div class=" md:w-full w-full ">
                    <h2 class=" font-bold  text-2xl text-vh-green">Citas de Usuarios </h2>
                    <div class="w-full">
                        <form method="get" action="#" class="relative">
                            <div class="relative mt-5">
                                <input type="text" name="s" id="s"
                                    class="block w-full  pl-16 py-2 border border-gray-200 rounded-md leading-5 bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:text-gray-900 sm:text-sm transition duration-150 ease-in-out"
                                    placeholder="Buscar ">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                    <object data="{{asset('storage/svg/lupa.svg')}}" type="image/svg+xml"></object>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="md:w-full w-full">
                    <div class="flex-col p-4 h-auto bg-white rounded-xl shadow mt-4">
                        <div class="w-full lg:px-8 my-5 flex  items-center lg:justify-between">
                            <div class="w-1/2">
                                <div class="m-2 flex items-center">
                                    <label for="filtro1"
                                        class="border-2 border-green-900 rounded-full flex items-center p-2 relative cursor-pointer">
                                        <select id="filtro1" name="filtro1"
                                            class="absolute inset-0 w-full h-full border-none cursor-pointer bg-transparent appearance-none z-10 right-0 focus:outline-none opacity-0">
                                            <option value="todos" selected>Todos</option>
                                            <option value="c1">Ascendente</option>
                                            <option value="c2">Descendente</option>
                                            <option value="c3">Silenciados</option>
                                        </select>
                                        <div class="flex justify-center items-center w-full">
                                            <div class="relative flex items-center">
                                                <span id="filtroSeleccionado1"
                                                    class="flex pr-2 text-gray-700">Todos</span>
                                                <img src="{{asset('storage/svg/filtro.svg')}}" alt="Filtro"
                                                    class="h-5 w-5">
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="w-1/2 my-4 lg:flex lg:justify-end">
                                <a href="/login" target="_self"
                                    class="w-full text-sm lg:w-40 h-12 text-white font-semibold bg-vh-green lg:text-lg tracking-wide shadow-xl lg:my-2 lg:mx-4 rounded-xl hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center content-center">
                                    Nuevo Cita
                                </a>
                            </div>

                        </div>
                        <div class=" h-14 flex justify-around items-center my-5 mx-auto bg-vh-alice-blue rounded-md ">
                            <p class="font-semibold lg:text-xl text-sm text-vh-green">Codigo</p>
                            <p class="font-semibold lg:text-xl text-sm text-vh-green">Paciente</p>
                            <p class="font-semibold lg:text-xl text-sm text-vh-green">fecha</p>
                            <p class="font-semibold lg:text-xl text-sm text-vh-green">Informacion</p>
                            <div class="w-2/12">
                                <p class="font-semibold lg:text-xl text-sm  text-vh-green lg:text-center ">Items</p>
                            </div>

                        </div>
                        <div
                            class=" lg:py-2 py-2 lg:px-8 flex justify-around items-center my-5 mx-auto bg-green-200   rounded-md">
                            <p class="lg:font-bold lg:text-xl text-sm">#lorem</p>
                            <p class="lg:font-bold lg:text-xl text-sm">lorem</p>
                            <p class="lg:font-bold lg:text-xl text-sm">lorem</p>

                            <a href="#">
                                <img src="{{ asset('storage/svg/eye.svg') }}" alt="noti_icon"
                                    class="lg:w-10 lg:h-10  w-6 h-6  p-1 bg-vh-green rounded">
                            </a>
                            <div class="w-2/12 gap-0.2 flex justify-around items-center">

                                <a href="#">
                                    <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="noti_icon"
                                        class="lg:w-10 lg:h-10  w-6 h-6  p-1 bg-vh-gray-light rounded">
                                </a>
                                <a href="#">
                                    <img src="{{ asset('storage/svg/trash.svg') }}" alt="noti_icon"
                                        class="lg:w-10 lg:h-10  w-6 h-6  p-1 bg-vh-gray-light rounded">
                                </a>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.getElementById("filtro1").addEventListener("change", function () {
                            var selectedOption = this.options[this.selectedIndex].text;
                            document.getElementById("filtroSeleccionado1").textContent = selectedOption;
                        });
                    </script>




                </div>



            </div>


        </div>

    </div>
</body>

</html>