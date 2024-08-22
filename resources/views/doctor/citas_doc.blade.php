<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js', 'resources/js/doc_citas.js', 'resources/js/doc_examenes.js', 'resources/js/doc_appointment.js', 'resources/js/doctor.js', 'resources/js/videollamada.js'])
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
</head>

<body class="w-full h-screen bg-gray-200">
    <div class="flex flex-col lg:flex-row w-full h-full">
        <div class="fixed top-0 h-full z-10 lg:w-60 bg-white shadow-md">
            @include('templates.header_doc')
        </div>

        <div class="lg:ml-60 flex-grow p-4 overflow-y-auto">
            <div class="max-w-full mx-auto">
                <div class="mb-4">
                    @if ($doctor)
                        <h2 class="text-2xl font-bold text-vh-green">Citas del Doctor: {{ $doctor->name }}</h2>
                    @else
                        <h2 class="text-2xl font-bold text-vh-green">No hay doctor activo asignado.</h2>
                    @endif
                </div>
                <div class="mb-4 flex flex-col lg:flex-row gap-4">
                    <a id="show-citas" href="#"
                        class="w-full lg:w-40 h-12 text-sm lg:text-lg font-semibold bg-vh-green text-white rounded-xl shadow-xl hover:bg-white hover:text-vh-green transition duration-300 flex items-center justify-center">
                        Historial
                    </a>
                    <a href="#" id="genere_input" data-doctor-id="{{ $doctor->id }}"
                        class="w-full lg:w-40 h-12 text-sm lg:text-lg font-semibold bg-vh-green text-white rounded-xl shadow-xl hover:bg-white hover:text-vh-green transition duration-300 flex items-center justify-center">
                        Nueva Cita
                    </a>
                </div>

                <div class="bg-vh-alice-blue p-4 rounded-md mb-4 flex flex-col lg:flex-row gap-2 lg:gap-4 text-center">
                    <div class="flex-1 font-semibold lg:text-xl text-vh-green">Código</div>
                    <div class="flex-1 font-semibold lg:text-xl text-vh-green">Paciente</div>
                    <div class="flex-1 font-semibold lg:text-xl text-vh-green">Especialidad</div>
                    <div class="flex-1 font-semibold lg:text-xl text-vh-green">Fecha</div>
                    <div class="flex-1 font-semibold lg:text-xl text-vh-green">Herramientas</div>
                </div>

                @if ($citas->isNotEmpty())
                    @foreach ($citas as $cita)
                        @if ($cita->state == 1)
                            <div id="cita-{{ $cita->id }}" data-cita-id="{{ $cita->id }}"
                                class="bg-white rounded-xl shadow p-4 mb-4 flex flex-col lg:flex-row items-center gap-4">
                                <input type="hidden" id="cita_id_{{ $cita->id }}" data-cita-id="{{ $cita->id }}">
                                <input type="hidden" id="patient_id_{{ $cita->id }}" data-patient-id="{{ $cita->patient->id }}">
                                <input type="hidden" id="doctor_id_{{ $cita->id }}" data-doctor-id="{{ $cita->doctor->id }}">

                                <div class="flex-1 text-xl text-vh-green">{{ $cita->id }}</div>
                                <div class="flex-1 text-xl text-vh-green">{{ $cita->patient->name }} {{ $cita->patient->lastName }}
                                </div>
                                <div class="flex-1 text-xl text-vh-green">{{ $cita->category->nombre }}</div>
                                <div class="flex-1 text-xl text-vh-green">{{ $cita->date }}</div>
                                <div class="flex-1 text-xl text-vh-green">
                                    <!-- Column for "Examen" kept empty as per your request -->
                                </div>
                                <div class="flex-1 flex justify-around space-x-4">
                                    <button class="option-button" data-cita-id="{{ $cita->id }}">
                                        <img src="{{ asset('storage/svg/option-icon.svg') }}" alt="options" class="w-8 h-8">
                                    </button>
                                    <button class="ml-4" id="aceptar">
                                        <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="accept" class="w-8 h-8 rounded">
                                    </button>
                                    <button class="delete-cita" data-cita-id="{{ $cita->id }}">
                                        <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="delete" class="w-8 h-8 rounded">
                                    </button>
                                    @if ($cita->modo == 'Virtual')
                                        <button type="button" class="createVideollamada" data-cita-id="{{ $cita->id }}"
                                            data-doctor-id="{{ $cita->doctor->id }}">
                                            <img src="{{ asset('storage/svg/link-icon.svg') }}" alt="videocall" class="w-8 h-8 rounded">
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <p class="text-center font-semibold text-xl text-vh-green">No hay citas disponibles para mostrar.</p>
                @endif
            </div>
        </div>
    </div>
</body>

</html>