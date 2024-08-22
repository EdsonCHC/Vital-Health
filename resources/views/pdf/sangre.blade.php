<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Sangre</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <td>Examen</td>
                <td>Resultados</td>
                <td>Rango Normal </td>
                <td>Unidad</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Eritrocitos </td>
                <td>{{$Eritrocitos}}</td>
                <td>4-5,2</td>
                <td> x10 6/mm3</td>
            </tr>
            <tr>
                <td>Hemoglobina</td>
                <td>{{$Hemoglobina}}</td>
                <td>12-16 H:13-18 M:12-16 </td>
                <td>g/dl</td>
            </tr>
            <tr>
                <td>Hcto</td>
                <td>{{$Hcto}}</td>
                <td>36-46 H:42-52 M:37-48</td>
                <td>%</td>
            </tr>
            <tr>
                <td>VCM(volumen celular medido)</td>
                <td>{{$VCM}}</td>
                <td>80-100</td>
                <td>fl</td>
            </tr>
            <tr>
                <td>HCM</td>
                <td>{{$HCM}}</td>
                <td>26-34</td>
                <td>pg</td>
            </tr>
            <tr>
                <td>Leucositos</td>
                <td>{{$Leucositos}}</td>
                <td>4,3-10,8</td>
                <td>x10 3/mm3</td>
            </tr>
            <tr>
                <td>Basofilos</td>
                <td>{{$Basofilos}}</td>
                <td>0-1</td>
                <td>%</td>
            </tr>
            <tr>
                <td>Eusinofilos</td>
                <td>{{$Eusinofilos}}</td>
                <td>2-4</td>
                <td>%</td>
            </tr>
            <tr>
                <td>Neutrofilos</td>
                <td>{{$Neutrofilos}}</td>
                <td>45-55</td>
                <td>%</td>
            </tr>
            <tr>
                <td>Segmentados</td>
                <td>{{$Segmentados}}</td>
                <td>0-5</td>
                <td>%</td>
            </tr>
            <tr>
                <td>Linfocitos</td>
                <td>{{$Linfocitos}}</td>
                <td>25-40</td>
                <td>%</td>
            </tr>
            <tr>
                <td>VHS</td>
                <td>{{$VHS}}</td>
                <td>1-29</td>
                <td>mm/hrs</td>
            </tr>
        </tbody>
    </table>
</body>

</html>