<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js', 'resources/js/doc_citas.js', 'resources/js/doc_examenes.js', 'resources/js/doc_appointment.js', 'resources/js/doctor.js', 'resources/js/hadware.js', 'resources/js/videollamada.js', 'resources/js/searchcitas.js'])
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
                            <h2 class="text-2xl lg:text-3xl font-bold text-vh-green">Citas del Doctor: {{ $doctor->name }}</h2>
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
                    <a id="show-citas" href="#"
                        class="w-full lg:w-40 h-12 text-sm lg:text-lg font-semibold bg-vh-green text-white rounded-xl shadow-xl hover:bg-white hover:text-vh-green transition duration-300 flex items-center justify-center">
                        Historial
                    </a>
                    <a href="#" id="genere_input" data-doctor-id="{{ $doctor->id }}"
                        class="w-full lg:w-40 h-12 text-sm lg:text-lg font-semibold bg-vh-green text-white rounded-xl shadow-xl hover:bg-white hover:text-vh-green transition duration-300 flex items-center justify-center">
                        Nueva Cita
                    </a>
                </div>

                <!-- Main Citas Container -->
                <div id="citas-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach ($citas as $cita)
                        @if ($cita->state == 1)
                            <div id="cita-{{ $cita->id }}" data-cita-id="{{ $cita->id }}"
                                class="cita-item bg-white rounded-lg shadow-md p-4 flex flex-col gap-4 border border-gray-200">
                                <input type="hidden" id="cita_id_{{ $cita->id }}" data-cita-id="{{ $cita->id }}">
                                <input type="hidden" id="patient_id_{{ $cita->id }}" data-patient-id="{{ $cita->patient->id }}">
                                <input type="hidden" id="doctor_id_{{ $cita->id }}" data-doctor-id="{{ $cita->doctor->id }}">

                                <div class="text-base lg:text-lg font-semibold text-vh-green">{{ $cita->id }}</div>
                                <div class="text-sm lg:text-base text-gray-700">{{ $cita->patient->name }}
                                    {{ $cita->patient->lastName }}
                                </div>
                                <div class="text-sm lg:text-base text-gray-700">{{ $cita->category->nombre }}</div>
                                <div class="text-sm lg:text-base text-gray-700">{{ $cita->date }}</div>

                                <div class="flex justify-between items-center mt-4">
                                    <div class="flex space-x-3">
                                        <button class="p-3 bg-blue-50 border border-blue-300 rounded-xl shadow-lg hover:bg-blue-200 transition duration-300 ease-in-out flex items-center justify-center"
                                            id="add-vitals" aria-label="Add Vitals">
                                            <img src="{{ asset('storage/svg/favicon.png') }}" alt="add" class="w-6 h-6">
                                        </button>
                                        <button class="p-3 bg-green-50 border border-green-300 rounded-xl shadow-lg hover:bg-green-200 transition duration-300 ease-in-out flex items-center justify-center option-button"
                                            data-cita-id="{{ $cita->id }}" aria-label="Options">
                                            <img src="{{ asset('storage/svg/option-icon.svg') }}" alt="options" class="w-6 h-6">
                                        </button>
                                        <button class="p-3 bg-yellow-50 border border-yellow-300 rounded-xl shadow-lg hover:bg-yellow-200 transition duration-300 ease-in-out flex items-center justify-center"
                                            id="aceptar" aria-label="Accept">
                                            <img src="{{ asset('storage/svg/check-icon.svg') }}" alt="accept" class="w-6 h-6">
                                        </button>
                                        <button class="p-3 bg-red-50 border border-red-300 rounded-xl shadow-lg hover:bg-red-200 transition duration-300 ease-in-out flex items-center justify-center delete-cita"
                                            data-cita-id="{{ $cita->id }}" aria-label="Delete">
                                            <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="delete" class="w-6 h-6">
                                        </button>
                                        @if ($cita->modo == 'Virtual')
                                            <button class="p-3 bg-purple-50 border border-purple-300 rounded-xl shadow-lg hover:bg-purple-200 transition duration-300 ease-in-out flex items-center justify-center createVideollamada"
                                                data-cita-id="{{ $cita->id }}" data-doctor-id="{{ $cita->doctor->id }}"
                                                aria-label="Video Call">
                                                <img src="{{ asset('storage/svg/link-icon.svg') }}" alt="videocall" class="w-6 h-6">
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    @if ($citas->isEmpty())
                        <p class="text-center font-semibold text-xl text-vh-green">No hay citas disponibles para mostrar.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>
