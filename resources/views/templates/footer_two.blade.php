<footer class="bg-green-100 py-8 text-gray-800  mt-20">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="flex flex-wrap justify-between">
            <!-- Sección 1 -->
            <div class="w-full lg:w-1/4 mb-6 text-center lg:text-left">
                <h4 class="text-2xl font-semibold text-green-700 mb-4">Página Web</h4>
                <ul class="list-none space-y-2">
                    <li><a href="/" class="text-lg font-medium text-green-600 hover:text-green-800 transition duration-300">Inicio</a></li>
                    <li><a href="/about" class="text-lg font-medium text-green-600 hover:text-green-800 transition duration-300">Acerca de</a></li>
                </ul>
            </div>
            <div class="w-full lg:w-1/4 mb-6 text-center lg:text-left">
                <h4 class="text-2xl font-semibold text-green-700 mb-4">Atención al Cliente</h4>
                <ul class="list-none space-y-2">
                    @auth
                        <li><a href="{{ url('/medicina') }}" class="text-lg font-medium text-green-600 hover:text-green-800 transition duration-300">Medicina</a></li>
                        <li><a href="{{ url('/citas') }}" class="text-lg font-medium text-green-600 hover:text-green-800 transition duration-300">Citas</a></li>
                        <li><a href="{{ url('/examen') }}" class="text-lg font-medium text-green-600 hover:text-green-800 transition duration-300">Exámenes</a></li>
                        <li><a href="#" class="text-lg font-medium text-green-600 hover:text-green-800 transition duration-300">Control Personal</a></li>
                    @else
                        <li><span class="text-lg font-medium text-green-600 hover:text-green-800 ">Medicina </span></li>
                        <li><span class="text-lg font-medium text-green-600 hover:text-green-800 ">Citas </span></li>
                        <li><span class="text-lg font-medium text-green-600 hover:text-green-800 ">Exámenes </span></li>
                        <li><span class="text-lg font-medium text-green-600 hover:text-green-800 ">Control Personal</span></li>
                    @endauth
                </ul>
            </div>
            <div class="w-full lg:w-1/4 mb-6 text-center lg:text-left">
                <h4 class="text-2xl font-semibold text-green-700 mb-4">Redes Sociales</h4>
                <ul class="list-none space-y-2">
                    <li><a href="#" class="text-lg font-medium text-green-600 hover:text-green-800 transition duration-300">Facebook</a></li>
                    <li><a href="#" class="text-lg font-medium text-green-600 hover:text-green-800 transition duration-300">X</a></li>
                    <li><a href="#" class="text-lg font-medium text-green-600 hover:text-green-800 transition duration-300">Instagram</a></li>
                </ul>
            </div>
            <div class="w-full lg:w-1/4 mb-6 text-center lg:text-left">
                <a href="/"><img src="{{ asset('storage/svg/logo.svg') }}" alt="logo" class="mx-auto mb-4 w-36"></a>
                <p class="text-base text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non quaerat nihil dolores laborum, aliquid, culpa recusandae blanditiis consequuntur reiciendis dolorum repellendus labore provident officiis veritatis sed dicta quo iure laboriosam!</p>
            </div>
        </div>
        <hr class="border-t-2 border-green-500 my-6">
        <div class="text-center">
            <p class="font-medium text-gray-600">&copy; 2024 Vital Health. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
