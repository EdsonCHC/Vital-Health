@vite('resources/css/menu.css')
<div class="relative min-h-screen flex font-sans">

    <div class="sidebar bg-gray-100 text-black w-64 space-y-6 py-7 px-2 relative">
        <!-- Logo -->
        <div class="flex items-center px-4">
            <img class="" src="{{asset('storage/svg/logo.svg')}}" type="image/svg+xml" />
        </div>
        <!--  Nav -->
        <nav class="flex flex-col">
            <div>
                <a href="#"
                    class="flex items-center justify-center block py-2.5 rounded transition duration-200 hover:bg-vh-green-medium hover:text-white text-black">
                    <span class="text-base">Inicio</span>
                </a>
                <a href="#"
                    class="flex items-center justify-center block py-2.5 rounded transition duration-200 hover:bg-vh-green-medium hover:text-white text-black">
                    <span class="text-base">Servicio</span>
                </a>
                <a href="#"
                    class="flex items-center justify-center block py-2.5 rounded transition duration-200 hover:bg-vh-green-medium hover:text-white text-black">
                    <span class="text-base">Paciente</span>
                </a>
                <a href="#"
                    class="flex items-center justify-center block py-2.5 rounded transition duration-200 hover:bg-vh-green-medium hover:text-white text-black">
                    <span class="text-base">Citas</span>
                </a>
                <a href="#"
                    class="flex items-center justify-center block mb- py-2.5 rounded transition duration-200 hover:bg-vh-green-medium hover:text-white text-black">
                    <span class="text-base">Programacion</span>
                </a>
                <!--  logout-->

            </div>
            <div class=" mt-40 "> 
                <a href="#"
                    class="flex items-center justify-center block py-2.5 rounded transition duration-200 hover:bg-vh-green hover:text-white text-black">
                    <span class="text-base">Salir</span>
                </a>
                <p class=" pt-24 text-center ">©2024 Vital Health.Todos los derechos reservados</p>
            </div>

        </nav>
    </div>

</div>