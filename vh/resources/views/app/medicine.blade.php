<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicina</title>
    @vite('resources/css/app.css')
</head>
<body class="w-full h-screen">
    @include('templates.header')
    <div class="w-full h-auto flex flex-col items-start p-4 gap-2">
        <p class="text-lg font-bold">Medicamentos Asignados</p>
        <button class="text-sm font-bold">
            Solicitudes de medicamentos
        </button>
    </div>
    <div class="w-full h-auto">
        <div id="medicine_container" class="w-full h-auto p-5 md:w-72 lg:w-72">
            <div class="w-full h-auto bg-gray-300 rounded-lg p-2 flex gap-2 items-center md:flex-col md:w-auto">
                <object data="{{asset('storage/svg/medicine_example.svg')}}" type="image/svg+xml" class="w-full object-cover"></object>
                <div class="w-full h-auto">
                    <p class="text-lg font-bold">Pedido #1</p>
                    <p>Medicamento</p>
                    <div class="w-full h-full flex flex-col md:flex-row lg:flex-row justify-between">
                        <p>Total: 3</p>
                        <p class="text-blue-500">3h 10m 3s</p>
                    </div>
                    <button class="w-auto h-auto bg-vh-green-light text-white p-1 rounded-2xl mx-auto my-0 md:w-full lg:w-full">Ver Pedido</button>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full h-auto absolute bottom-0">
        @include('templates.footer')    
    </div>
</body>
</html>