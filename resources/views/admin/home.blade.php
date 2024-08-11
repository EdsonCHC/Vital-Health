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
            <h1 class="text-3xl font-bold">Admin</h1>
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
            @foreach ($categorias as $categoria)
                <!-- Usa el nombre correcto aquí -->
                <div class="h-80 bg-white p-6 rounded-lg shadow-lg">
                    @if ($categoria->img)
                        <img src="{{ asset($categoria->img) }}" alt="{{ $categoria->nombre }}"
                            class="mx-auto max-h-40 mb-4">
                    @endif
                    <h2 class="text-xl font-bold mb-4">{{ $categoria->nombre }}</h2>
                    <p class="mb-4">{{ $categoria->descripción }}</p>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300"
                        onclick="editCategory({{ $categoria->id }})">
                        Editar
                    </button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300"
                        onclick="deleteCategory({{ $categoria->id }})">
                        Eliminar
                    </button>
                    @if ($categoria->activa)
                        <button
                            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700 transition duration-300"
                            onclick="suspendCategory({{ $categoria->id }})">
                            Suspender
                        </button>
                    @else
                        <button
                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 transition duration-300"
                            onclick="activateCategory({{ $categoria->id }})">
                            Activar
                        </button>
                    @endif

                    <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 transition duration-300"
                        onclick="viewCategory({{ $categoria->id }})">
                        Administrar
                    </button>
                </div>
            @endforeach
        </div>
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
