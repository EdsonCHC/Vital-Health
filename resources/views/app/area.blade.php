<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{__('messages.es_62')}}
    </title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/loader.css', 'resources/css/area.css', 'resources/js/preloader.js', 'resources/js/scroll.js', 'resources/js/area.js'])
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }
    </style>
</head>

<body class="bg-white text-gray-900">

    @include('templates.loader')

    <div class="w-full h-auto">
        @include('templates.header')
    </div>

    <main class="flex-1">
        <!-- Título y descripción para pantallas grandes -->
        <section class="bg-cover bg-center py-16 border-b border-gray-200 lg:px-24 px-6"
            style="background-image: url('{{ asset('storage/images/background.jpg') }}');">
            <div class="container mx-auto text-center">
                <h2 class="text-4xl font-bold mb-4 text-vh-green">{{__('messages.es_62')}}</h2>
                <p class="text-lg text-gray-800 max-w-3xl mx-auto">{{__('messages.es_63')}}</p>
            </div>
        </section>

        <!-- Filtro y búsqueda -->
        <section class="bg-white py-8 border-b border-gray-200 lg:px-24 px-6">
            <div class="container mx-auto">
                <form method="GET" action="{{ route('categorias.filtrar') }}"
                    class="flex flex-col lg:flex-row items-center gap-4">
                    <!-- Campo de búsqueda -->
                    <div class="relative flex-grow">
                        <input type="text" name="s" id="s"
                            class="block w-full pl-10 py-3 border border-gray-300 rounded-md bg-gray-50 text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-green-500 transition"
                            placeholder="{{__('messages.es_64')}}">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <object data="{{ asset('storage/svg/lupa.svg') }}" type="image/svg+xml"
                                class="w-5 h-5 text-gray-500"></object>
                        </span>
                    </div>

                    <!-- Filtro -->
                    <div class="relative">
                        <label for="filtro"
                            class="flex items-center border-2 border-green-900 rounded-full cursor-pointer p-2 bg-white">
                            <select id="filtro" name="filtro"
                                class="absolute inset-0 w-full h-full border-none cursor-pointer bg-transparent appearance-none opacity-0 focus:outline-none">
                                <option value="todos" {{ request('filtro') == 'todos' ? 'selected' : '' }}>{{__('messages.es_65')}}
                                </option>
                                <option value="ascendente" {{ request('filtro') == 'ascendente' ? 'selected' : '' }}>
                                {{__('messages.es_66')}}</option>
                                <option value="descendente" {{ request('filtro') == 'descendente' ? 'selected' : '' }}>
                                {{__('messages.es_67')}}</option>
                            </select>
                            <div class="flex items-center space-x-2">
                                <span id="filtroSeleccionado"
                                    class="text-gray-700">{{ request('filtro', 'Todos') }}</span>
                                <object data="{{ asset('storage/svg/filtro.svg') }}" type="image/svg+xml"
                                    class="w-5 h-5 text-gray-500"></object>
                            </div>
                        </label>
                    </div>

                    <!-- Botón de búsqueda -->
                    <button type="submit"
                        class="px-6 py-3 bg-green-800 text-white rounded-md hover:bg-green-700 focus:outline-none transition">
                        {{__('messages.es_68')}}
                    </button>
                </form>
            </div>
        </section>

        <!-- Tarjetas de categorías -->
        <section class="px-6 lg:px-24 py-8 mb-14">
            <div class="container mx-auto flex flex-wrap gap-6">
                @foreach ($categorias as $categoria)
                    <div class="w-full sm:w-1/2 lg:w-1/4">
                        <div
                            class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                            <div class="h-48 bg-gray-200 flex items-center justify-center">
                                <img src="{{ route('category.image', ['id' => $categoria->id]) }}"
                                    alt="{{ $categoria->nombre }}" class="object-cover h-full w-full" loading="lazy">
                            </div>
                            <div class="p-6 flex flex-col h-full">
                                <h3 class="text-xl font-semibold mb-2">{{ $categoria->nombre }}</h3>
                                <p class="text-gray-600 line-clamp-3">{{ $categoria->descripcion }}</p>
                                <div class="mt-auto flex justify-center">
                                    <a href="{{ route('service', ['id' => $categoria->id]) }}"
                                        class="py-2.5 px-5 me-2 mb-2 text-lg font-medium text-white focus:outline-none bg-vh-green rounded-lg border border-gray-200 hover:bg-green-700 hover:text-white focus:z-10 focus:ring-4 focus:ring-green-300">
                                        {{__('messages.es_69')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    <!-- Footer -->
    <div class="w-full h-auto footer-container">
        @include('templates.footer')
    </div>

    <aside class="bg-gray-100">
        @include('templates.chat_ia')
    </aside>
</body>

</html>