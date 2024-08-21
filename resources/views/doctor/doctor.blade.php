<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor {{ $doctor->name }}</title>
    <!-- Incluir Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/doctor.js'])
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
</head>

<body class="w-full h-full bg-gray-200">

    <!-- Encabezado -->
    <div class="fixed top-0 h-full z-10 w-full lg:w-64">
        @include('templates.header_doc')
    </div>

    <!-- Contenido -->
    <div class="pt-16 lg:ml-64 lg:pt-0">
        <!-- Bienvenida -->
        <div class="flex flex-col items-center lg:flex-row lg:justify-center px-4 py-6">
            <div
                class="w-full lg:w-11/12 lg:h-64 rounded-lg shadow-xl relative overflow-hidden bg-green-800 mb-6 lg:mb-0">
                <div class="flex flex-col lg:flex-row items-center lg:items-start lg:justify-start p-4 lg:p-6 h-full">
                    <div class="text-center lg:text-left flex flex-col justify-between h-full">
                        <div>
                            <p id="current-date" class="font-bold text-base text-gray-400 mb-2"></p>
                            <h3 class="font-bold text-2xl text-white">{{ $doctor->name }}</h3>
                            <p class="font-bold text-xl text-gray-400">{{ $doctor->category->nombre }}</p>
                        </div>
                        <p id="current-time" class="font-bold text-3xl text-white mt-4 lg:mt-6"></p>
                    </div>
                </div>
                <img class="absolute bottom-0 right-4 h-3/4 lg:h-full" src="{{ asset('storage/svg/doc_ind.svg') }}" />
            </div>
        </div>

        <!-- Estadísticas y Notificaciones -->
        <div class="px-4 lg:px-6 lg:w-11/12 mx-auto">
            <div class="flex flex-col lg:flex-row gap-4">
                <!-- Estadísticas y Recetas -->
                <div class="w-full lg:w-2/3">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">
                        <!-- Caja de Usuarios -->
                        <div
                            class="bg-white opacity-80 rounded-lg shadow-xl flex flex-col items-center justify-center p-4 h-40">
                            <img class="w-16 lg:w-16 mb-2" src="{{ asset('storage/svg/usuarios.svg') }}"
                                alt="Usuarios" />
                            <div class="text-center">
                                <h3 class="font-bold text-xl lg:text-2xl">{{ $totalPatients }}</h3>
                                <p class="font-bold text-sm lg:text-base text-gray-600">Usuarios Creados</p>
                            </div>
                        </div>
                        <!-- Caja de Citas -->
                        <div
                            class="bg-white opacity-80 rounded-lg shadow-xl flex flex-col items-center justify-center p-4 h-40">
                            <img class="w-16 lg:w-16 mb-2" src="{{ asset('storage/svg/expedientes.svg') }}"
                                alt="Citas" />
                            <div class="text-center">
                                <h3 class="font-bold text-xl lg:text-2xl">{{ $totalCitas }}</h3>
                                <p class="font-bold text-sm lg:text-base text-gray-600">Citas</p>
                            </div>
                        </div>
                        <!-- Caja de Recetas -->
                        <div
                            class="bg-white opacity-80 rounded-lg shadow-xl flex flex-col items-center justify-center p-4 h-40">
                            <img class="w-16 lg:w-16 mb-2" src="{{ asset('storage/svg/inter.svg') }}" alt="Recetas" />
                            <div class="text-center">
                                <h3 class="font-bold text-xl lg:text-2xl">{{ $totalRecetas }}</h3>
                                <p class="font-bold text-sm lg:text-base text-gray-600">Recetas creadas</p>
                            </div>
                        </div>
                    </div>

                    <!-- Recetas -->
                    <div class="bg-white rounded-lg shadow-lg px-4 mb-6 min-h-[300px]">
                        <h2 class="font-bold text-xl px-4 border-b border-gray-200">Recetas</h2>
                        @if($recentRecetas->isEmpty())
                            <div class="p-4 text-center text-gray-600 flex items-center justify-center min-h-[300px]">
                                <p>No hay recetas recientes.</p>
                            </div>
                        @else
                                            @foreach($recentRecetas as $receta)
                                                                <?php
                                                $date = \Carbon\Carbon::parse($receta->fecha_entrega);
                                                                        ?>
                                                                <div class="p-4 border-b border-gray-200 last:border-b-0">
                                                                    <div class="flex flex-col lg:flex-row items-start lg:items-center">
                                                                        <div
                                                                            class="bg-yellow-800 text-white rounded-lg w-full lg:w-24 h-24 lg:h-24 flex items-center justify-center mb-4 lg:mb-0 lg:mr-4">
                                                                            <div class="text-center">
                                                                                <span class="block text-2xl font-bold">{{ $date->format('d') }}</span>
                                                                                <span class="block text-xs">{{ $date->format('M') }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="flex-1">
                                                                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Receta</h3>
                                                                            <p class="text-gray-600 mb-2">Paciente: {{ $receta->patient->name }}</p>
                                                                            <p class="text-gray-600 mb-2">Descripción: {{ $receta->description }}</p>
                                                                            <a href="/recetas_doc"
                                                                                class="inline-block bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-300">
                                                                                Ver más
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Notificaciones -->
                <div class="w-full lg:w-1/3">
    <div class="bg-white rounded-lg shadow-lg p-4 lg:mb-2 mb-36 h-[400px] flex flex-col">
        <h2 class="font-bold text-xl px-4 border-b border-gray-200">Notificaciones</h2>
        <div class="flex-1 overflow-auto">
            @if($recentCitas->isEmpty())
                <div class="p-4 text-center text-gray-600 flex items-center justify-center h-full">
                    <p>No hay notificaciones recientes.</p>
                </div>
            @else
                @foreach($recentCitas as $cita)
                    <?php
                        $date = \Carbon\Carbon::parse($cita->date);
                    ?>
                    <div class="p-4 border-b border-gray-200 last:border-b-0">
                        <div class="flex flex-col lg:flex-row items-start lg:items-center">
                            <div
                                class="bg-green-800 text-white rounded-lg w-full lg:w-24 h-24 lg:h-24 flex items-center justify-center mb-4 lg:mb-0 lg:mr-4">
                                <div class="text-center">
                                    <span class="block text-2xl font-bold">{{ $date->format('d') }}</span>
                                    <span class="block text-xs">{{ $date->format('M') }}</span>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Notificación de Cita</h3>
                                <p class="text-gray-600 mb-2">Paciente: {{ $cita->patient->name }}</p>
                                <p class="text-gray-600 mb-2">Hora: {{ $cita->hour }}</p>
                                <a href="/citas_doc" class="w-full flex items-center">
                                    <p>Citas</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
</body>

</html>