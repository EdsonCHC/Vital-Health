<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chats</title>
    @vite('resources/css/app.css')
    <!-- @vite(['resources/js/app.js']) not used now  -->
</head>
<body class="bg-gray-100" >
    <div class="w-full h-auto absolute top-0 z-10">
        @include('templates.header')
    </div>

    <!-- inicio apartado de todo los contactos-->
    <div id="uno" class="max-w-md mx-auto mt-40 px-5  border rounded-lg ">
        <h1 class="pt-5 pb-5 text-lg font-bold"> Personas </h1>
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
          <div class=" flex items-center">
            <bottom class="text-vh-medium font-semibold ml-5 mt-5 lg:mt-0">Nuevo chat</bottom>
        </div>
        </div>
        
    <!-- Chast-->
        <div class="chats mt-5">
            <div class="chat  p-4 flex items-center">
                <img src="{{asset('storage/svg/doctor.svg')}}" alt="Profile" class="w-12 h-12 rounded-full mr-4">
                <div>
                    <div class="name font-semibold">Sistema de emergencia</div>
                    <div class="message text-gray-500">Pesquisar chat</div>
                </div>
            </div>
            <div class="chat  p-4 flex items-center">
                <img src="{{asset('storage/svg/doctor.svg')}}" alt="Profile" class="w-12 h-12 rounded-full mr-4">
                <div>
                    <div class="name font-semibold">Soporte ADMIN</div>
                    <div class="message text-gray-500">Pesquisar chat</div>
                </div>
            </div>
                <div class="chat  p-4 flex items-center">
                <img src="{{asset('storage/svg/doctor.svg')}}" alt="Profile" class="w-12 h-12 rounded-full mr-4">
                <div>
                    <div class="name font-semibold">Soporte ADMIN</div>
                    <div class="message text-gray-500">Pesquisar chat</div>
                </div>
            </div>
                <div class="chat  p-4 flex items-center">
                <img src="{{asset('storage/svg/doctor.svg')}}" alt="Profile" class="w-12 h-12 rounded-full mr-4">
                <div>
                    <div class="name font-semibold">Soporte ADMIN</div>
                    <div class="message text-gray-500">Pesquisar chat</div>
                </div>
            </div>
        </div>
    </div>

<!-- adaptacion de chat para pc -->
<div id="dos" class="mb-4 mx-4 lg:mx-auto lg:w-1/2 border rounded-lg flex  flex-nowrap">
    <div class="chat pt-4 pl-4 pb-4 flex items-center flex-grow">
        <img src="{{asset('storage/svg/doctor.svg')}}" alt="Profile" class="w-12 h-12 rounded-full mr-4">
        <div>
            <div class="name font-semibold">Doc. Alvarenga</div>    
            <div class="message text-gray-500">#CU6798H</div>
        </div>
    </div>
    <div class="between items-center p-4 flex-shrink-0">
        <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18.4194 12.1334V8.38152C18.4194 7.79195 17.942 7.30957 17.3585 7.30957H4.62688C4.04335 7.30957 3.56592 7.79195 3.56592 8.38152V19.101C3.56592 19.6906 4.04335 20.173 4.62688 20.173H17.3585C17.942 20.173 18.4194 19.6906 18.4194 19.101V15.3492L22.6633 19.637V7.84555L18.4194 12.1334Z" fill="#155D1C"/>
        </svg>
        <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-2">
            <path d="M13.6258 3.02148C7.76923 3.02148 3.01611 7.82383 3.01611 13.741C3.01611 19.6582 7.76923 24.4605 13.6258 24.4605C19.4823 24.4605 24.2354 19.6582 24.2354 13.741C24.2354 7.82383 19.4823 3.02148 13.6258 3.02148ZM14.6867 19.1008H12.5648V12.669H14.6867V19.1008ZM14.6867 10.5251H12.5648V8.38124H14.6867V10.5251Z" fill="#155D1C"/>
        </svg>
    </div>
</div>

<!--Inicio del chat-->
<div id="tres" class="max-w-md mx-auto mt-10 shadow-md overflow-hidden mb-4 lg:mx-auto lg:w-1/2 border rounded-lg">
    
    <div class="flex items-start p-4 border-b">
        <img src="{{asset('storage/svg/doctor.svg')}}" alt="Profile Picture" class="w-10 h-10 rounded-full mr-4">
        <div class="bg-gray-200 rounded-lg p-2">
            <p class="text-sm">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            <p class="text-xs text-gray-500">10:00 AM</p>
        </div>
    </div>

    
    <div class="flex items-end justify-end p-4 border-b">
        <div class="bg-green-200 rounded-lg p-2">
            <p class="text-sm">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            <p class="text-xs text-gray-500">10:01 AM</p>
        </div>
        <img src="{{asset('storage/svg/doctor.svg')}}" alt="Profile Picture" class="w-10 h-10 rounded-full ml-4">
    </div>
    <!--  Barra para escribir mensaje -->
    <div class="flex items-center p-4">
        <input type="text" id="message" class="flex-1 py-2 px-4 focus:outline-none" placeholder="Escribe tu mensaje...">
        <div class="ml-2 flex space-x-2">
            <svg width="38" height="34" viewBox="0 0 38 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0.54541" y="0.729492" width="37.1132" height="33.2785" rx="10" fill="#155D1C"/>
            <path d="M9.83252 24.8572L29.3077 17.3695L9.83252 9.88184L9.82324 15.7056L23.7407 17.3695L9.82324 19.0334L9.83252 24.8572Z" fill="white"/>
        </svg>

        <svg width="28" height="21" viewBox="0 0 28 21" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_124_2486)">
        <path d="M19.0976 5.88149V15.4491C19.0976 17.2877 17.0494 18.7769 14.5206 18.7769C11.9917 18.7769 9.94346 17.2877 9.94346 15.4491V5.04953C9.94346 3.90142 11.225 2.96962 12.8041 2.96962C14.3832 2.96962 15.6648 3.90142 15.6648 5.04953V13.7851C15.6648 14.2427 15.1499 14.6171 14.5206 14.6171C13.8912 14.6171 13.3763 14.2427 13.3763 13.7851V5.88149H11.6599V13.7851C11.6599 14.9332 12.9415 15.865 14.5206 15.865C16.0996 15.865 17.3812 14.9332 17.3812 13.7851V5.04953C17.3812 3.21089 15.333 1.72168 12.8041 1.72168C10.2753 1.72168 8.22705 3.21089 8.22705 5.04953V15.4491C8.22705 17.9782 11.042 20.0249 14.5206 20.0249C17.9991 20.0249 20.8141 17.9782 20.8141 15.4491V5.88149H19.0976Z" fill="#155D1C"/>
        </g>
        <defs>
        <clipPath id="clip0_124_2486">
        <rect width="27.4625" height="19.9671" fill="white" transform="translate(0.217285 0.889648)"/>
        </clipPath>
        </defs>
        </svg>

        <svg width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10.5596 17.1447L6.06442 12.9527L4.53369 14.3701L10.5596 19.9897L23.4953 7.92624L21.9754 6.50879L10.5596 17.1447Z" fill="#155D1C"/>
        </svg>

        </div>
    </div>
</div>

    <div class="fixed bottom-0 left-0 right-0">
    @include('templates.footer') 
    </div>

</body>
</html>