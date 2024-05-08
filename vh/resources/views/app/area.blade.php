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

        <div class=" px-44  pt-40 ">
            <h2 class="font-bold text-xl lg:text-4xl  mb-6">
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
            <div class=" w-40 ml-4 ">
                <div class="border-2 border-green-900 rounded-full flex items-center  justify-center  p-2">
                    <h2 class="text-center  text-vh-green font-bold ">Todos</h2>
                    <div class="ml-3">
                        <object data="{{asset('storage/svg/filtro.svg')}}" type="image/svg+xml"></object>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap m-4 lg:m-16">
            <div class="w-full lg:w-1/4 p-4">
                <div class="bg-green-50 pt-5">
                    <div class="  bg-green-100 rounded-full h-14 w-14 flex items-center justify-center ml-5">
                        <h2 class="text-vh-green font-bold text-2xl">01</h2>
                    </div>
                    <h3 class="font-semibold text-xl p-2">Standardization</h3>
                    <div class="text-container overflow-hidden">
                        <p id="text1" class="text-base leading-loose p-4 line-clamp-3">
                            Cuando trabajas en un entorno laboral global, a menudo es difícil evaluar las experiencias
                            de
                            capacitación de los estudiantes, las cuales son riencias de capacitación de los estudiantes,
                            las
                            cuales son riencias de capacitación de los estudiantes, las cuales son riencias de
                            capacitación de
                            los estudiantes, las cuales son
                        </p>
                        <a href="#" onclick="toggleText('text1')" class="text-vh-green hover:underline block p-4">Learn
                            More</a>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/4 p-4">
                <div class="border pt-5">
                    <div class="bg-green-100 rounded-full h-14 w-14 flex items-center justify-center ml-5">

                        <h2 class="text-vh-green font-bold text-2xl">02</h2>
                    </div>
                    <h3 class="font-semibold text-xl p-2">Standardization</h3>
                    <div class="text-container overflow-hidden">
                        <p id="text2" class="text-base leading-loose p-4 line-clamp-3">
                            Cuando trabajas en un entorno laboral global, a menudo es difícil evaluar las experiencias
                            de
                            capacitación de los estudiantes, las cuales son riencias de capacitación de los estudiantes,
                            las
                            cuales son riencias de capacitación de los estudiantes, las cuales son riencias de
                            capacitación de
                            los estudiantes, las cuales son
                        </p>
                        <a href="#" onclick="toggleText('text2')" class="text-vh-green hover:underline block p-4">Learn
                            More</a>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/4 p-4">
                <div class="bg-green-50 pt-5">
                    <div class="  bg-green-100 rounded-full h-14 w-14 flex items-center justify-center ml-5">
                        <h2 class="text-vh-green font-bold text-2xl">03</h2>
                    </div>
                    <h3 class="font-semibold text-xl p-2">Standardization</h3>
                    <div class="text-container overflow-hidden">
                        <p id="text3" class="text-base leading-loose p-4 line-clamp-3">
                            Cuando trabajas en un entorno laboral global, a menudo es difícil evaluar las experiencias
                            de
                            capacitación de los estudiantes, las cuales son riencias de capacitación de los estudiantes,
                            las
                            cuales son riencias de capacitación de los estudiantes, las cuales son riencias de
                            capacitación de
                            los estudiantes, las cuales son
                        </p>
                        <a href="#" onclick="toggleText('text3')" class="text-vh-green hover:underline block p-4">Learn
                            More</a>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/4 p-4">
                <div class="border pt-5">
                    <div class="bg-green-100 rounded-full h-14 w-14 flex items-center justify-center ml-5">

                        <h2 class="text-vh-green font-bold text-2xl">04</h2>
                    </div>
                    <h3 class="font-semibold text-xl p-2">Standardization</h3>
                    <div class="text-container overflow-hidden">
                        <p id="text4" class="text-base leading-loose p-4 line-clamp-3">
                            Cuando trabajas en un entorno laboral global, a menudo es difícil evaluar las experiencias
                            de
                            capacitación de los estudiantes, las cuales son riencias de capacitación de los estudiantes,
                            las
                            cuales son riencias de capacitación de los estudiantes, las cuales son riencias de
                            capacitación de
                            los estudiantes, las cuales son
                        </p>
                        <a href="#" onclick="toggleText('text4')" class="text-vh-green hover:underline block p-4">Learn
                            More</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>