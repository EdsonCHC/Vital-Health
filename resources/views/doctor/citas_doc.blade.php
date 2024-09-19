<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js', 'resources/js/doc_citas.js', 'resources/js/doc_examenes.js', 'resources/js/doc_appointment.js', 'resources/js/doctor.js', 'resources/js/hardware.js', 'resources/js/videollamada.js', 'resources/js/searchcitas.js'])
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
</head>

<body class="w-full h-screen bg-gray-200">
    <div class="flex flex-col lg:flex-row w-full h-full">
        <div class="fixed top-0 h-full z-10 lg:w-60 bg-white shadow-md">
            @include('templates.header_doc')
        </div>

        <!-- Main Content -->
        <div class="flex-1 lg:ml-60 p-4 lg:p-6 overflow-y-auto">
            <div class="max-w-full mx-auto">
                <div class="flex flex-col lg:flex-row justify-between items-center mb-4">
                    <div>
                        @if ($doctor)
                        <h2 class="text-2xl lg:text-3xl font-bold text-vh-green">Citas del Doctor:
                            {{ $doctor->name }}
                        </h2>
                        @else
                        <h2 class="text-2xl lg:text-3xl font-bold text-vh-green">No hay doctor activo asignado.</h2>
                        @endif
                    </div>
                    <div class="relative w-full lg:w-1/3">
                        <form id="search-form" action="{{ route('appointments.search') }}" method="GET">
                            <input type="text" id="search" name="search" placeholder="Buscar citas..."
                                class="w-full h-12 px-4 text-sm lg:text-base rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vh-green">
                            <input type="hidden" id="doctor_id" name="doctor_id" value="{{ $doctor->id }}">
                            <svg class="absolute top-1/2 right-4 transform -translate-y-1/2 w-6 h-6 text-gray-500"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 4a7 7 0 110 14 7 7 0 010-14zM21 21l-4.35-4.35" />
                            </svg>
                        </form>
                    </div>
                </div>
                <div class="mb-4 flex flex-col lg:flex-row gap-4">
                    <a id="show-citas" href="#" data-doctor-id="{{ $doctor->id }}"
                        class="w-full lg:w-40 h-12 text-sm lg:text-lg font-semibold bg-vh-green text-white rounded-xl shadow-xl hover:bg-white hover:text-vh-green transition duration-300 flex items-center justify-center">
                        Historial
                    </a>
                    <a href="#" id="genere_input" data-doctor-id="{{ $doctor->id }}"
                        class="w-full lg:w-40 h-12 text-sm lg:text-lg font-semibold bg-vh-green text-white rounded-xl shadow-xl hover:bg-white hover:text-vh-green transition duration-300 flex items-center justify-center">
                        Nueva Cita
                    </a>
                </div>

                <section class="px-6 lg:px-24 py-8 mb-14">
                    <div id="citas-container" class="container mx-auto flex flex-wrap gap-6">
                        @forelse ($citas as $cita)
                        @if ($cita->state == 1)
                        <div class="w-full sm:w-1/2 lg:w-1/4" id="cita-{{ $cita->id }}"
                            data-cita-id="{{ $cita->id }}">
                            <div
                                class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                                <div class="p-6 flex flex-col h-full">
                                    <input type="hidden" id="cita_id_{{ $cita->id }}"
                                        data-cita-id="{{ $cita->id }}">
                                    <input type="hidden" id="patient_id_{{ $cita->id }}"
                                        data-patient-id="{{ $cita->patient->id }}">
                                    <input type="hidden" id="doctor_id_{{ $cita->id }}"
                                        data-doctor-id="{{ $cita->doctor->id }}">
                                    <h3 class="text-xl font-semibold mb-2">N°: {{ $cita->id }}</h3>
                                    <p class="text-gray-600 mb-2">
                                        <strong>Paciente: </strong>{{ $cita->patient->name }}
                                        {{ $cita->patient->lastName }}
                                    </p>
                                    <p class="text-gray-600 mb-2">
                                        <strong>Especialidad: </strong>{{ $cita->category->nombre }}
                                    </p>
                                    <p class="text-gray-600 mb-2">
                                        <strong>Fecha:
                                        </strong>{{ \Carbon\Carbon::parse($cita->date)->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}
                                    </p>
                                    <p class="text-gray-600 mb-4">
                                        <strong>Hora:
                                        </strong>{{ \Carbon\Carbon::parse($cita->hour)->locale('es')->isoFormat('H:mm') }}
                                    </p>
                                    <div class="mt-auto flex space-x-3 justify-center">
                                        
                                        <button
                                            class="py-2 px-4 bg-green-50 border border-green-300 rounded-lg shadow-lg hover:bg-green-200 transition duration-300 ease-in-out flex items-center justify-center option-button"
                                            data-cita-id="{{ $cita->id }}"
                                            data-cita-id="{{ $cita->patient->id }}" aria-label="Options">
                                            <img src="{{ asset('storage/svg/expedientes.svg') }}"
                                                alt="options" class="w-8 h-6">
                                        </button>
                                        @if ($cita->modo == 'Virtual')
                                        <button
                                            class="py-2 px-4 bg-purple-50 border border-purple-300 rounded-lg shadow-lg hover:bg-purple-200 transition duration-300 ease-in-out flex items-center justify-center createVideollamada"
                                            data-cita-id="{{ $cita->id }}"
                                            data-doctor-id="{{ $cita->doctor->id }}"
                                            aria-label="Video Call">
                                            <img src="{{ asset('storage/svg/link-icon.svg') }}"
                                                alt="videocall" class="w-6 h-6">
                                        </button>
                                        @endif
                                        <button id="aceptar"
                                            class="py-2 px-4 bg-yellow-50 border border-yellow-300 rounded-lg shadow-lg hover:bg-yellow-200 transition duration-300 ease-in-out flex items-center justify-center"
                                            aria-label="Accept">
                                            <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="accept"
                                                class="w-6 h-6">
                                        </button>
                                        <button
                                            class="py-2 px-4 bg-red-50 border border-red-300 rounded-lg shadow-lg hover:bg-red-200 transition duration-300 ease-in-out flex items-center justify-center delete-cita"
                                            data-cita-id="{{ $cita->id }}" aria-label="Delete">
                                            <img src="{{ asset('storage/svg/trash-icon.svg') }}"
                                                alt="delete" class="w-6 h-6">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @empty
                        <p class="text-center font-semibold text-xl text-vh-green">No hay citas disponibles para
                            mostrar.</p>
                        @endforelse
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>