<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <!-- Incluir Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/doctor.js', 'resources/js/videollamada.js', 'resources/js/program_doc.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex w-full">
        <!-- Sidebar -->
        <aside class="lg:fixed lg:top-0 lg:left-0 lg:w-60 lg:h-screen lg:bg-white lg:shadow-lg lg:z-10">
            @include('templates.header_doc')
        </aside>

        <main class="lg:ml-60 p-6 w-full min-h-screen bg-gray-100">
            <div class="container mx-auto p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Panel de Tareas Pendientes -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4 text-vh-green">Tareas Pendientes</h2>
                    <ul class="space-y-2">
                        @foreach ($program_docs as $program_doc)
                            <li class="flex items-start p-2 bg-gray-100 rounded-lg">
                                <span class="flex-1">{{ $program_doc->homeworks }}</span>
                                <input type="checkbox" data-id="{{ $program_doc->id }}"
                                    data-doctor-id="{{ $program_doc->doctor_id }}"
                                    class="deleteHomework form-checkbox text-vh-green m-2">
                            </li>
                        @endforeach
                    </ul>
                    <button data-doctor-id="{{ $program_doc->doctor->id }}"
                        class="createHomework w-full mt-4 py-2 bg-vh-green text-white rounded-lg hover:bg-vh-gray transition duration-300">Agregar
                        Tarea</button>
                </div>

                <!-- Panel de Videollamadas -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4 text-vh-green">Videollamadas</h2>
                    <div>
                        @foreach ($videollamadas as $videollamada)
                            <div class="w-76 h-36 m-4 bg-white shadow-lg rounded-lg flex">
                                <div class="m-4">
                                    <div
                                        class="w-20 h-20 mb-2 flex-col content-center items-center bg-vh-green rounded-md">
                                        <span class="flex justify-center font-semibold text-white text-lg">
                                            {{ \Carbon\Carbon::parse($videollamada->date)->format('d M') }}
                                        </span>
                                        <span class="flex justify-center font-semibold text-white text-sm">
                                            {{ \Carbon\Carbon::parse($videollamada->hour)->format('h:i A') }} </span>
                                    </div>
                                    <div
                                        class="w-20 h-6 flex justify-center content-center items-center bg-vh-green-light rounded-md">
                                        <button data-roomName="{{ $videollamada->room_name }}"
                                            class="joinRoomButton flex justify-center font-semibold transition duration-300">
                                            Unirse
                                        </button>
                                    </div>
                                </div>
                                <!-- Detalles del paciente y descripción -->
                                <div class="flex flex-col my-auto">
                                    <h3 class="font-bold text-xl">Reunión</h3>
                                    <p class="text-lg">{{ $videollamada->room_name }}</p>
                                    <p class="text-emerald-500 text-lg">Paciente: {{ $videollamada->patient->name }}
                                    </p>
                                </div>
                                <!-- Botón para eliminar -->
                                <div class="ml-auto">
                                    <button type="button" class="deleteVideollamada"
                                        data-videollamada-id="{{ $videollamada->id }}"
                                        data-cita-id="{{ $videollamada->cita->id }}"
                                        data-doctor-id="{{ $videollamada->doctor->id }}">
                                        <img src="{{ asset('storage/svg/trash.svg') }}" alt="Ver Cita"
                                            class="w-12 h-12 p-2 rounded"></button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Panel de Calendario -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4 text-vh-green">Calendario</h2>
                    <div class="flex justify-between items-center mb-4">
                        <button id="prevMonth" class="bg-vh-green text-white px-4 py-2 rounded-lg">Anterior</button>
                        <h3 id="currentMonth" class="text-xl font-bold"></h3>
                        <button id="nextMonth" class="bg-vh-green text-white px-4 py-2 rounded-lg">Siguiente</button>
                    </div>
                    <div id="calendar" class="grid grid-cols-7 gap-2 text-center">
                        <!-- Los días del calendario se generarán dinámicamente con JS -->
                    </div>
                </div>
            </div>
        </main>

    </div>
</body>

</html>
