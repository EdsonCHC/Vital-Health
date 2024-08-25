<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/loader.css', 'resources/js/preloader.js', 'resources/js/scroll.js', 'resources/js/area.js'])
</head>

<body>
    @include('templates.loader')
    <div class="w-full h-auto">
        @include('templates.header')
    </div>
    <div class="w-full ">

        <div class=" hidden lg:flex  px-44  pt-16 ">
            <h2 class="font-bold text-2xl lg:text-4xl  mb-6">
                Especialidades Médicas</h2>
        </div>

        <div class=" hidden lg:flex px-44  py-8 ">
            <div class="w-3/4">
                <form method="get" action="#" class="relative">
                    <div class="relative ml-26">
                        <input type="text" name="s" id="s"
                            class="block w-full  pl-16 py-2 border border-gray-200 rounded-md leading-5 bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:text-gray-900 sm:text-sm transition duration-150 ease-in-out"
                            placeholder="Buscar chat">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <object data="{{ asset('storage/svg/lupa.svg') }}" type="image/svg+xml"></object>
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
                            <object data="{{ asset('storage/svg/filtro.svg') }}" type="image/svg+xml"></object>
                        </div>
                    </div>
                </label>
            </div>
        </div>
        <div class=" lg:hidden px-8  pt-28 ">
            <div class="w-full">
                <form method="get" action="#" class="">
                    <div class=" flex ml-26">
                        <input type="text" name="s" id="s"
                            class="block w-full  pl-3 py-2 border border-gray-200 rounded-md leading-5 bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:text-gray-900 sm:text-sm transition duration-150 ease-in-out"
                            placeholder="Buscar chat">
                        <span class="pl-3 flex items-center">
                            <object data="{{ asset('storage/svg/lupa.svg') }}" type="image/svg+xml"></object>
                        </span>
                    </div>
                </form>
            </div>

        </div>

        <div class="lg:hidden w-full px-8 my-5 flex ">
            <div class="w-1/2 flex items-center ">
                <h2 class="font-bold text-2xl lg:text-4xl mb-6">Servicios</h2>
            </div>
        </div>

        <div class="flex flex-wrap m-4 lg:m-16">
    @foreach ($categorias as $categoria)
        <div class="w-full sm:w-1/2 lg:w-1/4 p-4">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-transform hover:scale-105 h-full flex flex-col">
                <div class="flex items-center justify-center h-48 w-full bg-gray-200">
                    @if ($categoria->img)
                        <img src="{{ asset($categoria->img) }}" alt="{{ $categoria->nombre }}" class="object-cover h-full w-full">
                    @else
                        <span class="text-gray-500">No Image</span>
                    @endif
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div class="text-center mb-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $categoria->nombre }}</h3>
                        <p class="text-gray-600">Disponible</p>
                    </div>
                    <div class="text-center mt-auto">
                        <a href="{{ route('service', ['id' => $categoria->id]) }}"
                            class="bg-green-600 text-white rounded-full h-12 w-12 flex items-center justify-center mx-auto">
                            <img class="h-6 w-6" src="{{ asset('storage/svg/info.svg') }}" alt="Info" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


    </div>

    <div class="w-full h-auto">
        @include('templates.footer_two')
    </div>
    <div class="w-full h-auto">
        @include('templates.chat_ia')
    </div>
</body>

</html>