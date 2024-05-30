<header>
    <div class="min-h-screen flex font-sans">
        <nav class="hidden lg:flex fixed top-0 left-0 bottom-0 bg-vh-green text-black w-64 overflow-hidden z-10">
            <!-- Nav -->
            <div class="sidebar flex flex-col flex-grow justify-center ">
                <div class="flex flex-col space-y-4">
                    <div
                        class="flex flex-grow items-center ml-14 h-14 rounded-l-3xl transition duration-300 hover:bg-white focus-within:bg-white">
                        <a href="/statistics"
                            class="flex items-center h-full w-full text-md font-bold text-white hover:text-black focus:text-black tracking-wider">
                            <img id="menu-icon" class="h-8 w-8 mx-2" src="{{ asset('storage/svg/homee.svg') }}"
                                alt="Inicio"/>
                            <span class="">Estadisticas</span>
                        </a>
                    </div>
                    <div
                        class="flex flex-grow items-center ml-14 h-14 rounded-l-3xl transition duration-300 hover:bg-white">
                        <a href="/appointment"
                            class="flex items-center h-full w-full text-md font-bold text-white hover:text-black ">
                            <img class="h-8 w-8 mx-2" src="{{ asset('storage/svg/cita.svg') }}" alt="Inicio" />
                            <span class="">Citas</span>
                        </a>
                    </div>
                    <div
                        class="flex flex-grow items-center ml-14 h-14 rounded-l-3xl transition duration-300 hover:bg-white">
                        <a href="#"
                            class="flex items-center h-full w-full text-md font-bold text-white hover:text-black tracking-wider">
                            <img class="h-8 w-8 mx-2" src="{{ asset('storage/svg/doc-icon-black.svg') }}"
                                alt="Inicio" />
                            <span class="">Expedientes</span>
                        </a>
                    </div>
                    <div
                        class="flex flex-grow items-center ml-14 h-14 rounded-l-3xl transition duration-300 hover:bg-white">
                        <a href="#"
                            class="flex items-center h-full w-full text-md font-bold text-white hover:text-black tracking-wider">
                            <img class="h-8 w-8 mx-2" src="{{ asset('storage/svg/chat.svg') }}" alt="Inicio" />
                            <span class="">Chats</span>
                        </a>
                    </div>
                    <div
                        class="flex flex-grow items-center ml-14 h-14 rounded-l-3xl transition duration-300 hover:bg-white">
                        <a href="#"
                            class="flex items-center h-full w-full text-md font-bold text-white hover:text-black tracking-wider">
                            <img class="h-8 w-8 mx-2" src="{{ asset('storage/svg/staff-icon-black.svg') }}"
                                alt="Inicio" />
                            <span class="">Personal</span>
                        </a>
                    </div>
                    <div
                        class="flex flex-grow items-center ml-14 h-14 rounded-l-3xl transition duration-300 hover:bg-white">
                        <a href="#"
                            class="flex items-center h-full w-full text-md font-bold text-white hover:text-black tracking-wider">
                            <img class="h-8 w-8 mx-2" src="{{ asset('storage/svg/calendar.svg') }}" alt="Inicio" />
                            <span class="">Agenta</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom Section -->
            <div class="absolute bottom-0 left-0 right-0 mb-4 px-2">
                <a href="#"
                    class="flex items-center justify-center mb-5 h-14 rounded transition duration-300 hover:bg-white hover:text-black text-white tracking-widest">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="ml-2 text-base font-bold">Salir</span>
                </a>
            </div>
        </nav>

        <!-- Chat -->
        <div class="hidden lg:flex  fixed bottom-0 right-0 mb-4 mr-4">
            <a href="#" class="">
                <img src="{{ asset('storage/svg/chat.svg') }}" alt="chat" class="w-16 p-1 ">
            </a>
        </div>

        <div
            class="md:flex lg:hidden fixed bottom-0 w-full rounded-tl-3xl rounded-tr-3xl  bg-white shadow flex justify-between px-6 py-4">
            <a href="#" class="hover:bg-green-500 rounded-full py-2 transition-colors duration-300">
                <img class="h-8 w-8 mx-2" src="{{ asset('storage/svg/servicio.svg') }}" type="image/svg+xml" />
            </a>
            <a href="#" class="hover:bg-green-500 rounded-full py-2 transition-colors duration-300">
                <img class="h-8 w-8 mx-2" src="{{ asset('storage/svg/paciente.svg') }}" type="image/svg+xml" />
            </a>
            <a href="#"
                class="relative inline-block bg-green-500 rounded-full py-2 px-2 hover:bg-gray-400 transition-colors duration-300">
                <img class="h-8 w-8 mx-2" src="{{ asset('storage/svg/homee.svg') }}" type="image/svg+xml" />
            </a>
            <a href="#" class="hover:bg-green-500 rounded-full py-2 transition-colors duration-300">
                <img class="h-8 w-8 mx-2" src="{{ asset('storage/svg/cita.svg') }}" type="image/svg+xml" />
            </a>
            <a href="#" class="hover:bg-green-500 rounded-full py-2 transition-colors duration-300">
                <img class="h-8 w-8 mx-2" src="{{ asset('storage/svg/calendar.svg') }}" type="image/svg+xml" />
            </a>
        </div>
</header>
