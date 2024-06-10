<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chats</title>
    <link rel="shortcut icon" href="{{asset('storage/svg/favicon.png')}}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/chatsv1.css', 'resources/js/chatsv1.js', 'resources/js/colorsChat.css','resources/css/loader.css', 'resources/js/preloader.js','resources/js/scroll.js'])
</head>

<body class="bg-gray-100">
    @include('templates.loader')
    <div class="w-full h-auto">
        @include('templates.header')
    </div>

        <!-- Inicio del Chat -->
    <section class="min-h-screen flex items-center justify-center">
        <div class="max-w-screen-xl w-full h-[720px] shadow-lg bg-slate-50 relative">
            <!-- Inicio: Contenido -->
            <div class="chat-content">
                <!-- Inicio: lista de chats -->
                <div class="content-sidebar flex flex-col via-vh-green h-full absolute top-0 left-4">
                    <div class="content-sidebar-title text-lg font-semibold text-black p-4">Chats</div>
                    <form action="" class="content-sidebar-form relative p-4">
                        <input type="search" class="content-sidebar-input p-2 border border-slate-300 outline-none w-full rounded pr-8 text-sm" placeholder="Buscar...">
                        <button type="submit" class="content-sidebar-submit absolute top-1/2 transform -translate-y-1/2 right-8 text-slate-400 bg-transparent outline-none border-none cursor-pointer transition-colors duration-150 hover:text-slate-600"><i class="ri-search-line"></i></button>
                    </form>
                    <div class="content-messages overflow-y-auto h-full mt-4">
                        <ul class="content-messages-list list-none p-2">
                            <li class="content-message-title ml-4 mr-4  text-xs font-medium mb-1 relative"><span>Recientes</span></li>
                            <li>
                                <a href="#" data-conversation="#conversation-1" class="flex items-center  p-2 pr-6 hover:bg-slate-50">
                                    <img class="content-message-image w-8 h-8 rounded-full object-cover flex-shrink-0 mr-3" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                                    <span class="content-message-info grid mr-3 w-full">
                                        <span class="content-message-name block text-sm font-medium mb-1">Someone</span>
                                        <span class="content-message-text text-xs truncate">Lorem ipsum dolor sit amet consectetur.</span>
                                    </span>
                                    <span class="content-message-more text-right">
                                        <span class="content-message-unread text-xs font-medium   p-1 rounded-full">5</span>
                                        <span class="content-message-time text-xs  font-medium">12:30</span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-conversation="#conversation-2" class="flex items-center p-2 pr-6 hover:bg-slate-50">
                                    <img class="content-message-image w-8 h-8 rounded-full object-cover flex-shrink-0 mr-3" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                                    <span class="content-message-info grid mr-3 w-full">
                                        <span class="content-message-name block text-sm font-medium mb-1">Someone</span>
                                        <span class="content-message-text text-xs  truncate">Lorem ipsum dolor sit amet consectetur.</span>
                                    </span>
                                    <span class="content-message-more text-right">
                                        <span class="content-message-time text-xs  font-medium">12:30</span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center  p-2 pr-6 hover:bg-slate-50">
                                    <img class="content-message-image w-8 h-8 rounded-full object-cover flex-shrink-0 mr-3" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                                    <span class="content-message-info grid mr-3 w-full">
                                        <span class="content-message-name block text-sm font-medium mb-1">Someone</span>
                                        <span class="content-message-text text-xs  truncate">Lorem ipsum dolor sit amet consectetur.</span>
                                    </span>
                                    <span class="content-message-more text-right">
                                        <span class="content-message-unread text-xs font-medium   p-1 rounded-full">5</span>
                                        <span class="content-message-time text-xs  font-medium">12:30</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- fin: lista de chats -->
                <!-- Inicio: Apartado de conversacion -->
                <div class="conversation conversation-default flex items-center justify-center p-4 pl-64 ">
                    <i class="ri-chat-3-line text-2xl"></i>
                    <p class="mt-4">Seleccione un chat!</p>
                </div>
                <div class="conversation hidden bg-slate-100 h-full pl-52 flex-col" id="conversation-1">
                    <div class="conversation-top p-2 px-4 bg-white flex items-center">
                        <button type="button" class="conversation-back hidden"><i class="ri-arrow-left-line"></i></button>
                        <div class="conversation-user flex items-center">
                            <img class="conversation-user-image w-10 h-10 rounded-full object-cover mr-2" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                            <div>
                                <div class="conversation-user-name font-medium text-base">Doctor</div>
                                <div class="conversation-user-status  text-xs flex items-center">
                                    <span class="inline-block w-2 h-2  rounded-full mr-1"></span>online
                                </div>
                            </div>
                        </div>
                        <div class="conversation-buttons flex items-center ml-auto">
                            <button type="button" class="w-9 h-9 flex items-center justify-center rounded  hover:bg-slate-100 "><i class="ri-vidicon-line"></i></button>
                            <button type="button" class="w-9 h-9 flex items-center justify-center rounded  hover:bg-slate-100 "><i class="ri-information-line"></i></button>
                        </div>
                    </div>
                    <div class="conversation-main overflow-y-auto h-full p-4">
                        <ul class="conversation-wrapper list-none">
                            <div class="coversation-divider text-center text-xs  mb-4 relative">
                                <span class="bg-slate-100 px-2 relative z-10">Hoy</span>
                                <span class="absolute top-1/2 left-0 w-full h-px bg-slate-300 z-0"></span>
                            </div>
                            <li class="conversation-item me flex items-end mb-4 flex-row-reverse">
                                <div class="conversation-item-side ml-2">
                                    <img class="conversation-item-image w-6 h-6 rounded-full object-cover block" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                                </div>
                                <div class="conversation-item-content w-full">
                                    <div class="conversation-item-wrapper mb-2">
                                        <div class="conversation-item-box max-w-4xl relative ml-auto">
                                            <div class="conversation-item-text p-3  shadow-lg text-white text-opacity-80 rounded">
                                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet natus repudiandae quisquam sequi nobis suscipit consequatur rerum alias odio repellat!</p>
                                                <div class="conversation-item-time text-xs text-right  text-opacity-70 mt-1">12:30</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="conversation-item flex items-end mb-4">
                                <div class="conversation-item-side mr-2">
                                    <img class="conversation-item-image w-6 h-6 rounded-full object-cover block" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                                </div>
                                <div class="conversation-item-content w-full">
                                    <div class="conversation-item-wrapper mb-2">
                                        <div class="conversation-item-box max-w-4xl relative mr-auto">
                                            <div class="conversation-item-text p-3 shadow-lg  rounded">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusantium repellendus provident ex, tempora corrupti suscipit, aut quidem esse beatae!</p>
                                                <div class="conversation-item-time text-xs text-right text-slate-400 mt-1">12:30</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="conversation-bottom p-4 flex items-center bg-white">
                        <div class="conversation-form flex items-center w-full">
                            <button type="button" class="conversation-upload flex justify-center items-center bg-slate-100 text-xl text-slate-500 h-10 w-10 rounded-lg"><i class="ri-attachment-2"></i></button>
                            <input type="text" class="conversation-input border border-slate-200 rounded-lg bg-slate-100 h-10 w-full px-2 mx-2 text-sm text-slate-700" placeholder="Escribe un mensaje...">
                            <button type="submit" class="conversation-submit flex justify-center items-center bg-emerald-500 text-xl text-white h-10 w-10 rounded-lg"><i class="ri-send-plane-2-line"></i></button>
                        </div>
                    </div>
                </div>
                <div class="conversation hidden bg-slate-100 h-full pl-52 flex-col" id="conversation-2">
                    <div class="conversation-top p-2 px-4 bg-white flex items-center">
                        <button type="button" class="conversation-back hidden"><i class="ri-arrow-left-line"></i></button>
                        <div class="conversation-user flex items-center">
                            <img class="conversation-user-image w-10 h-10 rounded-full object-cover mr-2" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                            <div>
                                <div class="conversation-user-name font-medium text-base">Alguien</div>
                                <div class="conversation-user-status text-slate-400 text-xs flex items-center">
                                    <span class="inline-block w-2 h-2 bg-emerald-500 rounded-full mr-1"></span>online
                                </div>
                            </div>
                        </div>
                        <div class="conversation-buttons flex items-center ml-auto">
                            <button type="button" class="w-9 h-9 flex items-center justify-center rounded text-slate-600 hover:bg-slate-100 hover:text-slate-700"><i class="ri-vidicon-line"></i></button>
                            <button type="button" class="w-9 h-9 flex items-center justify-center rounded text-slate-600 hover:bg-slate-100 hover:text-slate-700"><i class="ri-information-line"></i></button>
                        </div>
                    </div>
                    <div class="conversation-main overflow-y-auto h-full p-4">
                        <ul class="conversation-wrapper list-none">
                            <div class="coversation-divider text-center text-xs text-slate-400 mb-4 relative">
                                <span class="bg-slate-100 px-2 relative z-10">Hoy</span>
                                <span class="absolute top-1/2 left-0 w-full h-px bg-slate-300 z-0"></span>
                            </div>
                            <li class="conversation-item me flex items-end mb-4 flex-row-reverse">
                                <div class="conversation-item-side ml-2">
                                    <img class="conversation-item-image w-6 h-6 rounded-full object-cover block" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                                </div>
                                <div class="conversation-item-content w-full">
                                    <div class="conversation-item-wrapper mb-2">
                                        <div class="conversation-item-box max-w-4xl relative ml-auto">
                                            <div class="conversation-item-text p-3 bg-emerald-500 shadow-lg text-white text-opacity-80 rounded">
                                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet natus repudiandae quisquam sequi nobis suscipit consequatur rerum alias odio repellat!</p>
                                                <div class="conversation-item-time text-xs text-right text-white text-opacity-70 mt-1">12:30</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="conversation-item flex items-end mb-4">
                                <div class="conversation-item-side mr-2">
                                    <img class="conversation-item-image w-6 h-6 rounded-full object-cover block" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                                </div>
                                <div class="conversation-item-content w-full">
                                    <div class="conversation-item-wrapper mb-2">
                                        <div class="conversation-item-box max-w-4xl relative mr-auto">
                                            <div class="conversation-item-text p-3 bg-white shadow-lg text-slate-800 rounded">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusantium repellendus provident ex, tempora corrupti suscipit, aut quidem esse beatae!</p>
                                                <div class="conversation-item-time text-xs text-right text-slate-400 mt-1">12:30</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="conversation-bottom p-4 flex items-center bg-white">
                        <div class="conversation-form flex items-center w-full">
                            <button type="button" class="conversation-upload flex justify-center items-center bg-slate-100 text-xl text-slate-500 h-10 w-10 rounded-lg"><i class="ri-attachment-2"></i></button>
                            <input type="text" class="conversation-input border border-slate-200 rounded-lg bg-slate-100 h-10 w-full px-2 mx-2 text-sm text-slate-700" placeholder="Escribe un mensaje...">
                            <button type="submit" class="conversation-submit flex justify-center items-center bg-emerald-500 text-xl text-white h-10 w-10 rounded-lg"><i class="ri-send-plane-2-line"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <!-- fin: Contenido -->
        </div>
    </section>

    <div class="w-full h-auto">
        @include('templates.footer')
    </div>

</body>

</html>