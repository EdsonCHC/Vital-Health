<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    @vite('resources/css/app.css')
    <!-- @vite(['resources/js/app.js']) not used now  -->
</head>
<body class="w-full h-screen flex flex-col">
    @include('templates.header')
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
<div>
    <div>
        <h2 class="font-bold text-xl text-vh-green">Lorem Ipsum</h2>
        <p class="text-sm font-bold text-gray-400 mx-4 mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    </div>
    <div class="flex justify-center">

        <div class="w-3/4 mx-4 bg-blue-100 py-4 my-4 rounded-2xl shadow-lg px-8">
            <h2 class="text-lg font-bold mb-2 text-vh-green">Juan Jose Galdamez</h2>
            <p class="text-sm font-bold text-gray-400 mt-2">Primary Care Doctor</p>
            <a class="text-md text-justify text-vh-green block leading-7">Very personable and good listener. Makes you feel comfortable and open immediately. Felt well taken care...</a>
        </div>
    </div>
    <div class="flex justify-center">
        <div class="w-3/4 mx-4 bg-blue-100 py-4 my-4 rounded-2xl shadow-lg px-8">
            <h2 class="text-lg font-bold mb-2 text-vh-green">Juan Jose Galdamez</h2>
            <p class="text-sm font-bold text-gray-400 mt-2">Primary Care Doctor</p>
            <a class="text-md text-justify text-vh-green block leading-7">Very personable and good listener. Makes you feel comfortable and open immediately. Felt well taken care...</a>
        </div>
    </div>
    <div class="flex justify-center">
        <div class="w-3/4 mx-4 bg-blue-100 py-4 my-4 rounded-2xl shadow-lg px-8">
            <h2 class="text-lg font-bold mb-2 text-vh-green">Juan Jose Galdamez</h2>
            <p class="text-sm font-bold text-gray-400 mt-2">Primary Care Doctor</p>
            <a class="text-md text-justify text-vh-green block leading-7">Very personable and good listener. Makes you feel comfortable and open immediately. Felt well taken care...</a>
        </div>
    </div>
</div>
<div class="flex justify-center text-center flex-col items-center">
    <div>
        <div class="mb-2">
            <h2 class="font-bold text-xl text-vh-green">Lorem Ipsum</h2>
            <p class="text-sm  text-gray-400 mx-4 mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <a class="text-md my-1 font-bold text-vh-green-medium block leading-7">Very personable and good listener.</a>
        </div>
        <div class="flex justify-center">
             <div class="flex flex-col w-full ">
                 <div class="w-8/12 mx-auto bg-blue-100 py-20 my-4 rounded-2xl shadow-lg px-8">
                 </div>
                 <div class="w-8/12 mx-auto bg-blue-100 py-20  my-4 rounded-2xl shadow-lg px-8">
                 </div>
                 <div class="w-8/12 mx-auto bg-blue-100 py-20  my-4 rounded-2xl shadow-lg px-8">
                 </div>
            </div>
         </div>
   </div>
</div>
<div class="flex">
    <div>
        <div class="m-8">
            <h2 class="font-bold text-left text-xl  text-vh-green">Las ventajas que posee con
             nuestros servicios son:</h2>
        </div>
        <div class="flex justify-center">
           <div class="w-9/12 mx-auto flex flex-wrap justify-between">
                <!-- Primera columna -->
                <div class="w-5/12 bg-gray-100 py-4 my-4 rounded-2xl shadow-lg">
                   <p class="font-bold text-sm text-gray-400 mt-1">Primary Care</p>
                </div>
                <div class="w-5/12 bg-gray-100 py-4 my-4 rounded-2xl shadow-lg">
                   <p class="font-bold text-sm text-gray-400 mt-1">Primary Care</p>
                </div>
                <div class="w-5/12 bg-gray-100 py-4 my-4 rounded-2xl shadow-lg">
                   <p class="font-bold text-sm text-gray-400 mt-1">Primary Care</p>
                </div>
                    <!-- Segunda columna -->
                <div class="w-5/12 bg-gray-100 py-4 my-4 rounded-2xl shadow-lg">
                   <p class="font-bold text-sm text-gray-400 mt-1">Primary Care</p>
                </div>
                <div class="w-5/12 bg-gray-100 py-4 my-4 rounded-2xl shadow-lg">
                   <p class="font-bold text-sm text-gray-400 mt-1">Primary Care</p>
                </div>
                <div class="w-5/12 bg-gray-100 py-4 my-4 rounded-2xl shadow-lg">
                   <p class="font-bold text-sm text-gray-400 mt-1">Primary Care</p>
                </div>
           </div>
        </div>
   </div>
</div>

<div class=" mx-auto ">
     <div class="w-11/12 mx-auto py-2 ">
        <object data="{{asset('storage/svg/ad.svg')}}" type="image/svg+xml"></object>
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
  <a href="/login" target="_self" class="w-2/5 h-8 text-white bg-vh-green text-sm shadow-xl mt-5 rounded-full lg:w-2/5 hover:bg-white hover:text-vh-green inline-block text-center pt-1 mx-4">
             Unete ya             
   </a>
   <div class="w-11/12 mx-auto py-2">
        <object data="{{asset('storage/svg/ad.svg')}}" type="image/svg+xml"></object>
    </div> 

</div>
<div class="h-2/5 hidden">
        @include('templates.footer')  
        <div class="">
            <object data="" type="image/svg+xml"></object>
        </div>
</div>

</body>
</html>