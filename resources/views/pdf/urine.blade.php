<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen General de Orina</title>
</head>

<body class="p-4">
    <h3 class="text-center font-bold mb-4">EXAMEN GENERAL DE ORINA</h3>
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-2 py-1">ANÁLISIS</th>
                <th class="border border-gray-300 px-2 py-1">RESULTADO</th>
                <th class="border border-gray-300 px-2 py-1">VALOR DE REFERENCIA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border border-gray-300 px-2 py-1">COLOR</td>
                <td class="border border-gray-300 px-2 py-1">{{ $color }}</td>
                <td class="border border-gray-300 px-2 py-1">amarillo paja o ámbar</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-2 py-1">ASPECTO</td>
                <td class="border border-gray-300 px-2 py-1">{{ $aspecto }}</td>
                <td class="border border-gray-300 px-2 py-1">transparente o ligeramente turbio</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-2 py-1">DENSIDAD</td>
                <td class="border border-gray-300 px-2 py-1">{{ $densidad }}</td>
                <td class="border border-gray-300 px-2 py-1">1.003-1.030 gr/ml</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-2 py-1">PH</td>
                <td class="border border-gray-300 px-2 py-1">{{ $ph ?? 'N/A' }}</td>
                <td class="border border-gray-300 px-2 py-1">5.0 – 7.0</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-2 py-1">PROTEÍNAS</td>
                <td class="border border-gray-300 px-2 py-1">{{ $proteinas }}</td>
                <td class="border border-gray-300 px-2 py-1">negativo</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-2 py-1">UROBILINÓGENO</td>
                <td class="border border-gray-300 px-2 py-1">{{ $urobilinogeno }}</td>
                <td class="border border-gray-300 px-2 py-1">normal (0.2 mg/dl)</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-2 py-1">NITRATOS</td>
                <td class="border border-gray-300 px-2 py-1">{{ $nitratos }}</td>
                <td class="border border-gray-300 px-2 py-1">negativo</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-2 py-1">HEMOGLOBINA</td>
                <td class="border border-gray-300 px-2 py-1">{{ $hemoglobina }}</td>
                <td class="border border-gray-300 px-2 py-1">negativo</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-2 py-1">GLUCOSA</td>
                <td class="border border-gray-300 px-2 py-1">{{ $glucosa }}</td>
                <td class="border border-gray-300 px-2 py-1">negativo</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-2 py-1">CUERPOS CETÓNICOS</td>
                <td class="border border-gray-300 px-2 py-1">{{ $cuerpos_cetonicos }}</td>
                <td class="border border-gray-300 px-2 py-1">negativo</td>
            </tr>
        </tbody>
    </table>
</body>

</html>