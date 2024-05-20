<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sub Admin</title>
  @vite('resources/css/app.css')
</head>

<body class="w-full h-full bg-vh-gray-light">
  <div class="w-full h-auto absolute top-0 z-10">
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
        <div class="w-80 max-w-80 h-auto m-4 bg-white opacity-80 rounded-xl shadow-xl">
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
        <div class="w-80 max-w-80 h-auto m-4 bg-white opacity-80 rounded-xl shadow-xl">
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
        <div class="w-80 max-w-80 h-auto m-4 bg-white opacity-80 rounded-xl shadow-xl">
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
    </div>
  </div>
  </div>

</body>

</html>