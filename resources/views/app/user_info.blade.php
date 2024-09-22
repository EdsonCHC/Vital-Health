<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{__('messages.es_156')}}</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/loader.css', 'resources/css/user.css', 'resources/js/preloader.js', 'resources/js/scroll.js', 'resources/js/user.js', 'resources/js/expediente.js'])
</head>

<body class="bg-white h-auto overflow-x-hidden">
    @include('templates.loader')

    <div class="w-full h-auto">
        @include('templates.header')
    </div>

    <div class="flex flex-col ">
        <div class="lg:flex-1 flex lg:flex-row flex-col">
            <!-- Menu -->
            <aside class="w-full lg:w-1/4 bg-white">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">{{__('messages.es_156')}}</h1>
                    <nav>
                        <ul class="flex flex-wrap z-10 lg:flex-col space-y-0 lg:space-y-4 space-x-2 lg:space-x-0">
                            <li>
                                <button data-target="opcion1"
                                    class="menu-link relative text-lg lg:text-lg font-semibold text-green-900 py-2 lg:px-4 px-2 rounded-md focus:outline-none">{{__('messages.es_157')}}</button>
                            </li>
                            <li>
                                <button data-target="opcion2"
                                    class="menu-link relative text-lg lg:text-lg font-semibold text-green-900 py-2 lg:px-4 px-2 rounded-md focus:outline-none">{{__('messages.es_158')}}</button>
                            </li>
                            <li>
                                <button data-target="opcion3"
                                    class="menu-link relative text-lg lg:text-lg font-semibold text-green-900 py-2  lg:px-4 px-2 rounded-md focus:outline-none">{{__('messages.es_159')}}</button>
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
                                    <img id="profile_image" src="{{ route('patient.image', ['id' => $user->id]) }}"
                                        alt="Perfil"
                                        class="rounded-full border-4 border-gray-200 w-36 h-36 object-cover">
                                </div>
                                <div class="flex justify-center item-center mt-4 mb-8">
                                    <button
                                        class="save-img bg-vh-green text-white h-12  px-4 py-2 rounded-md text-lg flex items-center mx-4">
                                        <img src="{{ asset('storage/svg/upload.svg') }}" alt="subirFoto"
                                            class="w-8 h-8 mx-2">Avatar
                                    </button>
                                    @foreach ($expedientes as $file)
                                        @if ($file->state == 1)
                                            <a href="/fileUser"
                                                class="saveFileUser bg-gray-300 text-gray-700 h-12 lg:h-12 px-4 py-2 rounded-md text-lg flex items-center mx-2">
                                                <img src="{{ asset('storage/svg/printer-icon.svg') }}" alt="Expediente"
                                                    class="w-6 h-6 mx-2">{{__('messages.es_158')}}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- User Information Form Section -->
                        <div class="w-full md:w-1/2 p-2">
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                <section class="p-4">
                                    <h1 class="text-2xl font-bold mb-4">{{__('messages.es_160')}}</h1>
                                    <label class="block">
                                        <span class="text-lg font-semibold">{{__('messages.es_161')}}</span>
                                        <p class="w-full h-12 border rounded-lg pt-3 p-2 mt-1 bg-gray-100 items">
                                            {{ $user->name }}
                                        </p>
                                    </label>
                                    <label class="block">
                                        <span class="text-lg font-semibold">{{__('messages.es_162')}}</span>
                                        <p class="w-full h-12 border rounded-lg pt-3 p-2 mt-1 bg-gray-100 items">
                                            {{ $user->lastName }}
                                        </p>
                                    </label>
                                    <label class="block">
                                        <span class="text-lg font-semibold">{{__('messages.es_163')}}</span>
                                        <p class="w-full h-12 border rounded-lg pt-3 p-2 mt-1 bg-gray-100 items">
                                            {{ $user->gender }}
                                        </p>
                                    </label>
                                    <label class="block">
                                        <span class="text-lg font-semibold">{{__('messages.es_164')}}</span>
                                        <p class="w-full h-12 border rounded-lg pt-3 p-2 mt-1 bg-gray-100 items">
                                            {{ $user->birth }}
                                        </p>
                                    </label>
                                    <form id="user_form">
                                        @csrf
                                        <div class="space-y-4">
                                            <label class="block">
                                                <span class="text-lg font-semibold">{{__('messages.es_165')}} *</span>
                                                <input type="email" name="mail" value="{{ $user->mail }}"
                                                    class="w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100 text-input"
                                                    readonly required>
                                            </label>
                                            <label class="block">
                                                <span class="text-lg font-semibold">{{__('messages.es_166')}} *</span>
                                                <input type="text" name="address" value="{{ $user->address }}"
                                                    class="w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100 text-input"
                                                    readonly required>
                                            </label>
                                        </div>
                                        <div class="flex justify-between items-center mt-6">
                                            <button type="button" id="cancel_button"
                                                class="hidden p-2 border-2 border-green-700 rounded-md text-lg text-green-700 hover:bg-green-700 hover:text-white">{{__('messages.es_179')}}</button>
                                            <button type="button" id="edit"
                                                class="p-2 border-2 border-green-700 rounded-md text-lg text-green-700 hover:bg-green-700 hover:text-white">{{__('messages.es_177')}}</button>
                                            <button type="button" id="save"
                                                class="hidden p-2 border-2 border-green-700 rounded-md text-lg text-green-700 hover:bg-green-700 hover:text-white">{{__('messages.es_178')}}</button>
                                        </div>
                                        <div class="w-full mt-6 flex justify-end">
                                            <button type="submit" id="log_out"
                                                class="w-3/6 h-12 lg:w-2/6 lg:h-10 bg-red-700 text-white font-semibold rounded-lg hover:bg-red-800">{{__('messages.es_167')}}</button>
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
                                <h1 class="text-3xl font-bold mb-6">{{__('messages.es_168')}}</h1>
                                <!-- Section I: Patient Information -->
                                <section class="mb-8">
                                    <h2 class="text-xl font-semibold mb-4">{{__('messages.es_169')}}</h2>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block font-bold">{{__('messages.es_161')}}</label>
                                            <input type="text" class="w-full p-2 border rounded"
                                                value="{{ $user->name }} {{ $user->lastName }}" readonly>
                                        </div>
                                        <div>
                                            <label class="block font-bold">{{__('messages.es_164')}}</label>
                                            <input type="date" class="w-full    p-2 border rounded" value="{{ $user->birth }}"
                                                readonly>
                                        </div>
                                        <div>
                                            <label class="block font-bold">{{__('messages.es_162')}}</label>
                                            <input type="text" class="w-full p-2 border rounded text-input"
                                                value="{{ $user->gender }}" readonly>
                                        </div>
                                        <div>
                                            <label class="block font-bold">{{__('messages.es_170')}}</label>
                                            <input type="text" class="w-full p-2 border rounded" value="{{ $user->mail }}"
                                                readonly>
                                        </div>
                                        <div>
                                            <label class="block font-bold">{{__('messages.es_171')}}</label>
                                            <input type="text" class="w-full p-2 border rounded" value="{{ $user->address }}"
                                                readonly>
                                        </div>
                                        <div>
                                            <label class="block font-bold">{{__('messages.es_172')}}</label>
                                            <input type="text" class="w-full p-2 border rounded" value="{{ $user->blood }}"
                                                readonly>
                                        </div>
                                    </div>
                                </section>

                                <!-- Sección II: Historial Medico -->
                                <section class="mb-8">
                                    <h2 class="text-xl font-semibold mb-4">{{__('messages.es_180')}}</h2>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        @if (isset($citas) && $citas->isEmpty())
                                            <p>{{__('messages.es_181')}}</p>
                                        @else
                                            <div class="gap-4">
                                                @foreach ($citas as $cita)
                                                    <div class="border rounded p-4 bg-white">
                                                        <label class="block font-bold text-lg text-gray-700">
                                                        {{__('messages.es_182')}}
                                                        </label>
                                                        <p class="w-full p-2 border rounded bg-gray-50">
                                                            {{ $cita->category->nombre ?? 'No disponible' }}
                                                        </p>

                                                        <label class="block font-bold text-lg text-gray-700 mt-4">
                                                        {{__('messages.es_183')}}
                                                        </label>
                                                        <p class="w-full p-2 border rounded bg-gray-50">
                                                            {{ $cita->doctor->name ?? 'No disponible' }}
                                                            {{ $cita->doctor->lastName ?? 'No disponible' }}
                                                        </p>

                                                        <label class="block font-bold text-lg text-gray-700 mt-4">
                                                        {{__('messages.es_184')}}
                                                        </label>
                                                        <p class="w-full p-2 border rounded bg-gray-50">
                                                            {{ !empty($cita->hour) ? (new DateTime($cita->hour))->format('h:i A') : 'No disponible' }}
                                                        </p>

                                                        <label class="block font-bold text-lg text-gray-700 mt-4">
                                                        {{__('messages.es_185')}}
                                                        </label>
                                                        <p class="w-full p-2 border rounded bg-gray-50">
                                                            {{ !empty($cita->date) ? (new DateTime($cita->date))->format('j \d\e F \d\e Y') : 'No disponible' }}
                                                        </p>

                                                        <label class="block font-bold text-lg text-gray-700 mt-4">
                                                        {{__('messages.es_186')}}
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
                                    <h2 class="text-2xl font-semibold mb-6">{{__('messages.es_187')}}</h2>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                        @if ($recetas->isEmpty())
                                            <p class="text-lg text-gray-600">{{__('messages.es_188')}}</p>
                                        @else
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                                @foreach ($recetas as $receta)
                                                    <article class="w-80 bg-white rounded-lg shadow-lg p-8">
                                                        <div class="flex items-start mb-6">
                                                            <div class="ml-6">
                                                                <p class="text-xl font-bold text-gray-800">
                                                                    {{ $receta->titulo }}
                                                                </p>
                                                                <p class="text-lg text-gray-600">{{__('messages.es_189')}}
                                                                    {{ $receta->fecha_entrega }}
                                                                </p>
                                                                <p class="text-lg text-gray-600">{{__('messages.es_190')}}
                                                                    {{ $receta->estado }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <h4 class="text-xl font-semibold text-gray-800 mb-3">Medicinas
                                                        </h4>
                                                        <ul class="list-disc pl-6 text-lg text-gray-700">
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
                                    <h2 class="text-xl font-semibold mb-4">{{__('messages.es_204')}}</h2>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        @if (isset($exams) && $exams->isEmpty())
                                            <p>{{__('messages.es_205')}}</p>
                                        @else
                                            <div class="gap-4">
                                                @foreach ($exams as $exam)
                                                    <div class="border rounded p-4 bg-white">
                                                        <label class="block font-bold text-lg text-gray-700">
                                                        {{__('messages.es_206')}}
                                                        </label>
                                                        <p class="w-full p-2 border rounded bg-gray-50">
                                                            {{ $exam->exam_type ?? 'No disponible' }}
                                                        </p>

                                                        <label class="block font-bold text-lg text-gray-700 mt-4">
                                                        {{__('messages.es_185')}}
                                                        </label>
                                                        <p class="w-full p-2 border rounded bg-gray-50">
                                                            {{ !empty($exam->exam_date) ? (new DateTime($exam->exam_date))->format('j \d\e F \d\e Y') : 'No disponible' }}
                                                        </p>
                                                        </label>

                                                        <label class="block font-bold text-lg text-gray-700 mt-4">
                                                        {{__('messages.es_186')}}
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
                                    <h2 class="font-medium text-gray-600">&copy;{{__('messages.es_203')}}
                                    </h2>
                                    <img src="{{ asset('storage/svg/logo.svg') }}" alt="logo" class="h-24">
                                </div>
                            @elseif ($file->state == 1)
                                <h1 class="text-3xl font-bold mb-6">{{__('messages.es_196')}}</h1>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Opción 3 -->
                <div id="opcion3" class="content hidden mb-14">
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <h1 class="text-2xl font-bold mb-4">{{__('messages.es_197')}}</h1>
                        <p class="mb-4">{{__('messages.es_198')}}</p>
                        <form id="privacy_form">
                            @csrf
                            <div class="space-y-4">
                                <label class="block">
                                    <span class="text-lg font-semibold">{{__('messages.es_199')}}*</span>
                                    <input type="password" name="current_password"
                                        class="w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" required>
                                </label>
                                <label class="block">
                                    <span class="text-lg font-semibold">{{__('messages.es_200')}} *</span>
                                    <input type="password" name="new_password"
                                        class="w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" required>
                                </label>
                                <label class="block">
                                    <span class="text-lg font-semibold">{{__('messages.es_201')}} *</span>
                                    <input type="password" name="new_password_confirmation"
                                        class="w-full h-12 border rounded-lg p-2 mt-1 bg-gray-100" required>
                                </label>
                            </div>
                            <div class="flex justify-between mt-6">
                                <button type="submit"
                                    class="p-2 border-2 border-green-700 rounded-md text-lg text-green-700 hover:bg-green-700 hover:text-white">{{__('messages.es_202')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="w-full h-auto">
        @include('templates.footer')
    </div>
</body>

</html>