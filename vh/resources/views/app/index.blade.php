<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    @vite('resources/css/app.css')
    <!-- @vite(['resources/js/app.js']) not used now  -->
</head>
<body class="w-full h-full">
    <div class="w-full h-full absolute top-0 z-10">
        @include('templates.header')
    </div>
    <div class="flex  lg:py-11 bg-vh-gray-light w-full ">
       <div class="ml-auto  mt-8  lg:ml-auto   ">
          <img class="lg:h-full" src="{{asset('storage/svg/doctor.svg')}}" type="image/svg+xml"/>
      </div>
        <div class="flex flex-col ml-11 justify-center">
          <div class="w-10 mb-4 ml-4 bg-vh-green-light">
            <span class="invisible">a</span>
          </div>     
          <div class=" w-12 mb-4 ml-2 bg-vh-green-medium">
            <span class="invisible">a</span>
          </div> 
          <div class=" w-14 mb-2  bg-vh-green">
            <span class="invisible">a</span>
          </div>       
        </div>
    </div>
    <div class="flex justify-center items-center">
        <div class="w-1/2">
            <div class="ml-4 mt-4 mb-2">
                <span class="font-bold text-lg">Brindamos Ayuda</span>
                <span class="font-bold text-lg">En tu Futuro</span>
            </div>
            <a href="/login" target="_self" class="w-4/5 h-8 text-white bg-vh-green text-sm shadow-xl mb-10 rounded-full lg:w-2/5 hover:bg-white hover:text-vh-green inline-block text-center pt-1 mx-4">
                Logueate ahora
            </a>
        </div>
        <div class="w-1/2">
            <p class="text-xs text-justify mb-4 font-bold text-gray-400 mx-4 -mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
    </div>
    <div class="flex justify-center text-center flex-col items-center">
    <div class="w-full h-auto">
    <div>
        <h2 class="font-bold  text-xl text-vh-green lg:font-bold  lg:text-4xl">Lorem Ipsum</h2>
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
            <h2 class="font-bold  text-xl text-vh-green lg:font-bold  lg:text-4xl">Lorem Ipsum</h2>
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
<h2 class="font-bold text-left text-xl text-vh-green lg:font-bold lg:text-4xl lg:ml-12">Las ventajas que posee con nuestros servicios son:</h2>
</div>
        <div class="w-full flex flex-wrap justify-center items-center gap-3 lg:w-1/2 lg:flex-row lg:flex-wrap lg:justify-start lg:ml-8 lg:mr-8 lg:flex-grow">
    <!-- Elementos en dos filas y tres columnas -->
    <div class="w-32 h-auto bg-gray-100 p-8 my-2 rounded-2xl shadow-lg flex justify-center lg:w-1/3">
        <object data="{{asset('storage/svg/calendar.svg')}}" type="image/svg+xml" class="w-10"></object>
    </div>
    <div class="w-32 h-auto bg-gray-100 p-8 my-2 rounded-2xl shadow-lg flex justify-center lg:w-1/3">
        <object data="{{asset('storage/svg/calendar.svg')}}" type="image/svg+xml" class="w-10"></object>
    </div>
    <div class="w-32 h-auto bg-gray-100 p-8 my-2 rounded-2xl shadow-lg flex justify-center lg:w-1/3">
        <object data="{{asset('storage/svg/calendar.svg')}}" type="image/svg+xml" class="w-10"></object>
    </div>
    <div class="w-32 h-auto bg-gray-100 p-8 my-2 rounded-2xl shadow-lg flex justify-center lg:w-1/3">
        <object data="{{asset('storage/svg/calendar.svg')}}" type="image/svg+xml" class="w-10"></object>
    </div>
    <div class="w-32 h-auto bg-gray-100 p-8 my-2 rounded-2xl shadow-lg flex justify-center lg:w-1/3">
        <object data="{{asset('storage/svg/calendar.svg')}}" type="image/svg+xml" class="w-10"></object>
    </div>
    <div class="w-32 h-auto bg-gray-100 p-8 my-2 rounded-2xl shadow-lg flex justify-center lg:w-1/3">
        <object data="{{asset('storage/svg/calendar.svg')}}" type="image/svg+xml" class="w-10"></object>
    </div>
</div>
</div>
</div>
    <div class="w-full flex flex-col lg:flex-row  ">
       <div class="m-8 flex items-center justify-center lg:w-1/2">
       <object data="{{asset('storage/svg/ad.svg')}}" type="image/svg+xml" class="mx-auto my-0 w-full lg:w-3/4 lg:ml-auto"></object>
        </div>
        <div class="flex justify-center text-left items-center flex-col">
        <h2 class="font-bold  text-xl text-vh-green lg:font-bold lg:text-left lg:text-4xl lg:ml-12">Por qué elegir nuestros servicios?</h2>
    <div class="flex justify-center lg:text-center items-center">
        <div class="flex flex-col">
            <p class="text-base lg:text-2xl font-bold text-gray-400 mx-6 mt-2">- Reach patients in your area looking for a new provider.</p>
            <p class="text-base lg:text-2xl font-bold text-gray-400 mx-6 mt-2">- Reach patients in your area looking for a new provider.</p>
            <p class="text-base lg:text-2xl font-bold text-gray-400 mx-6 mt-2">- Reach patients in your area looking for a new provider.</p>
        </div>
    </div>
    <a href="/login" target="_self" class="w-2/5 lg:w-2/3 h-12 text-white bg-vh-green text-base lg:text-3xl shadow-xl m-5 rounded-full hover:bg-white hover:text-vh-green inline-block text-center pt-2 lg:pt-1 mx-4">
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
    
    <div class="w-full flex flex-col lg:flex-row  ">
        <div class="flex flex-col">

         <h3 class=" text-left m-4  text-vh-green font-bold" >Vital Healt</h3>
        <h2 class=" text-center  font-bold  mt-3 mx-9 text-xl">Únase a nosotros y brindaremos una asistencia sanitaria de calidad. </h2>
        <div class="flex justify-center  ">
        <a href="/login" target="_self" class="w-2/5 h-8 text-white bg-vh-green text-sm shadow-xl mt-5 rounded-full lg:w-2/5 hover:bg-white hover:text-vh-green inline-block text-center pt-1 mx-4">
         Unete ya </a>
         </div> 
         </div> 


         <div class="m-8 flex items-center justify-center lg:w-1/2">
             <object data="{{asset('storage/svg/ad.svg')}}" type="image/svg+xml" class="mx-auto my-0 w-full lg:w-3/4 lg:ml-auto"></object>
        </div> 


    </div>
    @include('templates.footer') 
</body>
</html>
      