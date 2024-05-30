<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Servicio</title>
    @vite(['resources/css/app.css', 'resources/css/checkbox.css', 'resources/js/appointment.js'])
</head>

<body class="w-full h-full">
    <div class="w-full h-auto">
        @include('templates.header')
    </div>

    <!--Estilos Desktop-->
    <div class="hidden lg:flex lg:pt-28 mb-5 w-full bg-gray-100">
        <div class="flex justify-center items-center">
            <div class="w-auto flex flex-col ml-40">
                <span class="font-bold text-4xl mb-2">Area de Cardiologia</span>
                <span class="font-bold text-4xl mb-4">Justo a tu Alcanze!!</span>
                <span class="font-bold text-2xl">Administración de Area designada</span>
                <div class="my-6 w-3/5">
                    <p class="text-xl text-justify mb-4 font-bold text-gray-400">
                        Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry.
                    </p>
                </div>
                <a href="/#" target="_self"
                    class="w-4/5 lg:w-2/5 h-12 text-white font-bold bg-vh-green text-lg tracking-wide shadow-xl mb-10 mx-4 rounded-full hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center content-center">
                    Solicitar Cita
                </a>
            </div>
            <div class="mr-6">
                <div class="bg-gray-200 rounded w-60 p-4">
                    <p class="text-2xl font-bold mb-4">Area</p>
                    <div class="flex flex-col pl-4 mt-1">
                        <span class="text-xl">Activa</span>
                        <span class="text-xl">Personal</span>
                        <span class="text-xl">Personalizado</span>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center w-auto">
                <div class="ml-auto lg:ml-auto">
                    <div class="">
                        <img class="w-96 absolute z-10 -mt-52" src="{{asset('storage/svg/doctor.svg')}}"
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
            <div class="bg-gray-100 mt-28 rounded-lg h-32 w-36 ">
                <p class="pl-4 text-xl font-bold">Area</p>
                <div class="flex flex-col pl-4 mt-1">
                    <span class="text-lg">Activa</span>
                    <span class="text-lg">Personal</span>
                    <span class="text-lg">Personalizado</span>
                </div>
            </div>
        </div>
        <div class="ml-auto mt-12 lg:ml-auto absolute z-[-10] opacity-60">
            <img class="h-56 lg:h-full" src="{{asset('storage/svg/doctor.svg')}}" type="image/svg+xml" />
        </div>
    </div>
    <div class="lg:hidden flex justify-center items-center">
        <div class="w-64">
            <div class="flex flex-col ml-4 mt-2 mb-2">
                <span class="font-bold text-lg">Area de Cardiologia</span>
                <span class="font-bold text-lg">Justo a tu Alcanze!!</span>
                <span class="font-bold text-sm">Administración de Area designada</span>
            </div>
            <div class="my-5">
                <p class="text-xs text-justify mb-4 font-bold text-gray-400 mx-4 -mt-1">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry.
                </p>
            </div>
            <a href="/#" target="_self"
                class="w-4/5 h-9 text-white font-bold bg-vh-green text-sm shadow-xl mb-10 rounded-full lg:w-2/5 hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center py-2 mx-4">
                Solicitar Cita
            </a>
        </div>
    </div>
    <div class="flex justify-center text-center flex-col items-center">
        <div class="w-full h-auto">
            <div>
                <h2 class="font-bold text-2xl">Areas de Apoyo</h2>
                <h2 class="font-bold text-2xl text-vh-green">
                    Brindadas al Paciente
                </h2>
            </div>
            <div class="w-full flex grow-0 flex-wrap items-center justify-center mb-8">
                <div class="w-full min-w-40 max-w-72 mx-4 border border-solid border-vh-green py-4 my-4">
                    <h2 class="text-lg font-bold mb-2">Citas</h2>
                    <p class="text-sm font-bold text-gray-400 mt-2 px-6 text-justify">
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Ut ex id exercitationem amet unde aliquam,
                        nihil, assumenda libero, atque veritatis pariatur
                        nesciunt ipsam voluptatum blanditiis iure est dolor
                        laudantium. Facere.
                    </p>
                    <hr class="mx-6 my-2" />
                    <div class="flex flex-col px-8">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom" />
                            <span class="ml-2">Opción 1</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom" />
                            <span class="ml-2">Opción 2</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom" />
                            <span class="ml-2">Opción 3</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom" />
                            <span class="ml-2">Opción 4</span>
                        </label>
                    </div>
                    <button target="_self" id="make_appointment"
                        class="w-4/5 py-4 my-4 border border-solid border-vh-green font-bold text-base lg:w-2/5 hover:bg-vh-green transition duration-300 hover:text-white inline-block text-center">
                        Agendar
                    </button>
                </div>
                <div class="w-full min-w-40 max-w-72 mx-4 border border-solid border-vh-green py-4 my-4">
                    <h2 class="text-lg font-bold mb-2">Expedientes</h2>
                    <p class="text-sm font-bold text-gray-400 mt-2 px-6 text-justify">
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Ut ex id exercitationem amet unde aliquam,
                        nihil, assumenda libero, atque veritatis pariatur
                        nesciunt ipsam voluptatum blanditiis iure est dolor
                        laudantium. Facere.
                    </p>
                    <hr class="mx-6 my-2" />
                    <div class="flex flex-col px-8">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom" />
                            <span class="ml-2">Opción 1</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom" />
                            <span class="ml-2">Opción 2</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom" />
                            <span class="ml-2">Opción 3</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom" />
                            <span class="ml-2">Opción 4</span>
                        </label>
                    </div>
                    <a href="/#" target="_self"
                        class="w-4/5 py-4 my-4 border border-solid border-vh-green font-bold text-base lg:w-2/5 hover:bg-vh-green transition duration-300 hover:text-white inline-block text-center">Observar</a>
                </div>
                <div class="w-full min-w-40 max-w-72 mx-4 border border-solid border-vh-green py-4 my-4">
                    <h2 class="text-lg font-bold mb-2">Programación</h2>
                    <p class="text-sm font-bold text-gray-400 mt-2 px-6 text-justify">
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Ut ex id exercitationem amet unde aliquam,
                        nihil, assumenda libero, atque veritatis pariatur
                        nesciunt ipsam voluptatum blanditiis iure est dolor
                        laudantium. Facere.
                    </p>
                    <hr class="mx-6 my-2" />
                    <div class="flex flex-col px-8">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom" />
                            <span class="ml-2">Opción 1</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom" />
                            <span class="ml-2">Opción 2</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom" />
                            <span class="ml-2">Opción 3</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom" />
                            <span class="ml-2">Opción 4</span>
                        </label>
                    </div>
                    <a href="/#" target="_self"
                        class="w-4/5 py-4 my-4 border border-solid border-vh-green font-bold text-base lg:w-2/5 hover:bg-vh-green transition duration-300 hover:text-white inline-block text-center">Observar</a>
                </div>
            </div>
        </div>

        <!-- Segundo Bloque Desktop -->
        <div class="hidden lg:flex flex-col items-center w-full text-center mb-8">
            <div class="mb-2">
                <h2 class="font-bold text-2xl text-vh-green">
                    Doctores de Area
                </h2>
            </div>
            <div class="flex justify-between w-4/6 mt-4 mx-">
                <div class="w-80 max-w-80 m-4 bg-vh-green-light opacity-80 rounded-xl flex">
                    <div class="mt-8 lg:ml-auto">
                        <div class="bg-vh-green-medium rounded-full h-16 w-16">
                            <span class="invisible">a</span>
                        </div>
                    </div>
                    <div class="flex flex-col pl-4 mt-5 mx-auto">
                        <h3 class="font-bold text-2xl">Juan</h3>
                        <p>Matematics</p>
                        <div class="w-28 flex justify-around my-4 lg:ml-auto">
                            <div class="bg-vh-green-medium rounded-full h-10 w-10">
                                <span class="invisible">a</span>
                            </div>
                            <div class="bg-vh-green-medium rounded-full h-10 w-10">
                                <span class="invisible">a</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-80 max-w-80 m-4 bg-vh-green-light opacity-80 rounded-xl flex">
                    <div class="ml-8 mt-8 lg:ml-auto">
                        <div class="bg-vh-green-medium rounded-full h-16 w-16">
                            <span class="invisible">a</span>
                        </div>
                    </div>
                    <div class="flex flex-col pl-4 mt-5 mx-auto">
                        <h3 class="font-bold text-2xl">Epico Palo</h3>
                        <p>Matematics</p>
                        <div class="w-28 flex justify-around my-4 lg:ml-auto">
                            <div class="bg-vh-green-medium rounded-full h-10 w-10">
                                <span class="invisible">a</span>
                            </div>
                            <div class="bg-vh-green-medium rounded-full h-10 w-10">
                                <span class="invisible">a</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-80 max-w-80 m-4 bg-vh-green-light opacity-80 rounded-xl flex">
                    <div class="ml-8 mt-8 lg:ml-auto">
                        <div class="bg-vh-green-medium rounded-full h-16 w-16">
                            <span class="invisible">a</span>
                        </div>
                    </div>
                    <div class="flex flex-col pl-4 mt-5 mx-auto">
                        <h3 class="font-bold text-2xl">Alvarenga</h3>
                        <p>Matematics</p>
                        <div class="w-28 flex justify-around my-4 lg:ml-auto">
                            <div class="bg-vh-green-medium rounded-full h-10 w-10">
                                <span class="invisible">a</span>
                            </div>
                            <div class="bg-vh-green-medium rounded-full h-10 w-10">
                                <span class="invisible">a</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Segundo Bloque Mobile-->
        <div class="lg:hidden w-full text-center mb-8">
            <div class="mb-2">
                <h2 class="font-bold text-2xl text-vh-green">
                    Doctores de Area
                </h2>
            </div>
            <div class="w-full h-auto flex flex-wrap items-center justify-center mt-4">
                <div class="w-80 max-w-72 my-4 bg-vh-green-light opacity-80 rounded-xl flex">
                    <div class="ml-8 mt-8 lg:ml-auto">
                        <div class="bg-vh-green-medium rounded-full h-16 w-16">
                            <span class="invisible">a</span>
                        </div>
                    </div>
                    <div class="flex flex-col pl-4 mt-5 mx-auto">
                        <h3 class="font-bold text-2xl">Juan</h3>
                        <p>Matematics</p>
                        <div class="w-28 flex justify-around my-4 lg:ml-auto">
                            <div class="bg-vh-green-medium rounded-full h-10 w-10">
                                <span class="invisible">a</span>
                            </div>
                            <div class="bg-vh-green-medium rounded-full h-10 w-10">
                                <span class="invisible">a</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-80 max-w-72 my-4 bg-vh-green-light opacity-80 rounded-xl flex">
                    <div class="ml-8 mt-8 lg:ml-auto">
                        <div class="bg-vh-green-medium rounded-full h-16 w-16">
                            <span class="invisible">a</span>
                        </div>
                    </div>
                    <div class="flex flex-col pl-4 mt-5 mx-auto">
                        <h3 class="font-bold text-2xl">Epico Palo</h3>
                        <p>Matematics</p>
                        <div class="w-28 flex justify-around my-4 lg:ml-auto">
                            <div class="bg-vh-green-medium rounded-full h-10 w-10">
                                <span class="invisible">a</span>
                            </div>
                            <div class="bg-vh-green-medium rounded-full h-10 w-10">
                                <span class="invisible">a</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-80 max-w-72 my-4 bg-vh-green-light opacity-80 rounded-xl flex">
                    <div class="ml-8 mt-8 lg:ml-auto">
                        <div class="bg-vh-green-medium rounded-full h-16 w-16">
                            <span class="invisible">a</span>
                        </div>
                    </div>
                    <div class="flex flex-col pl-4 mt-5 mx-auto">
                        <h3 class="font-bold text-2xl">Alvarenga</h3>
                        <p>Matematics</p>
                        <div class="w-28 flex justify-around my-4 lg:ml-auto">
                            <div class="bg-vh-green-medium rounded-full h-10 w-10 border">
                                <span class="invisible">a</span>
                            </div>
                            <div class="bg-vh-green-medium rounded-full h-10 w-10">
                                <span class="invisible">a</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>