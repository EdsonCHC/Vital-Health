<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
    <title>Inicio de sesión</title>
    @vite(['resources/css/app.css','resources/css/swet.css','resources/js/app.js'])
    <!-- CDNs -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body class="w-full h-screen p-2 flex flex-col bg-white lg:flex-row overflow-hidden">
    <div class="w-full h-screen flex flex-col items-center flex-1 lg:w-3/5">
        <object data="{{asset('storage/svg/logo.svg')}}" type="image/svg+xml"></object><!--LOGO-->
        <div id="form-div" class="grid place-items-center w-full">
            <h1 class="text-2xl font-bold mb-5">Inicio de sesión</h1>
            <form action="" class="text-center w-full flex flex-col items-center">
                <Input  class="block h-10 p-2 outline outline-1 outline-vh-green w-4/5 mb-2 lg:w-2/5" type="text" placeholder="Nombre de Usuario o Email"></Input>
                <input  class="block h-10 p-2 outline outline-1 outline-vh-green w-4/5 mb-10 lg:w-2/5" placeholder="Contraseña" type="password">
                <button class="w-4/5 h-10 font-bold text-1xl shadow-xl mb-10 shadow-vh-green opacity-25 lg:w-2/5 hover:bg-vh-green hover:text-white hover:opacity-100 ease-in duration-150">
                Ingresar</button>
            </form>
        </div>
        <p class="mb-8">¿No posees cuenta aun ? <a href="/registro" class="text-vh-green font-bold">Crear Cuenta</a></p>
        <div class="flex gap-1 items-center">
            <hr class="border border-vh-green opacity-25 w-14">
            <p>Ingresa También con</p>
            <hr class="border border-vh-green opacity-25 w-14">
        </div>
        <div id="my-signin2"></div>
        <p class="flex grow items-end text-vh-green text-center lg:grow-0 mt-8">© 2024 Vital Health Todos los derechos reservados</p>
    </div>
    <div class="hidden lg:block bg-vh-green w-2/5 rounded-xl p-11">
        <div class="lg:bg-black opacity-20 w-full h-full rounded-xl"></div>
    </div>
    <!--COSO DE GOOGLE-->
    <script> 
    function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 250,
        'height': 50,
        'longtitle': true,
        'theme': 'white',
        'onsuccess': onSuccess,
        'onfailure': onFailure,
      });
    }
  </script>
    <!-- <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script> API DE GOOGLE -->
</body> 
</html>