<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/admin.js', 'resources/js/ad_cate.js'])
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Admin General</h1>
            <a href="#" id="add_category"
                class="flex items-center justify-center h-10 w-48 bg-vh-green-medium rounded transition duration-300 hover:bg-white hover:text-black text-white tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="ml-2 text-base font-bold">Nueva Categoría</span>
            </a>
        </div>

        <!-- Tarjetas de categorías -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($Categorías as $categoría)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    @if($categoría->img)
                        <img src="{{ asset('storage/images/' . $categoría->img) }}" alt="{{ $categoría->nombre }}"
                            class="w-full h-auto mb-4">
                    @endif
                    <h2 class="text-xl font-bold mb-4">{{ $categoría->nombre }}</h2>
                    <p class="mb-4">{{ $categoría->descripción }}</p>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300"
                        onclick="editCategory({{ $categoría->id }})">
                        Editar
                    </button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300"
                        onclick="deleteCategory({{ $categoría->id }})">
                        Eliminar
                    </button>
                    <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 transition duration-300"
                        onclick="viewCategory({{ $categoría->id }})">
                        Administrar
                    </button>

                </div>
            @endforeach
        </div>

        <div class="absolute bottom-0 left-0 px-8 my-2">
            <a href="#" id="log_out_admin"
                class="flex items-center justify-center p-4 mb-5 h-14 rounded transition duration-300 bg-vh-green-medium hover:bg-white hover:text-black text-white tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="ml-2 text-base font-bold">Cerrar Sesión</span>
            </a>
        </div>
    </div>
</body>

</html>