<header>
  <div class="relative min-h-screen flex font-sans">
  <nav
    class="hidden lg:flex fixed top-0 left-0 bottom-0 bg-vh-green text-black w-64 overflow-hidden z-10"
  >

    <!-- Nav -->
    <div class="sidebar flex flex-col relative flex-grow justify-center ">
      <div class="flex flex-col space-y-4">
        <div class="flex items-center py-2.5 ml-14 rounded-l-3xl transition duration-200 hover:bg-white ">
            <a href="#" class="flex items-center h-10 pr-28 text-md font-bold text-white hover:text-black tracking-wider">
                <img class="h-8 w-8 mx-2 " src="{{asset('storage/svg/homee.svg')}}" type="image/svg+xml" />
                <span class="py-5">Inicio</span>
            </a>
          </div>
        <div
          class="flex items-center justify-center py-2.5 rounded transition duration-200 hover:bg-vh-green-medium text-black w-full"
        >
          <div class="w-1/2 flex justify-end">
            <img
              class="h-8 w-8 mx-2"
              src="{{asset('storage/svg/servicio.svg')}}"
              type="image/svg+xml"
            />
          </div>
          <div class="w-1/2 flex justify-start">
            <a
              href="#"
              class="flex items-center justify-center py-2.5 rounded transition duration-200 hover:bg-vh-green-medium text-white tracking-wider"
            >
              <span class="text-md font-bold">Servicio</span>
            </a>
          </div>
        </div>
        <div
          class="flex items-center justify-center py-2.5 rounded transition duration-200 hover:bg-vh-green-medium text-black w-full"
        >
          <div class="w-1/2 flex justify-end">
            <img
              class="h-8 w-8 mx-2"
              src="{{asset('storage/svg/paciente.svg')}}"
              type="image/svg+xml"
            />
          </div>
          <div class="w-1/2 flex justify-start">
            <a
              href="#"
              class="flex items-center justify-center py-2.5 rounded transition duration-200 hover:bg-vh-green-medium text-white tracking-wider"
            >
              <span class="text-md font-bold">Paciente</span>
            </a>
          </div>
        </div>
        <div
          class="flex items-center justify-center py-2.5 rounded transition duration-200 hover:bg-vh-green-medium text-black w-full"
        >
          <div class="w-1/2 flex justify-end">
            <img
              class="h-8 w-8 mx-2"
              src="{{asset('storage/svg/cita.svg')}}"
              type="image/svg+xml"
            />
          </div>
          <div class="w-1/2 flex justify-start">
            <a
              href="#"
              class="flex items-center justify-center py-2.5 rounded transition duration-200 hover:bg-vh-green-medium text-white tracking-wider"
            >
              <span class="text-md font-bold">Citas</span>
            </a>
          </div>
        </div>
        <div
          class="flex items-center justify-center py-2.5 rounded transition duration-200 hover:bg-vh-green-medium text-black w-full"
        >
          <div class="w-1/2 flex justify-end">
            <img
              class="h-8 w-8 mx-2"
              src="{{asset('storage/svg/programacion.svg')}}"
              type="image/svg+xml"
            />
          </div>
          <div class="w-1/2 flex justify-start">
            <a
              href="#"
              class="flex items-center justify-center mb- py-2.5 rounded transition duration-200 hover:bg-vh-green-medium text-white tracking-widest"
            >
              <span class="text-md font-bold">Programación</span>
            </a>
          </div>
        </div>
      </div>
      <!-- Bottom Section -->
      <div class="absolute bottom-0 left-0 right-0 mb-4 px-2">
        <a
          href="#"
          class="flex items-center justify-center block py-2.5 rounded transition duration-200 hover:bg-vh-green hover:text-white text-white tracking-widest"
        >
          <span class="text-base font-semibold">Salir</span>
        </a>
        <p class="text-center text-base font-semibold px-2 py-2">
          ©2024 Vital Health.Todos los derechos reservados
        </p>
      </div>
    </div>
  </nav>

  <nav class="lg:hidden relative flex items-stretch">
    <!--Hay se lo hechan xd-->
  </nav>
</div>
<div
  class="hidden lg:flex lg:fixed lg:top-0 lg:right-0 lg:items-center lg:justify-end lg:gap-4 lg:p-4"
>
  <object data="{{asset('storage/svg/doc.svg')}}" type="image/svg+xml"></object>
  <div>
    <p class="font-bold">John Doe</p>
    <p class="font-semibold text-center">Doctor</p>
  </div>
  <div class="flex gap-2">
    <a href="#" class="m-0"
      ><img
        src="{{asset('storage/svg/config.svg')}}"
        alt="config_icon"
        class="w-8 p-1"
        type="image/svg+xml"
    /></a>
  </div>
</div>
<div class="hidden lg:flex fixed bottom-0 right-0 mb-4 mr-4">
  <object
    data="{{asset('storage/svg/chat.svg')}}"
    type="image/svg+xml"
  ></object>
</div>

</header>
