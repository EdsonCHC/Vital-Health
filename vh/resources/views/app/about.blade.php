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
    @include('templates.header')
    
    <div class="flex w-full pt-12 pl-5 lg:pt-16 bg-vh-gray-light  ">
    <div class="flex lg:w-1/2  w-40 lg:items-end lg:justify-center  items-end">
            <img class="lg:h-96 lg:w-96" src="{{asset('storage/svg/doctor.svg')}}" type="image/svg+xml" alt="Doctor Image"/>
    </div>

      <div class="flex flex-col w-60 lg:w-1/2 mx-auto  ">
         <h2 class="font-bold text-xl lg:text-4xl text-start lg:text-start text-vh-green lg:font-bold pb-1  lg:pb-6">Por qué Elegirnos</h2>
              <ul class="text-start text-sm pb-1 pl-5 lg:pl-24">
              <li class="text-base lg:text-2xl lg:font-semibold text-gray-400 list-disc">At your Quick service</li>
              <li class="text-base lg:text-2xl lg:font-semibold text-gray-400 list-disc">At your Quick service</li>
              <li class="text-base lg:text-2xl lg:font-semibold text-gray-400 list-disc">At your Quick service</li>
              <li class="text-base lg:text-2xl lg:font-semibold text-gray-400 list-disc">At your Quick service</li>
              <li class="text-base lg:text-2xl lg:font-semibold text-gray-400 list-disc">At your Quick service</li>
              <li class="text-base lg:text-2xl lg:font-semibold text-gray-400 list-disc">At your Quick service</li>
             </ul>
             <a href="/Registrate" target="_self" class="w-3/5 h-8 font-bold  text-white bg-vh-green text-sm shadow-xl mb-10 rounded-full d lg:w-1/5 hover:bg-white hover:text-vh-green inline-block text-center pt-1 lg:mt-3 mx-auto lg:mx-0">
                Regístrate
             </a>
        </div>
        
    </div>
    <div class="w-full flex flex-col lg:flex-row pt-8  lg:pt-16">
    <div class="lg:w-1/2 flex items-center justify-center lg:order-last">
        <object data="{{asset('storage/svg/ad.svg')}}" type="image/svg+xml" class="w-96"></object>
        <object data="{{asset('storage/svg/ad.svg')}}" type="image/svg+xml" class="w-96"></object>
    </div> 
    <div class="lg:w-1/2 flex flex-col lg:pl-28">
        <h2 class="text-star font-bold text-vh-green mb-5 text-4xl mt-8 mx-8">Mision</h2>
        <div class="flex justify-center text-start">
            <p class="text-base mx-8">Weekend UX, is a UI/UX Design Academy in Delhi involved in User
                Experience and User Interface Training and Consulting. It was started 
                in 2023 and passionate towards User Interface Design/ User Experience
                Design, Human Computer Interaction Design. Humanoid is gushing 
                towards competence to acquire knowledge and have a wide understanding 
                towards the sphere through the foremost courses in the area of UI/UX 
                Design, by strengthening up your skills, for your golden future
            </p>
        </div> 
    </div> 
</div>

    
    @include('templates.footer') 
</body>
</html>
      