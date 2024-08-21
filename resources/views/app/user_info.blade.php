<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de Usuario</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/loader.css', 'resources/js/preloader.js', 'resources/js/scroll.js', 'resources/js/user.js', 'resources/js/expediente.js'])
</head>

<body class="w-full h-screen overflow-y-scroll">
    @include('templates.loader')
    <div class="w-full h-auto">
        @include('templates.header')
    </div>

    <!-- Menu y contenido -->
    <div class="w-full h-auto flex flex-col lg:flex-row">
        <!-- Menu -->
        <div class="hidden lg:block lg:w-1/4 pt-8 pb-2 px-8 bg-vh-gray-light border-b border-gray-300">
            <h1 class="text-2xl font-bold mb-4">Configuración</h1>
            <nav class="pt-4">
                <ul class="space-y-4">
                    <li><button data-target="opcion1"
                            class="menu-link active text-lg font-semibold text-vh-green tracking-wide">Perfil</button>
                    </li>
                    <li><button data-target="opcion2"
                            class="menu-link text-lg font-semibold text-vh-green tracking-wide">Expediente</button>
                    </li>
                    <li><button data-target="opcion3"
                            class="menu-link text-lg font-semibold text-vh-green tracking-wide">Privacidad</button></li>
                </ul>
            </nav>
        </div>

        <!-- Contenido -->
        <div id="contentContainer" class="w-full lg:w-3/4 pt-8 lg:pt-0 overflow-hidden lg:my-4">
            <!-- Opción 1 -->
            <div id="opcion1" class="content bg-white">
                <div
                    class="mt-4 lg:mt-20 mx-auto lg:w-4/5 h-auto flex flex-col lg:flex-row justify-center items-center lg:gap-20">
                    <section class="w-full lg:w-2/5 h-auto flex flex-col items-center lg:gap-10 p-2 lg:border-r-2">
                        <h1 class="font-bold text-2xl lg:text-3xl">Perfil</h1>
                        <div
                            class="w-40 h-40 lg:w-56 lg:h-56 rounded-full border border-solid border-vh-green overflow-hidden">
                            <img src="storage/{{ $user->img }}" alt="Perfil" class="w-full h-full object-cover">
                        </div>
                        <div class="flex flex-col items-center">
                            <h1 class="text-xl lg:text-3xl">{{ $user->name }}</h1>
                            <p class="text-lg text-vh-green">Paciente</p>
                            <button
                                class="w-32 lg:w-40 h-10 p-2 text-white font-bold bg-vh-green rounded-lg mt-4 flex justify-center gap-4">
                                <img src="{{ asset('storage/svg/upload.svg') }}" alt="Subir foto" class="w-6 h-6">
                                <p>Avatar</p>
                            </button>
                            <button
                                class="saveFileUser w-32 lg:w-40 h-10 p-2 mt-4 bg-gray-500 text-white font-bold rounded-lg flex justify-center items-center gap-2">
                                <img src="{{ asset('storage/svg/eye-scan.svg') }}" alt="noti_icon" class="w-8 h-8">
                                <p>Expediente</p>
                            </button>
                        </div>
                    </section>
                    <hr class="w-4/5 mx-auto my-5 lg:hidden border">
                    <section class="w-full lg:w-1/2 h-auto flex flex-col items-center px-4">
                        <h1 class="font-bold text-xl lg:text-3xl">Información</h1>
                        <form id="user_form" class="w-full">
                            @csrf
                            <div class="flex flex-col gap-5 mt-5">
                                <label class="block text-lg font-semibold">
                                    Nombre *
                                    <input type="text" name="name" value="{{ $user->name }}"
                                        class="w-full h-10 font-normal border-2 border-solid border-vh-green rounded-lg p-2 outline-none text-input"
                                        required readonly>
                                </label>
                                <label class="block text-lg font-semibold">
                                    Apellido *
                                    <input type="text" name="lastName" value="{{ $user->lastName }}"
                                        class="w-full h-10 font-normal border-2 border-solid border-vh-green rounded-lg p-2 outline-none text-input"
                                        required readonly>
                                </label>
                                <label class="block text-lg font-semibold">
                                    Género *
                                    <select name="gender"
                                        class="w-full h-10 font-normal border-2 border-solid border-vh-green rounded-lg p-2 outline-none text-input"
                                        required readonly>
                                        <option value="Mujer" {{ $user->gender === 'Mujer' ? 'selected' : '' }}>Mujer
                                        </option>
                                        <option value="Hombre" {{ $user->gender === 'Hombre' ? 'selected' : '' }}>
                                            Hombre
                                        </option>
                                    </select>
                                </label>

                                <label class="block text-lg font-semibold">
                                    Fecha de nacimiento *
                                    <input type="date" name="birth" value="{{ $user->birth }}"
                                        class="w-full h-10 font-normal border-2 border-solid border-vh-green rounded-lg p-2 outline-none text-input"
                                        required readonly>
                                </label>
                                <label class="block text-lg font-semibold">
                                    Correo *
                                    <input type="email" name="mail" value="{{ $user->mail }}"
                                        class="w-full h-10 font-normal border-2 border-solid border-vh-green rounded-lg p-2 outline-none text-input"
                                        required readonly>
                                </label>
                                <label class="block text-lg font-semibold">
                                    Dirección *
                                    <input type="text" name="address" value="{{ $user->address }}"
                                        class="w-full h-10 font-normal border-2 border-solid border-vh-green rounded-lg p-2 outline-none text-input"
                                        required readonly>
                                </label>
                            </div>
                            <input type="hidden" id="_token" value="{{ csrf_token() }}">
                            <div class="w-full flex justify-center my-6 border-b-2 p-2">
                                <div class="flex">
                                    <button type="button" id="cancel_button"
                                        class="mx-2 p-2 border-2 border-vh-green-medium rounded-md text-lg transition hover:bg-vh-green hover:text-white hidden">
                                        Cancelar
                                    </button>
                                    <button id="edit"
                                        class="mx-2 p-2 border-2 border-vh-green-medium rounded-md text-lg transition hover:bg-vh-green hover:text-white">Editar</button>
                                    <button id="save"
                                        class="mx-2 p-2 border-2 border-vh-green-medium rounded-md text-lg transition hover:bg-vh-green hover:text-white hidden">Guardar</button>
                                </div>
                            </div>
                            <div class="w-full">
                                <button type="submit" id="log_out"
                                    class="w-auto h-auto mt-8 mx-auto block border-2 border-red-600 text-lg transition hover:bg-red-600 hover:text-white p-2 rounded-lg">Cerrar
                                    Sesión</button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <!-- Opción 2 -->
            <div id="opcion2" class="content hidden bg-white p-6">
                <div class="container mx-auto p-4">
                    <h1 class="text-3xl font-bold mb-6">Expediente Medico</h1>
                    <!-- Section I: Patient Information -->
                    <section class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">Sección I. Información del paciente</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-bold">Nombre</label>
                                <input type="text" class="w-full p-2 border rounded"
                                    value="{{ $user->name }} {{ $user->lastName }}" readonly>
                            </div>
                            <div>
                                <label class="block font-bold">Fecha de Nacimiento</label>
                                <input type="date" class="w-full p-2 border rounded" value="{{ $user->birth }}"
                                    readonly>
                            </div>
                            <div>
                                <label class="block font-bold">Género</label>
                                <input type="text" class="w-full p-2 border rounded text-input"
                                    value="{{ $user->gender }}" readonly>
                            </div>
                            <div>
                                <label class="block font-bold">Correo Electronico</label>
                                <input type="text" class="w-full p-2 border rounded" value="{{ $user->mail }}"
                                    readonly>
                            </div>
                            <div>
                                <label class="block font-bold">Residencia</label>
                                <input type="text" class="w-full p-2 border rounded" value="{{ $user->address }}"
                                    readonly>
                            </div>
                            <div>
                                <label class="block font-bold">Tipo de Sangre</label>
                                <input type="text" class="w-full p-2 border rounded" value="{{ $user->blood }}"
                                    readonly>
                            </div>
                        </div>
                    </section>

                    <!-- Section II: Medical history -->
                    <section class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">Sección II. Historial Medico</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @if (isset($citas) && $citas->isEmpty())
                                <p>No Tienes Citas Finalizadas...</p>
                            @else
                                <div class="gap-4">
                                    @foreach ($citas as $cita)
                                        <div class="border rounded p-4 bg-white">
                                            <label class="block font-bold text-lg text-gray-700">
                                                Especialidad de la Cita
                                            </label>
                                            <p class="w-full p-2 border rounded bg-gray-50">
                                                {{ $cita->category->nombre ?? 'No disponible' }}
                                            </p>

                                            <label class="block font-bold text-lg text-gray-700 mt-4">
                                                Doctor
                                            </label>
                                            <p class="w-full p-2 border rounded bg-gray-50">
                                                {{ $cita->doctor->name ?? 'No disponible' }}
                                                {{ $cita->doctor->lastName ?? 'No disponible' }}
                                            </p>

                                            <label class="block font-bold text-lg text-gray-700 mt-4">
                                                Hora
                                            </label>
                                            <p class="w-full p-2 border rounded bg-gray-50">
                                                {{ !empty($cita->hour) ? (new DateTime($cita->hour))->format('h:i A') : 'No disponible' }}
                                            </p>

                                            <label class="block font-bold text-lg text-gray-700 mt-4">
                                                Fecha
                                            </label>
                                            <p class="w-full p-2 border rounded bg-gray-50">
                                                {{ !empty($cita->date) ? (new DateTime($cita->date))->format('j \d\e F \d\e Y') : 'No disponible' }}
                                            </p>
                                            </label>

                                            <label class="block font-bold text-lg text-gray-700 mt-4">
                                                Descripción
                                            </label>
                                            <p class="w-full p-2 border rounded bg-gray-50">
                                                {{ $cita->description ?? 'No disponible' }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </section>

                    <!-- Section III: Assigned medication -->
                    <section class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">Sección III. Medicaciones</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @if ($recetas->isEmpty())
                                <p>No Tienes Medicamentos Asignados...</p>
                            @else
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
                                    @foreach ($recetas as $receta)
                                        <article
                                            class="bg-white p-6 mb-6 shadow-lg transition duration-300 hover:shadow-2xl rounded-lg border">
                                            <div class="flex justify-between items-start pb-4 mb-4 border-b">
                                                <div class="flex items-center">
                                                    <div class="pr-3">
                                                        <object class="h-12 w-12 rounded-full object-cover"
                                                            data="{{ asset('storage/svg/medicine_example.svg') }}"
                                                            type="image/svg+xml"></object>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-semibold">{{ $receta->titulo }}</p>
                                                        <p class="text-sm text-gray-500">Fecha de Entrega:
                                                            {{ $receta->fecha_entrega }}</p>
                                                        <p class="text-sm text-gray-500">Estado:
                                                            {{ $receta->estado }}</p> <!-- Estado agregado aquí -->
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="font-medium text-xl leading-8 mb-2">
                                                Medicinas:
                                            </h3>
                                            <ul class="list-disc pl-5">
                                                @foreach ($receta->medicinas as $medicina)
                                                    <li>{{ $medicina->nombre }} ({{ $medicina->pivot->cantidad }})
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </article>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </section>

                    <!-- Section IV: Medical exams -->
                    <section class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">Section IV. Examenes Medicos</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @if (isset($exams) && $exams->isEmpty())
                                <p>No Tienes Examenes...</p>
                            @else
                                <div class="gap-4">
                                    @foreach ($exams as $exam)
                                        <div class="border rounded p-4 bg-white">
                                            <label class="block font-bold text-lg text-gray-700">
                                                Tipo de Examen
                                            </label>
                                            <p class="w-full p-2 border rounded bg-gray-50">
                                                {{ $exam->exam_type ?? 'No disponible' }}
                                            </p>

                                            <label class="block font-bold text-lg text-gray-700 mt-4">
                                                Fecha
                                            </label>
                                            <p class="w-full p-2 border rounded bg-gray-50">
                                                {{ !empty($exam->exam_date) ? (new DateTime($exam->exam_date))->format('j \d\e F \d\e Y') : 'No disponible' }}
                                            </p>
                                            </label>

                                            <label class="block font-bold text-lg text-gray-700 mt-4">
                                                Descripción
                                            </label>
                                            <p class="w-full p-2 border rounded bg-gray-50">
                                                {{ $exam->notes ?? 'No disponible' }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </section>
                    <div class="flex justify-between">
                        <h2 class="font-medium text-gray-600">&copy; 2024 Vital Health. Todos los derechos reservados.
                        </h2>
                        <img src="{{ asset('storage/svg/logo.svg') }}" alt="logo" class="h-24">
                    </div>
                </div>
            </div>
            <!-- Opción 3 -->
            <div id="opcion3" class="content hidden bg-white p-6">
                <h2 class="text-xl font-semibold mb-2">Contenido de la Opción 3</h2>
                <p>Este es el contenido que se muestra para la opción 3.</p>
            </div>
        </div>
    </div>
</body>

</html>
