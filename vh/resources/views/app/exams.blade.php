<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exámenes</title>
    <link rel="shortcut icon" href="{{asset('storage/svg/favicon.png')}}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/loader.css', 'resources/js/preloader.js','resources/js/scroll.js'])
</head>

<body class="w-full h-screen">
    @include('templates.loader')
    <div class="w-full h-auto">
        @include('templates.header')
    </div>
    <main class="w-full h-auto p-4  mt-6 lg:max-w-screen-2xl lg:mx-auto lg:rounded-md">
        <section class="mx-4 " >
            <h2 class="font-bold text-center lg:text-start text-2xl text-vh-green-medium">Exámenes Personales</h2>
            <p class="text-sm text-center lg:text-start">Los exámenes son necesarios para las citas</p>
        </section>
        <section class="grid lg:grid-cols-2 gap-5 lg:px-16 lg:py-12">
            <div class="w-full flex gap-8  rounded-lg my-3 lg:bg-gray-200">
                <div class="w-1/4 h-28 bg-blue-800 rounded-s-lg"></div>
                <div class="w-9/12 h-28 p-2">
                    <h4>Exámenes de</h4>
                    <ul class="mt-4">
                        <li class="flex">
                            <object data="{{asset('storage/svg/calendar.svg')}}" type="image/svg+xml"
                                class="w-[25px]"></object>
                            <p>Disponible</p>
                        </li>
                        <li class="flex">
                            <object data="{{asset('storage/svg/clock.svg')}}" type="image/svg+xml"
                                class="w-[25px]"></object>
                            <p>9.00 <span>-</span> 10.00 AM</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full flex gap-8 bg-gray-100 rounded-lg my-3 lg:bg-gray-200">
                <div class="w-1/4 h-28 bg-blue-800 rounded-s-lg"></div>
                <div class="w-9/12 h-28 p-2">
                    <h4>Exámenes de</h4>
                    <ul class="mt-4">
                        <li class="flex">
                            <object data="{{asset('storage/svg/calendar.svg')}}" type="image/svg+xml"
                                class="w-[25px]"></object>
                            <p>Disponible</p>
                        </li>
                        <li class="flex">
                            <object data="{{asset('storage/svg/clock.svg')}}" type="image/svg+xml"
                                class="w-[25px]"></object>
                            <p>9.00 <span>-</span> 10.00 AM</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full flex gap-8 bg-gray-100 rounded-lg my-3 lg:bg-gray-200">
                <div class="w-1/4 h-28 bg-blue-800 rounded-s-lg"></div>
                <div class="w-9/12 h-28 p-2">
                    <h4>Exámenes de</h4>
                    <ul class="mt-4">
                        <li class="flex">
                            <object data="{{asset('storage/svg/calendar.svg')}}" type="image/svg+xml"
                                class="w-[25px]"></object>
                            <p>Disponible</p>
                        </li>
                        <li class="flex">
                            <object data="{{asset('storage/svg/clock.svg')}}" type="image/svg+xml"
                                class="w-[25px]"></object>
                            <p>9.00 <span>-</span> 10.00 AM</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full flex gap-8 bg-gray-100 rounded-lg my-3 lg:bg-gray-200">
                <div class="w-1/4 h-28 bg-blue-800 rounded-s-lg"></div>
                <div class="w-9/12 h-28 p-2">
                    <h4>Exámenes de</h4>
                    <ul class="mt-4">
                        <li class="flex">
                            <object data="{{asset('storage/svg/calendar.svg')}}" type="image/svg+xml"
                                class="w-[25px]"></object>
                            <p>Disponible</p>
                        </li>
                        <li class="flex">
                            <object data="{{asset('storage/svg/clock.svg')}}" type="image/svg+xml"
                                class="w-[25px]"></object>
                            <p>9.00 <span>-</span> 10.00 AM</p>
                        </li>
                    </ul>
                </div>
            </div>

        </section>

    </main>
    <div class="w-full h-auto lg:absolute  lg:bottom-0">
        @include('templates.footer')
    </div>
    <div class="w-full h-auto">
        @include('templates.chat_ia')
    </div>
</body>

</html>