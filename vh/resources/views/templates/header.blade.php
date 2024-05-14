@vite('resources/css/menu.css')
<header class="w-full h-auto flex justify-start p-4">
    <div class="w-full h-full mx-auto flex justify-between">
        <section id="banner" class="sm:hidden">
            <input type="checkbox" id="menu--toggle">
            <label for="menu--toggle" id="trigger"></label>
            <label for="menu--toggle" id="burger"></label>
            <ul id="menu">
                <li><a href="">Home</a></li>
                <li><a href="">Produtos</a></li>
                <li><a href="">Serviços</a></li>
                <li><a href="">Contato</a></li>
            </ul>
        </section>
        <ul class="hidden menu-list w-full mt-4 lg:flex justify-center gap-10">
            <li class="font-bold mb-4"><a href="/">Inicio</a></li>
            <li class="font-bold mb-4"><a href="/service">Servicios</a></li>
            <li class="font-bold mb-4">Inicio de sesión</li>
            <li class="font-bold mb-4">Registro</li>
        </ul>
        <div class="hidden w-2/5 h-auto lg:flex lg:flex-row items-center justify-end gap-4">
            <object data="{{asset('storage/svg/user.svg')}}" type="image/svg+xml"></object>
            <div>
                <p class="font-bold">John Doe</p>
                <p>3rd year</p> <!--Esto para que?-->
            </div>
            <div class="flex flex-col gap">
                <a href="#" class="m-0"><img src="{{asset('storage/svg/noti.svg')}}" alt="noti_icon"
                        class="w-8 p-1 bg-gray-300 rounded-full"></a>
                <a href="#" class="m-0"><img src="{{asset('storage/svg/config.svg')}}" alt="config_icon"
                        class="w-8 p-1 bg-gray-300 rounded-full"></a>
            </div>
        </div>
    </div>
</header>