<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Incluir Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js'])
</head>

<body class="w-full h-screen bg-gray-200">
    <!-- Encabezado -->
    <div class="flex w-full">
        <div class="h-full">
            @include('templates.header_doc')
        </div>
        <div class="w-full h-auto">
            <div class="w-auto h-auto my-4 mx-4 lg:mx-16 lg:flex lg:mt-10 ">
                <div class="md:w-full w-full flex-grow">
                    <h2 class="font-bold text-2xl text-vh-green">Entrega de Medicamento</h2>
                    <p class="font-semibold lg:text-base">Medicamento Asignado</p>
                </div>
                <div class="md:w-full w-full flex lg:justify-end lg:items-end  my-2">
                    <a href="/login" target="_self"
                        class="w-2/5 text-sm  lg:w-40 h-12 text-white font-semibold bg-vh-green lg:text-lg tracking-wide shadow-xl lg:my-2 lg:mx-4 rounded-xl hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center content-center">
                        Nuevo Examen
                    </a>
                </div>

            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 my-4 mx-4 lg:mx-16 text-center ">
                <article
                    class="bg-white  lg:p-6 p-3 mb-6 shadow transition duration-300 group transform hover:-translate-y-2 hover:shadow-2xl rounded-2xl cursor-pointer border">
                    <a target="_self" href="" class="absolute opacity-0 top-0 right-0 left-0 bottom-0"></a>
                    <div class="relative mb-4 rounded-2xl">
                        <object data="{{asset('storage/svg/medicine.svg')}}" type="image/svg+xml"
                            class="max-h-80 rounded-2xl w-full object-cover transition-transform duration-300 transform group-hover:scale-105"></object>
                        <a class="flex justify-center items-center bg-green-700 bg-opacity-80 z-10 absolute top-0 left-0 w-full h-full text-white rounded-2xl opacity-0 transition-all duration-300 transform group-hover:scale-105 text-xl group-hover:opacity-100"
                            href="" target="_self" rel="noopener noreferrer">
                            Ver Medicamento
                            <svg class="ml-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="flex justify-between items-center w-full pb-4 mb-auto">
                        <div class="flex items-center">
                            <div class="pr-3">
                                <object class="h-10 w-10 rounded-full object-cover"
                                    data="{{asset('storage/svg/medicine_example.svg')}}" type="image/svg+xml"></object>

                            </div>
                            <div class="flex flex-1">
                                <div class="">
                                    <p class="text-sm :text-xl  font-semibold ">Alejandro Jose</p>
                                    <p class="text-sm text-gray-500">Publicad :19/03/2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <div class="text-sm flex items-center text-gray-500 ">
                                2 dias
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <h3 class="font-medium text-xl leading-8">
                        <a href="" class="block relative group-hover:text-vh-green transition-colors duration-200 ">
                            Pedido de Medicina para:@juan
                        </a>
                    </h3>

                </article>

            </div>

</body>

</html>