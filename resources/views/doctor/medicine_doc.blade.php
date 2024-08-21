<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicina</title>
    <!-- Incluir Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/doctor.js'])
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
</head>


<body class="w-full h-screen bg-gray-200">
    <div class="flex w-full h-full">
        <div class="fixed top-0 h-full z-10">
            @include('templates.header_doc')
        </div>


        <div class="ml-4 lg:ml-60 w-full h-full overflow-y-auto flex-grow">
            <div class="w-full max-w-6xl mx-auto h-auto my-4 lg:my-10 px-4 lg:px-16">
                <h2 class="font-bold text-xl lg:text-3xl text-vh-green mb-4">Pedidos de Receta</h2>

                <!-- Filtros y botones -->
                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center mb-4">
                
                    <div class="flex flex-col lg:flex-row lg:space-x-4">
                        <a id="view-history" href="#"
                            class="w-full lg:w-36 h-12 text-white font-semibold bg-vh-green lg:text-lg tracking-wide shadow-xl rounded-xl hover:bg-white transition duration-300 hover:text-vh-green text-center mb-2 lg:mb-0">
                            <p class="flex justify-center mt-2">Historial</p>
                        </a>
                        <a href="#" id="create-order"
                            class="w-full lg:w-36 h-12 text-white font-semibold bg-vh-green lg:text-lg tracking-wide shadow-xl rounded-xl hover:bg-white transition duration-300 hover:text-vh-green text-center">
                            <p class="flex justify-center mt-2">Nuevo Pedido</p>
                        </a>
                    </div>
                </div>

                <!-- Tabla de pedidos -->
                <div class="overflow-x-auto">
                    <div class="bg-vh-alice-blue rounded-md mb-4">
                        <!-- Encabezado de tabla -->
                        <div class="hidden lg:flex bg-gray-200 p-2 font-semibold text-sm lg:text-base text-vh-green">
                            <div class="w-1/6 text-center py-2">Código</div>
                            <div class="w-1/6 text-center py-2">Paciente</div>
                            <div class="w-1/6 text-center py-2">Medicamento</div>
                            <div class="w-1/6 text-center py-2">Fecha</div>
                            <div class="w-1/6 text-center py-2">Estado</div>
                            <div class="w-1/6 text-center py-2">Acciones</div>
                        </div>

                        <!-- Fila de pedidos -->
                        <div class="flex flex-col lg:flex-row border-b border-gray-200 text-sm lg:text-base">
                            <!-- Datos de la tabla en formato de columnas para pantallas grandes -->
                            <div class="flex flex-col lg:flex-row w-full">
                                <div class="lg:w-1/6 text-center py-2 text-vh-green hidden lg:block">12345</div>
                                <div class="lg:w-1/6 text-center py-2 text-vh-green hidden lg:block">Juan Pérez</div>
                                <div class="lg:w-1/6 text-center py-2 text-vh-green hidden lg:block">Paracetamol</div>
                                <div class="lg:w-1/6 text-center py-2 text-vh-green hidden lg:block">2024-08-20</div>
                                <div class="lg:w-1/6 text-center py-2 text-vh-green hidden lg:block">Pendiente</div>
                                <!-- Botones de acciones en formato de columnas para pantallas grandes -->
                                <div class="lg:w-1/6 text-center py-2 flex justify-center space-x-2 lg:space-x-4">
                                    <button class="delete-order p-1 lg:p-2">
                                        <img src="{{ asset('storage/svg/trash-icon.svg') }}" alt="Eliminar"
                                            class="w-6 h-6 lg:w-8 lg:h-8 rounded">
                                    </button>
                                </div>
                            </div>

                            <!-- En dispositivos móviles, mostrar los datos en formato de tarjeta -->
                            <div class="lg:hidden flex flex-col border-t border-gray-200">
                                <div class="py-2 px-4 text-vh-green font-semibold">Código: 12345</div>
                                <div class="py-2 px-4 text-vh-green font-semibold">Paciente: Juan Pérez</div>
                                <div class="py-2 px-4 text-vh-green font-semibold">Medicamento: Paracetamol</div>
                                <div class="py-2 px-4 text-vh-green font-semibold">Fecha: 2024-08-20</div>
                                <div class="py-2 px-4 text-vh-green font-semibold">Estado: Pendiente</div>
                                <!-- Botones de acciones en formato de tarjeta para pantallas móviles -->

                            </div>
                        </div>
                        <!-- Fin del ejemplo -->

                        <!-- Repite el bloque de ejemplo según sea necesario para otros pedidos -->

                        <!-- Mensaje si no hay pedidos -->
                        <p class="text-center font-semibold text-sm lg:text-lg text-vh-green my-4">No hay pedidos
                            disponibles para mostrar.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>