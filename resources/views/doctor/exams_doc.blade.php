<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examenes</title>
    <!-- Incluir Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js','resources/js/doctor.js'])
</head>

<body class="w-full h-screen bg-gray-200">
    <!-- Encabezado -->
    <div class="flex w-full">
        <div class="h-full">
            @include('templates.header_doc')
        </div>
        <div class="w-full h-auto  ">
            <div class="w-auto h-auto my-4 mx-4 lg:mx-16  lg:mt-10 ">
                <div class=" md:w-full w-full ">
                    <h2 class=" font-bold  text-2xl text-vh-green">Examen de sangre </h2>
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
                <div class=" md:w-full w-full ">
                    <div class="flex-col p-4 h-auto  bg-white  rounded-xl shadow- mt-4 ">
                        <div class=" md:w-full w-full lg:items-end lg:justify-end" >
                            <a href="/login" target="_self"
                                class="w-2/5 text-sm p-2 lg:w-40 h-12 text-white font-semibold bg-vh-green lg:text-lg tracking-wide shadow-xl lg:my-2  lg:mx-4 rounded-xl hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center content-center">
                                Nuevo Examen </a>
                        </div>


                        <div class=" h-14 flex justify-around items-center my-5 mx-auto bg-vh-alice-blue rounded-md ">
                            <p class="font-semibold lg:text-xl text-sm text-vh-green">#</p>
                            <p class="font-semibold lg:text-xl text-sm text-vh-green">Paciente</p>
                            <p class="font-semibold lg:text-xl text-sm text-vh-green">Hora</p>
                            <p class="font-semibold  lg:text-xl  text-sm text-vh-green">Fecha</p>
                            <div class="w-2/12">
                                <p class="font-semibold lg:text-xl text-sm  text-vh-green lg:text-center ">Items</p>
                            </div>

                        </div>
                        <div
                            class=" lg:p-4 p-2 flex justify-around items-center my-5 mx-auto bg-vh-green-light opacity-85  rounded-md">
                            <p class="lg:font-bold lg:text-xl text-sm">#lorem</p>
                            <p class="lg:font-bold lg:text-xl text-sm">lorem</p>
                            <p class="lg:font-bold lg:text-xl text-sm">lorem</p>
                            <p class="lg:font-bold lg:text-xl text-sm ">lorem</p>
                            <div class="w-2/12 gap-0.2 flex justify-around items-center">
                                <a href="#">
                                    <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="noti_icon"
                                        class="lg:w-10 lg:h-10  w-6 h-6  p-1 bg-vh-gray-light rounded">
                                </a>
                                <a href="#">
                                    <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="config_icon"
                                        class="lg:w-10 lg:h-10 w-6 h-6   p-2 bg-vh-gray-light rounded">
                                </a>
                            </div>
                        </div>
                        <div
                            class=" lg:p-4 p-2 flex justify-around items-center my-5 mx-auto bg-vh-green-light opacity-85  rounded-md">
                            <p class="lg:font-bold lg:text-xl text-sm">#lorem</p>
                            <p class="lg:font-bold lg:text-xl text-sm">lorem</p>
                            <p class="lg:font-bold lg:text-xl text-sm">lorem</p>
                            <p class="lg:font-bold lg:text-xl text-sm ">lorem</p>
                            <div class="w-2/12 gap-0.2 flex justify-around items-center">
                                <a href="#">
                                    <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="noti_icon"
                                        class="lg:w-10 lg:h-10  w-6 h-6  p-1 bg-vh-gray-light rounded">
                                </a>
                                <a href="#">
                                    <img src="{{ asset('storage/svg/trash.svg') }}" alt="config_icon"
                                        class="lg:w-10 lg:h-10 w-6 h-6   p-2 bg-vh-gray-light rounded">
                                </a>
                            </div>
                        </div>
                        

                    </div>


                </div>

            </div>
        </div>
</body>

</html>