<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expediente Médico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
            float: left;
        }

        .header h1,
        .header h2 {
            margin: 0;
        }

        .section-title {
            font-weight: bold;
            margin-top: 20px;
            text-transform: uppercase;
        }

        .form-group {
            margin-bottom: 5px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group input[type="email"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        .form-group input[type="radio"] {
            margin-right: 10px;
        }

        .form-group select {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
        }

        .table-container {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        .table-container table,
        .table-container th,
        .table-container td {
            border: 1px solid black;
            padding: 10px;
        }

        .footer {
            text-align: center;
            font-size: 0.8em;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <img src="{{asset('storage/svg/logo.svg')}}" alt="vital-health-logo">
            <h1>Vital Health</h1>
            <h3>Resultados de examen</h3>
        </div>

        <div class="section-title">Datos del Doctor</div>
        <div class="form-group">
            <label for="nombre_estudiante">Nombre completo del Doctor:</label>
            <input type="text" id="nombre_estudiante" name="nombre_doctor">
        </div>
        <div class="form-group">
            <label for="area">Area Medica</label>
            <input type="text" id="are" name="docente">
        </div>
        <div class="section-title">Datos Generales del Paciente</div>
        <div class="form-group">
            <label for="nombre_paciente">Nombres y apellidos completos:</label>
            <input type="text" id="nombre_paciente" name="nombre_paciente">
        </div>
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">
        </div>
        <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad">
        </div>
        <div class="form-group">
            <label>Sexo:</label>
            <input type="radio" id="sexo_masculino" name="sexo" value="masculino">
            <label for="sexo_masculino">Masculino</label>
            <input type="radio" id="sexo_femenino" name="sexo" value="femenino">
            <label for="sexo_femenino">Femenino</label>
        </div>
        <div class="section-title">Datos Del examen</div>
        <div class="form-group">
            <label for="examen">Tipo de examen:</label>
            <input type="text" id="examen" name="examen">
        </div>
        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha">
        </div>
        <div class="form-group">
            <label for="hora">Hora:</label>
            <input type="text" id="hora" name="hora">
        </div>
        <div class="form-group">
            <label for="resultado">Resultado de examen:</label>
            <input type="text" id="resultado" name="resultado">
        </div>
        <div class="footer">
            <p>Vital Health 2024 &copy todos los derechos reservados</p>
        </div>
    </div>

</body>

</html>