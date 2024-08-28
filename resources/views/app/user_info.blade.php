<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de Usuario</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/loader.css', 'resources/css/user.css', 'resources/js/preloader.js', 'resources/js/scroll.js', 'resources/js/user.js', 'resources/js/expediente.js'])
</head>

<body class="bg-white h-auto ">
    @include('templates.loader')
    <div class="flex flex-col m">
        @include('templates.header')

        <div class="lg:flex-1 flex lg:flex-row flex-col">
            <!-- Menu -->
            <aside class="w-full lg:w-1/4 bg-white">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">Configuración</h1>
                    <nav>
                        <ul class="flex flex-wrap lg:flex-col space-y-0 lg:space-y-4 space-x-2 lg:space-x-0">
                            <li>
                                <button data-target="opcion1"
                                    class="menu-link relative text-lg lg:text-lg font-semibold text-green-900 py-2 lg:px-4 px-2 rounded-md focus:outline-none">Perfil</button>
                            </li>
                            <li>
                                <button data-target="opcion2"
                                    class="menu-link relative text-lg lg:text-lg font-semibold text-green-900 py-2 lg:px-4 px-2 rounded-md focus:outline-none">Expediente</button>
                            </li>
                            <li>
                                <button data-target="opcion3"
                                    class="menu-link relative text-lg lg:text-lg font-semibold text-green-900 py-2  lg:px-4 px-2 rounded-md focus:outline-none">Privacidad</button>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <!-- Contenido -->
            <main class="flex-1 p-6 bg-white">
                <!-- Opción 1 -->
                <div id="opcion1" class="content hidden">
                    <div class="flex flex-wrap justify-center">
                        <div class="flex flex-col md:w-1/2 p-2 space-y-4">
                            <div class="w-full pb-32 lg:pb-8 bg-white shadow-lg rounded-lg overflow-hidden">
                                <div
                                    class="h-32 bg-cover bg-center bg-vh-green bg-gradient-to-t from-green-800 to-green-600">
                                </div>
                                <div class="flex justify-center -mt-12">
                                    <img id="profile_image" src="{{ asset('storage/profile_images/' . $user->img) }}"
                                        alt="Perfil"
                                        class="rounded-full border-4 border-gray-200 w-36 h-36 object-cover">
                                </div>
                                <div class="text-center mt-2">
                                    <h2 class="text-xl font-semibold">{{ $user->name }} {{ $user->lastName }}</h2>
                                    <p class="text-lg text-gray-600">Paciente de <span
                                            class="text-green-700 tracking-wide">Vital-Health</span></p>
                                </div>
                                <div class="flex justify-center item-center mt-4 mb-8">
                                    <button
                                        class="save-img bg-vh-green text-white h-12  px-4 py-2 rounded-md text-lg flex items-center mx-4">
                                        <img src="{{ asset('storage/svg/upload.svg') }}" alt="subirFoto"
                                            class="w-8 h-8 mx-2">Avatar
                                    </button>
                                    @foreach ($expedientes as $file)
                                        @if ($file->state == 0)
                                            <button
                                                class="saveFileUser bg-gray-300 text-gray-700 h-12 lg:h-12 px-4 py-2 rounded-md text-lg flex items-center mx-2">
                                                <img src="{{ asset('storage/svg/printer-icon.svg') }}" alt="Expediente"
                                                    class="w-6 h-6 mx-2">Expediente</button>
                                        @elseif ($file->state == 1)
                                            <button
                                                class="bg-gray-300 text-gray-700 h-16 lg:h-14 px-4 py-2 rounded-md text-lg flex items-center mx-2">
                                                <img src="{{ asset('storage/svg/question.svg') }}" alt="Expediente"
                                                    class="w-6 h-6 mx-2">Exigir Expediente</button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="w-full h-2/4 bg-white shadow-lg rounded-lg overflow-hidden">
                                <div class="text-center mt-2">
                                    <h2 class="text-lg font-semibold">Mis Estadisticas</h2>
                                </div>
                            </div>
                        </div>

                        <!-- User Information Form Section -->
                        <div class="w-full md:w-1/2 p-2">
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                <section class="p-4">
                                    <h1 class="text-2xl font-bold mb-4">Información Personal</h1>
                                    <label class="block">
                                        <span class="text-lg font-semibold">Nombre</span>
                                        <p class="w-full h-12 border rounded-lg pt-3 p-2 mt-1 bg-gray-100 items">
                                            {{ $user->name }}</p>
                                    </label>
                                    <label class="block">
                                        <span class="text-lg font-semibold">Apellido</span>
                                        <p class="w-full h-12 border rounded-lg pt-3 p-2 mt-1 bg-gray-100 items">
                                            {{ $user->lastName }}</p>
                                    </label>
                                    <label class="block">
                                        <span class="text-lg font-semibold">Genero</span>
                                        <p class="w-full h-12 border rounded-lg pt-3 p-2 mt-1 bg-gray-100 items">
                                            {{ $user->gender }}</p>
                                    </label>
                                    <label class="block">
                                        <span class="text-lg font-semibold">Fecha de nacimiento</span>
                                        <p class="w-full h-12 border rounded-lg pt-3 p-2 mt-1 bg-gray-100 items">
                                            {{ $user->birth }}</p>
                                    </label>
                                    <form id="user_form">
                                        @csrf
                                        <div class="space-y-4">
                                            <label class="block">
                                                <span class="text-lg font-semibold">Correo *</span>
                                                <input type="email" name="mail" value="{{ $user->mail }}"
                                                    class="w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100 text-input"
                                                    required>
                                            </label>
                                            <label class="block">
                                                <span class="text-lg font-semibold">Dirección *</span>
                                                <input type="text" name="address" value="{{ $user->address }}"
                                                    class="w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100 text-input"
                                                    required>
                                            </label>
                                        </div>
                                        <div class="flex justify-between items-center mt-6">
                                            <button type="button" id="cancel_button"
                                                class="hidden p-2 border-2 border-green-700 rounded-md text-lg text-green-700 hover:bg-green-700 hover:text-white">Cancelar</button>
                                            <button type="button" id="edit"
                                                class="p-2 border-2 border-green-700 rounded-md text-lg text-green-700 hover:bg-green-700 hover:text-white">Editar</button>
                                            <button type="button" id="save"
                                                class="hidden p-2 border-2 border-green-700 rounded-md text-lg text-green-700 hover:bg-green-700 hover:text-white">Guardar</button>
                                        </div>
                                        <div class="w-full mt-6 flex justify-end">
                                            <button type="submit" id="log_out"
                                                class="w-3/6 h-12 lg:w-2/6 lg:h-10 bg-red-700 text-white font-semibold rounded-lg hover:bg-red-800">Cerrar
                                                Sesión</button>
                                        </div>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Opción 2 -->
                <div id="opcion2" class="content hidden">
                    <div class="container mx-auto p-4">
                        @foreach ($expedientes as $file)
                            @if ($file->state == 0)
                                <h1 class="text-3xl font-bold mb-6">Expediente Medico Habilitado</h1>
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
                                            <input type="date" class="w-full p-2 border rounded"
                                                value="{{ $user->birth }}" readonly>
                                        </div>
                                        <div>
                                            <label class="block font-bold">Género</label>
                                            <input type="text" class="w-full p-2 border rounded text-input"
                                                value="{{ $user->gender }}" readonly>
                                        </div>
                                        <div>
                                            <label class="block font-bold">Correo Electronico</label>
                                            <input type="text" class="w-full p-2 border rounded"
                                                value="{{ $user->mail }}" readonly>
                                        </div>
                                        <div>
                                            <label class="block font-bold">Residencia</label>
                                            <input type="text" class="w-full p-2 border rounded"
                                                value="{{ $user->address }}" readonly>
                                        </div>
                                        <div>
                                            <label class="block font-bold">Tipo de Sangre</label>
                                            <input type="text" class="w-full p-2 border rounded"
                                                value="{{ $user->blood }}" readonly>
                                        </div>
                                    </div>
                                </section>

                                <!-- Sección II: Historial Medico -->
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
                                                        <div
                                                            class="flex justify-between items-start pb-4 mb-4 border-b">
                                                            <div class="flex items-center">
                                                                <div class="pr-3">
                                                                    <object class="h-12 w-12 rounded-full object-cover"
                                                                        data="{{ asset('storage/svg/medicine_example.svg') }}"
                                                                        type="image/svg+xml"></object>
                                                                </div>
                                                                <div>
                                                                    <p class="text-sm font-semibold">
                                                                        {{ $receta->titulo }}
                                                                    </p>
                                                                    <p class="text-sm text-gray-500">Fecha de Entrega:
                                                                        {{ $receta->fecha_entrega }}</p>
                                                                    <p class="text-sm text-gray-500">Estado:
                                                                        {{ $receta->estado }}</p>
                                                                    <!-- Estado agregado aquí -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h3 class="font-medium text-xl leading-8 mb-2">
                                                            Medicinas:
                                                        </h3>
                                                        <ul class="list-disc pl-5">
                                                            @foreach ($receta->medicinas as $medicina)
                                                                <li>{{ $medicina->nombre }}
                                                                    ({{ $medicina->pivot->cantidad }})
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
                                    <h2 class="font-medium text-gray-600">&copy; 2024 Vital Health. Todos los derechos
                                        reservados.
                                    </h2>
                                    <img src="{{ asset('storage/svg/logo.svg') }}" alt="logo" class="h-24">
                                </div>
                            @elseif ($file->state == 1)
                                <h1 class="text-3xl font-bold mb-6">Expediente Medico Deshabilitado</h1>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Opción 3 -->
                <div id="opcion3" class="content hidden">
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <h1 class="text-2xl font-bold mb-4">Privacidad</h1>
                        <p class="mb-4">Aquí puedes gestionar la privacidad y las configuraciones de seguridad de
                            tu
                            cuenta.</p>
                        <form id="privacy_form">
                            @csrf
                            <div class="space-y-4">
                                <label class="block">
                                    <span class="text-lg font-semibold">Contraseña Actual *</span>
                                    <input type="password" name="current_password"
                                        class="w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" required>
                                </label>
                                <label class="block">
                                    <span class="text-lg font-semibold">Nueva Contraseña *</span>
                                    <input type="password" name="new_password"
                                        class="w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" required>
                                </label>
                                <label class="block">
                                    <span class="text-lg font-semibold">Confirmar Nueva Contraseña *</span>
                                    <input type="password" name="new_password_confirmation"
                                        class="w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" required>
                                </label>
                            </div>
                            <div class="flex justify-between mt-6">
                                <!--
                                <button type="submit"
                                    class="p-2 border-2 border-green-500 rounded-md text-lg text-green-500 hover:bg-green-500 hover:text-white">Recuperar
                                    Contraseña</button>-->
                                <button type="submit"
                                    class="p-2 border-2 border-green-500 rounded-md text-lg text-green-500 hover:bg-green-500 hover:text-white">Guardar
                                    Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
