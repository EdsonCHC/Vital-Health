<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de sesión</title>
  <link rel="shortcut icon" href="{{asset('storage/svg/favicon.png')}}" type="image/x-icon">
  @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/app.js', 'resources/css/loader.css', 'resources/js/preloader.js','resources/js/login.js'])
</head>

<body class="w-full h-screen p-2 flex flex-col bg-white lg:flex-row overflow-hidden">
  @include('templates.loader')
  <div class="w-full h-screen flex flex-col items-center flex-1 lg:w-3/5">
    <a href="/" class="">
      <img src="{{asset('storage/svg/logo.svg')}}" type="image/svg+xml"></img><!--LOGO-->
    </a>
    <div id="form-div" class="grid place-items-center w-full">
      <h1 class="text-2xl font-bold mb-5">Inicio de sesión</h1>
      <form action="" class="text-center w-full flex flex-col items-center">
        @csrf
        <input type="hidden" id="_token" value="{{csrf_token()}}">
        <Input class="block h-10 p-2 outline outline-1 outline-vh-green w-4/5 mb-2 lg:w-2/5" type="text" id="mail"
          placeholder="Nombre de Usuario o Email"></Input>
        <input class="block h-10 p-2 outline outline-1 outline-vh-green w-4/5 mb-10 lg:w-2/5" placeholder="Contraseña"
          type="password" id="password">
        <button
           id="login_btn" class="w-4/5 h-10 text-white bg-vh-green font-bold text-1xl shadow-xl mb-10 rounded-lg lg:w-2/5 hover:bg-white hover:text-vh-green">
          Ingresar</button>
      </form>
    </div>
    <p class="mb-8">¿No posees cuenta aun ? <a href="/registro" class="text-vh-green font-bold">Crear Cuenta</a></p>
    <div class="flex gap-1 items-center">
      <hr class="border border-vh-green opacity-25 w-14">
      <p>Ingresa También con</p>
      <hr class="border border-vh-green   opacity-25 w-14">
    </div>
    <div id="my-signin2"></div>
    <p class="flex grow items-end text-vh-green text-center lg:grow-0 mt-8">&copy 2024 Vital Health Todos los derechos
      reservados</p>
  </div>
  <div class="hidden lg:block bg-vh-green w-2/5 rounded-xl p-11">
    <div class="lg:bg-black opacity-20 w-full h-full rounded-xl relative">
    </div>
    <div class="">
      <img src="{{asset('storage/svg/n_doctor.svg')}}" alt="doctor_svg" class="absolute end-2 bottom-2">
    </div>
  </div>
</body>

</html>