<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $categoria->nombre }}</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/checkbox.css', 'resources/js/appointment.js', 'resources/css/loader.css', 'resources/js/preloader.js', 'resources/js/scroll.js'])
</head>

<body class="w-full h-full overflow-x-hidden">
    @include('templates.loader')

    <div class="w-full h-auto">
        @include('templates.header')
    </div>

    <!-- Hidden Input for Category ID -->
    <input type="hidden" id="category_id" value="{{ $categoria->id }}">
    <!--Estilos Desktop-->
    <div class="hidden lg:flex lg:pt-28 mb-5 w-full bg-gray-100">
        <div class="flex justify-center items-center">
            <div class="w-auto flex flex-col ml-40">
                <span class="font-bold text-4xl mb-2">
                    {{ __('messages.es_128') }} {{ $categoria->nombre }}
                </span> <span class="font-bold text-4xl mb-4">{{ __('messages.es_129') }}</span>
                <span class="font-bold text-2xl">{{ __('messages.es_130') }}</span>
                <div class="my-6 w-3/5">
                    <p class="text-xl text-justify mb-4 font-bold text-gray-400">
                        {{ $categoria->descripcion }}
                    </p>
                </div>
                <button target="_self" id="make_appointment"
                    class="w-4/5 lg:w-2/5 h-12 text-white font-bold bg-vh-green text-lg tracking-wide shadow-xl mb-10 mx-4 rounded-full hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center content-center">
                    {{ __('messages.es_131') }}
                </button>
            </div>
            <div class="mr-6">
                <div class="bg-gray-200 rounded w-60 p-4">
                    <p class="text-2xl font-bold mb-4">{{ __('messages.es_132') }}</p>
                    <div class="mb-4">
                        <div class="flex flex-col flex-wrap gap-2 mt-2">
                            @php
                                $caracteristicas = explode(',', $categoria->caracteristicas);
                            @endphp

                            @foreach ($caracteristicas as $caracteristica)
                                <span class="text-xl">{{ trim($caracteristica) }}</span>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <div class="flex justify-center items-center w-auto">
                <div class="ml-auto lg:ml-auto">
                    <div class="">
                        <img class="w-96 absolute z-10 -mt-52" src="{{ asset('storage/svg/doctor.svg') }}"
                            type="image/svg+xml" />
                    </div>
                </div>
                <div class="ml-auto lg:ml-auto">
                    <div class="bg-vh-green-light opacity-60 rounded-full h-96 w-96 -mt-10">
                        <span class="invisible">a</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Estilos Mobile-->
    <div class="lg:hidden flex justify-center">
        <div class="lg:ml-auto">
            <div class="bg-gray-100 mt-32 ml-52 rounded-lg w-36 h-32">
                <p class="pl-4 py-1 text-xl font-bold">{{ __('messages.es_149') }}</p>
                <div class="flex flex-col pl-4 mt-1">
                    <span class="text-lg">{{ __('messages.es_150') }}</span>
                    <span class="text-lg">{{ __('messages.es_151') }}</span>
                    <span class="text-lg">{{ __('messages.es_152') }}</span>
                </div>
            </div>
        </div>
        <div class="ml-auto mt-12 lg:ml-auto absolute z-[-10] opacity-60">
            <img class="h-56 lg:h-full" src="{{ asset('storage/svg/doctor.svg') }}" type="image/svg+xml" />
        </div>
    </div>
    <div class="lg:hidden flex justify-center items-center">
        <div class="w-64 mt-10">
            <div class="flex flex-col ml-4 my-2">
                <span class="font-bold text-lg">{{ __('messages.es_154') }}</span>
                <span class="font-bold text-lg">{{ __('messages.es_129') }}</span>
                <span class="font-bold text-sm">{{ __('messages.es_137') }}</span>
            </div>
            <div class="my-5">
                <p class="text-xs text-justify mb-4 font-bold text-gray-400 mx-4 -mt-1">

                    {{ __('messages.es_155') }}
                </p>
            </div>
            <button target="_self"
                class="make_appointment w-4/5 h-9 text-white font-bold bg-vh-green text-sm shadow-xl mb-10 rounded-full lg:w-2/5 hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center py-2 mx-4">
                {{ __('messages.es_131') }}
                <button />
        </div>
    </div>
    <div class="flex justify-center text-center flex-col items-center">
        <div class="w-full h-auto">
            <div>
                <h2 class="font-bold text-2xl">{{ __('messages.es_133') }}
                </h2>
            </div>
            <div class="w-full flex grow-0 flex-wrap items-center justify-center mb-8">
                <div class="w-full min-w-40 max-w-72 mx-4 border border-solid border-vh-green py-4 my-4">
                    <h2 class="text-lg font-bold mb-2">{{ __('messages.es_134') }}</h2>
                    <p class="text-sm font-bold text-gray-400 mt-2 px-6 text-justify">
                        {{ __('messages.es_138') }}
                    </p>
                    <hr class="mx-6 my-2" />
                    <div class="flex flex-col px-8">
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 1</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 2</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 3</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 4</span>
                        </label>
                    </div>
                    <button target="_self"
                        class="w-4/5 py-4 my-4 border border-solid border-vh-green font-bold text-base lg:w-2/5 hover:bg-vh-green transition duration-300 hover:text-white inline-block text-center">
                        {{ __('messages.es_141') }}
                    </button>
                </div>
                <div class="w-full min-w-40 max-w-72 mx-4 border border-solid border-vh-green py-4 my-4">
                    <h2 class="text-lg font-bold mb-2">{{ __('messages.es_135') }}</h2>
                    <p class="text-sm font-bold text-gray-400 mt-2 px-6 text-justify">
                        {{ __('messages.es_139') }}
                    </p>
                    <hr class="mx-6 my-2" />
                    <div class="flex flex-col px-8">
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 1</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 2</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 3</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 4</span>
                        </label>
                    </div>
                    <a href="/#" target="_self"
                        class="w-4/5 py-4 my-4 border border-solid border-vh-green font-bold text-base lg:w-2/5 hover:bg-vh-green transition duration-300 hover:text-white inline-block text-center">{{ __('messages.es_142') }}</a>
                </div>
                <div class="w-full min-w-40 max-w-72 mx-4 border border-solid border-vh-green py-4 my-4">
                    <h2 class="text-lg font-bold mb-2">{{ __('messages.es_136') }}</h2>
                    <p class="text-sm font-bold text-gray-400 mt-2 px-6 text-justify">
                        {{ __('messages.es_140') }}
                    </p>
                    <hr class="mx-6 my-2" />
                    <div class="flex flex-col px-8">
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 1</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 2</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 3</span>
                        </label>
                        <label class="flex items-center">
                            <object data="{{ asset('storage/svg/check.svg') }}" type="image/svg+xml"
                                class="w-6 h-auto"></object>
                            <span class="ml-2">Opción 4</span>
                        </label>
                    </div>
                    <a href="/#" target="_self"
                        class="w-4/5 py-4 my-4 border border-solid border-vh-green font-bold text-base lg:w-2/5 hover:bg-vh-green transition duration-300 hover:text-white inline-block text-center">{{ __('messages.es_142') }}</a>
                </div>
            </div>
        </div>

        <!-- Segundo Bloque Desktop -->
        <div class="hidden lg:flex flex-col items-center w-full text-center mb-8">
            <h2 class="font-bold text-2xl tracking-wide text-vh-green mb-2">
                {{ __('messages.es_143') }}
            </h2>
            <div class="w-full my-4 flex flex-wrap justify-center">
                @foreach ($categoria->doctors as $doctor)
                    <div class="w-full sm:w-1/2 lg:w-1/4 mx-4">
                        <div class="bg-white rounded-lg shadow-lg hover:scale-105 transform transition-transform">
                            <div class="h-48 bg-green-200 flex items-center justify-center"></div>
                            <div class="p-6 flex flex-col h-full">
                                <h3 class="text-xl font-semibold mb-2">{{ $doctor->name }} {{ $doctor->lastName }}
                                </h3>
                                <p class="text-gray-400 text-lg mb-4">{{ $doctor->category->nombre }}</p>
                                <div class="mt-auto flex justify-center">
                                    <button class="info_doc" data-description="{{ $doctor->description }}">
                                        <img class="h-14 w-14 mx-2" src="{{ asset('storage/svg/info.svg') }}"
                                            alt="Info" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!--Segundo Bloque Mobile-->
        <div class="lg:hidden w-full text-center mb-8">
            <div class="mb-2">
                <h2 class="font-bold text-2xl text-vh-green">
                    {{ __('messages.es_153') }}
                </h2>
            </div>
            <div class="w-full my-10 flex flex-wrap">
                @foreach ($categoria->doctors as $doctor)
                    <div class="w-40 h-60 mx-4 my-2 bg-green-200 py-2 justify-center items-center rounded-xl">
                        <div class="relative">
                            <button id="menu_opti" class="menu_opti flex ml-auto">
                                <img id="menu-icon" class="h-8 w-8 mx-2"
                                    src="{{ asset('storage/svg/option-icon.svg') }}" alt="Inicio" />
                            </button>
                        </div>
                        <div class="flex justify-center items-center flex-col">
                            <h3 class="font-bold text-xl pt-2">{{ $doctor->name }}</h3>
                            <p class="text-gray-400 text-lg">{{ $doctor->category->nombre }}</p>
                            <div class="mt-2 flex items-center">
                                <button id="">
                                    <img id="menu-icon" class="h-10 w-10 mx-2 "
                                        src="{{ asset('storage/svg/info.svg') }}" alt="Inicio" />
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="w-full h-auto footer-container">
        @include('templates.footer')
    </div>

    <aside class="bg-gray-100">
        @include('templates.chat_ia')
    </aside>
</body>

</html>
