<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicina</title>
    @vite('resources/css/app.css')
</head>
<body class="w-full h-screen">
    <div class="w-full h-40 bg-green-300 rounded-b-xl flex flex-row items-center p-2 mb-5">
        <h2 class="text-2xl font-bold text-white w-3/5">
            Entrega de medicamentos
        </h2>
        <div class="w-2/5 h-auto flex flex-row items-center">
            <object data="{{asset('storage/svg/user.svg')}}" type="image/svg+xml"></object>
            <div>
            <p class="font-bold">John Doe</p>
            <p>3rd year</p> <!--Esto para que?-->
            </div>
        </div>        
    </div>
    <div class="w-full h-auto flex flex-row justify-between p-2">
        <p class="text-sm text-center font-bold">Medicamentos Asignados</p>
        <button class="w-72 text-white text-sm font-bold bg-green-300 rounded-lg">
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