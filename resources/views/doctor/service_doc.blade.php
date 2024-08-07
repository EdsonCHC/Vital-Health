<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Servicio</title>
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js','resources/js/doctor.js'])
</head>

<body class="w-full h-full">
    @include('templates.loader')
    <div class="fixed top-0 h-full z-10">
        @include('templates.header_doc')
    </div>
    <!--Estilos Desktop-->
    <div class="hidden lg:flex lg:pt-28 mb-5 w-full">
        <div class="flex justify-center items-center ml-40">
            <div class="w-auto flex flex-col ml-40">
                <span class="font-bold text-4xl mb-2">Area de Cardiologia</span>
                <span class="font-bold text-4xl mb-4">Justo a tu Alcanze!!</span>
                <span class="font-bold text-2xl">Administración de Area designada</span>
                <div class="my-6 w-3/5">
                    <p class="text-xl text-justify mb-4 font-bold text-gray-400">
                        Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry.
                    </p>
                </div>
            </div>
            <div class="mr-6">
                <div class="bg-gray-100 rounded w-60 p-4">
                    <p class="text-2xl font-bold mb-4">Area</p>
                    <div class="flex flex-col pl-4 mt-1">
                        <span class="text-xl">Activa</span>
                        <span class="text-xl">Personal</span>
                        <span class="text-xl">Personalizado</span>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center w-auto">
                <div class="ml-auto lg:ml-auto">
                    <div class="">
                        <img class="w-96 absolute z-10 -mt-52" src="{{asset('storage/svg/doctor.svg')}}"
                            type="image/svg+xml" />
                    </div>
                </div>
                <div class="ml-auto lg:ml-auto">
                    <div class="bg-vh-green-light opacity-60 rounded-full h-96 w-96 -mt-10">
                        <span class="invisible">a</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Estilos Mobile-->
    <div class="lg:hidden flex justify-center">
        <div class="lg:ml-auto">
            <div class="bg-gray-100 mt-32 ml-52 rounded-lg w-36 h-32">
                <p class="pl-4 py-1 text-xl font-bold">Area</p>
                <div class="flex flex-col pl-4 mt-1">
                    <span class="text-lg">Activa</span>
                    <span class="text-lg">Personal</span>
                    <span class="text-lg">Personalizado</span>
                </div>
            </div>
        </div>
        <div class="ml-auto mt-12 lg:ml-auto absolute z-[-10] opacity-60">
            <img class="h-56 lg:h-full" src="{{asset('storage/svg/doctor.svg')}}" type="image/svg+xml" />
        </div>
    </div>
    <div class="lg:hidden flex justify-center items-center">
        <div class="w-64 mt-10">
            <div class="flex flex-col ml-4 my-2">
                <span class="font-bold text-lg">Area de Cardiologia</span>
                <span class="font-bold text-lg">Justo a tu Alcanze!!</span>
                <span class="font-bold text-sm">Administración de Area designada</span>
            </div>
            <div class="my-5">
                <p class="text-xs text-justify mb-4 font-bold text-gray-400 mx-4 -mt-1">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry.
                </p>
            </div>
            <button target="_self"
                class="make_appointment w-4/5 h-9 text-white font-bold bg-vh-green text-sm shadow-xl mb-10 rounded-full lg:w-2/5 hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center py-2 mx-4">
                Solicitar Cita
                <button />
        </div>
    </div>
    <div class="flex justify-center text-center flex-col items-center">
        <div class="w-full h-auto">
            <div>
                <h2 class="font-bold text-2xl">Areas de Apoyo</h2>
                <h2 class="font-bold text-2xl text-vh-green">
                    Brindadas al Paciente
                </h2>
            </div>
            <div class="w-full flex grow-0 flex-wrap items-center justify-center mb-8">
                <div class="w-full min-w-40 max-w-72 mx-4 border border-solid border-vh-green py-4 my-4">
                    <h2 class="text-lg font-bold mb-2">Citas</h2>
                    <p class="text-sm font-bold text-gray-400 mt-2 px-6 text-justify">
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Ut ex id exercitationem amet unde aliquam,
                        nihil, assumenda libero, atque veritatis pariatur
                        nesciunt ipsam voluptatum blanditiis iure est dolor
                        laudantium. Facere.
                    </p>
                    <hr class="mx-6 my-2" />
                    <div class="flex flex-col px-8">
                        <label class="flex items-center">
                            <object data="{{asset('storage/svg/check.svg')}}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 1</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{asset('storage/svg/check.svg')}}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 2</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{asset('storage/svg/check.svg')}}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 3</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{asset('storage/svg/check.svg')}}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 4</span>
                        </label>
                    </div>
                    <button target="_self"
                        class="w-4/5 py-4 my-4 border border-solid border-vh-green font-bold text-base lg:w-2/5 hover:bg-vh-green transition duration-300 hover:text-white inline-block text-center">
                        Agendar
                    </button>
                </div>
                <div class="w-full min-w-40 max-w-72 mx-4 border border-solid border-vh-green py-4 my-4">
                    <h2 class="text-lg font-bold mb-2">Expedientes</h2>
                    <p class="text-sm font-bold text-gray-400 mt-2 px-6 text-justify">
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Ut ex id exercitationem amet unde aliquam,
                        nihil, assumenda libero, atque veritatis pariatur
                        nesciunt ipsam voluptatum blanditiis iure est dolor
                        laudantium. Facere.
                    </p>
                    <hr class="mx-6 my-2" />
                    <div class="flex flex-col px-8">
                        <label class="flex items-center">
                            <object data="{{asset('storage/svg/check.svg')}}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 1</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{asset('storage/svg/check.svg')}}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 2</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{asset('storage/svg/check.svg')}}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 3</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{asset('storage/svg/check.svg')}}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 4</span>
                        </label>
                    </div>
                    <a href="/#" target="_self"
                        class="w-4/5 py-4 my-4 border border-solid border-vh-green font-bold text-base lg:w-2/5 hover:bg-vh-green transition duration-300 hover:text-white inline-block text-center">Observar</a>
                </div>
                <div class="w-full min-w-40 max-w-72 mx-4 border border-solid border-vh-green py-4 my-4">
                    <h2 class="text-lg font-bold mb-2">Programación</h2>
                    <p class="text-sm font-bold text-gray-400 mt-2 px-6 text-justify">
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Ut ex id exercitationem amet unde aliquam,
                        nihil, assumenda libero, atque veritatis pariatur
                        nesciunt ipsam voluptatum blanditiis iure est dolor
                        laudantium. Facere.
                    </p>
                    <hr class="mx-6 my-2" />
                    <div class="flex flex-col px-8">
                        <label class="flex items-center">
                            <object data="{{asset('storage/svg/check.svg')}}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 1</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{asset('storage/svg/check.svg')}}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 2</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{asset('storage/svg/check.svg')}}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 3</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{asset('storage/svg/check.svg')}}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 4</span>
                        </label>
                    </div>
                    <a href="/#" target="_self"
                        class="w-4/5 py-4 my-4 border border-solid border-vh-green font-bold text-base lg:w-2/5 hover:bg-vh-green transition duration-300 hover:text-white inline-block text-center">Observar</a>
                </div>
            </div>
        </div>

        <!-- Segundo Bloque Desktop -->
        <div class="hidden lg:flex flex-col items-center w-full text-center mb-8">
            <div class="mb-2">
                <h2 class="font-bold text-2xl tracking-wide text-vh-green">
                    Doctores de Area
                </h2>
            </div>
            <div class="w-full my-4 flex flex-wrap justify-center">
                <div class="w-56 h-92 m-5 p-4 bg-green-200 py-5 justify-center items-center rounded-xl">
                    <div class="relative">
                        <button id="menu_opti" class="flex ml-auto">
                            <img id="menu-icon" class="h-8 w-8 mx-2" src="{{ asset('storage/svg/option-icon.svg') }}"
                                alt="Inicio" />
                        </button>
                        <div id="menuOptions"
                            class="w-32 ml-40 py-2 hidden absolute bg-white border border-gray-300 shadow-lg rounded-md">
                            <a href="#" id="edit_staff"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Editar</a>
                            <a href="#" id="history_staff"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Historial</a>
                        </div>
                    </div>
                    <div class="flex justify-center items-center flex-col">
                        <div class="bg-green-400 rounded-full w-24 h-24 mb-4"></div>
                        <h3 class="font-bold text-xl p-2">Alvarenga</h3>
                        <p class="text-gray-400 text-lg mb-4">Pediatria</p>
                        <div class="">
                            <button id="delete_doc">
                                <img id="menu-icon" class="h-14 w-14 mx-2 " src="{{ asset('storage/svg/info.svg') }}"
                                    alt="Inicio" />
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-56 h-92 m-5 p-4 bg-green-200 py-5 justify-center items-center rounded-xl">
                    <div class="relative">
                        <button id="menu_opti" class="flex ml-auto">
                            <img id="menu-icon" class="h-8 w-8 mx-2" src="{{ asset('storage/svg/option-icon.svg') }}"
                                alt="Inicio" />
                        </button>
                        <div id="menuOptions"
                            class="w-32 ml-40 py-2 hidden absolute bg-white border border-gray-300 shadow-lg rounded-md">
                            <a href="#" id="edit_staff"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Editar</a>
                            <a href="#" id="history_staff"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Historial</a>
                        </div>
                    </div>
                    <div class="flex justify-center items-center flex-col">
                        <div class="bg-green-400 rounded-full w-24 h-24 mb-4"></div>
                        <h3 class="font-bold text-xl p-2">Alvarenga</h3>
                        <p class="text-gray-400 text-lg mb-4">Pediatria</p>
                        <div class="">
                            <button id="delete_doc">
                                <img id="menu-icon" class="h-14 w-14 mx-2 " src="{{ asset('storage/svg/info.svg') }}"
                                    alt="Inicio" />
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-56 h-92 m-5 p-4 bg-green-200 py-5 justify-center items-center rounded-xl">
                    <div class="relative">
                        <button id="menu_opti" class="flex ml-auto">
                            <img id="menu-icon" class="h-8 w-8 mx-2" src="{{ asset('storage/svg/option-icon.svg') }}"
                                alt="Inicio" />
                        </button>
                        <div id="menuOptions"
                            class="w-32 ml-40 py-2 hidden absolute bg-white border border-gray-300 shadow-lg rounded-md">
                            <a href="#" id="edit_staff"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Editar</a>
                            <a href="#" id="history_staff"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Historial</a>
                        </div>
                    </div>
                    <div class="flex justify-center items-center flex-col">
                        <div class="bg-green-400 rounded-full w-24 h-24 mb-4"></div>
                        <h3 class="font-bold text-xl p-2">Alvarenga</h3>
                        <p class="text-gray-400 text-lg mb-4">Pediatria</p>
                        <div class="">
                            <button id="delete_doc">
                                <img id="menu-icon" class="h-14 w-14 mx-2 " src="{{ asset('storage/svg/info.svg') }}"
                                    alt="Inicio" />
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Demas cartas -->
            </div>
        </div>

        <!--Segundo Bloque Mobile-->
        <div class="lg:hidden w-full text-center mb-8">
            <div class="mb-2">
                <h2 class="font-bold text-2xl text-vh-green">
                    Doctores de Area
                </h2>
            </div>
            <div class="w-full mt-10 mb-20 flex flex-wrap">
                <div class="w-40 h-60 mx-4 bg-green-200 py-2 justify-center items-center rounded-xl">
                    <div class="relative">
                        <button id="menu_opti" class="menu_opti flex ml-auto">
                            <img id="menu-icon" class="h-8 w-8 mx-2" src="{{ asset('storage/svg/option-icon.svg') }}"
                                alt="Inicio" />
                        </button>
                        <div id="menuOptions"
                            class="w-32 ml-10 py-2 hidden absolute bg-white border border-gray-300 shadow-lg rounded-md">
                            <a href="#" id="edit_staff"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Editar</a>
                            <a href="#" id="history_staff"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Historial</a>
                        </div>
                    </div>
                    <div class="flex justify-center items-center flex-col">
                        <div class="bg-green-400 rounded-full w-20 h-20"></div>
                        <h3 class="font-bold text-xl pt-2">Alvarenga</h3>
                        <p class="text-gray-400 text-lg">Pediatria</p>
                        <div class="mt-2 flex items-center">
                            <button id="">
                                <img id="menu-icon" class="h-10 w-10 mx-2 " src="{{ asset('storage/svg/info.svg') }}"
                                    alt="Inicio" />
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-40 h-60 mx-4 bg-green-200 py-2 justify-center items-center rounded-xl">
                    <div class="relative">
                        <button id="menu_opti" class="menu_opti flex ml-auto">
                            <img id="menu-icon" class="h-8 w-8 mx-2" src="{{ asset('storage/svg/option-icon.svg') }}"
                                alt="Inicio" />
                        </button>
                        <div id="menuOptions"
                            class="w-32 ml-10 py-2 hidden absolute bg-white border border-gray-300 shadow-lg rounded-md">
                            <a href="#" id="edit_staff"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Editar</a>
                            <a href="#" id="history_staff"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Historial</a>
                        </div>
                    </div>
                    <div class="flex justify-center items-center flex-col">
                        <div class="bg-green-400 rounded-full w-20 h-20"></div>
                        <h3 class="font-bold text-xl pt-2">Alvarenga</h3>
                        <p class="text-gray-400 text-lg">Pediatria</p>
                        <div class="mt-2 flex items-center">
                            <button id="">
                                <img id="menu-icon" class="h-10 w-10 mx-2 " src="{{ asset('storage/svg/info.svg') }}"
                                    alt="Inicio" />
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Demas Cartas -->
            </div>
        </div>
    </div>
</body>

</html>