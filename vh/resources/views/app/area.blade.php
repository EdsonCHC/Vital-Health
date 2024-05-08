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
    <div class="w-full lg:pl-56  pt-20 ">
        <h2 class="font-bold text-xl lg:text-4xl  mb-6">
            Servicios</h2>
        <div class="flex pl-26">
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
            <div class="w-1/4">
                <div class="border b rounded-lg p-4">
                    <h2 class=" text-center mb-3">Todos</h2>
                    <div class="flex justify-center items-center">
                        <object data="{{asset('storage/svg/filtro.svg')}}" type="image/svg+xml"></object>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>