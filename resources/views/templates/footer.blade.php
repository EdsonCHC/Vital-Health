<footer class="footer bg-gray-900">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('storage/svg/logo-icon-white.svg') }}" class="h-24 sm:h-28 lg:h-32"
                        alt="FlowBite Logo" />
                    <span
                        class="self-center text-lg sm:text-xl lg:text-2xl font-semibold whitespace-nowrap text-white-not-white ml-2">Vital-Health</span>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-4 sm:gap-6 sm:grid-cols-3">
                <div>
                    <h2 class="mb-4 text-xs sm:text-sm font-semibold text-gray-900 uppercase text-white-not-white">{{__('messages.es_220')}}
                    </h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-2 sm:mb-4">
                            <a href="/citas" class="hover:underline">{{__('messages.es_221')}}</a>
                        </li>
                        <li class="mb-2 sm:mb-4">
                            <a href="/examen" class="hover:underline">{{__('messages.es_222')}}</a>
                        </li>
                        <li class="mb-2 sm:mb-4">
                            <a href="/area" class="hover:underline">{{__('messages.es_223')}}</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-4 text-xs sm:text-sm font-semibold text-gray-900 uppercase text-white-not-white">{{__('messages.es_224')}}</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-2 sm:mb-4">
                            <a href="/about" class="hover:underline">{{__('messages.es_225')}}</a>
                        </li>
                        <li class="mb-2 sm:mb-4">
                            <a href="https://github.com/EdsonCHC/Vital-Health" class="hover:underline">Github</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-4 text-xs sm:text-sm font-semibold text-gray-900 uppercase text-white-not-white">{{__('messages.es_226')}}</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-2 sm:mb-4">
                            <a href="#" class="hover:underline">{{__('messages.es_227')}}</a>
                        </li>
                        <li class="mb-2 sm:mb-4">
                            <a href="#" class="hover:underline">{{__('messages.es_228')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-4 sm:my-6 border-gray-200 dark:border-gray-700 lg:my-8" />
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <span class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 text-center sm:text-left">&copy 2024
            {{__('messages.es_229')}}</span>
        </div>
    </div>
</footer>