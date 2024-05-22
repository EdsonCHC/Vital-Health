<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exámenes</title>
    @vite('resources/css/app.css')
</head>

<body class="w-full h-screen">
    <div class="w-full h-auto">
        @include('templates.header')
    </div>
    <main class="w-full h-auto p-4 lg:bg-gray-100 lg:max-w-screen-2xl lg:mx-auto lg:rounded-md">
        <section>
            <h2 class="font-bold text-lg text-vh-green-medium">Exámenes Personales</h2>
            <p class="text-sm">Los exámenes son necesarios para las citas</p>
        </section>
        <section class="w-full h-auto my-5">
            <div class="w-full h-28 m-auto flex gap-8 bg-gray-100 rounded-lg my-3 lg:bg-white">
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
            <div class="w-full h-28 m-auto flex gap-8 bg-gray-100 rounded-lg my-3 lg:bg-white">
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
    <div class="w-full h-auto absolute bottom-0">
        @include('templates.footer')
    </div>
</body>

</html>