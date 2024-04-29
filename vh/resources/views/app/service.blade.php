<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicio</title>
    @vite('resources/css/app.css')
    <!-- @vite(['resources/js/app.js']) not used now  -->
</head>
<body class="w-full h-full">
    <div class="flex">
        <div class="ml-auto lg:ml-auto">
            <div class="bg-gray-100 mt-28 rounded h-32 w-36 absolute z-20">
                <p class="pl-4 text-xl font-bold">Area</p>
                <div class="flex flex-col pl-4 mt-1">
                    <span class="text-lg">Activa</span>
                    <span class="text-lg">Personal</span>
                    <span class="text-lg">Personalizado</span>
                </div>
            </div>        
        </div>
        <div class="ml-auto lg:ml-auto">
            <div class="ml-14 mt-5 absolute z-10">
                <img class="h-56 lg:h-full" src="{{asset('storage/svg/doctor.svg')}}" type="image/svg+xml"/>
            </div>
        </div>
        <div class="ml-auto mt-12 lg:ml-auto">
            <div class="bg-vh-green-light opacity-60 rounded-full h-60 w-60">
                <span class="invisible">a</span>
            </div>        
        </div>
    </div>
    <div class="flex justify-center items-center">
        <div class="w-64">
            <div class="flex flex-col ml-4 mt-2 mb-2">
                <span class="font-bold text-lg">Area de Cardiologia</span>
                <span class="font-bold text-lg">Justo a tu Alcanze!!</span>
                <span class=" font-bold text-sm">Administración de Area designada</span>
            </div>
            <div class="my-5">
                <p class="text-xs text-justify mb-4 font-bold text-gray-400 mx-4 -mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <a href="/login" target="_self" class="w-4/5 h-8 text-white bg-vh-green text-sm shadow-xl mb-10 rounded-full lg:w-2/5 hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center pt-1 mx-4">
                Solicitar Cita
            </a>
        </div>
    
    </div>
    <div class="flex justify-center text-center flex-col items-center">
    <div class="w-full h-auto">
    <div>
        <h2 class="font-bold text-xl text-vh-green">Lorem Ipsum</h2>
        <p class="text-sm font-bold text-gray-400 mx-4 mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    </div>

    <div class="w-full flex grow-0 flex-wrap items-center justify-center mb-8">
        <div class="w-full min-w-40 max-w-72 mx-4 bg-blue-100 py-4 my-4 rounded-2xl shadow-lg px-8">
            <h2 class="text-lg font-bold mb-2 text-vh-green">Juan Jose Galdamez</h2>
            <p class="text-sm font-bold text-gray-400 mt-2">Primary Care Doctor</p>
            <a class="text-md text-justify text-vh-green block leading-7">Very personable and good listener. Makes you feel comfortable and open immediately. Felt well taken care...</a>
        </div>
        <div class="w-full min-w-40 max-w-72 mx-4 bg-blue-100 py-4 my-4 rounded-2xl shadow-lg px-8">
            <h2 class="text-lg font-bold mb-2 text-vh-green">Juan Jose Galdamez</h2>
            <p class="text-sm font-bold text-gray-400 mt-2">Primary Care Doctor</p>
            <a class="text-md text-justify text-vh-green block leading-7">Very personable and good listener. Makes you feel comfortable and open immediately. Felt well taken care...</a>
        </div>
        <div class="w-full min-w-40 max-w-72 mx-4 bg-blue-100 py-4 my-4 rounded-2xl shadow-lg px-8">
            <h2 class="text-lg font-bold mb-2 text-vh-green">Juan Jose Galdamez</h2>
            <p class="text-sm font-bold text-gray-400 mt-2">Primary Care Doctor</p>
            <a class="text-md text-justify text-vh-green block leading-7">Very personable and good listener. Makes you feel comfortable and open immediately. Felt well taken care...</a>
        </div>
    </div>
    </div>
    <div class="w-full text-center mb-8">
        <div class="mb-2">
            <h2 class="font-bold text-xl text-vh-green">Lorem Ipsum</h2>
            <p class="text-sm  text-gray-400 mx-4 mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <a class="text-md my-1 font-bold text-vh-green-medium block leading-7">Very personable and good listener.</a>
        </div>
        <div class="w-full h-auto flex flex-wrap items-center justify-center">
            <div class="w-full max-w-72 mx-4 bg-blue-100 py-4 my-4 rounded-2xl shadow-lg px-8">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic sit deleniti quisquam iusto. Autem sed totam fugit asperiores, ipsum sit enim inventore eligendi sunt quas qui, recusandae neque, repudiandae sequi!</div>
            <div class="w-full max-w-72 mx-4 bg-blue-100 py-4  my-4 rounded-2xl shadow-lg px-8">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic sit deleniti quisquam iusto. Autem sed totam fugit asperiores, ipsum sit enim inventore eligendi sunt quas qui, recusandae neque, repudiandae sequi!</div>
            <div class="w-full max-w-72 mx-4 bg-blue-100 py-4  my-4 rounded-2xl shadow-lg px-8">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic sit deleniti quisquam iusto. Autem sed totam fugit asperiores, ipsum sit enim inventore eligendi sunt quas qui, recusandae neque, repudiandae sequi!</div>
        </div>
    </div>
    <div class="w-full flex flex-col lg:flex-row">
        <div class="m-8 flex items-center justify-center lg:w-1/2">
            <h2 class="font-bold text-left text-xl  text-vh-green lg:font-bold lg:text-2xl">Las ventajas que posee con
             nuestros servicios son:</h2>
        </div>
        <div class="w-full flex flex-wrap justify-center items-center gap-4 lg:w-1/2">
            <!-- Primera columna -->
            <div class="w-32 h-auto bg-gray-100 p-10 my-4 rounded-2xl shadow-lg flex justify-center">
                <object data="{{asset('storage/svg/calendar.svg')}}" type="image/svg+xml" class="w-10"></object>
            </div>
            <div class="w-32 h-auto bg-gray-100 p-10 my-4 rounded-2xl shadow-lg flex justify-center">
                <object data="{{asset('storage/svg/calendar.svg')}}" type="image/svg+xml" class="w-10"></object>
            </div>
            <div class="w-32 h-auto bg-gray-100 p-10 my-4 rounded-2xl shadow-lg flex justify-center">
                <object data="{{asset('storage/svg/calendar.svg')}}" type="image/svg+xml" class="w-10"></object>
            </div>
                <!-- Segunda columna -->
            <div class="w-32 h-auto bg-gray-100 p-10 my-4 rounded-2xl shadow-lg flex justify-center">
                <object data="{{asset('storage/svg/calendar.svg')}}" type="image/svg+xml" class="w-10"></object>
            </div>
            <div class="w-32 h-auto bg-gray-100 p-10 my-4 rounded-2xl shadow-lg flex justify-center">
                <object data="{{asset('storage/svg/calendar.svg')}}" type="image/svg+xml" class="w-10"></object>
            </div>
            <div class="w-32 h-auto bg-gray-100 p-10 my-4 rounded-2xl shadow-lg flex justify-center">
                <object data="{{asset('storage/svg/calendar.svg')}}" type="image/svg+xml" class="w-10"></object>
            </div>
        </div>
    </div>
    </div>
    <div class=" mx-auto ">
     <div class="w-full py-2 ">
        <object data="{{asset('storage/svg/ad.svg')}}" type="image/svg+xml"
        class="mx-auto my-0"></object>
     </div> 
     <div class="flex justify-center text-center items-center flex-col">
         <h2 class="font-bold text-xl text-vh-green">¿Por qué elegir nuestros servicios?</h2>
             <div class="flex justify-center text-left items-center">
                <div class="flex flex-col">
                       <p class="text-xs font-bold text-gray-400 mx-6 mt-2">- Reach patients in your area looking for a new provider.</p>
                       <p class="text-xs font-bold text-gray-400 mx-6 mt-2">- Reach patients in your area looking for a new provider.</p>
                       <p class="text-xs font-bold text-gray-400 mx-6 mt-2">- Reach patients in your area looking for a new provider.</p>
               </div>
            </div>
            <a href="/login" target="_self" class="w-2/5 h-8 text-white bg-vh-green text-sm shadow-xl m-5 rounded-full lg:w-2/5 hover:bg-white hover:text-vh-green inline-block text-center pt-1 mx-4">
             Comienza ya             
            </a>
     </div>
    </div>
    <div class="w-11/12 mx-auto m-2 pt-5 pb-10 bg-blue-100 rounded-2xl shadow-lg px-8">
    <h2 class="font-bold text-center text-xl  pb-8 text-vh-green">Servicios</h2>
    <div class="flex justify-between">
    <ul class="w-5/12 list-none pl-0">
    <li class="text-vh-green relative pl-5 mb-2 ml-4">
        <span class="absolute left-0 top-0 transform -translate-x-4">&#10148;</span>
        Servicio 1
    </li>
    <li class="text-vh-green relative pl-5 mb-2 ml-4">
        <span class="absolute left-0 top-0 transform -translate-x-4">&#10148;</span>
        Servicio 2
    </li>
    <li class="text-vh-green relative pl-5 mb-2 ml-4">
        <span class="absolute left-0 top-0 transform -translate-x-4">&#10148;</span>
        Servicio 3
    </li>
    <li class="text-vh-green relative pl-5 mb-2 ml-4">
        <span class="absolute left-0 top-0 transform -translate-x-4">&#10148;</span>
        Servicio 4
    </li>   
            </ul>
            <ul class="w-5/12 list-none pl-0">
                <li class="text-vh-green relative pl-5 mb-2 ml-4">
                    <span class="absolute left-0 top-0 transform -translate-x-4">&#10148;</span>
                    Servicio 5
                </li>
                <li class="text-vh-green relative pl-5 mb-2 ml-4">
                    <span class="absolute left-0 top-0 transform -translate-x-4">&#10148;</span>
                    Servicio 6
                </li>
                <li class="text-vh-green relative pl-5 mb-2 ml-4">
                    <span class="absolute left-0 top-0 transform -translate-x-4">&#10148;</span>
                    Servicio 7
                </li>
                <li class="text-vh-green relative pl-5 mb-2 ml-4">
                    <span class="absolute left-0 top-0 transform -translate-x-4">&#10148;</span>
                    Servicio 8
                </li>
            </ul>
        </div>
    </div>
    <div>
        <h3 class=" text-left m-4  text-vh-green font-bold" >Vital Healt</h3>
        <h2 class=" text-center  font-bold  mt-3 mx-9 text-xl">Únase a nosotros y brindaremos una asistencia sanitaria de calidad. </h2>
        <a href="/login" target="_self" class="w-2/5 h-8 text-white bg-vh-green text-sm shadow-xl mt-5 rounded-full lg:w-2/5 hover:bg-white hover:text-vh-green inline-block text-center pt-1 mx-4">Unete ya           </a>
        <div class="w-full py-2">
            <object data="{{asset('storage/svg/ad.svg')}}" type="image/svg+xml" class="mx-auto my-0"></object>
        </div> 
    </div>
    @include('templates.footer') 
</body>
</html>