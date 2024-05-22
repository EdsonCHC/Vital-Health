<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    @vite('resources/css/app.css')
</head>

<body class="w-full h-screen overflow-scroll">
    <div class="w-full h-auto">
        @include('templates.header')
    </div>
    <main class="mb-5 mt-5 w-full h-full lg:flex justify-center gap-20">
        <section class="w-auto h-auto flex gap-10 justify-center p-2 lg:flex-col lg:justify-start">
            <div class="w-28 h-28 rounded-lg border-2 border-solid overflow-hidden">
                <img src="{{asset('storage/svg/doctor.svg')}}" alt="" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col items-center">
                <h1 class="text-3xl">
                    John Doe
                </h1>
                <button class="w-24 h-10 text-white-not-white font-bold bg-vh-green-light rounded-lg mt-4">
                    New Photo
                </button>
            </div>
        </section>
        <hr class="w-4/5 mx-auto my-5 border-1 lg:hidden">
        <section class="w-auto h-auto flex flex-col items-center">
            <h1 class="font-semi-bold text-[#252525] text-xl">Información del usuario</h1>
            <form action="" class="w-4/5 h-auto md:w-1/2 lg:w-full">
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