<!-- component -->
<nav class="hidden lg:flex  rounded-md w-72 h-screen flex-col justify-between">
  <div class=" bg-gray-50 h-full">
    <div class="flex  justify-center py-10 shadow-sm pr-4">
      <object data="{{asset('storage/svg/logo.svg')}}" class="w-64" type="image/svg+xml"></object>
    </div>
    <div class="px-5">
      <ul class="space-y-8 ">
        <div class="sidebar flex flex-col space-y-6 py-4 px-2 relative flex-grow">
          <div class="flex flex-col space-y-4">
            <div class="flex items-center py-2 rounded transition duration-200 hover:bg-green-200 text-black w-full">
              <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/homee.svg')}}" type="image/svg+xml" />
              <a href="#" class="text-md ">Inicio</a>
            </div>
            <div class="flex items-center py-2 rounded transition duration-200 hover:bg-green-200 text-black w-full">
              <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/servicio.svg')}}" type="image/svg+xml" />
              <a href="#" class="text-md">Servicio</a>
            </div>
            <div class="flex items-center py-2 rounded transition duration-200 hover:bg-green-200 text-black w-full">
              <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/paciente.svg')}}" type="image/svg+xml" />
              <a href="#" class="text-md ">Paciente</a>
            </div>
            <div class="flex items-center py-2 rounded transition duration-200 hover:bg-green-200 text-black w-full">
              <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/cita.svg')}}" type="image/svg+xml" />
              <a href="#" class="text-md ">Citas</a>
            </div>
            <div class="flex items-center py-2 rounded transition duration-200 hover:bg-green-200 text-black w-full">
              <img class="h-8 w-8 mx-2" src="{{asset('storage/svg/programacion.svg')}}" type="image/svg+xml" />
              <a href="#" class="text-md ">Programacion</a>
            </div>
          </div>
        </div>
        <div class="flex flex-col items-center  py-2 font-semibold  hover:text-vh-green cursor-pointer">
          <div class="flex items-center ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <a href="#">Salir</a>
          </div>
        </div>
      </ul>
    </div>
</nav>
<div class="hidden lg:flex lg:fixed lg:top-0 lg:right-0 lg:items-center lg:justify-end lg:gap-4 lg:p-4">
  <object data="{{asset('storage/svg/doc.svg')}}" type="image/svg+xml"></object>
  <div>
    <p class="font-bold">John Doe</p>
    <p class="font-semibold text-center">Doctor</p>
  </div>
  <div class="flex gap-2">
    <a href="#" class="m-0"><img src="{{asset('storage/svg/config.svg')}}" alt="config_icon" class="w-8 p-1 "></a>
  </div>
</div>
<div class="hidden lg:flex  fixed bottom-0 right-0 mb-4 mr-4">
    <object data="{{asset('storage/svg/chat.svg')}}" type="image/svg+xml"></object>
</div>