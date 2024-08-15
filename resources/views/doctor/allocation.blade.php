<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Citas</title>
    <!-- Incluir Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js', 'resources/js/doctor.js'])
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
</head>

<body class="w-full h-screen bg-gray-200">
    <!-- Encabezado -->
    <div class="flex w-full">
        <div class="h-full">
            @include('templates.header_doc')
        </div>
        <div class="w-full h-full overflow-y-auto ">
            <div class=" my-4 mx-4   lg:mt-16 ">
                <div class=" md:w-full w-full ">
                    <h2 class=" font-bold  text-2xl text-vh-green">Menu de Citas</h2>

                    <div class="w-full">
                        <form method="get" action="#" class="relative">
                            <div class="relative mt-5">
                                <input type="text" name="s" id="s"
                                    class="block w-full  pl-16 py-2 border border-gray-200 rounded-md leading-5 bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:text-gray-900 sm:text-sm transition duration-150 ease-in-out"
                                    placeholder="Buscar ">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                    <object data="{{ asset('storage/svg/lupa.svg') }}" type="image/svg+xml"></object>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:mt-16 mt-4">
                    <div class="bg-green-700 p-0.5 md:w-80  lg:w-full rounded-xl">
                        <div class=" bg-green-160  p-4  rounded-xl">
                            <div class="flex">
                                <div class="w-autolg:flex  lg:m-1">
                                    <h3 class="font-bold text-2xl lg:text-3xl text-white lg:w-auto">Examenes de Sangre
                                    </h3>
                                </div>
                                <div class="w-1/2 px-4 lg:px-2 ">
                                    <img class=" lg:flex lg:justify-end lg:w-auto"
                                        src="{{ asset('storage/svg/file.svg') }}" type="image/svg+xml" />
                                </div>

                            </div>
                            <a href="/medicine_doc" target="_self"
                                class="w-full h-10 lg:h-8  text-vh-green bg-white text-base lg:text-lg tracking-wide shadow-xl mt-4 lg:mt-8 mx-auto lg:mx-2 rounded-full hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center content-center">
                                Visualizar
                            </a>
                        </div>

                    </div>
                    <div class="bg-green-700 p-0.5 md:w-80  lg:w-full rounded-xl">
                        <div class=" bg-green-160  p-4  rounded-xl">
                            <div class="flex">
                                <div class="w-autolg:flex  lg:m-1">
                                    <h3 class="font-bold text-2xl lg:text-3xl text-white lg:w-auto">Examenes de Sangre
                                    </h3>
                                </div>
                                <div class="w-1/2 px-4 lg:px-2 ">
                                    <img class=" lg:flex lg:justify-end lg:w-auto"
                                        src="{{ asset('storage/svg/file.svg') }}" type="image/svg+xml" />
                                </div>

                            </div>
                            <a href="/medicine_doc" target="_self"
                                class="w-full h-10 lg:h-8  text-vh-green bg-white text-base lg:text-lg tracking-wide shadow-xl mt-4 lg:mt-8 mx-auto lg:mx-2 rounded-full hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center content-center">
                                Visualizar
                            </a>
                        </div>

                    </div>



                </div>

            </div>
        </div>
</body>

</html>
