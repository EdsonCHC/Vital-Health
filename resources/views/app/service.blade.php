<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $categoria->nombre }}</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/checkbox.css', 'resources/js/appointment.js', 'resources/css/loader.css', 'resources/js/preloader.js', 'resources/js/scroll.js'])
</head>

<body class="w-full h-full overflow-x-hidden">
    @include('templates.loader')

    <div class="w-full h-auto">
        @include('templates.header')
    </div>

    <!-- Hidden Input for Category ID -->
    <input type="hidden" id="category_id" value="{{ $categoria->id }}">
    <!--Estilos Desktop-->
    <div class="hidden lg:flex lg:pt-28 mb-5 w-full bg-gray-100">
        <div class="flex justify-center items-center">
            <div class="w-auto flex flex-col ml-40">
                <span class="font-bold text-4xl mb-2">
                    Bienvenido al Área de {{ $categoria->nombre }}
                </span> <span class="font-bold text-4xl mb-4">Justo a tu Alcanze!!</span>
                <span class="font-bold text-2xl">La Salud Es importancia para tu salud</span>
                <div class="my-6 w-3/5">
                    <p class="text-xl text-justify mb-4 font-bold text-gray-400">
                        {{ $categoria->descripcion }}
                    </p>
                </div>
                <button target="_self" id="make_appointment"
                    class="w-4/5 lg:w-2/5 h-12 text-white font-bold bg-vh-green text-lg tracking-wide shadow-xl mb-10 mx-4 rounded-full hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center content-center">
                    Solicitar Cita
                </button>
            </div>
            <div class="mr-6">
                <div class="bg-gray-200 rounded w-60 p-4">
                    <p class="text-2xl font-bold mb-4">Caracteristicas de Area</p>
                    <div class="mb-4">
                        <div class="flex flex-wrap gap-2 mt-2">
                            @php
                                $caracteristicas = explode(',', $categoria->caracteristicas);
                            @endphp

                            @foreach ($caracteristicas as $caracteristica)
                                <span class="text-xl">{{ trim($caracteristica) }}</span>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <div class="flex justify-center items-center w-auto">
                <div class="ml-auto lg:ml-auto">
                    <div class="">
                        <img class="w-96 absolute z-10 -mt-52" src="{{ asset('storage/svg/doctor.svg') }}"
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
            <img class="h-56 lg:h-full" src="{{ asset('storage/svg/doctor.svg') }}" type="image/svg+xml" />
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
                    El área de cardiología se especializa en el diagnóstico, tratamiento y prevención de enfermedades del corazón y del sistema cardiovascular.
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
                        Las citas médicas son encuentros programados entre pacientes y profesionales de la salud para evaluar, diagnosticar y tratar diversas condiciones médicas. Durante una cita, el médico realiza una evaluación integral del estado de salud del paciente, que puede incluir exámenes físicos, pruebas diagnósticas y la revisión de antecedentes médicos.
                    </p>
                    <hr class="mx-6 my-2" />
                    <div class="flex flex-col px-8">
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 1</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 2</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 3</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
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
                        El expediente médico es un registro detallado y confidencial que documenta la historia clínica y el estado de salud de un paciente. Incluye información esencial como diagnósticos, tratamientos recibidos, resultados de pruebas, notas de consultas y antecedentes médicos.
                    </p>
                    <hr class="mx-6 my-2" />
                    <div class="flex flex-col px-8">
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 1</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 2</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 3</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
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
                        La programación médica es un proceso organizado para coordinar y planificar las citas y procedimientos médicos de un paciente. Este sistema asegura que los pacientes reciban atención oportuna y eficiente, gestionando horarios de consultas, exámenes, tratamientos y seguimientos necesarios.
                    </p>
                    <hr class="mx-6 my-2" />
                    <div class="flex flex-col px-8">
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 1</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 2</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 3</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
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
                @foreach ($categoria->doctors as $doctor)
                    <div class="w-56 h-92 m-5 p-4 bg-green-200 py-5 justify-center items-center rounded-xl">
                        <div class="relative">
                            <button id="menu_opti" class="flex ml-auto">
                                <img id="menu-icon" class="h-8 w-8 mx-2"
                                    src="{{ asset('storage/svg/option-icon.svg') }}" alt="Inicio" />
                            </button>
                        </div>
                        <div class="flex justify-center items-center flex-col">
                            <div class="bg-green-400 rounded-full w-24 h-24 mb-4"></div>
                            <h3 class="font-bold text-xl p-2">{{ $doctor->name }}</h3>
                            <p class="text-gray-400 text-lg mb-4">{{ $doctor->category->nombre }}</p>
                            <div class="">
                                <button class="info_doc" data-description="{{ $doctor->description }}">
                                    <img id="menu-icon" class="h-14 w-14 mx-2 "
                                        src="{{ asset('storage/svg/info.svg') }}" alt="Inicio" />
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!--Segundo Bloque Mobile-->
        <div class="lg:hidden w-full text-center mb-8">
            <div class="mb-2">
                <h2 class="font-bold text-2xl text-vh-green">
                    Doctores de Area
                </h2>
            </div>
            <div class="w-full my-10 flex flex-wrap">
                @foreach ($categoria->doctors as $doctor)
                    <div class="w-40 h-60 mx-4 my-2 bg-green-200 py-2 justify-center items-center rounded-xl">
                        <div class="relative">
                            <button id="menu_opti" class="menu_opti flex ml-auto">
                                <img id="menu-icon" class="h-8 w-8 mx-2"
                                    src="{{ asset('storage/svg/option-icon.svg') }}" alt="Inicio" />
                            </button>
                        </div>
                        <div class="flex justify-center items-center flex-col">
                            <div class="bg-green-400 rounded-full w-20 h-20"></div>
                            <h3 class="font-bold text-xl pt-2">{{ $doctor->name }}</h3>
                            <p class="text-gray-400 text-lg">{{ $doctor->category->nombre }}</p>
                            <div class="mt-2 flex items-center">
                                <button id="">
                                    <img id="menu-icon" class="h-10 w-10 mx-2 "
                                        src="{{ asset('storage/svg/info.svg') }}" alt="Inicio" />
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="w-full h-auto">
        @include('templates.footer_two')
    </div>
</body>

</html>
