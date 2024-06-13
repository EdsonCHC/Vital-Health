<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="shortcut icon" href="{{asset('storage/svg/favicon.png')}}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/loader.css', 'resources/js/preloader.js','resources/js/scroll.js','resources/js/user.js'])
</head>

<body class="w-full h-screen overflow-scroll">
    @include('templates.loader')
    <div class="w-full h-auto">
        @include('templates.header')
    </div>
    <main class="my-4 mx-auto lg:w-4/5 h-auto flex flex-col justify-center items-center lg:gap-20 lg:flex-row">
        <section
            class="w-full lg:w-1/2 h-auto flex flex-col items-center lg:flex lg:flex-col lg:items-center gap-10 p-2 lg:border-r-2">
            <h1 class="font-bold text-3xl">Profile</h1>
            <div class="w-60 h-60 rounded-full border-2 border-solid overflow-hidden">
                <img src="{{asset('storage/svg/pic_male.svg')}}" alt="" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col items-center">
                <h1 class="text-3xl">John Doe</h1>
                <button
                    class="w-auto h-10 p-2 text-white-not-white font-bold bg-vh-green-light rounded-lg mt-4 flex gap-1">
                    <img src="{{asset('storage/svg/upload.svg')}}" alt="upload_icon" class="w-6 h-6">
                    <p>Upload New Photo</p>
                </button>
            </div>
        </section>
        <hr class="w-4/5 mx-auto my-5 border-1 lg:hidden">
        <section class="w-full lg:w-1/2 h-auto flex flex-col items-center lg:flex lg:flex-col">
            <h1 class="font-bold text-[#252525] text-xl">Información del usuario</h1>
            <form class="w-4/5 h-auto md:w-1/2 lg:w-full">
                @csrf
                <div class="w-full h-auto flex lg:justify-end justify-center mb-5 border-b-2 p-2">
                    <div class="flex ">
                        <button
                            class="w-auto h-auto  mx-2 p-2 border-2 border-vh-green-medium rounded-md hover:scale-95 transition-transform duration-75">Cancel</button>
                        <button
                            class="w-auto h-auto mx-2 p-2 border-2 border-vh-green-medium rounded-md  hover:scale-95 transition-transform duration-75">Save</button>
                    </div>
                </div>
                <div class="flex gap-5 mt-5">
                    <label for="" class="w-1/2 block font-semi-bold">
                        Nombre *
                        <input type="text" readonly value="{{$user->name}}"
                            class="w-full h-10 border-2 border-solid border-gray-400 rounded-lg p-2">
                    </label>
                    <label for="" class="w-1/2 block font-semi-bold">
                        Apellido *
                        <input type="text" readonly value="{{$user->lastName}}"
                            class="w-full h-10 border-2 border-solid border-gray-400 rounded-lg p-2">
                    </label>
                </div>
                <div class="flex gap-5 mt-5">
                    <label for="" class="w-1/2 block font-semi-bold">
                        Apellido *
                        <input type="text" readonly value="lorem ipsum"
                            class="w-full h-10 border-2 border-solid border-gray-400 rounded-lg p-2">
                    </label>
                    <label for="" class="w-1/2 block font-semi-bold">
                        Genero *
                        <input type="text" readonly value="{{$user->gender}}"
                            class="w-full h-10 border-2 border-solid border-gray-400 rounded-lg p-2">
                    </label>
                </div>
                <div class="flex gap-5 mt-5">
                    <label for="" class="w-1/2 block font-semi-bold">
                        Fecha de nacimiento *
                        <input type="text" readonly value="{{$user->birth}}"
                            class="w-full h-10 border-2 border-solid border-gray-400 rounded-lg p-2">
                    </label>
                    <label for="" class="w-1/2 block font-semi-bold">
                        Correo *
                        <input type="text" readonly value="{{$user->mail}}"
                            class="w-full h-10 border-2 border-solid border-gray-400 rounded-lg p-2">
                    </label>
                </div>
                <input type="hidden" id="_token" value="{{csrf_token()}}">
                <button type="submit" id="log_out" class="w-auto h-auto bg-rose-600 text-white-not-white p-2 rounded-lg mt-3">LOG
                    out</button>
            </form>
        </section>
    </main>
    <div class="w-full h-auto absolute bottom-0">
        @include('templates.footer')
    </div>
</body>

</html>