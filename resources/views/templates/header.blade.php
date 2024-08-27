@auth
    @vite('resources/css/menu.css', 'resources/js/noti.js')
    <header class="w-full h-20 flex z-20 bg-vh-green-medium-2">
        <div class="w-full h-full mx-auto flex justify-between items-center px-4">
            <!-- Logo a la izquierda -->
            <a href="/" class="flex items-center">
                <img src="{{ asset('storage/svg/logo-icon-white.svg') }}" alt="logo" class="h-16 md:h-24">
            </a>

            <!-- Menú hamburguesa para dispositivos móviles -->
            <div class="flex items-center md:hidden">
                <button id="mobile-menu-button">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Menú para pantallas grandes -->
            <ul class="hidden md:flex justify-center gap-10 items-center">
                <li class="font-bold text-white tracking-wider"><a href="/">Inicio</a></li>
                <li class="font-bold relative group text-white tracking-wider">
                    <a href="/area">Especialidades Medicas</a>
                    <ul class="absolute hidden bg-white py-2 px-4 shadow-md w-full z-10 group-hover:block rounded-sm">
                        <li><a href="/medicina" class="block p-1 text-vh-green hover:bg-gray-200 rounded-sm">Medicina</a>
                        </li>
                        <li><a href="/citas" class="block p-1 text-vh-green hover:bg-gray-200 rounded-sm">Citas</a></li>
                        <li><a href="/examen" class="block p-1 text-vh-green hover:bg-gray-200 rounded-sm">Exámenes</a></li>
                </li>
            </ul>
            </li>
            <li><a href="/reunion" class="font-bold text-white tracking-wider">Reuniones</a>
            <li class="font-bold text-white tracking-wider"><a href="/about">Acerca de VH</a></li>
            </ul>

            <!-- Controles de usuario y notificaciones -->
            <div class="hidden md:flex items-center gap-4 pr-4">
                <a href="/user" class="w-[50px] h-[50px]">
                    @if (Auth::check())
                        <img src="storage/profile_images/{{ Auth::user()->img }}" alt="user_icon"
                            class="w-full h-full bg-vh-gray-light rounded-full border-solid border-[2px]">
                    @else
                        <img src="{{ asset('storage/svg/user.svg') }}" alt="user_icon"
                            class="w-full p-2 bg-vh-gray-light rounded-full">
                    @endif
                </a>
            </div>
        </div>

        <!-- Menú para móviles -->
        <div id="mobile-menu" class="hidden fixed top-20 right-0 w-full bg-vh-green-medium-2 md:hidden">
            <ul class="flex flex-col gap-4 p-4">
                <li class="font-bold text-white"><a href="/">Inicio</a></li>
                <li class="font-bold text-white"><a href="/area">Especialidades Medicas</a></li>
                <li class="font-bold text-white"><a href="/medicina">Medicina</a></li>
                <li class="font-bold text-white"><a href="/citas">Citas</a></li>
                <li class="font-bold text-white"><a href="/examen">Exámenes</a></li>
                <li class="font-bold text-white"><a href="/reunion">Reuniones</a></li>
                <li class="font-bold text-white"><a href="/about">Acerca de VH</a></li>
                <li class="font-bold text-white"><a href="/user">Perfil</a></li>
            </ul>
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

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
</script>
