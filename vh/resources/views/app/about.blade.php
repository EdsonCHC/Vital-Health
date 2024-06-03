<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    @vite(['resources/css/app.css','resources/css/loader.css', 'resources/js/preloader.js'])
</head>

<body class="w-full h-full">
    @include('templates.loader')
    <div class="w-full h-auto">
        @include('templates.header')
    </div>
    <div class="flex w-full pt-12 md:pl-16 pl-5 lg:pt-16 bg-vh-gray-light">
        <div class="flex lg:w-1/2 lg:items-center items-center  lg:justify-center ">
            <img class="lg:h-96 lg:w-96 md:h-80 md:w-80" src="{{asset('storage/svg/doctor.svg')}}" type="image/svg+xml"
                alt="Doctor Image" />
        </div>



        <div class="flex flex-col w-60 lg:w-1/2 mx-auto items-center md:justify-center">
            <h2
                class="font-bold text-xl lg:mt-10 lg:text-4xl text-start lg:text-start text-vh-green lg:font-bold pb-1 lg:pb-6">
                Por qué Elegirnos</h2>
            <ul class="text-start items-center text-sm pb-1 pl-1 lg:pl-24">
                <li class="text-sm md:text-base lg:text-2xl lg:font-semibold text-gray-400 list-disc">At your Quick
                    service</li>
                <li class="text-sm md:text-base lg:text-2xl lg:font-semibold text-gray-400 list-disc">At your Quick
                    service</li>
                <li class="text-sm md:text-base lg:text-2xl lg:font-semibold text-gray-400 list-disc">At your Quick
                    service</li>
                <li class="text-sm md:text-base lg:text-2xl lg:font-semibold text-gray-400 list-disc">At your Quick
                    service</li>
                <li class="text-sm md:text-base lg:text-2xl lg:font-semibold text-gray-400 list-disc">At your Quick
                    service</li>
            </ul>

            <div
                class="w-3/5 h-8 font-bold my-4 text-white bg-vh-green text-sm shadow-xl rounded-md lg:w-1/5 hover:bg-white hover:text-vh-green inline-block text-center pt-1 lg:mt-3 mx-auto lg:mx-0">
                <a href="/registro" target="_self" class="block w-full h-full">Regístrate</a>
            </div>


        </div>
    </div>

    <div class="w-full flex flex-col lg:flex-row pt-8 lg:pt-16">
        <!-- Contenido para PC -->
        <div
            class="hidden lg:block lg:w-1/4 items-center justify-center lg:order-last rounded-xl relative ml-40 bg-gray-200 p-8">
            <div class="absolute top-0 right-0 mr-[-48px] mt-[-48px] rounded-xl overflow-hidden">
                <object data="{{asset('storage/svg/ad.svg')}}" type="image/svg+xml"></object>
            </div>
            <div class="absolute bottom-0 left-0 ml-[-48px] mb-[-48px] rounded-xl overflow-hidden">
                <object data="{{asset('storage/svg/ad.svg')}}" type="image/svg+xml"></object>
            </div>
        </div>

        <!-- Contenido para Tablet y Celular -->
        <div class="lg:hidden w-3/4 mx-auto flex items-center justify-center p-8 rounded-xl bg-gray-200">
            <div class="flex w-full h-full items-center justify-center ">
                <object data="{{asset('storage/svg/ad.svg')}}" type="image/svg+xml"
                    class="w-full h-auto lg:w-96 lg:h-auto rounded-xl"></object>
            </div>
        </div>



        <div class="lg:w-1/2 flex flex-col lg:pl-28 lg:order-first">
            <h2 class="text-star font-bold text-vh-green mb-5 text-4xl mt-8 mx-8">Mision</h2>
            <div class="flex justify-center text-start">
                <p class="text-base mx-8 leading-loose">Weekend UX, is a UI/UX Design Academy in Delhi involved in User
                    Experience and User Interface Training and Consulting. It was started
                    in 2023 and passionate towards User Interface Design/ User Experience
                    Design, Human Computer Interaction Design. Humanoid is gushing
                    towards competence to acquire knowledge and have a wide understanding
                    towards the sphere through the foremost courses in the area of UI/UX
                    Design, by strengthening up your skills, for your golden future
                </p>

            </div>
        </div>

    </div>


    <div class="w-full flex flex-col  mb-16 lg:flex-row-reverse pt-8 lg:pt-16">


        <!-- Contenido para Tablet y Celular -->
        <div class="lg:hidden w-3/4 mx-auto flex items-center justify-center p-8 rounded-xl bg-gray-200">
            <div class="flex w-full h-full items-center justify-center ">
                <object data="{{asset('storage/svg/ad.svg')}}" type="image/svg+xml"
                    class="w-full h-auto lg:w-96 lg:h-auto rounded-xl"></object>
            </div>
        </div>
        <!-- Contenido para pc -->
        <div class="hidden lg:w-1/2 lg:flex items-center justify-center lg:order-last">
            <div class="lg:w-1/2 rounded-xl bg-gray-200 p-4">
                <img src="{{asset('storage/svg/ad.svg')}}" alt="Anuncio"
                    class="rounded-xl max-w-full max-h-full w-full h-auto xl:w-96 xl:h-96 mx-auto">
            </div>
        </div>

        <div class="lg:w-1/2 flex flex-col lg:pl-28">
            <h2 class="text-end  lg:text-start  md:text-start font-bold text-vh-green mb-5 text-4xl mt-8 mx-8">Vision
            </h2>
            <div class="flex justify-center text-start">
                <p class="text-base mx-8 leading-loose">Weekend UX, is a UI/UX Design Academy in Delhi involved in User
                    Experience and User Interface Training and Consulting. It was started
                    in 2023 and passionate towards User Interface Design/ User Experience
                    Design, Human Computer Interaction Design. Humanoid is gushing
                    towards competence to acquire knowledge and have a wide understanding
                    towards the sphere through the foremost courses in the area of UI/UX
                    Design, by strengthening up your skills, for your golden future
                </p>
            </div>
        </div>
    </div>
    <div class="flex flex-col ">
        <div class="flex flex-col lg:text-center lg:items-center ">
            <h2 class="font-bold text-4xl mt-8 mb-5 text-center">Beneficios que ofrecemos al unirte a nosotros.</h2>
            <h3 class="text-vh-green font-bold mx-8 text-2xl  text-start">Tus Beneficios</h3>
            <div class="flex mx-8 ">
                <p class="text-base leading-loose">Install our top-rated dropshipping app to your e-commerce site and
                    get access to US Suppliers, AliExpress vendors, and the best.</p>
            </div>
        </div>
        <script>
            function toggleText(textId) {
                var text = document.getElementById(textId);

                if (text.classList.contains('line-clamp-3')) {
                    text.classList.remove('line-clamp-3');
                } else {
                    text.classList.add('line-clamp-3');
                }
            }
        </script>
        <div class="flex flex-wrap m-4 lg:m-16">
            <div class="w-full lg:w-1/3 p-4">
                <div class="bg-green-50 pt-5">
                    <div class="  bg-green-100 rounded-full h-14 w-14 flex items-center justify-center ml-5">
                        <h2 class="text-vh-green font-bold text-2xl">01</h2>
                    </div>
                    <h3 class="font-semibold text-xl p-2">Standardization</h3>
                    <div class="text-container overflow-hidden">
                        <p id="text1" class="text-base leading-loose p-4 line-clamp-3">
                            Cuando trabajas en un entorno laboral global, a menudo es difícil evaluar las experiencias
                            de
                            capacitación de los estudiantes, las cuales son riencias de capacitación de los estudiantes,
                            las
                            cuales son riencias de capacitación de los estudiantes, las cuales son riencias de
                            capacitación de
                            los estudiantes, las cuales son
                        </p>
                        <a href="#" onclick="toggleText('text1')" class="text-vh-green hover:underline block p-4">Learn
                            More</a>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/3 p-4">
                <div class="border pt-5">
                    <div class="bg-green-100 rounded-full h-14 w-14 flex items-center justify-center ml-5">

                        <h2 class="text-vh-green font-bold text-2xl">02</h2>
                    </div>
                    <h3 class="font-semibold text-xl p-2">Standardization</h3>
                    <div class="text-container overflow-hidden">
                        <p id="text2" class="text-base leading-loose p-4 line-clamp-3">
                            Cuando trabajas en un entorno laboral global, a menudo es difícil evaluar las experiencias
                            de
                            capacitación de los estudiantes, las cuales son riencias de capacitación de los estudiantes,
                            las
                            cuales son riencias de capacitación de los estudiantes, las cuales son riencias de
                            capacitación de
                            los estudiantes, las cuales son
                        </p>
                        <a href="#" onclick="toggleText('text2')" class="text-vh-green hover:underline block p-4">Learn
                            More</a>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/3 p-4">
                <div class="bg-green-50 pt-5">
                    <div class="  bg-green-100 rounded-full h-14 w-14 flex items-center justify-center ml-5">
                        <h2 class="text-vh-green font-bold text-2xl">03</h2>
                    </div>
                    <h3 class="font-semibold text-xl p-2">Standardization</h3>
                    <div class="text-container overflow-hidden">
                        <p id="text3" class="text-base leading-loose p-4 line-clamp-3">
                            Cuando trabajas en un entorno laboral global, a menudo es difícil evaluar las experiencias
                            de
                            capacitación de los estudiantes, las cuales son riencias de capacitación de los estudiantes,
                            las
                            cuales son riencias de capacitación de los estudiantes, las cuales son riencias de
                            capacitación de
                            los estudiantes, las cuales son
                        </p>
                        <a href="#" onclick="toggleText('text3')" class="text-vh-green hover:underline block p-4">Learn
                            More</a>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/3 p-4">
                <div class="border pt-5">
                    <div class="bg-green-100 rounded-full h-14 w-14 flex items-center justify-center ml-5">

                        <h2 class="text-vh-green font-bold text-2xl">04</h2>
                    </div>
                    <h3 class="font-semibold text-xl p-2">Standardization</h3>
                    <div class="text-container overflow-hidden">
                        <p id="text4" class="text-base leading-loose p-4 line-clamp-3">
                            Cuando trabajas en un entorno laboral global, a menudo es difícil evaluar las experiencias
                            de
                            capacitación de los estudiantes, las cuales son riencias de capacitación de los estudiantes,
                            las
                            cuales son riencias de capacitación de los estudiantes, las cuales son riencias de
                            capacitación de
                            los estudiantes, las cuales son
                        </p>
                        <a href="#" onclick="toggleText('text4')" class="text-vh-green hover:underline block p-4">Learn
                            More</a>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/3 p-4">
                <div class="bg-green-50 pt-5">
                    <div class="  bg-green-100 rounded-full h-14 w-14 flex items-center justify-center ml-5">
                        <h2 class="text-vh-green font-bold text-2xl">05</h2>
                    </div>
                    <h3 class="font-semibold text-xl p-2">Standardization</h3>
                    <div class="text-container overflow-hidden">
                        <p id="text5" class="text-base leading-loose p-4 line-clamp-3">
                            Cuando trabajas en un entorno laboral global, a menudo es difícil evaluar las experiencias
                            de
                            capacitación de los estudiantes, las cuales son riencias de capacitación de los estudiantes,
                            las
                            cuales son riencias de capacitación de los estudiantes, las cuales son riencias de
                            capacitación de
                            los estudiantes, las cuales son
                        </p>
                        <a href="#" onclick="toggleText('text5')" class="text-vh-green hover:underline block p-4">Learn
                            More</a>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/3 p-4">
                <div class="border pt-5">
                    <div class="bg-green-100 rounded-full h-14 w-14 flex items-center justify-center ml-5">

                        <h2 class="text-vh-green font-bold text-2xl">06</h2>
                    </div>
                    <h3 class="font-semibold text-xl p-2">Standardization</h3>
                    <div class="text-container overflow-hidden">
                        <p id="text6" class="text-base leading-loose p-4 line-clamp-3">
                            Cuando trabajas en un entorno laboral global, a menudo es difícil evaluar las experiencias
                            de
                            capacitación de los estudiantes, las cuales son riencias de capacitación de los estudiantes,
                            las
                            cuales son riencias de capacitación de los estudiantes, las cuales son riencias de
                            capacitación de
                            los estudiantes, las cuales son
                        </p>
                        <a href="#" onclick="toggleText('text6')" class="text-vh-green hover:underline block p-4">Learn
                            More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('templates.footer') 
</body>

</html>