<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff</title>
    @vite(['resources/css/app.css', 'resources/js/ad_staff.js'])
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
</head>

<body class="w-full h-full bg-vh-alice-blue">
    <div class="w-auto h-auto fixed">
        @include('templates.header_ad')
    </div>

    <main class="flex flex-col items-center mt-12 lg:ml-72 lg:mt-12">
        <div class="w-full flex justify-between items-center px-4">
            <h2 class="text-xl font-bold mb-4 lg:mb-0">Personal de la Categoría: {{ $categoria->nombre }}</h2>
            <button id="create_staff"
                class="w-44 h-10 font-semibold text-base text-white bg-vh-green hover:bg-vh-gray transition duration-300 hover:text-black rounded-lg">
                Nuevo Doctor
            </button>
        </div>

        <div class="w-full flex flex-wrap gap-4 px-4 lg:px-0 mt-10">
            @forelse ($categoria->doctors as $doctor)
                <div class="w-full sm:w-80 lg:w-96 bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col">
                    <div class="relative mb-4">
                        <button id="menu_opti" class="absolute top-2 right-2 p-2 bg-gray-200 rounded-full hover:bg-gray-300 transition-colors duration-200">
                            <img id="menu-icon" class="h-8 w-8" src="{{ asset('storage/svg/option-icon.svg') }}" alt="Opciones" />
                        </button>
                        <div id="menuOptions"
                                class="w-32 ml-40 hidden absolute bg-white border border-gray-300 shadow-lg rounded-lg hover:bg-slate-300">
                                <a href="#" class="edit_staff block p-1 text-gray-800 hover:bg-gray-200" data-id="{{$doctor->id}}">Editar</a>
                            </div>
                    </div>
                    <div class="flex flex-col items-center mb-4">
                        <h3 class="font-bold text-2xl mb-2 text-center">{{ $doctor->name }}</h3>
                        <p class="text-gray-500 mb-1">Número: <span class="font-medium">{{ $doctor->number }}</span></p>
                        <p class="text-gray-500 mb-1">Edad: <span class="font-medium">{{ $doctor->age }}</span></p>
                        <p class="text-gray-500 mb-4">Género: <span class="font-medium">{{ $doctor->gender }}</span></p>
                    </div>
                    <div class="flex justify-center">
                        <button class="delete_doc flex items-center p-2 bg-red-500 hover:bg-red-600 text-white rounded-full transition-colors duration-300" data-id="{{ $doctor->id }}">
                            <img id="menu-icon" class="h-6 w-6" src="{{ asset('storage/svg/trash-icon.svg') }}" alt="Eliminar" />
                            <span class="ml-2 text-sm">Eliminar</span>
                        </button>
                    </div>
                </div>
            @empty
                <div class="w-full bg-white p-6 lg:mr-6 rounded-xl shadow-lg flex flex-col items-center">
                    <img src="{{ asset('storage/svg/doctor.svg') }}" alt="No hay doctores" class="h-24  w-24 mb-4"/>
                    <h3 class="text-2xl font-semibold mb-2">No se han registrado doctores</h3>
                    <p class="text-gray-600 text-center">Actualmente no hay doctores en esta categoría. Por favor, agregue nuevos doctores.</p>
                </div>
            @endforelse
        </div>
    </main>

    <script>
        document.querySelectorAll('#menu_opti').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault();
                var menuOptions = this.nextElementSibling;
                menuOptions.classList.toggle('hidden');
            });
        });
    </script>
</body>

</html>



