<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <!-- Incluir Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js', 'resources/js/doc_citas.js', 'resources/js/doc_examenes.js','resources/js/doc_appointment.js', 'resources/js/doctor.js'])
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
</head>

<body class="w-full h-screen bg-gray-200">
    <div class="flex w-full h-full">
        <!-- Encabezado -->
        <div class="fixed top-0 h-full z-10">
            @include('templates.header_doc')
        </div>

        <!-- Contenido principal -->
        <div class="ml-60 w-full h-full overflow-y-auto flex-grow">
            <div class="w-auto h-auto my-4 mx-4 lg:mx-16 lg:mt-10">
                <div class="w-full">
                    @if ($doctor)
                        <h2 class="font-bold text-2xl text-vh-green">Citas del Doctor: {{ $doctor->name }}</h2>
                    @else
                        <h2 class="font-bold text-2xl text-vh-green">No hay doctor activo asignado.</h2>
                    @endif
                    <div class="w-full mt-5">
                        <form method="get" action="#" class="relative">
                            <input type="text" name="s" id="s"
                                class="block w-full h-12 pl-16 py-2 border border-gray-200 rounded-md leading-5 bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:text-gray-900 sm:text-sm transition duration-150 ease-in-out"
                                placeholder="Buscar">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                <object data="{{ asset('storage/svg/lupa.svg') }}" type="image/svg+xml"></object>
                            </span>
                        </form>
                    </div>
                </div>
                <div class="w-full mt-4">
                    <div class="flex-col p-4 h-auto bg-white rounded-xl shadow">
                        <div class="w-full flex items-center lg:justify-between">
                            <div class="w-1/2 m-2 flex items-center">
                                <label for="filtro1"
                                    class="border-2 border-green-900 rounded-full flex items-center p-2 relative cursor-pointer">
                                    <select id="filtro1" name="filtro1"
                                        class="absolute inset-0 w-full h-full border-none cursor-pointer bg-transparent appearance-none z-10 focus:outline-none opacity-0">
                                        <option value="todos" selected>Todos</option>
                                        <option value="c1">Ascendente</option>
                                        <option value="c2">Descendente</option>
                                        <option value="c3">Silenciados</option>
                                    </select>
                                    <div class="flex justify-center items-center w-full">
                                        <span id="filtroSeleccionado1" class="flex pr-2 text-gray-700">Todos</span>
                                        <img src="{{ asset('storage/svg/filtro.svg') }}" alt="Filtro" class="h-5 w-5">
                                    </div>
                                </label>
                                <div class=" my-4 lg:flex lg:justify-end">
                                    <a id="show-citas" href="#"
                                        class="w-full text-sm lg:w-40 h-12 text-white font-semibold bg-vh-green lg:text-lg tracking-wide shadow-xl lg:my-2 lg:mx-4 rounded-xl hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center">
                                        <p class="flex justify-center mt-2">Historial</p>
                                    </a>
                                </div>
                            </div>
                            <div class="my-4 lg:flex lg:justify-end">
                                <a href="#" id="genere_input" data-doctor-id="{{ $doctor->id }}"
                                    class="w-full text-sm lg:w-40 h-12 text-white font-semibold bg-vh-green lg:text-lg tracking-wide shadow-xl lg:my-2 lg:mx-4 rounded-xl hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center">
                                    <p class="flex justify-center mt-2">Nueva Cita</p>
                                </a>
                            </div>


                        </div>
                        <!-- Encabezado de la tabla -->
                        <div class="w-auto h-14 flex justify-around items-center my-5 mx-4 bg-vh-alice-blue rounded-md">
                            <p class="font-semibold text-xl text-vh-green">Código</p>
                            <p class="font-semibold text-xl text-vh-green">Paciente</p>
                            <p class="font-semibold text-xl text-vh-green">Especialidad</p>
                            <p class="font-semibold text-xl text-vh-green">Fecha</p>
                            <p class="font-semibold text-xl text-vh-green">Examen</p>
                            <div class="w-2/12">
                                <p class="font-semibold text-xl text-vh-green">Herramientas</p>
                            </div>
                        </div>

                        <!-- Datos de las citas -->
                        @if ($citas->isNotEmpty())
                            @foreach ($citas as $cita)
                                @if ($cita->state == 1) <!-- Filtra solo las citas con state = 1 -->
                                    <div id="cita-{{ $cita->id }}" data-cita-id="{{ $cita->id }}"
                                        class="w-auto h-14 flex justify-around items-center text-center my-5 mx-4 rounded-md ">
                                        <input type="hidden" id="cita_id_{{ $cita->id }}" data-cita-id="{{ $cita->id }}">
                                        <input type="hidden" id="patient_id_{{ $cita->id }}"
                                            data-patient-id="{{ $cita->patient->id }}">
                                        <input type="hidden" id="doctor_id_{{ $cita->id }}"
                                            data-doctor-id="{{ $cita->doctor->id }}">

                                        <p class="ml-4 font-semibold text-xl text-vh-green">{{ $cita->id }}</p>
                                        <p class="ml-12 font-semibold text-xl text-vh-green">{{ $cita->patient->name }}
                                            {{ $cita->patient->lastName }}
                                        </p>
                                        <p class="-ml-6 font-semibold text-xl text-vh-green">{{ $cita->category->nombre }}</p>
                                        <p class="font-semibold text-xl text-vh-green">{{ $cita->date }}</p>
                                        <button class="option-button" data-cita-id="{{ $cita->id }}">
                                            <img src="{{ asset('storage/svg/option-icon.svg') }}" alt="noti_icon"
                                                class="w-10 h-10 p-2">
                                        </button>
                                        <div class="w-2/12 flex items-center space-x-10">
                                            <button target="_self" class="ml-4" id="aceptar">
                                                <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="noti_icon"
                                                    class="w-10 h-10 p-2 rounded">
                                            </button>
                                            <button target="_self" class="delete-cita" data-cita-id="{{ $cita->id }}">
                                                <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="config_icon"
                                                    class="w-10 h-10 p-2 rounded">
                                            </button>
                                            @if ($cita->modo == 'Virtual')
                                                <a href="{{ $cita->modo }}" class="ml-4" target="_blank">
                                                    <img src="{{ asset('storage/svg/eye.svg') }}" alt="Ver Cita"
                                                        class="w-10 h-10 p-2 rounded">
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <p class="text-center font-semibold text-xl text-vh-green">No hay citas disponibles para
                                mostrar.</p>
                        @endif 

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>