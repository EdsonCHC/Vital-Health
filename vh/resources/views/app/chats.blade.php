<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chats</title>
    @vite('resources/css/app.css')
    <!-- @vite(['resources/js/app.js']) not used now  -->
</head>
<body>
    <div class="w-full h-full absolute top-0 z-10">
        @include('templates.header')
    </div>

    <!-- inicio para cel-->
    <div class="container mx-auto mt-10 px-5 ">
        <h1 class="pt-10 pb-5 text-lg font-bold"> Personas </h1>
            <!-- Barra de navegación-->
            <div class="flex-1 flex px-2 lg:ml-6 ">
          <div class="max-w-lg w-full lg:max-w-xs">
            <label for="search" class="sr-only">Buscar chat </label>
            <form methode="get" action="#" class="relative z-50">
              <button type="submit" id="searchsubmit" class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
              </button>
              <input type="text" name="s" id="s" class="block w-full pl-10 pr-3 py-2 border border-transparent rounded-md leading-5 bg-gray-200 text-gray-300 placeholder-gray-400 focus:outline-none focus:bg-white focus:text-gray-900 sm:text-sm transition duration-150 ease-in-out" placeholder="buscar chat">
            </form>
          </div>
        </div>

    <!-- Chast-->
        <div class="chats mt-5">
            <div class="chat bg-white  p-4 flex items-center">
                <img src="{{asset('storage/svg/doctor.jpeg')}}" alt="Profile" class="w-12 h-12 rounded-full mr-4">
                <div>
                    <div class="name font-semibold">Sistema de emergencia</div>
                    <div class="message text-gray-500">Pesquisar chat</div>
                </div>
            </div>
            <div class="chat bg-white  p-4 flex items-center">
                <img src="{{asset('storage/svg/doctor.jpeg')}}" alt="Profile" class="w-12 h-12 rounded-full mr-4">
                <div>
                    <div class="name font-semibold">Soporte ADMIN</div>
                    <div class="message text-gray-500">Pesquisar chat</div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed bottom-0 left-0 right-0">
    @include('templates.footer') 
    </div>

</body>
</html>