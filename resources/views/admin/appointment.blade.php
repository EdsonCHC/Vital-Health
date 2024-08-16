<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment</title>
    @vite(['resources/css/app.css', 'resources/js/ad_appointment.js'])
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
</head>

<body class="w-full h-full bg-vh-alice-blue">
    <div class="w-auto h-auto fixed top-0 z-10">
        @include('templates.header_ad')
    </div>

    <div class="flex flex-col justify-center mx-4 lg:mx-40 mt-12">
        <div class="mb-2 flex justify-between items-center lg:pl-28">
            <h2 class="font-bold text-2xl">
                Citas del Área de {{ $categoria->nombre }}
            </h2>
        </div>

        <div class="flex flex-col bg-white opacity-80 rounded-xl shadow-xl p-4 lg:w-132 lg:ml-40 lg:mt-4">
            <h3 class="font-semibold text-xl mb-4">Citas con Doctor Asignado</h3>
            <input type="text" id="searchAssigned" placeholder="Buscar paciente..."
                class="py-2 px-4 border rounded-md shadow-sm">

            <div class="overflow-y-auto max-h-64">
                <div class="grid grid-cols-6 gap-2 bg-vh-alice-blue rounded-md p-2 mt-4 lg:my-5">
                    <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">#</p>
                    <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">Paciente</p>
                    <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">Doctor</p>
                    <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">Hora</p>
                    <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">Fecha</p>
                    <p class="font-semibold text-sm lg:text-xl text-vh-green text-center"></p>
                </div>
                @foreach($citasAsignadas as $cita)
                    <div class="grid grid-cols-6 gap-2 bg-vh-green-light rounded-md p-2 my-2">
                        <p class="font-bold text-sm lg:text-lg text-center">{{ $cita->id }}</p>
                        <p class="font-bold text-sm lg:text-lg text-center">{{ $cita->patient->name ?? 'No asignado' }}</p>
                        <p class="font-bold text-sm lg:text-lg text-center">{{ $cita->doctor->name ?? 'No asignado' }}</p>
                        <p class="font-bold text-sm lg:text-lg text-center">{{ $cita->hour }}</p>
                        <p class="font-bold text-sm lg:text-lg text-center">{{ $cita->date }}</p>
                        <div class="flex items-center justify-center space-x-2">
                            <button class="info-button" data-id="{{ $cita->id }}">
                                Información
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
            <h3 class="font-semibold text-xl mt-8 mb-4">Citas sin Doctor Asignado</h3>
            <div class="overflow-y-auto max-h-64">
                <div class="grid grid-cols-5 gap-2 bg-vh-alice-blue rounded-md p-2 mt-4 lg:my-5">
                    <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">#</p>
                    <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">Paciente</p>
                    <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">Hora</p>
                    <p class="font-semibold text-sm lg:text-xl text-vh-green text-center">Fecha</p>
                    <p class="font-semibold text-sm lg:text-xl text-vh-green text-center"></p>
                </div>
                @foreach($citasNoAsignadas as $cita)
                    <div class="grid grid-cols-5 gap-2 bg-vh-green-light rounded-md p-2 my-2">
                        <p class="font-bold text-sm lg:text-lg text-center">{{ $cita->id }}</p>
                        <p class="font-bold text-sm lg:text-lg text-center">{{ $cita->patient->name ?? 'No asignado' }}</p>
                        <p class="font-bold text-sm lg:text-lg text-center">{{ $cita->hour }}</p>
                        <p class="font-bold text-sm lg:text-lg text-center">{{ $cita->date }}</p>
                        <div class="flex space-x-2">
                            <a href="#" id="new-appointment-btn" data-id="{{ $cita->id }}"
                                class="bg-vh-green text-white font-bold py-2 px-4 rounded-lg shadow-lg hover:bg-vh-green-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 6L9 17l-5-5" />
                                </svg>                           
                             </a>

                            <input type="hidden" id="category-id" value="{{ $categoria->id }}">
                            <a href="#" id="delete-appointment" data-id="{{ $cita->id }}"
                                class="text-white bg-red-600 py-1 px-2 rounded-md shadow-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6L6 18M6 6l12 12" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</body>

</html>