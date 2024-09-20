<!DOCTYPE html>
<html>

<head>
    <title>Correo Electrónico Verificado</title>
    @vite(['resources/css/app.css'])
    <style>
        .container {
            background-color: #f1f5f9; /* Color similar a bg-slate-400 */
            padding: 20px;
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: auto;
        }
        .header {
            color: #4a5568; /* Color similar a text-vh-green-medium */
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .paragraph {
            margin-bottom: 20px;
            font-size: 16px;
            color: #2d3748; /* Color gris oscuro */
        }
    </style>
</head>

<body style="background-color: #f1f5f9; padding: 20px; font-family: Arial, sans-serif; max-width: 600px; margin: auto;">
    <div class="container">
        <h1 class="header">Correo Electrónico Verificado</h1>
        <p class="paragraph">¡Hola!</p>
        <p class="paragraph">Tu correo electrónico ha sido verificado con éxito.</p>
        <p class="paragraph">Ahora puedes acceder a tu cuenta y disfrutar de todas las funcionalidades.</p>
        <button class="p-2 bg-vh-green-medium text-white-not-white font-semibold rounded-lg">
            <a href="/login">Iniciar sesión</a>
        </button>
    </div>
</body>

</html>
