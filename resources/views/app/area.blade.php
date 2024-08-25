<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Especialidades Médicas</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/loader.css', 'resources/js/preloader.js', 'resources/js/scroll.js', 'resources/js/area.js'])
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
    </style>
</head>

<body class="bg-white text-gray-900">

    @include('templates.loader')

    <header class="bg-gray-800 text-white">
        @include('templates.header')
    </header>

    <main class="flex-1">
        <!-- Título y descripción para pantallas grandes -->
        <section class="bg-cover bg-center py-16 border-b border-gray-200 lg:px-24 px-6" style="background-image: url('{{ asset('storage/images/background.jpg') }}');">
            <div class="container mx-auto text-center">
                <h2 class="text-4xl font-extrabold mb-4 text-vh-green">Especialidades Médicas</h2>
                <p class="text-lg text-gray-800 max-w-3xl mx-auto">Descubre nuestras especialidades médicas que abarcan una amplia gama de servicios, desde diagnósticos avanzados hasta tratamientos especializados. Estamos comprometidos con tu salud y bienestar en un entorno profesional y acogedor.</p>
            </div>
        </section>

        <!-- Título y descripción para pantallas pequeñas -->
        <section class="lg:hidden bg-white py-10 border-b border-gray-200 px-6">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-semibold mb-2">Servicios</h2>
                <p class="text-lg text-gray-600">Explora nuestras especialidades médicas y encuentra el mejor servicio para tus necesidades en un ambiente profesional y accesible.</p>
            </div>
        </section>

        <!-- Filtro y búsqueda -->
        <section class="bg-white py-8 border-b border-gray-200 lg:px-24 px-6">
            <div class="container mx-auto">
                <form method="GET" action="{{ route('categorias.filtrar') }}" class="flex flex-col lg:flex-row items-center gap-4">
                    <!-- Campo de búsqueda -->
                    <div class="relative flex-grow">
                        <input type="text" name="s" id="s" class="block w-full pl-10 py-3 border border-gray-300 rounded-md bg-gray-50 text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-green-500 transition" placeholder="Buscar...">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <object data="{{ asset('storage/svg/lupa.svg') }}" type="image/svg+xml" class="w-5 h-5 text-gray-500"></object>
                        </span>
                    </div>

                    <!-- Filtro -->
                    <div class="relative">
                        <label for="filtro" class="flex items-center border-2 border-green-900 rounded-full cursor-pointer p-2 bg-white">
                            <select id="filtro" name="filtro" class="absolute inset-0 w-full h-full border-none cursor-pointer bg-transparent appearance-none opacity-0 focus:outline-none">
                                <option value="todos" {{ request('filtro') == 'todos' ? 'selected' : '' }}>Todos</option>
                                <option value="ascendente" {{ request('filtro') == 'ascendente' ? 'selected' : '' }}>Ascendente</option>
                                <option value="descendente" {{ request('filtro') == 'descendente' ? 'selected' : '' }}>Descendente</option>
                            </select>
                            <div class="flex items-center space-x-2">
                                <span id="filtroSeleccionado" class="text-gray-700">{{ request('filtro', 'Todos') }}</span>
                                <object data="{{ asset('storage/svg/filtro.svg') }}" type="image/svg+xml" class="w-5 h-5 text-gray-500"></object>
                            </div>
                        </label>
                    </div>

                    <!-- Botón de búsqueda -->
                    <button type="submit" class="px-6 py-3 bg-green-900 text-white rounded-md hover:bg-green-800 focus:outline-none transition">
                        Buscar
                    </button>
                </form>
            </div>
        </section>

        <!-- Tarjetas de categorías -->
        <section class="px-6 lg:px-24 py-8">
            <div class="container mx-auto flex flex-wrap gap-6">
                @foreach ($categorias as $categoria)
                    <div class="w-full sm:w-1/2 lg:w-1/4">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                            <div class="h-48 bg-gray-200 flex items-center justify-center">
                                @if ($categoria->img)
                                    <img src="{{ asset($categoria->img) }}" alt="{{ $categoria->nombre }}" class="object-cover h-full w-full">
                                @else
                                    <span class="text-gray-500">No Image</span>
                                @endif
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold mb-2">{{ $categoria->nombre }}</h3>
                                <p class="text-gray-600">Disponible</p>
                                <div class="mt-4 flex justify-center">
                                    <a href="{{ route('service', ['id' => $categoria->id]) }}" class="bg-green-600 text-white rounded-full h-10 w-10 flex items-center justify-center transition-transform transform hover:scale-110">
                                        <img class="h-6 w-6" src="{{ asset('storage/svg/info.svg') }}" alt="Info" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 text-white py-4">
        @include('templates.footer_two')
    </footer>

    <aside class="bg-gray-100">
        @include('templates.chat_ia')
    </aside>
</body>

</html>

