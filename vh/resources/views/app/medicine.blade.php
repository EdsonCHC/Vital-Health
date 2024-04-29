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
    <div id="medicine_container" class="w-full h-auto p-5">
        <div class="w-full h-auto bg-gray-300 rounded-lg p-2 flex gap-2 items-center">
            <object data="{{asset('storage/svg/medicine_example.svg')}}" type="image/svg+xml"></object>
            <div>
                <p class="text-lg font-bold">Pedido #1</p>
                <p>Medicamento</p>
                <p>Total: 3</p>
                <p class="text-blue-500">3h 10m 3s</p>
            </div>
        </div>
    </div>
    @include('templates.footer')
</body>
</html>