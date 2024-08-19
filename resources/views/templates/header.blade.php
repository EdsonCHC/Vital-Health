@auth
    @vite('resources/css/menu.css', 'resources/js/noti.js')
    <header class="w-full h-20 flex z-20 bg-vh-green-medium-2">
        <div class="w-full h-full mx-auto flex justify-between items-center px-4">
            {{-- View Mobile --}}
            <section id="banner" class="sm:hidden">
                <input type="checkbox" id="menu--toggle" class="checkbox-menu">
                <label for="menu--toggle" id="trigger" class="cursor-pointer"></label>
                <label for="menu--toggle" id="burger" class="cursor-pointer"></label>
                <ul id="menu" class="absolute top-16 left-0 bg-vh-green-medium-2 w-full shadow-lg">
                    <li class="menu_list"><a href="/" class="menu_link">Home</a></li>
                    <li class="menu_list"><a href="" class="menu_link">Produtos</a></li>
                    <li class="menu_list"><a href="/service" class="menu_link">Servicios</a></li>
                    <li class="menu_list"><a href="" class="menu_link">Contacto</a></li>
                </ul>
            </section>

            {{-- View Desktop --}}
            <ul class="hidden menu-list w-full mt-4 md:flex justify-center gap-10 items-center">
                <li class="-mt-4 mr-auto"><a href="/"><img src="{{ asset('storage/svg/logo-icon-white.svg') }}"
                            alt="logo" class="h-24"></a>
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
                    <button id="notification-button" class="noti">
                        <img src="{{ asset('storage/svg/noti.svg') }}" alt="noti_icon" class="w-10 p-2 bg-vh-gray-light rounded-full">
                    </button>
                    <div id="notification-container" class="hidden absolute right-0 mt-14 mr-4 w-64 bg-white shadow-lg rounded-lg">
                        <ul class="p-4">
                            <li class="border-b py-2">Notificación 1</li>
                            <li class="border-b py-2">Notificación 2</li>
                            <li class="py-2">Notificación 3</li>
                        </ul>
                    </div>

                    <div class="relative group">
                        <a href="">
                            <img src="{{ asset('storage/svg/config.svg') }}" alt="config_icon" class="w-10 p-2 bg-vh-gray-light rounded-full">
                        </a>
                        <ul class="absolute hidden bg-white p-1 shadow-md w-full z-10 group-hover:block border border-solid border-black rounded-xl">
                            <li><a href="#" class="block py-1 w-8">
                                <img src="{{ asset('storage/svg/calendar.svg') }}" alt="noti_icon" class="w-full p-2 bg-vh-gray-light rounded-full">
                                </a>
                            </li>
                            <li><a href="/videollamada" class="block py-1 w-8">
                                <img src="{{ asset('storage/svg/video-icon.svg') }}" alt="noti_icon" class="w-full p-2 bg-vh-gray-light rounded-full">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="/user" class="w-10 h-auto">
                    @if (Auth::check())
                        <img src="{{ Auth::user()->img }}" alt="user_icon" class="w-full h-full p-[2px] bg-vh-gray-light rounded-full">
                    @else
                        <img src="{{ asset('storage/svg/user.svg') }}" alt="user_icon" class="w-full p-2 bg-vh-gray-light rounded-full">
                    @endif
                </a>
            </div>
        </div>
    </header>
@else
    @vite('resources/css/menu.css')
    <header class="w-full h-20 flex items-center justify-between px-6 bg-vh-green-medium-2 shadow-md">
        <a href="/" class="flex items-center">
            <img src="{{ asset('storage/svg/logo-icon-white.svg') }}" alt="logo" class="h-16">
        </a>
        <div class="ml-auto">
            <a href="/login"
               class="inline-block px-6 py-2 text-white font-semibold bg-green-900 hover:bg-green-700 rounded-lg shadow-md transition duration-200 ease-in-out">
               Login
            </a>
        </div>
    </header>
@endguest
