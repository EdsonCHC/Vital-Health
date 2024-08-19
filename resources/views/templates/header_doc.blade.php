<!-- Resoluciones altas -->
 <nav class="hidden lg:flex rounded-md w-60 h-screen flex-col justify-between overflow-y-auto">
  <div class="bg-gray-50 h-full">
    <div class="flex justify-center py-10 shadow-sm pr-4">
      <object data="{{asset('storage/svg/logo.svg')}}" class="w-64" type="image/svg+xml"></object>
    </div>
    <div class="px-5">
      <ul class="space-y-8">
        <div class="sidebar flex flex-col space-y-6 py-4 px-2 relative flex-grow">
          <div class="flex flex-col space-y-4">
            <div
              class="flex items-center py-2 rounded transition duration-200 hover:bg-green-200 text-black w-full cursor-pointer">
              <a href="/doctor" class="w-full flex items-center">
                <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/homee.svg')}}" type="image/svg+xml" />
                <p>Inicio</p>
              </a>
            </div>
            <div
              class="flex items-center py-2 rounded transition duration-200 hover:bg-green-200 text-black w-full cursor-pointer">
              <a href="/service_doc" class="w-full flex items-center">
                <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/servicio.svg')}}" type="image/svg+xml" />
                <p>Servicio</p>
              </a>
            </div>
            <div
              class="flex items-center py-2 rounded transition duration-200 hover:bg-green-200 text-black w-full cursor-pointer">
              <a href="/files_doc" class="w-full flex items-center">
                <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/paciente.svg')}}" type="image/svg+xml" />
                <p>Expedientes</p>
              </a>
            </div>
            <div
              class="flex items-center py-2 rounded transition duration-200 hover:bg-green-200 text-black w-full cursor-pointer">
              <a href="/citas_doc" class="w-full flex items-center">
                <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/cita.svg')}}" type="image/svg+xml" />
                <p>Citas</p>
              </a>
            </div>
            <div
              class="flex items-center py-2 rounded transition duration-200 hover:bg-green-200 text-black w-full cursor-pointer">
              <a href="/program_doc" class="w-full flex items-center">
                <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/calendar.svg')}}" type="image/svg+xml" />
                <p>Programación</p>
              </a>
            </div>
          </div>
        </div>
        <!-- Campo de Token CSRF -->
        <input type="hidden" id="_token" value="{{ csrf_token() }}">
        <!-- Botón de Cierre de Sesión -->
        <div class="absolute bottom-0 left-0 right-0 mb-4 px-2">
          <a href="#" id="log_out"
            class="flex items-center justify-center mb-5 h-14 rounded transition duration-300 bg-vh-green hover:bg-vh-gray hover:text-black text-white tracking-widest">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span class="ml-2 text-base font-bold">Salir</span>
          </a>
        </div>
      </ul>
    </div>
  </div>
  </nav>

  <!-- Resoluciones medias y pequeñas -->
  <div
    class="fixed bottom-0 w-full bg-white shadow lg:hidden flex justify-between px-6 py-4 rounded-tl-3xl rounded-tr-3xl">
    <a href="/service_doc" class="hover:bg-green-500 rounded-full py-2 transition-colors duration-300">
      <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/servicio.svg')}}" alt="Servicio" />
    </a>
    <a href="/files_doc" class="hover:bg-green-500 rounded-full py-2 transition-colors duration-300">
      <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/paciente.svg')}}" alt="Expedientes" />
    </a>
    <a href="/doctor"
      class="relative bg-green-500 rounded-full py-2 px-2 hover:bg-gray-400 transition-colors duration-300">
      <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/homee.svg')}}" alt="Inicio" />
    </a>
    <a href="/citas_doc" class="hover:bg-green-500 rounded-full py-2 transition-colors duration-300">
      <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/cita.svg')}}" alt="Citas" />
    </a>
    <a href="/program_doc" class="hover:bg-green-500 rounded-full py-2 transition-colors duration-300">
      <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/calendar.svg')}}" alt="Programación" />
    </a>
  </div>
