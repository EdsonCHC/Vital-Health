<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff</title>
    @vite(['resources/css/loader.css', 'resources/js/preloader.js', 'resources/css/app.css', 'resources/js/ad_staff.js'])
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
</head>

<body class="w-full h-full bg-vh-alice-blue">
    <div class="w-auto h-auto fixed">
        @include('templates.header_ad')
    </div>

    <main class="flex flex-col items-center mt-12 lg:ml-72 lg:mt-12">
        <div class="w-full flex justify-between items-center px-4">
            <h2 class="text-3xl font-bold text-gray-800">Personal de: {{ $categoria->nombre }}</h2>
            <button id="create_staff"
                class="w-44 h-10 font-semibold text-base text-white bg-vh-green hover:bg-vh-gray transition duration-300 hover:text-black rounded-lg">
                Nuevo Doctor
            </button>
        </div>

        <div class="w-full my-4 flex flex-wrap justify-center gap-6 px-4 lg:px-0 mt-10">
            @forelse ($categoria->doctors as $doctor)
                <div class="w-full sm:w-1/2 lg:w-1/4">
                    <div
                        class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                        <div class="h-20 bg-green-200 flex items-center justify-center">
                            <!-- Imagen o contenido adicional aquí -->
                        </div>
                        <div class="p-6 flex flex-col h-full">
                            <h3 class="text-xl font-semibold mb-2 text-center">{{ $doctor->name }}
                                {{ $doctor->lastName }}</h3>
                            <p class="text-gray-400 text-lg mb-2 text-center">{{ $doctor->category->nombre }}</p>
                            <p class="text-gray-500 text-lg mb-1 text-center">Número: <span
                                    class="font-medium">{{ $doctor->number }}</span></p>
                            <p class="text-gray-500 text-lg mb-1 text-center">Edad: <span
                                    class="font-medium">{{ $doctor->age }}</span></p>
                            <p class="text-gray-500 text-lg mb-4 text-center">Género: <span
                                    class="font-medium">{{ $doctor->gender }}</span></p>
                            <div class="mt-auto flex justify-center">
                                <button
                                    class="py-2.5 px-5 me-2 mb-2 text-lg font-medium text-white focus:outline-none bg-green-700 rounded-lg border border-gray-200 hover:bg-green-800 hover:text-white focus:z-10 focus:ring-4 focus:ring-green-300 transition-colors duration-300 edit_staff"
                                    data-id="{{ $doctor->id }}">
                                    Editar
                                </button>
                                <button
                                    class="py-2.5 px-5 me-2 mb-2 text-lg font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-red-700 hover:text-white focus:z-10 focus:ring-4 focus:ring-red-300 transition-colors duration-300 delete_doc"
                                    data-id="{{ $doctor->id }}">
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="w-full sm:w-1/2 lg:w-1/4 bg-white p-6 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('storage/svg/doctor.svg') }}" alt="No hay doctores"
                        class="h-24 w-24 mb-4 mx-auto" />
                    <h3 class="text-2xl font-semibold mb-2 text-center">No se han registrado doctores</h3>
                    <p class="text-gray-600 text-center">Actualmente no hay doctores en esta categoría. Por favor,
                        agregue nuevos doctores.</p>
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
