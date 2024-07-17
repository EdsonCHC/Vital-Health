<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chats</title>
    <link rel="shortcut icon" href="{{asset('storage/svg/favicon.png')}}" type="image/x-icon">
        <!-- Remix icons (Iconos del chat) -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/css/chatsv1.css', 'resources/js/chatsv1.js', 'resources/js/colorsChat.css','resources/css/loader.css', 'resources/js/preloader.js','resources/js/scroll.js'])
</head>

<body class="bg-gray-100">
    @include('templates.loader')
    <div class="w-full h-auto">
        @include('templates.header')
    </div>

    <section class="bg-gray-100 h-screen flex items-center justify-center">
        <section class="w-full lg:w-11/12 xl:w-3/4 h-5/6 bg-white rounded-lg shadow-lg flex flex-col md:flex-row overflow-hidden mx-4 lg:mx-0">
            <!-- Sidebar de Chats -->
            <div id="chat-sidebar" class="w-full md:w-1/3 bg-white border-r overflow-y-auto">
                <div class="p-2 border-b">
                    <h2 class="text-xl font-semibold text-gray-700">Personas</h2>
                    <div class="flex items-center mt-2">
                        <div class="relative flex-grow">
                            <span class="absolute inset-y-0 left-0 pl-2 flex items-center text-gray-400">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" placeholder="Buscar chat" class="w-full pl-8 p-1 border rounded-lg focus:outline-none focus:border-green-500">
                        </div>
                        <button class="ml-2 text-green-900 px-2 py-1 rounded-lg font-bold uppercase">Chat+</button>
                    </div>
                </div>
                <div id="chat-list">
                    <!-- Chat Item -->
                    <div class="flex items-center p-2 cursor-pointer hover:bg-gray-100" onclick="openChat()">
                        <img class="h-8 w-8 rounded-full" src="./solonegociosserios.jpeg" alt="Perfil">
                        <div class="ml-2 flex-grow overflow-hidden">
                            <div class="font-semibold text-gray-700">Doctor</div>
                            <div class="text-xs text-gray-500 overflow-hidden whitespace-nowrap text-ellipsis">Pesquisar chat</div>
                        </div>
                        <div class="ml-auto flex flex-col items-end">
                            <div class="bg-green-400 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center mb-1">3</div>
                            <div class="text-xs text-gray-400">12:34 PM</div>
                        </div>
                    </div>
                    <div class="flex items-center p-2 cursor-pointer hover:bg-gray-100" onclick="openChat()">
                        <img class="h-8 w-8 rounded-full" src="./solonegociosserios.jpeg" alt="Perfil">
                        <div class="ml-2 flex-grow overflow-hidden">
                            <div class="font-semibold text-gray-700">Admin</div>
                            <div class="text-xs text-gray-500 overflow-hidden whitespace-nowrap text-ellipsis">Último mensaje</div>
                        </div>
                        <div class="ml-auto flex flex-col items-end">
                            <div class="bg-green-400 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center mb-1">5</div>
                            <div class="text-xs text-gray-400">12:34 PM</div>
                        </div>
                    </div>
                    <!-- Más elementos de chat pueden ser añadidos aquí -->
                </div>
            </div>

            <!-- Ventana de Chat -->
            <div id="chat-window" class="hidden-on-mobile flex flex-col w-full md:w-2/3 h-full">
                <!-- Barra Superior del Chat -->
                <div class="flex items-center p-2 bg-white border-b">
                    <button class="text-green-800 hover:text-green-500 mr-2 show-on-mobile" onclick="closeChat()">
                        <i class="ri-arrow-left-line text-2xl"></i>
                    </button>
                    <img class="h-8 w-8 rounded-full" src="./solonegociosserios.jpeg" alt="Perfil">
                    <div class="ml-2">
                        <div class="font-semibold text-gray-700">Doctor</div>
                        <div class="text-xs text-gray-500">En línea</div>
                    </div>
                    <div class="ml-auto flex space-x-2">
                        <button class="text-green-800 hover:text-green-500">
                            <i class="ri-video-on-fill text-2xl"></i>
                        </button>
                        <button class="text-green-800 hover:text-green-500">
                            <i class="ri-information-fill text-2xl"></i>
                        </button>
                    </div>
                </div>
                <!-- Área de Mensajes -->
                <div class="flex-1 p-2 overflow-y-auto" id="chat-box">
                    <!-- Mensaje Enviado -->
                    <div class="flex items-end mb-2">
                        <img class="h-6 w-6 rounded-full mr-2" src="./solonegociosserios.jpeg" alt="Perfil">
                        <div class="flex flex-col">
                            <div class="border-2 border-green-800 text-green-900 p-2 rounded-lg text-sm">
                                ¡Hola! ¿Cómo estás?
                            </div>
                            <span class="text-xs text-gray-500 mt-1">12:34 PM</span>
                        </div>
                    </div>
                    <!-- Mensaje Recibido -->
                    <div class="flex items-end justify-end mb-2">
                        <div class="flex flex-col items-end">
                            <div class="bg-green-700 text-white p-2 rounded-lg text-sm">
                                ¡Hola! Estoy bien, ¿y tú?
                            </div>
                            <span class="text-xs text-gray-500 mt-1">12:35 PM</span>
                        </div>
                        <img class="h-6 w-6 rounded-full ml-2" src="./solonegociosserios.jpeg" alt="Perfil">
                    </div>
                </div>
                <!-- Barra de Entrada de Mensaje -->
                <div class="p-2 bg-white border-t sticky bottom-0">
                    <form id="chat-form" class="flex items-center">
                        <input type="text" id="message-input" class="flex-grow p-1 border rounded-l-lg focus:outline-none focus:border-green-500" placeholder="Digite un mensaje">
                        <button type="button" class="text-green-800 hover:text-green-500 px-1">
                            <i class="ri-attachment-line text-2xl"></i>
                        </button>
                        <button type="button" class="text-green-800 hover:text-green-500 px-1">
                            <i class="ri-check-fill text-2xl"></i>
                        </button>
                        <button type="submit" class="text-white bg-green-900 px-2 py-1 rounded-r-lg hover:bg-green-500">
                            <i class="ri-send-plane-2-fill text-lg"></i>
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </section>
    <!--Scrip para mostrar y ocultar chat en movil-->
    <script>
        function openChat() {
            if (window.innerWidth <= 768) {
                document.getElementById('chat-sidebar').classList.add('hidden');
                document.getElementById('chat-window').classList.remove('hidden-on-mobile');
            }
        }

        function closeChat() {
            if (window.innerWidth <= 768) {
                document.getElementById('chat-sidebar').classList.remove('hidden');
                document.getElementById('chat-window').classList.add('hidden-on-mobile');
            }
        }
    </script>
    <div class="w-full h-auto">
        @include('templates.footer_two')
    </div>
</body>
</html>
