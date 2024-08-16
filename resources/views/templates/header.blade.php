@vite('resources/css/menu.css')
<header class="w-full h-20 flex z-20 bg-vh-green-medium-2">
    <div class="w-full h-full mx-auto flex justify-between">
        {{-- View Mobile --}}
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


        {{-- View Desktop --}}
        <ul class="hidden menu-list w-full mt-4 md:flex justify-center gap-10 items-center">
            <li class="-mt-4 mr-auto"><a href="/"><img src="{{ asset('storage/svg/logo-icon-white.svg') }}"
                        alt="noti_icon" class="h-24">
                </a>
            </li>
            <li class="font-bold text-white tracking-wider mb-4"><a href="/">Inicio</a></li>
            <li class="font-bold mb-4 relative group text-white tracking-wider">
                <a href="/area">Especialidades Medicas</a>
                <ul class="absolute hidden bg-white py-2 px-4 shadow-md w-full z-10 group-hover:block rounded-sm">
                    <li><a href="/service/support" class="block p-1 text-vh-green hover:bg-gray-200 rounded-sm">Medicina</a></li>
                    <li><a href="/citas" class="block p-1 text-vh-green hover:bg-gray-200 rounded-sm">Citas</a></li>
                    <li><a href="/service/contact" class="block p-1 text-vh-green hover:bg-gray-200 rounded-sm">Examenes</a></li>
                    <li><a href="/service/contact" class="block p-1 text-vh-green hover:bg-gray-200 rounded-sm">Control Personal</a></li>
                </ul>
            </li>
            <li class="font-bold mb-4 text-white tracking-wider"><a href="/report">Reporte</a></li>
            <li class="font-bold mb-4 text-white tracking-wider"><a href="/about">Acerca de</a></li>
        </ul>
        <div class="hidden w-1/2 h-auto md:flex items-center justify-end gap-4 pr-4 mt-2">
            <div class="flex w-24 justify-between">
                <a href="#">
                    <img src="{{ asset('storage/svg/noti.svg') }}" alt="config_icon"
                        class="w-10 p-2 bg-vh-gray-light rounded-full"> </a>
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
            <a href="/user">
                <img src="{{ asset('storage/svg/user.svg') }}" alt="noti_icon" class="w-full p-2 bg-vh-gray-light rounded-full">
            </a>
        </div>

    </div>
</header>
