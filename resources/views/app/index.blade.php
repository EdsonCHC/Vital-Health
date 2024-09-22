<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/loader.css', 'resources/js/preloader.js', 'resources/css/app.css', 'resources/js/animation.js', 'resources/css/animation.css', 'resources/js/scroll.js', 'resources/css/footer.css', 'resources/js/chatsv1.js'])
</head>

<body class="w-full h-full overflow-x-hidden">
    @include('templates.loader')

    <div class="w-full h-auto">
        @include('templates.header')
    </div>

    <!-- Styles pc -->
    <div class="hidden lg:flex lg:pt-28 mb-5 bg-vh-gray-light w-full">
        <div class="w-1/2 hidden lg:flex justify-center items-center">
            <div class="w-4/5">
                <div class="ml-4 mt-4 mb-2">
                    <span class="font-bold text-5xl mr-4">{{ __('messages.es_1') }}</span>
                    <span class="font-bold text-5xl"> {{ __('messages.es_2') }}</span>
                    <p class="text-3xl text-justify mx-4 my-4 font-bold text-gray-400">{{ __('messages.es_3') }}</p>
                </div>
                @guest
                    <a href="/registro" target="_self"
                        class="w-4/5 lg:w-2/5 h-12 text-white font-bold bg-vh-green text-lg tracking-wide shadow-xl my-10 mx-4 rounded-full hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center content-center">
                        {{ __('messages.es_4') }}
                    </a>
                @endguest


            </div>
        </div>
        <div class="w-1/2 hidden lg:flex">
            <div class="w-full flex justify-center items-center">
                <img class="h-full lg:h-auto lg:w-full" src="{{ asset('storage/svg/doctor.svg') }}"
                    type="image/svg+xml" />
            </div>
            <div class="">
                <div class="flex flex-col  items-end">
                    <div class="w-16 h-5 mb-6  bg-vh-green-light">
                    </div>
                    <div class="w-28 h-6 mb-6  bg-vh-green-medium">
                    </div>
                    <div class="w-40 h-8 mb-6  bg-vh-green">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Styles Mobile --->
    <div class="lg:hidden">
        <div class="flex mb-5 pt-16 bg-vh-gray-light w-full">
            <div class="w-3/4 flex justify-center items-center">
                <img class="h-full" src="{{ asset('storage/svg/doctor.svg') }}" type="image/svg+xml" />
            </div>
            <div class="w-1/4 flex items-center justify-end">
                <div class="flex flex-col justify-center">
                    <div class="w-10 mb-4 ml-4 bg-vh-green-light">
                        <span class="invisible">a</span>
                    </div>
                    <div class="w-12 mb-4 ml-2 bg-vh-green-medium">
                        <span class="invisible">a</span>
                    </div>
                    <div class="w-14 mb-2 bg-vh-green">
                        <span class="invisible">a</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="lg:hidden">
        <div class="flex justify-center items-center">
            <div class="w-1/2">
                <div class="ml-4 mt-4 mb-2">
                    <span class="font-bold text-lg">{{ __('messages.es_1') }}</span>
                    <span class="font-bold text-lg"> {{ __('messages.es_2') }}</span>
                </div>

                <a href="/register" target="_self"
                    class="w-4/5 h-8 text-white bg-vh-green text-sm shadow-xl mb-10 rounded-full lg:w-2/5 hover:bg-white hover:text-vh-green inline-block text-center pt-1 mx-4">
                    {{ __('messages.es_4') }}
                </a>
            </div>
            <div class="w-1/2">
                <p class="text-xs text-justify mb-4 font-bold text-gray-400 mx-4 -mt-1">{{ __('messages.es_5') }}
                </p>
            </div>
        </div>
    </div>

    <div class="flex justify-center text-center flex-col items-center">
        <div class="w-full h-auto">
            <div>
                <h2 class="font-bold text-xl text-vh-green lg:font-bold  lg:text-4xl">{{ __('messages.es_6') }}</h2>
            </div>
            <div class="w-full flex grow-0 flex-wrap items-center justify-center my-8">
                @php
                    $maxDoctors = 3;
                    $count = 0;
                @endphp

                @if ($doctors->isEmpty())
                    <div class="w-full min-w-40 max-w-72 mx-4 bg-blue-100 py-4 my-4 rounded-2xl shadow-lg px-8">
                        <h2 class="text-lg font-bold mb-2 text-vh-green">Alonso</h2>
                        <p class="text-sm font-bold text-gray-400 mt-2">Cardiólogo</p>
                        <p class="text-md text-justify text-vh-green block leading-7">El Dr. Alonso Martínez es un
                            destacado cardiólogo con más de 15 años de experiencia en el diagnóstico y tratamiento de
                            enfermedades cardíacas. Su enfoque integral y personalizado le permite ofrecer atención de
                            alta calidad a cada paciente, utilizando tecnología avanzada y las últimas investigaciones
                            en cardiología.
                        </p>
                    </div>
                    <div class="w-full min-w-40 max-w-72 mx-4 bg-blue-100 py-4 my-4 rounded-2xl shadow-lg px-8">
                        <h2 class="text-lg font-bold mb-2 text-vh-green">Laura</h2>
                        <p class="text-sm font-bold text-gray-400 mt-2">Dermatología</p>
                        <p class="text-md text-justify text-vh-green block leading-7">La Dra. Laura Gómez es una
                            reconocida dermatóloga con una trayectoria de más de 12 años en el cuidado de la piel.
                            Especializada en el diagnóstico y tratamiento de diversas afecciones dermatológicas, desde
                            el acné hasta el cáncer de piel, la Dra. Gómez combina su experiencia clínica con un enfoque
                            detallado y personalizado para cada paciente.
                        </p>
                    </div>
                    <div class="w-full min-w-40 max-w-72 mx-4 bg-blue-100 py-4 my-4 rounded-2xl shadow-lg px-8">
                        <h2 class="text-lg font-bold mb-2 text-vh-green">Javier</h2>
                        <p class="text-sm font-bold text-gray-400 mt-2">Cirugía</p>
                        <p class="text-md text-justify text-vh-green block leading-7">El Dr. Javier Torres es un
                            cirujano experimentado con más de 20 años de práctica en diversas especialidades
                            quirúrgicas. Su destreza técnica y enfoque meticuloso le han permitido abordar una amplia
                            gama de procedimientos, desde operaciones mínimamente invasivas hasta intervenciones
                            complejas.
                        </p>
                    </div>
                @else
                    @foreach ($doctors as $doctor)
                        <div class="w-full min-w-40 max-w-72 mx-4 bg-blue-100 py-4 my-4 rounded-2xl shadow-lg px-8">
                            <h2 class="text-lg font-bold mb-2 text-vh-green">{{ $doctor->name }} {{ $doctor->lastName }}</h2>
                            <p class="text-sm font-bold text-gray-400 mt-2">{{ $doctor->category->nombre }}</p>
                            <p class="text-md text-justify text-vh-green block leading-7">{{ $doctor->description }}
                            </p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="w-full text-center mb-8">
            <div class="mb-2">
                <h2 class="font-bold  text-xl text-vh-green lg:font-bold  lg:text-4xl">{{ __('messages.es_7') }}</h2>
                <p class="text-sm font-bold text-gray-400 px-4 text-justify  lg:mx-96 mt-2">{{ __('messages.es_8') }}
                </p>
                <a class="text-md my-1 font-bold text-vh-green-medium block leading-7">{{ __('messages.es_9') }}</a>
            </div>
            <div class="w-full h-auto flex flex-wrap items-center justify-center">
                <div class="w-full max-w-72 mx-4 bg-blue-100 py-4 my-4 rounded-2xl shadow-lg px-8">
                    {{ __('messages.es_10') }}
                </div>
                <div class="w-full max-w-72 mx-4 bg-blue-100 py-4  my-4 rounded-2xl shadow-lg px-8">
                    {{ __('messages.es_11') }}
                </div>
                <div class="w-full max-w-72 mx-4 bg-blue-100 py-4  my-4 rounded-2xl shadow-lg px-8">
                    {{ __('messages.es_12') }}
                </div>
            </div>
        </div>
        <div class="w-full flex flex-col lg:flex-row">
            <div class="m-8 flex items-center justify-center lg:mx-0 lg:w-1/2">
                <h2
                    class="font-bold text-left lg:pl-28  text-xl text-vh-green lg:font-bold lg:text-4xl lg:ml-12 animation">
                    {{ __('messages.es_13') }}</h2>
            </div>
            <div
                class="w-full flex flex-wrap justify-center items-center gap-5 lg:w-1/2 lg:flex-row lg:flex-wrap lg:justify-start lg:ml-8 lg:mr-8 lg:flex-grow">
                <!-- Elementos en dos filas y tres columnas -->
                <div
                    class="w-32 h-32 bg-gray-100 p-8 rounded-2xl shadow-lg flex flex-col items-center  lg:w-1/3 animation3">
                    <object data="{{ asset('storage/svg/dental.svg') }}" type="image/svg+xml" class="w-10"></object>
                    <p class="font-bold">{{ __('messages.es_14') }}</p>
                </div>
                <div
                    class="w-32 h-32 bg-gray-100 p-8 rounded-2xl shadow-lg flex flex-col items-center lg:w-1/3 animation3">
                    <object data="{{ asset('storage/svg/eye.svg') }}" type="image/svg+xml" class="w-10"></object>
                    <p class="font-bold">{{ __('messages.es_16') }}</p>
                </div>
                <div
                    class="w-32 h-32 bg-gray-100 p-8 rounded-2xl shadow-lg flex flex-col items-center lg:w-1/3 animation3">
                    <object data="{{ asset('storage/svg/derma_hand.svg') }}" type="image/svg+xml"
                        class="w-10"></object>
                    <p class="font-bold">{{ __('messages.es_16') }}</p>
                </div>
                <div
                    class="w-32 h-32 bg-gray-100 p-8 rounded-2xl shadow-lg flex flex-col items-center lg:w-1/3 animation3">
                    <object data="{{ asset('storage/svg/baby.svg') }}" type="image/svg+xml" class="w-10"></object>
                    <p class="font-bold">{{ __('messages.es_17') }}</p>
                </div>
                <div
                    class="w-32 h-32 bg-gray-100 p-8 rounded-2xl shadow-lg flex flex-col items-center lg:w-1/3 animation3">
                    <object data="{{ asset('storage/svg/heart.svg') }}" type="image/svg+xml"
                        class="w-10"></object>
                    <p class="font-bold">{{ __('messages.es_18') }}</p>
                </div>
                <div
                    class="w-32 h-32 bg-gray-100 p-8 rounded-2xl shadow-lg flex flex-col items-center lg:w-1/3 animation3">
                    <object data="{{ asset('storage/svg/brain.svg') }}" type="image/svg+xml"
                        class="w-10"></object>
                    <p class="font-bold">{{ __('messages.es_19') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full flex flex-col lg:flex-row  ">
        <div class="m-8 flex items-center justify-center lg:w-1/2">
            <object data="{{ asset('storage/svg/observations.svg') }}" type="image/svg+xml"
                class="mx-auto my-0 w-full lg:w-3/4 lg:ml-auto"></object>
        </div>
        <div class="flex justify-center lg:my-20 text-left items-center flex-col">
            <h2 class="font-bold p-2 text-xl text-vh-green lg:font-bold lg:text-left lg:text-4xl lg:ml-12 animation2">
                {{ __('messages.es_20') }}</h2>
            <div class="flex justify-center lg:text-center items-center mx-8">
                <div class="flex flex-col text-left">
                    <section class="px-6 py-4 bg-gray-100 rounded-lg shadow-md">
                        <h2 class="text-xl lg:text-2xl font-semibold text-gray-700 mb-4">{{ __('messages.es_21') }}
                        </h2>
                        <ul class="space-y-4">
                            <li class="text-base lg:text-xl font-medium text-gray-600 flex items-center">
                                <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c2.21 0 4 1.79 4 4s-1.79 4-4 4-4-1.79-4-4 1.79-4 4-4zM12 4a8 8 0 0 0-8 8c0 4.42 3.58 8 8 8s8-3.58 8-8a8 8 0 0 0-8-8z">
                                    </path>
                                </svg>
                                {{ __('messages.es_22') }}
                            </li>
                            <li class="text-base lg:text-xl font-medium text-gray-600 flex items-center">
                                <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c2.21 0 4 1.79 4 4s-1.79 4-4 4-4-1.79-4-4 1.79-4 4-4zM12 4a8 8 0 0 0-8 8c0 4.42 3.58 8 8 8s8-3.58 8-8a8 8 0 0 0-8-8z">
                                    </path>
                                </svg>
                                {{ __('messages.es_23') }}
                            </li>
                            <li class="text-base lg:text-xl font-medium text-gray-600 flex items-center">
                                <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c2.21 0 4 1.79 4 4s-1.79 4-4 4-4-1.79-4-4 1.79-4 4-4zM12 4a8 8 0 0 0-8 8c0 4.42 3.58 8 8 8s8-3.58 8-8a8 8 0 0 0-8-8z">
                                    </path>
                                </svg>
                                {{ __('messages.es_24') }}
                            </li>
                        </ul>
                    </section>

                </div>
            </div>
            @guest
                <a href="/login" target="_self"
                    class="w-2/5 lg:w-2/3 h-12 text-white bg-vh-green text-base lg:text-2xl shadow-xl m-5 rounded-full hover:bg-white hover:text-vh-green duration-200 ease-in inline-block text-center content-center">
                    {{ __('messages.es_25') }}
                </a>
            @endguest

        </div>
    </div>

    <div class="max-w-7xl mx-auto lg:p-10">
        <div class="rounded-lg shadow-md overflow-hidden">
            <div class="p-8">
                <h2 class="font-bold text-3xl text-vh-green  lg:text-4xl lg:py-6">
                    {{ __('messages.es_26') }}
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                    <div class="bg-blue-100 border border-blue-400 rounded-lg p-8 animate-fade-in-up">
                        <h3 class="text-2xl font-semibold text-blue-800 mb-4">
                            {{ __('messages.es_27') }}
                        </h3>
                        <p class="text-gray-700">
                            {{ __('messages.es_28') }}</p>
                    </div>
                    <div class="bg-green-100 border border-green-400 rounded-lg p-8 animate-fade-in-up">
                        <h3 class="text-2xl font-semibold text-green-800 mb-4">
                            {{ __('messages.es_29') }}
                        </h3>
                        <p class="text-gray-700">
                            {{ __('messages.es_30') }}</p>
                    </div>
                    <div class="bg-green-100 border border-green-400 rounded-lg p-8 animate-fade-in-up">
                        <h3 class="text-2xl font-semibold text-green-800 mb-4">
                            {{ __('messages.es_31') }}
                        </h3>
                        <p class="text-gray-700">
                            {{ __('messages.es_32') }}</p>
                    </div>
                    <div class="bg-blue-100 border border-blue-400 rounded-lg p-8 animate-fade-in-up">
                        <h3 class="text-2xl font-semibold text-blue-800 mb-4">
                            {{ __('messages.es_33') }}
                        </h3>
                        <p class="text-gray-700">
                            {{ __('messages.es_34') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col lg:flex-row  ">
        <div class=" lg:w-1/2 lg:items-center flex flex-col lg:flex-row">
            <div class="lg:pl-28  ">
                <h3 class="text-left lg:text-start   m-4 text-vh-green font-semibold lg:text-xl xl:text-4xl">
                    {{ __('messages.es_35') }}
                </h3>
                <h2 class="text-center  lg:text-start font-bold mt-3 lg:pl-5 lg:mx-0 mx-9 lg:text-3xl xl:text-4xl">
                    {{ __('messages.es_36') }} </h2>
                <div class="flex lg:justify-start justify-center">
                    @guest
                        <a href="/login" target="_self"
                            class="w-3/5  h-10 content-center text-white bg-vh-green text-sm lg:text-base xl:text-lg shadow-xl my-5 rounded-full lg:w-2/5 hover:bg-white hover:text-vh-green duration-200 ease-in inline-block text-center mx-4">
                            {{ __('messages.es_37') }}
                        </a>
                    @endguest

                </div>
            </div>
        </div>
        <div class="lg:w-1/2">
            <div class="m-8 flex items-center justify-center">
                <object data="{{ asset('storage/svg/hands.svg') }}" type="image/svg+xml"
                    class="mx-auto my-0 w-full lg:w-3/4 lg:ml-auto"></object>
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
