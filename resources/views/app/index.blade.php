<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
    @vite(['resources/css/loader.css', 'resources/js/preloader.js', 'resources/css/app.css', 'resources/js/animation.js', 'resources/css/animation.css', 'resources/js/scroll.js'])
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
                    <span class="font-bold text-5xl">Brindamos Ayuda</span>
                    <span class="font-bold text-5xl">En tu Futuro</span>
                    <p class="text-3xl text-justify mb-4 font-bold text-gray-400 mx-4 -mt-1">Lorem Ipsum is simply dummy
                        text of the printing and typesetting industry.</p>
                </div>
                <a href="/login" target="_self"
                    class="w-4/5 lg:w-2/5 h-12 text-white font-bold bg-vh-green text-lg tracking-wide shadow-xl my-10 mx-4 rounded-full hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center content-center">
                    Regístrate ahora
                </a>
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
                    <span class="font-bold text-lg">Brindamos Ayuda</span>
                    <span class="font-bold text-lg">En tu Futuro</span>
                </div>

                <a href="/login" target="_self"
                    class="w-4/5 h-8 text-white bg-vh-green text-sm shadow-xl mb-10 rounded-full lg:w-2/5 hover:bg-white hover:text-vh-green inline-block text-center pt-1 mx-4">
                    Regístrate ahora
                    <!-- TODO: cambiar a solo una componente por dispositivo  -->
                </a>
            </div>
            <div class="w-1/2">
                <p class="text-xs text-justify mb-4 font-bold text-gray-400 mx-4 -mt-1">Lorem Ipsum is simply dummy text
                    of the printing and typesetting industry.</p>
            </div>
        </div>
    </div>

    <div class="flex justify-center text-center flex-col items-center">
        <div class="w-full h-auto">
            <div>
                <h2 class="font-bold  text-xl text-vh-green lg:font-bold  lg:text-4xl">Lorem Ipsum</h2>
                <p class="text-sm font-bold text-gray-400 mx-4 mt-2">Lorem Ipsum is simply dummy text of the printing
                    and typesetting industry.</p>
            </div>
            <div class="w-full flex grow-0 flex-wrap items-center justify-center mb-8">
                <div class="w-full min-w-40 max-w-72 mx-4 bg-blue-100 py-4 my-4 rounded-2xl shadow-lg px-8">
                    <h2 class="text-lg font-bold mb-2 text-vh-green">Juan Jose Galdamez</h2>
                    <p class="text-sm font-bold text-gray-400 mt-2">Primary Care Doctor</p>
                    <a class="text-md text-justify text-vh-green block leading-7">Very personable and good listener.
                        Makes you feel comfortable and open immediately. Felt well taken care...</a>
                </div>
                <div class="w-full min-w-40 max-w-72 mx-4 bg-blue-100 py-4 my-4 rounded-2xl shadow-lg px-8">
                    <h2 class="text-lg font-bold mb-2 text-vh-green">Juan Jose Galdamez</h2>
                    <p class="text-sm font-bold text-gray-400 mt-2">Primary Care Doctor</p>
                    <a class="text-md text-justify text-vh-green block leading-7">Very personable and good listener.
                        Makes you feel comfortable and open immediately. Felt well taken care...</a>
                </div>
                <div class="w-full min-w-40 max-w-72 mx-4 bg-blue-100 py-4 my-4 rounded-2xl shadow-lg px-8">
                    <h2 class="text-lg font-bold mb-2 text-vh-green">Juan Jose Galdamez</h2>
                    <p class="text-sm font-bold text-gray-400 mt-2">Primary Care Doctor</p>
                    <a class="text-md text-justify text-vh-green block leading-7">Very personable and good listener.
                        Makes you feel comfortable and open immediately. Felt well taken care...</a>
                </div>
            </div>
        </div>
        <div class="w-full text-center mb-8">
            <div class="mb-2">
                <h2 class="font-bold  text-xl text-vh-green lg:font-bold  lg:text-4xl">Lorem Ipsum</h2>
                <p class="text-sm  text-gray-400 mx-4 mt-2">Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry.</p>
                <a class="text-md my-1 font-bold text-vh-green-medium block leading-7">Very personable and good
                    listener.</a>
            </div>
            <div class="w-full h-auto flex flex-wrap items-center justify-center">
                <div class="w-full max-w-72 mx-4 bg-blue-100 py-4 my-4 rounded-2xl shadow-lg px-8">Lorem, ipsum dolor
                    sit amet consectetur adipisicing elit. Hic sit deleniti quisquam iusto. Autem sed totam fugit
                    asperiores, ipsum sit enim inventore eligendi sunt quas qui, recusandae neque, repudiandae sequi!
                </div>
                <div class="w-full max-w-72 mx-4 bg-blue-100 py-4  my-4 rounded-2xl shadow-lg px-8">Lorem, ipsum dolor
                    sit amet consectetur adipisicing elit. Hic sit deleniti quisquam iusto. Autem sed totam fugit
                    asperiores, ipsum sit enim inventore eligendi sunt quas qui, recusandae neque, repudiandae sequi!
                </div>
                <div class="w-full max-w-72 mx-4 bg-blue-100 py-4  my-4 rounded-2xl shadow-lg px-8">Lorem, ipsum dolor
                    sit amet consectetur adipisicing elit. Hic sit deleniti quisquam iusto. Autem sed totam fugit
                    asperiores, ipsum sit enim inventore eligendi sunt quas qui, recusandae neque, repudiandae sequi!
                </div>
            </div>
        </div>
        <div class="w-full flex flex-col lg:flex-row">
            <div class="m-8 flex items-center justify-center lg:mx-0 lg:w-1/2">
                <h2
                    class="font-bold text-left lg:pl-28  text-xl text-vh-green lg:font-bold lg:text-4xl lg:ml-12 animation">
                    Las
                    ventajas que posee con nuestros servicios son:</h2>
            </div>
            <div
                class="w-full flex flex-wrap justify-center items-center gap-5 lg:w-1/2 lg:flex-row lg:flex-wrap lg:justify-start lg:ml-8 lg:mr-8 lg:flex-grow">
                <!-- Elementos en dos filas y tres columnas -->
                <div
                    class="w-32 h-32 bg-gray-100 p-8 rounded-2xl shadow-lg flex flex-col items-center  lg:w-1/3 animation3">
                    <object data="{{ asset('storage/svg/dental.svg') }}" type="image/svg+xml" class="w-10"></object>
                    <p class="font-bold">Cuidado dental</p>
                </div>
                <div
                    class="w-32 h-32 bg-gray-100 p-8 rounded-2xl shadow-lg flex flex-col items-center lg:w-1/3 animation3">
                    <object data="{{ asset('storage/svg/eye_closed.svg') }}" type="image/svg+xml"
                        class="w-10"></object>
                    <p class="font-bold">Oculista</p>
                </div>
                <div
                    class="w-32 h-32 bg-gray-100 p-8 rounded-2xl shadow-lg flex flex-col items-center lg:w-1/3 animation3">
                    <object data="{{ asset('storage/svg/derma_hand.svg') }}" type="image/svg+xml"
                        class="w-10"></object>
                    <p class="font-bold">Dermatología</p>
                </div>
                <div
                    class="w-32 h-32 bg-gray-100 p-8 rounded-2xl shadow-lg flex flex-col items-center lg:w-1/3 animation3">
                    <object data="{{ asset('storage/svg/baby.svg') }}" type="image/svg+xml" class="w-10"></object>
                    <p class="font-bold">Pediatría</p>
                </div>
                <div
                    class="w-32 h-32 bg-gray-100 p-8 rounded-2xl shadow-lg flex flex-col items-center lg:w-1/3 animation3">
                    <object data="{{ asset('storage/svg/heart.svg') }}" type="image/svg+xml" class="w-10"></object>
                    <p class="font-bold">Atención primaria</p>
                </div>
                <div
                    class="w-32 h-32 bg-gray-100 p-8 rounded-2xl shadow-lg flex flex-col items-center lg:w-1/3 animation3">
                    <object data="{{ asset('storage/svg/brain.svg') }}" type="image/svg+xml" class="w-10"></object>
                    <p class="font-bold">Psiquiátrico</p>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full flex flex-col lg:flex-row  ">
        <div class="m-8 flex items-center justify-center lg:w-1/2">
            <object data="{{ asset('storage/svg/observations.svg') }}" type="image/svg+xml"
                class="mx-auto my-0 w-full lg:w-3/4 lg:ml-auto"></object>
        </div>
        <div class="flex justify-center text-left items-center flex-col">
            <h2 class="font-bold p-2 text-xl text-vh-green lg:font-bold lg:text-left lg:text-4xl lg:ml-12 animation2">
                Por
                qué elegir
                nuestros servicios?</h2>
            <div class="flex justify-center lg:text-center items-center">
                <div class="flex flex-col">
                    <p class="text-base lg:text-xl font-bold text-gray-400 mx-6 mt-2">- Reach patients in your area
                        looking for a new provider.</p>
                    <p class="text-base lg:text-xl font-bold text-gray-400 mx-6 mt-2">- Reach patients in your area
                        looking for a new provider.</p>
                    <p class="text-base lg:text-xl font-bold text-gray-400 mx-6 mt-2">- Reach patients in your area
                        looking for a new provider.</p>
                </div>
            </div>
            <a href="/login" target="_self"
                class="w-2/5 lg:w-2/3 h-12 text-white bg-vh-green text-base lg:text-3xl shadow-xl m-5 rounded-full hover:bg-white hover:text-vh-green duration-200 ease-in inline-block text-center pt-2 lg:pt-1 mx-4">
                Comienza ya
            </a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto lg:p-10">
        <div class="rounded-lg shadow-md overflow-hidden">
            <div class="p-8">
                <h2 class="font-bold text-3xl text-vh-green  lg:text-4xl lg:py-6">
                    Nuestras Características
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                    <div class="bg-blue-100 border border-blue-400 rounded-lg p-8 animate-fade-in-up">
                        <h3 class="text-2xl font-semibold text-blue-800 mb-4">Característica 1</h3>
                        <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum
                            dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="bg-green-100 border border-green-400 rounded-lg p-8 animate-fade-in-up">
                        <h3 class="text-2xl font-semibold text-green-800 mb-4">Característica 2</h3>
                        <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum
                            dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="bg-green-100 border border-green-400 rounded-lg p-8 animate-fade-in-up">
                        <h3 class="text-2xl font-semibold text-green-800 mb-4">Característica 3</h3>
                        <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum
                            dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="bg-blue-100 border border-blue-400 rounded-lg p-8 animate-fade-in-up">
                        <h3 class="text-2xl font-semibold text-blue-800 mb-4">Característica 4</h3>
                        <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum
                            dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col lg:flex-row  ">
        <div class=" lg:w-1/2 lg:items-center flex flex-col lg:flex-row">
            <div class="lg:pl-28  ">
                <h3 class="text-left lg:text-start   m-4 text-vh-green font-semibold lg:text-xl xl:text-4xl">Vital
                    Healt
                </h3>
                <h2 class="text-center  lg:text-start font-bold mt-3 lg:pl-5 lg:mx-0 mx-9 lg:text-3xl xl:text-4xl">
                    Únase
                    a nosotros y brindaremos una asistencia sanitaria de calidad.</h2>
                <div class="flex lg:justify-start justify-center">
                    <a href="/login" target="_self"
                        class="w-3/5  h-8 lg:h-8 text-white bg-vh-green text-sm lg:text-base xl:text-lg shadow-xl my-5 rounded-full lg:w-2/5 hover:bg-white hover:text-vh-green duration-200 ease-in inline-block text-center pt-1 mx-4">
                        Únete ya
                    </a>
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

    <div class="w-full h-auto">
        @include('templates.footer_two')
    </div>
    <div class="w-full h-auto">
        @include('templates.chat_ia')
    </div>
</body>

</html>
