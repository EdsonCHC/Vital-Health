<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chats</title>
    @vite(['resources/css/app.css', 'resources/css/chatsv1.css', 'resources/js/chatsv1.js', 'resources/js/colorsChat.css','resources/css/loader.css', 'resources/js/preloader.js'])
</head>

<body class="bg-gray-100">
    @include('templates.loader')
    <div class="w-full h-auto">
        @include('templates.header')
    </div>

    <!-- Inicio del Chat -->
<section class="chat-section">
    <div class="chat-container">
        <!-- Inicio: Contenido -->
        <div class="chat-content">
            <!-- Inicio: lista de chats -->
            <div class="content-sidebar">
                <div class="content-sidebar-title">Chats</div>
                <form action="" class="content-sidebar-form">
                    <input type="search" class="content-sidebar-input" placeholder="Buscar...">
                    <button type="submit" class="content-sidebar-submit"><i class="ri-search-line"></i></button>
                </form>
                <div class="content-messages">
                    <ul class="content-messages-list">
                        <li class="content-message-title"><span>Recientes</span></li>
                        <li>
                            <a href="#" data-conversation="#conversation-1">
                                <img class="content-message-image" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                                <span class="content-message-info">
                                    <span class="content-message-name">Someone</span>
                                    <span class="content-message-text">Lorem ipsum dolor sit amet consectetur.</span>
                                </span>
                                <span class="content-message-more">
                                    <span class="content-message-unread">5</span>
                                    <span class="content-message-time">12:30</span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-conversation="#conversation-2">
                                <img class="content-message-image" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                                <span class="content-message-info">
                                    <span class="content-message-name">Someone</span>
                                    <span class="content-message-text">Lorem ipsum dolor sit amet consectetur.</span>
                                </span>
                                <span class="content-message-more">
                                    <span class="content-message-time">12:30</span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img class="content-message-image" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                                <span class="content-message-info">
                                    <span class="content-message-name">Someone</span>
                                    <span class="content-message-text">Lorem ipsum dolor sit amet consectetur.</span>
                                </span>
                                <span class="content-message-more">
                                    <span class="content-message-unread">5</span>
                                    <span class="content-message-time">12:30</span>
                                </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- fin: lista de chats -->
            <!-- Inicio: Apartado de conversacion -->
            <div class="conversation conversation-default active">
                <i class="ri-chat-3-line"></i>
                <p>Seleccione un chat!</p>
            </div>
            <div class="conversation" id="conversation-1">
                <div class="conversation-top">
                    <button type="button" class="conversation-back"><i class="ri-arrow-left-line"></i></button>
                    <div class="conversation-user">
                        <img class="conversation-user-image" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                        <div>
                            <div class="conversation-user-name">Doctor</div>
                            <div class="conversation-user-status online">online</div>
                        </div>
                    </div>
                    <div class="conversation-buttons">
                        <button type="button"><i class="ri-vidicon-line"></i></button>
                        <button type="button"><i class="ri-information-line"></i></button>
                    </div>
                </div>
                <div class="conversation-main">
                    <ul class="conversation-wrapper">
                        <div class="coversation-divider"><span>Hoy</span></div>
                        <li class="conversation-item me">
                            <div class="conversation-item-side">
                                <img class="conversation-item-image" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                            </div>
                            <div class="conversation-item-content">
                                <div class="conversation-item-wrapper">
                                    <div class="conversation-item-box">
                                        <div class="conversation-item-text">
                                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet natus repudiandae quisquam sequi nobis suscipit consequatur rerum alias odio repellat!</p>
                                            <div class="conversation-item-time">12:30</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="conversation-item">
                            <div class="conversation-item-side">
                                <img class="conversation-item-image" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                            </div>
                            <div class="conversation-item-content">
                                <div class="conversation-item-wrapper">
                                    <div class="conversation-item-box">
                                        <div class="conversation-item-text">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis. Iste natus est aliquam ipsum doloremque fugiat, quidem eos autem? Dolor quisquam laboriosam enim cum laborum suscipit perferendis adipisci praesentium.</p>
                                            <div class="conversation-item-time">12:30</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="conversation-item me">
                            <div class="conversation-item-side">
                                <img class="conversation-item-image" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                            </div>
                            <div class="conversation-item-content">
                   

                                <div class="conversation-item-wrapper">
                                    <div class="conversation-item-box">
                                        <div class="conversation-item-text">
                                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium blanditiis ea, voluptatum, eveniet at harum minima maxime enim aut non, iure expedita excepturi tempore nostrum quasi natus voluptas dolore ducimus!</p>
                                            <div class="conversation-item-time">12:30</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="conversation-form">
                    <div class="conversation-form-group">
                        <textarea class="conversation-form-input" rows="1" placeholder="Escribe..."></textarea>
                        <button type="button" class="conversation-form-record"><i class="ri-attachment-line"></i></button>
                    </div>
                    <button type="button" class="conversation-form-button conversation-form-submit"><i class="ri-send-plane-2-line"></i></button>
                </div>
            </div>
            <div class="conversation" id="conversation-2">
                <div class="conversation-top">
                    <button type="button" class="conversation-back"><i class="ri-arrow-left-line"></i></button>
                    <div class="conversation-user">
                        <img class="conversation-user-image" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                        <div>
                            <div class="conversation-user-name">Doctor</div>
                            <div class="conversation-user-status online">online</div>
                        </div>
                    </div>
                    <div class="conversation-buttons">
                        <button type="button"><i class="ri-vidicon-line"></i></button>
                        <button type="button"><i class="ri-information-line"></i></button>
                    </div>
                </div>

                <div class="conversation-form">
                    <div class="conversation-form-group">
                        <textarea class="conversation-form-input" rows="1" placeholder="Escribe..."></textarea>
                        <button type="button" class="conversation-form-record"><i class="ri-mic-line"></i></button>
                    </div>
                    <button type="button" class="conversation-form-button conversation-form-submit"><i class="ri-send-plane-2-line"></i></button>
                </div>
            </div>
            <!-- Fin: Apartado de conversacion -->
        </div>
        <!-- fin: Contenido -->
    </div>
</section>
<!-- Fin: del Chat -->

    <div class="w-full h-auto">
        @include('templates.footer')
    </div>

</body>

</html>