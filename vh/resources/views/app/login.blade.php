<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-column  bg-white w-full h-full p-2 lg:h-screen lg:p-8 ">
    <div class="w-full lg:w-3/5 h-full flex flex-col items-center">
        <h3 class="w-auto h-auto text-lime-400 font-bold flex self-start">Vital Health <3 </h3>
        <div id="form-div" class="grid place-items-center">
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
    <div class="hidden lg:block bg-lime-500 w-2/5 rounded-xl p-11">
        <div class="lg:bg-black opacity-20 w-full h-full rounded-xl"></div>
    </div>
</body> 
</html>