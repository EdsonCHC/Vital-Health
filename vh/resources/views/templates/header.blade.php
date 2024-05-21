@vite('resources/css/menu.css')
<header class="w-full h-auto flex justify-start">
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

        <div class="hidden w-2/5 h-auto md:flex items-center justify-end gap-4 p-4">
            <object data="{{ asset('storage/svg/user.svg') }}" type="image/svg+xml"></object>
            <div>
                <p class="font-bold">John Doe</p>
                <p>3rd year</p> <!--Esto para que?-->
            </div>
            <div class="flex flex-col gap-2">
                <a href="#" class="m-0"><img src="{{ asset('storage/svg/noti.svg') }}" alt="noti_icon"
                        class="w-8 p-1 bg-gray-300 rounded-full"></a>
                <a href="#" class="m-0"><img src="{{ asset('storage/svg/config.svg') }}" alt="config_icon"
                        class="w-8 p-1 bg-gray-300 rounded-full"></a>
            </div>
        </div>
    </div>
</header>
