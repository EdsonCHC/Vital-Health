<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    @vite('resources/css/app.css')
</head>
<body class="w-full h-screen p-2 flex flex-col bg-white">
    <div class="flex flex-col w-full h-full">
        <div class="flex flex-col items-center w-full h-full">
            <object data="" type=""></object><!--LOGO-->
            <h1 class="mb-8 font-bold text-2xl">Registrarse</h1>
            <form action="" class="w-4/5">
                <input class="block w-full p-2 outline outline-1 outline-vh-green mb-4 "type="text " placeholder="Nombres">
                <input class="block w-full p-2 outline outline-1 outline-vh-green mb-4 "type="text" placeholder="Apellidos">
                <input class="block w-full p-2 outline outline-1 outline-vh-green mb-4 "type="text" placeholder="Fecha de nacimiento">
                <input class="block w-full p-2 outline outline-1 outline-vh-green mb-4 "type="email" placeholder="Email">
                <input class="block w-full p-2 outline outline-1 outline-vh-green mb-10 "type="password" placeholder="Contraseña">
                <button class="w-full p-2 rounded-md bg-vh-green text-white font-bold ">Ingresar</button>
            </form>
        </div>
        <p class="flex grow items-end text-vh-green text-center">© 2024 Vital Health Todos los derechos reservados</p>
    </div>
</body>
</html>