<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sub Admin</title>
  @vite('resources/css/app.css')
</head>

<body class="w-full h-full">
  <div class="w-full h-auto absolute top-0 z-10">
    @include('templates.headersubad')
  </div>

  <!-- Estilos Desktop -->
  <div class="hidden lg:flex flex-col">
    <div class="mb-2">
      <h2 class=" font-bold text-2xl">
        Admin del Area de Pediatria
      </h2>
    </div>
    <div class="flex justify-between w-4/6 mt-4 mx-">
      <div class="w-80 max-w-80 m-4 bg-vh-green-light opacity-80 rounded-xl flex">
        <div class="mt-8 lg:ml-auto">
          <div class="bg-vh-green-medium rounded-full h-16 w-16">
            <span class="invisible">a</span>
          </div>
        </div>
        <div class="flex flex-col pl-4 mt-5 mx-auto">
          <h3 class="font-bold text-2xl">Juan</h3>
          <p>Matematics</p>
          <div class="w-28 flex justify-around my-4 lg:ml-auto">
            <div class="bg-vh-green-medium rounded-full h-10 w-10">
              <span class="invisible">a</span>
            </div>
            <div class="bg-vh-green-medium rounded-full h-10 w-10">
              <span class="invisible">a</span>
            </div>
          </div>
        </div>
      </div>
      <div class="w-80 max-w-80 m-4 bg-vh-green-light opacity-80 rounded-xl flex">
        <div class="ml-8 mt-8 lg:ml-auto">
          <div class="bg-vh-green-medium rounded-full h-16 w-16">
            <span class="invisible">a</span>
          </div>
        </div>
        <div class="flex flex-col pl-4 mt-5 mx-auto">
          <h3 class="font-bold text-2xl">Epico Palo</h3>
          <p>Matematics</p>
          <div class="w-28 flex justify-around my-4 lg:ml-auto">
            <div class="bg-vh-green-medium rounded-full h-10 w-10">
              <span class="invisible">a</span>
            </div>
            <div class="bg-vh-green-medium rounded-full h-10 w-10">
              <span class="invisible">a</span>
            </div>
          </div>
        </div>
      </div>
      <div class="w-80 max-w-80 m-4 bg-vh-green-light opacity-80 rounded-xl flex">
        <div class="ml-8 mt-8 lg:ml-auto">
          <div class="bg-vh-green-medium rounded-full h-16 w-16">
            <span class="invisible">a</span>
          </div>
        </div>
        <div class="flex flex-col pl-4 mt-5 mx-auto">
          <h3 class="font-bold text-2xl">Alvarenga</h3>
          <p>Matematics</p>
          <div class="w-28 flex justify-around my-4 lg:ml-auto">
            <div class="bg-vh-green-medium rounded-full h-10 w-10">
              <span class="invisible">a</span>
            </div>
            <div class="bg-vh-green-medium rounded-full h-10 w-10">
              <span class="invisible">a</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>