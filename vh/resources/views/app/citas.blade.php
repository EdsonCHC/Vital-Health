<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js'])
</head>

<body class="w-full h-full">
    <div class="w-full h-auto absolute top-0 z-10">
        @include('templates.header')
    </div>
    <main class="w-full max-w-6xl h-auto p-4 lg:bg-gray-100 lg:rounded-md mt-24 mx-auto">

        <section class="flex justify-between ">
            <h2 class="font-bold text-lg text-vh-green-medium">Menú de Citas</h2>
            <div class="w-24 ml-4">
                <label for="filtro"
                    class="border-4 border-green-900 rounded-full flex items-center p-1 relative cursor-pointer">
                    <select id="filtro" name="filtro"
                        class="absolute inset-0 w-full h-full border-none cursor-pointer bg-transparent appearance-none z-10 right-0 focus:outline-none opacity-0">
                        <option value="todos" selected>Todos</option>
                        <option value="c1">Ascedente</option>
                        <option value="c2">Descendente</option>
                    </select>
                    <div class="flex justify-center items-center w-full">
                        <div class="relative flex items-center">
                            <span id="filtroSeleccionado" class="flex pr-2 text-gray-700">Todos</span>
                            <object data="{{asset('storage/svg/filtro.svg')}}" type="image/svg+xml"></object>
                        </div>
                    </div>
                </label>
            </div>
        </section>

        <section class="w-full h-auto my-4 font-bold">
            <div class="flex gap-8 flex-wrap justify-center lg:justify-start">
                <div class="w-72 h-64 p-1 flex flex-col items-center bg-gray-100 rounded-lg lg:bg-white relative">
                    <div class="w-20 h-20 bg-green-200 rounded-full"></div>
                    <div class="w-9/12 h-28 p-2 text-center">
                        <h2>Odontología</h2>
                        <h3>Doc: Alejandro García</h3>
                        <button id="citas" class="bg-vh-green-light rounded-md text-white font-bold p-1"
                            id="show-alert">En Proceso</button>
                        <h4>Hora: 8:00 A.M</h4>
                        <h4>Fecha: 8 de junio de 2024</h4>
                    </div>
                </div>

                <div class="w-72 h-64 p-1 flex flex-col items-center bg-gray-100 rounded-lg lg:bg-white relative">
                    <div class="w-20 h-20 bg-green-200 rounded-full"></div>
                    <div class="w-9/12 h-28 p-2 text-center">
                        <h2 class="relative z-10">Dermatología</h2>
                        <h3>Doc: Víctor Guevara</h3>
                        <button class="bg-red-700 rounded-md text-white font-bold p-1">Rechazado</button>
                        <h4>Hora: 8:00 A.M</h4>
                        <h4>Fecha: 8 de junio de 2024</h4>
                    </div>
                </div>


                <div class="w-72 h-64 p-1 flex flex-col items-center bg-gray-100 rounded-lg lg:bg-white relative">
                    <div class="w-20 h-20 bg-green-200 rounded-full"></div>
                    <div class="w-9/12 h-28 p-2 text-center">
                        <h2>Odontología</h2>
                        <h3>Doc: Alejandro Alvarenga</h3>
                        <button type="check"
                            class="bg-blue-400 rounded-md text-white font-bold p-1 ">Completado</button>
                        <h4>Hora: 8:00 A.M</h4>
                        <h4 class="text-sm">Fecha: 8 de junio de 2024</h>
                    </div>
                </div>

            </div>
        </section>
    </main>
    <div class="w-full h-auto bottom-0 absolute">
        @include('templates.footer')
    </div>
</body>

</html>