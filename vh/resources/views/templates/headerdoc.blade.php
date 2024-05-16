<div class=" relative min-h-screen flex font-sans">
    <nav class="hidden lg:flex fixed top-0 left-0 bottom-0 bg-gray-100 text-black w-64 overflow-hidden z-10 flex flex-col">
        <!-- Logo -->
        <div class="flex items-center px-4">
            <img class="" src="{{asset('storage/svg/logo.svg')}}" type="image/svg+xml" />
        </div>
        <!-- Nav -->
        <div class=" sidebar flex flex-col space-y-6 py-4 px-2 relative flex-grow">
            <div class="flex flex-col space-y-4">
                <div
                    class="flex items-center justify-center  py-2.5 rounded transition duration-200 hover:bg-vh-green-medium text-black w-full">
                    <div class="w-1/2 flex justify-end">
                        <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/homee.svg')}}" type="image/svg+xml" />
                    </div>
                    <div class="w-1/2 flex justify-start">
                        <a href="#" class="">
                            <span class="text-md font-bold">Inicio</span>
                        </a>
                    </div>
                </div>
                <div
                    class="flex items-center justify-center  py-2.5 rounded transition duration-200 hover:bg-vh-green-medium text-black w-full">
                    <div class="w-1/2 flex justify-end">
                        <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/servicio.svg')}}" type="image/svg+xml" />
                    </div>
                    <div class="w-1/2 flex justify-start">
                        <a href="#"
                            class="flex items-center justify-center  py-2.5 rounded transition duration-200 hover:bg-vh-green-medium  text-black">
                            <span class="text-md font-bold ">Servicio</span>
                        </a>
                    </div>
                </div>
                <div
                    class="flex items-center justify-center  py-2.5 rounded transition duration-200 hover:bg-vh-green-medium text-black w-full">
                    <div class="w-1/2 flex justify-end">
                        <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/paciente.svg')}}" type="image/svg+xml" />
                    </div>
                    <div class="w-1/2 flex justify-start">
                        <a href="#"
                            class="flex items-center justify-center block py-2.5 rounded transition duration-200 hover:bg-vh-green-medium  text-black">
                            <span class="text-md font-bold">Paciente</span>
                        </a>
                    </div>
                </div>
                <div
                    class="flex items-center justify-center  py-2.5 rounded transition duration-200 hover:bg-vh-green-medium text-black w-full">
                    <div class="w-1/2 flex justify-end">
                        <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/cita.svg')}}" type="image/svg+xml" />
                    </div>
                    <div class="w-1/2 flex justify-start">
                        <a href="#"
                            class="flex items-center justify-center  py-2.5 rounded transition duration-200 hover:bg-vh-green-medium text-black">
                            <span class="text-md font-bold">Citas</span>
                        </a>
                    </div>
                </div>
                <div
                    class="flex items-center justify-center  py-2.5 rounded transition duration-200 hover:bg-vh-green-medium text-black w-full">
                    <div class="w-1/2 flex justify-end">
                        <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/programacion.svg')}}"
                            type="image/svg+xml" />
                    </div>
                    <div class="w-1/2 flex justify-start">
                        <a href="#"
                            class="flex items-center justify-center  mb- py-2.5 rounded transition duration-200 hover:bg-vh-green-medium  text-black">
                            <span class="text-md font-bold">Programacion</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Bottom Section -->
            <div class="absolute bottom-0 left-0 right-0 mb-4 px-2">
                <a href="#"
                    class="flex items-center justify-center  block py-2.5 rounded transition duration-200 hover:bg-vh-green hover:text-white text-black">
                    <span class="text-base font-semibold ">Salir</span>
                </a>
                <p class="text-center text-base font-semibold px-2 py-2">©2024 Vital Health.Todos los derechos
                    reservados</p>
            </div>
        </div>
    </nav>
</div>