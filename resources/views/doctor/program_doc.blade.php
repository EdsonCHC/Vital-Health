<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Incluir Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/css/sweet.css', 'resources/js/citas.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

</head>

<body class="w-full h-screen bg-gray-200">
    <!-- Encabezado -->
    <div class="flex w-full">
        <div class="h-full">
            @include('templates.header_doc')
        </div>
        <div class="w-full h-auto  ">
            <div class="w-auto h-auto my-4 mx-4 lg:mx-16  lg:mt-10 ">
                <div class=" md:w-full w-full ">
                    <h2 class=" font-bold  text-2xl text-vh-green">Programacion personal</h2>

                </div>

            </div>
            <div>


            </div>


        </div>

    </div>
</body>

</html>