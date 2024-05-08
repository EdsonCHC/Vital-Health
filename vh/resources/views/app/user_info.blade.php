<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    @vite('resources/css/app.css')
</head>
<body class="w-full h-screen overflow-scroll">
    <div>
        @include('templates.header')
    </div>
    <main class="mb-5 w-full h-full">
        <section class="flex gap-10 justify-center p-2">
            <div class="w-28 h-28 rounded-full border-2 border-solid overflow-hidden">
                <img src="{{asset('storage/svg/doctor.svg')}}" alt="" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col items-center">
                <h1 class="text-3xl">
                    John Doe
                </h1>
                <button class="w-24 h-10 bg-vh-green-light rounded-3xl mt-4">
                    New Photo
                </button>
            </div>
        </section>
        <hr class="w-4/5 mx-auto my-0">
        <section class="flex justify-center">
            <form action="" class="w-4/5 h-auto md:w-1/2 lg:w-1/4">
                <label for="" class="block mt-5 font-bold">
                    Nombre *
                    <input type="text" readonly class="w-full h-10 border-2 border-solid border-gray-400 rounded-lg">
                </label>
                <label for="" class="block mt-3 font-bold">
                    Apellido *
                    <input type="text" readonly class="w-full h-10 border-2 border-solid border-gray-400 rounded-lg">
                </label>
                <label for="" class="block mt-3 font-bold">
                    Apellido *
                    <input type="text" readonly class="w-full h-10 border-2 border-solid border-gray-400 rounded-lg">
                </label>
                <label for="" class="block mt-3 font-bold">
                    Genero *
                    <input type="text" readonly class="w-full h-10 border-2 border-solid border-gray-400 rounded-lg">
                </label>
                <label for="" class="block mt-3 font-bold">
                    Numero de Telefono *
                    <input type="text" readonly class="w-full h-10 border-2 border-solid border-gray-400 rounded-lg">
                </label>
                <label for="" class="block mt-3 font-bold">
                    Fecha de nacimiento *
                    <input type="text" readonly class="w-full h-10 border-2 border-solid border-gray-400 rounded-lg">
                </label>
                <label for="" class="block mt-3 font-bold">
                    Correo *
                    <input type="text" readonly class="w-full h-10 border-2 border-solid border-gray-400 rounded-lg">
                </label>
            </form>
        </section>
    </main>
    <div class="w-full h-auto">
        @include('templates.footer')
    </div>
</body>

</html>