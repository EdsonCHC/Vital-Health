<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    @vite('resources/css/app.css')
</head>


<body class="w-full h-full bg-gray-200 ">
    <div class="flex ">
        <div>
            @include('templates.header_doc')
        </div>
        <div class="flex w-full px-5 justify-center">
            <div
                class="mt-24 w-11/12 h-64 m-4 bg-gradient-to-r from-vh-green to-vh-green rounded-lg shadow-xl relative overflow-hidden">
                <div class="flex justify-start mt-5">
                    <div class="flex-col ml-8 mt-16">
                        <p class="font-bold text-md text-gray-400">Septiembre 4, 2024</p>
                        <h3 class="font-bold text-2xl text-white">Doctor Alejandro Alvarenga</h3>
                        <p class="font-bold text-xl text-gray-400">Área: Cardiología.</p>
                    </div>
                </div>
                <img class="absolute bottom-0 right-5 h-3/4" src="{{asset('storage/svg/doc_ind.svg')}}"
                    type="image/svg+xml" />
            </div>
        </div>

    </div>
</body>

</html>