<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen General Heces</title>
</head>
<body>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Parámetro
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Resultado
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor de
                    Referencia</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Medida</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">Color</td>
                <td class="px-6 py-4 whitespace-nowrap">{{$color}}</td>
                <td class="px-6 py-4 whitespace-nowrap">N/A</td>
                <td class="px-6 py-4 whitespace-nowrap">N/A</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">Consistencia</td>
                <td class="px-6 py-4 whitespace-nowrap">{{$consistencia}}</td>
                <td class="px-6 py-4 whitespace-nowrap">N/A</td>
                <td class="px-6 py-4 whitespace-nowrap">N/A</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">Sangre Oculta</td>
                <td class="px-6 py-4 whitespace-nowrap">{{$sangre_oculta}}</td>
                <td class="px-6 py-4 whitespace-nowrap">Negativo</td>
                <td class="px-6 py-4 whitespace-nowrap">N/A</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">Moco</td>
                <td class="px-6 py-4 whitespace-nowrap">{{$moco}}</td>
                <td class="px-6 py-4 whitespace-nowrap">N/A</td>
                <td class="px-6 py-4 whitespace-nowrap">N/A</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">Parásitos</td>
                <td class="px-6 py-4 whitespace-nowrap">{{$parásitos}}</td>
                <td class="px-6 py-4 whitespace-nowrap">Sin Parásitos</td>
                <td class="px-6 py-4 whitespace-nowrap">N/A</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">Observaciones</td>
                <td class="px-6 py-4 whitespace-nowrap">{{$observaciones}}</td>
                <td class="px-6 py-4 whitespace-nowrap">N/A</td>
                <td class="px-6 py-4 whitespace-nowrap">N/A</td>
            </tr>
        </tbody>
    </table>
</body>

</html>