<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicina</title>
    <link rel="shortcut icon" href="{{asset('storage/svg/favicon.png')}}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/app.css', 'resources/css/loader.css', 'resources/js/preloader.js'])
</head>

<body class="w-full h-screen ">
    @include('templates.loader')
    <div class="">
        @include('templates.header')
    </div>
    <div class="w-full h-auto flex flex-col mt-8 items-center lg:items-start p-4 gap-2 lg:px-16 ">
        <h2 class="font-bold  text-xl text-vh-green lg:font-bold  lg:text-4xl">Medicamento Asignado </h2>
        <button class="text-sm font-bold">
            Solicitudes de medicamentos
        </button>
    </div>
    <div class="w-full h-auto  flex">
        <div class=" bg-cover w-full flex justify-center items-center">
            <div class="w-full bg-white lg:p-5 p-2 ">
                <div class="w-12/12 mx-auto rounded-2xl bg-white lg:p-5 p-2">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 text-center px-2 mx-auto">
                        <article class="bg-white  lg:p-6 p-3 mb-6 shadow transition duration-300 group  hover:-translate-y-2 hover:shadow-2xl rounded-2xl cursor-pointer border">
                            <button target="_self" class="absolute opacity-0 top-0 right-0 left-0 bottom-0"></button>
                            <div class="flex justify-between items-center w-full pb-4 mb-auto">
                                <div class="flex items-center">
                                    <div class="pr-3">
                                        <object class="h-10 w-10 rounded-full object-cover"
                                            data="{{asset('storage/svg/medicine_example.svg')}}"
                                            type="image/svg+xml"></object>
                                    </div>
                                    <div class="flex flex-1">
                                        <div class="">
                                            <p class="text-sm font-semibold ">Morris Muthigani</p>
                                            <p class="text-sm text-gray-500">Published on 19/03/2024</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <div class="text-sm flex items-center text-gray-500 ">
                                        2 Days ago
                                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <h3 class="font-medium text-xl leading-8">
                                <a href=""
                                    class="block lg:elative group-hover:text-vh-green transition-colors duration-200 ">
                                    Instant Help at Your Fingertips
                                </a>
                            </h3>

                        </article>
                    </div>

                </div>
            </div>

        </div>

    </div>
    </div>

    <div class="w-full h-auto bottom-0 absolute">
        @include('templates.footer')    
    </div>
</body>

</html>