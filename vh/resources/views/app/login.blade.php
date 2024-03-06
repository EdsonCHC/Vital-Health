<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    @vite('resources/css/app.css')
</head>
<body class="flex w-full h-screen p-8">
    <div class="bg-gray-100 w-1/2 h-full">
        <h3 class="w-auto h-auto text-lime-400 font-bold relative top-0 left-0">Vital Health <3 </h3>
        <div id="form-div">
        <form action="">
            <h4>Inicio de sesión</h4>
            <Input  class="block mb-1" type="text" placeholder="Nombre de Usuario o Email="></Input>
            <input  class="block mb-1" placeholder="Contaseña" type="password">
        </form>
        </div>
        <p>¿no posees cuenta aun? <a href="/registro" class="text-lime-300">Crear Cuenta</a></p>
        <div class="flex gap-1 items-center">
            <hr class="bg-gray-300 w-14">
            <p>Ingresa Tambien con</p>
            <hr class="bg-gray-300 w-14">
        </div>
    </div>
    <div class="bg-lime-400 w-1/2 rounded-xl"></div>
</body> 
</html>