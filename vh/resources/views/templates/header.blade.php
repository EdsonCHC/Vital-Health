@vite('resources/css/menu.css')
<header class="w-full h-auto flex justify-start z-20">
    <div class="w-full h-full mx-auto flex justify-between">
        <section id="banner" class="sm:hidden">
            <input type="checkbox" id="menu--toggle" class="checkbox-menu">
            <label for="menu--toggle" id="trigger"></label>
            <label for="menu--toggle" id="burger"></label>
            <ul id="menu">
                <li class="menu_list"><a href="/" class="menu_link">Home</a></li>
                <li class="menu_list"><a href="" class="menu_link">Produtos</a></li>
                <li class="menu_list"><a href="/service" class="menu_link">Servicios</a></li>
                <li class="menu_list"><a href="" class="menu_link">Contacto</a></li>
            </ul>
        </section>
        <ul class="hidden menu-list w-full mt-4 md:flex justify-center gap-10 items-center">
            <li class="-mt-4 mr-auto"><a href="/"><img src="{{ asset('storage/svg/logo.svg') }}" alt="noti_icon"
                        class="h-24">
                </a>
            </li>
            <li class="font-bold mb-4"><a href="/">Inicio</a></li>
            <li class="font-bold mb-4 relative group">
                <a href="/service">Atención al cliente</a>
                <ul class="absolute hidden bg-white py-2 px-4 shadow-md w-full z-10 group-hover:block">
                    <li><a href="/service/support" class="block py-1 hover:bg-gray-100">Medicina</a></li>
                    <li><a href="/service/faq" class="block py-1 hover:bg-gray-100">Citas</a></li>
                    <li><a href="/service/contact" class="block py-1 hover:bg-gray-100">Examenes</a></li>
                    <li><a href="/service/contact" class="block py-1 hover:bg-gray-100">Control Personal</a></li>
                </ul>
            </li>
            <li class="font-bold mb-4"><a href="/service">Servicios</a></li>
            <li class="font-bold mb-4"><a href="/report">Reporte</a></li>
            <li class="font-bold mb-4"><a href="/about">Acerca de</a></li>
            <li class="font-bold mb-4"><a href="/registro">Registro</a></li>
        </ul>

        <div class="hidden w-1/2 h-auto md:flex items-center justify-end gap-4 p-4">
            <div class="flex w-24 justify-between">
                <a href="#">
                    <img src="{{ asset('storage/svg/noti.svg') }}" alt="noti_icon"
                        class="w-10 p-2 bg-vh-gray-light rounded-full">
                </a>
                <div class="relative group">
                    <a href="">
                        <img src="{{ asset('storage/svg/config.svg') }}" alt="config_icon"
                            class="w-10 p-2 bg-vh-gray-light rounded-full">
                    </a>
                    <ul
                        class="absolute hidden bg-white p-1 shadow-md w-full z-10 group-hover:block border border-solid border-black rounded-xl">
                        <li><a href="#" class="block py-1 w-8">
                                <img src="{{ asset('storage/svg/calendar.svg') }}" alt="noti_icon"
                                    class="w-full p-2 bg-vh-gray-light rounded-full">
                            </a>
                        </li>
                        <li><a href="#" class="block py-1 w-8">
                                <img src="{{ asset('storage/svg/chat-icon-second.svg') }}" alt="noti_icon"
                                    class="w-full p-2 bg-vh-gray-light rounded-full">
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </div>
            <div class="flex flex-col items-start">
                <p class="font-bold">John Doe</p>
                <p class="text-vh-green font-bold">#1345</p>
            </div>
            <object data="{{ asset('storage/svg/user.svg') }}" type="image/svg+xml" class="w-10 h-10"></object>
        </div>

    </div>
</header>