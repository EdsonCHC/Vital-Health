<header class="w-full h-auto flex justify-start p-4">
    <div class="w-full h-full">
        <div class="w-full h-full mx-auto flex justify-between">
            <object id="menuIcon" data="{{asset('storage/svg/menu.svg')}}" type="image/svg+xml" width="50" height="50" class="menu-button float-right p-2 bg-vh-green rounded-lg cursor-pointer lg:hidden"></object>
            <ul class="hidden menu-list w-full mt-4 lg:flex justify-center gap-10">
                <li class="font-bold mb-4">Inicio</li>
                <li class="font-bold mb-4">Servicios</li>
                <li class="font-bold mb-4">Inicio de sesión</li>
                <li class="font-bold mb-4">Registro</li>
            </ul>
            <div class="w-2/5 h-auto flex flex-row items-center">
                <object data="{{asset('storage/svg/user.svg')}}" type="image/svg+xml"></object>
                <div>
                    <p class="font-bold">John Doe</p>
                    <p>3rd year</p> <!--Esto para que?-->
                </div>
                <div class="">
                    <a href="#"><img src="{{asset('storage/svg/noti.svg')}}" alt="noti_icon"></a>
                    <a href="#"><img src="{{asset('storage/svg/config.svg')}}" alt="config_icon"></a>
                </div>
            </div>
        </div>

        </div>      
        </div>
    </div>
</header>