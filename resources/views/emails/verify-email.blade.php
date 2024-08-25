<!DOCTYPE html>
<html>

<head>
    <title>Verificación de correo electrónico</title>
    <style>
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #4BC357;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
        }

        .container {
            background-color: #f1f5f9;
            padding: 20px;
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: auto;
        }

        .header {
            color: #4BC357;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .paragraph {
            margin-bottom: 20px;
            font-size: 16px;
            color: #2d3748;
        }
    </style>
</head>

<body style="background-color: #f1f5f9; padding: 20px; font-family: Arial, sans-serif; max-width: 600px; margin: auto;">
    <div class="container">
        <h1 class="header">Hola {{ $user->name }}</h1>
        <p class="paragraph">Por favor, verifica tu correo haciendo clic en el siguiente botón:</p>
        <a href="{{ $verificationUrl }}" class="button">Verificar correo electrónico</a>
        <p class="paragraph">Si no creaste una cuenta, simplemente ignora este correo.</p>
    </div>
</body>

</html>