@vite('resources/css/menu.css')
<header class="w-full h-auto flex justify-start">
    <div class="w-full h-full mx-auto flex justify-between">
        <section id="banner" class="sm:hidden">
            <input type="checkbox" id="menu--toggle">
            <label for="menu--toggle" id="trigger"></label>
            <label for="menu--toggle" id="burger"></label>
            <ul id="menu">
                <li class="menu_list"><a href="" class="menu_link">Home</a></li>
                <li class="menu_list"><a href="" class="menu_link">Productos</a></li>
                <li class="menu_list"><a href="" class="menu_link">Servicios</a></li>
                <li class="menu_list"><a href="" class="menu_link">Contactos</a></li>
            </ul>
        </section>
        <ul class="hidden menu-list w-full mt-4 md:flex justify-center gap-10 items-center">
            <li class="font-bold mb-4"><a href="/">Inicio</a></li>
            <li class="font-bold mb-4"><a href="/service">Servicios</a></li>
            <li class="font-bold mb-4">Inicio de sesión</li>
            <li class="font-bold mb-4">Registro</li>
        </ul>
        <div class="hidden w-2/5 h-auto md:flex items-center justify-end gap-4 p-4">
            <object data="{{asset('storage/svg/user.svg')}}" type="image/svg+xml"></object>
            <div>
                <p class="font-bold">John Doe</p>
                <p>3rd year</p> <!--Esto para que?-->
            </div>
            <div class="flex flex-col gap-2">
                <a href="#" class="m-0"><img src="{{asset('storage/svg/noti.svg')}}" alt="noti_icon"
                        class="w-8 p-1 bg-gray-300 rounded-full"></a>
                <a href="#" class="m-0"><img src="{{asset('storage/svg/config.svg')}}" alt="config_icon"
                        class="w-8 p-1 bg-gray-300 rounded-full"></a>
            </div>
        </div>
    </div>
</header>