<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Statistics</title>
  @vite('resources/css/app.css')
</head>

<body class="w-full h-full bg-vh-gray-light">
  <div class="w-auto h-auto absolute top-0 z-10">
    @include('templates.headersubad')
  </div>

  <!-- Estilos Desktop -->
  <div class="ml-40 mt-12">
    <div class="hidden lg:flex flex-col justify-between items-center ">
      <div class="mb-2">
        <h2 class=" font-bold text-2xl">
          Admin del Area de Pediatria
        </h2>
      </div>
      <div class="flex justify-between w-4/6 mt-4">
        <div class="w-80 max-w-80 h-auto m-4 bg-white opacity-80 rounded-lg shadow-xl">
          <div class="flex justify-evenly mt-5">
            <div class="flex-col">
              <h3 class="font-bold text-2xl mb-6">Personal</h3>
              <p class="font-bold text-3xl text-vh-green">10</p>
            </div>
            <div>
              <img class="w-24 " src="{{asset('storage/svg/doc-icon-green.svg')}}" alt="Inicio" />
            </div>
          </div>
        </div>
        <div class="w-80 max-w-80 h-auto m-4 bg-white opacity-80 rounded-lg shadow-xl">
          <div class="flex justify-evenly">
            <div class="flex-col">
              <h3 class="font-bold text-2xl my-6">Citas</h3>
              <p class="font-bold text-3xl text-vh-green">10</p>
            </div>
            <div class="mb-2">
              <img class="w-36" src="{{asset('storage/svg/file-icon-green.svg')}}" alt="Inicio" />
            </div>
          </div>
        </div>
        <div class="w-80 max-w-80 h-auto m-4 bg-white opacity-80 rounded-lg shadow-xl">
          <div class="flex justify-evenly  mt-5">
            <div class="flex-col">
              <h3 class="font-bold text-2xl mb-6">Expedientes</h3>
              <p class="font-bold text-3xl text-vh-green">10</p>
            </div>
            <div>
              <img class="w-32 mb6" src="{{asset('storage/svg/file-icon-second-green.svg')}}" alt="Inicio" />
            </div>
          </div>
        </div>
      </div>

      <!-- Segundo Bloque -->
      <div class="flex justify-between w-4/6 mt-4">
        <div class="w-118 h-108 m-4 bg-white opacity-80 rounded-lg shadow-xl">
          <h2 class="font-bold text-xl mb-6 p-4">Usuarios Nuevos</h2>
        </div>
        <div class="w-80 h-108 m-4 bg-white opacity-80 rounded-lg shadow-xl">
          <h2 class="font-bold text-xl mb-6 p-4">Notificaciones</h2>
          <div class="w-76 h-32 m-4 bg-vh-gray-light rounded-lg flex">
            <div class="mt-4 lg:ml-auto">
              <div class="flex-col bg-vh-green rounded-md w-16 h-16 mb-2 content-center">
                <span class="flex justify-center font-bold text-white">27</span>
                <span class="flex justify-center font-bold text-white">Feb</span>
              </div>
              <div class="bg-vh-green-light rounded-md w-16 h-6 ">
                <a class="flex font-bold justify-center hover:bg-white transition duration-300" href="#">
                  Ir
                </a>
              </div>
            </div>
            <div class="flex flex-col mt-4 mx-auto">
              <h3 class="font-bold text-base">Notificaciones de cita</h3>
              <p class="text-vh-green-light mb-2">Paciente: Juan José</p>
              <span class="font-bold text-sm opacity-70">Hora: 8am</span>
              <span class="font-bold text-sm opacity-70">Fecha: 10 de Marzo</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

</body>

</html>