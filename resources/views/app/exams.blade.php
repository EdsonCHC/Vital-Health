<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{__('messages.es_82')}}</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/loader.css', 'resources/js/preloader.js', 'resources/js/examUser.js', 'resources/js/scroll.js'])
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    @include('templates.loader')

    <!-- Header -->
    <header class="w-full">
        @include('templates.header')
    </header>

    <!-- Main Content -->
    <main class="flex-1 p-4 mt-6 lg:max-w-screen-2xl lg:mx-auto lg:rounded-md">
        <section class="w-full flex flex-col lg:flex-row justify-between items-center mb-6 gap-4">
            <div class="text-center lg:text-left">
                <h2 class="text-4xl font-bold text-vh-green mb-2">{{__('messages.es_83')}}</h2>
                <p class="text-lg text-gray-700">{{__('messages.es_84')}}</p>
            </div>
            <!-- Botón para alternar entre Exámenes Pendientes y Finalizados -->
            <div class="flex justify-end mb-4">
                <button id="toggle-examenes"
                    class="bg-vh-green text-white font-semibold rounded-md px-4 py-2 shadow hover:bg-green-700 focus:ring-2 focus:ring-vh-green">
                    {{__('messages.es_85')}}
                </button>
            </div>
        </section>

        <section id="examenes" class="lg:px-16 lg:py-12">

            <!-- Exámenes Pendientes -->
            <div id="pendientes">
                @if (isset($examenes) && $examenes->where('state', '1')->isEmpty())
                    <div class="text-center py-8">
                        <p class="text-lg font-semibold text-gray-700">{{__('messages.es_86')}}</p>
                    </div>
                @else
                    <h2 class="text-xl font-bold text-vh-green mb-2">{{__('messages.es_87')}}</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($examenes->where('state', '1') as $examen)
                            <div class="bg-white rounded-lg shadow-lg p-6">
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">{{__('messages.es_88')}}</h3>
                                <p class="text-lg text-gray-700 mb-4">{{ $examen->exam_type ?? 'No disponible' }}</p>
                                <h4 class="text-xl font-semibold text-gray-800 mb-2">{{__('messages.es_89')}}</h4>
                                <p class="text-lg text-gray-700 mb-4">
                                    {{ !empty($examen->exam_date) ? (new DateTime($examen->exam_date))->format('j \d\e F \d\e Y') : 'No disponible' }}
                                </p>
                                <h4 class="text-lg font-semibold text-gray-800 mb-2">{{__('messages.es_90')}}</h4>
                                <p class="text-base text-gray-600 mb-4">{{ $examen->notes ?? 'No disponible' }}</p>
                                <h4 class="text-lg font-semibold text-gray-800 mb-2">{{__('messages.es_91')}}</h4>
                                <p class="text-base text-gray-600">
                                    {{ $examen->state == '1' ? 'Pendiente' : 'Finalizado' }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Exámenes Finalizados (ocultos inicialmente) -->
            <div id="finalizados" class="hidden">
                @if (isset($examenes) && $examenes->where('state', '0')->isEmpty())
                    <div class="text-center py-8">
                        <p class="text-lg font-semibold text-gray-700">{{__('messages.es_92')}}</p>
                    </div>
                @else
                    <h2 class="text-xl font-bold text-vh-green mb-2">{{__('messages.es_93')}}</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($examenes->where('state', '0') as $examen)
                            <div class="bg-white rounded-lg shadow-lg p-6">
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">{{__('messages.es_88')}}</h3>
                                <p class="text-lg text-gray-700 mb-4">{{ $examen->exam_type ?? 'No disponible' }}</p>
                                <h4 class="text-xl font-semibold text-gray-800 mb-2">{{__('messages.es_89')}}</h4>
                                <p class="text-lg text-gray-700 mb-4">
                                    {{ !empty($examen->exam_date) ? (new DateTime($examen->exam_date))->format('j \d\e F \d\e Y') : 'No disponible' }}
                                </p>
                                <h4 class="text-lg font-semibold text-gray-800 mb-2">{{__('messages.es_90')}}</h4>
                                <p class="text-base text-gray-600">{{ $examen->notes ?? 'No disponible' }}</p>
                                <h4 class="text-lg font-semibold text-gray-800 mb-2">Estado</h4>
                                <p class="text-base text-gray-600">
                                    {{ $examen->state == '1' ? 'Pendiente' : 'Finalizado' }}
                                </p>
                                <button class="bg-slate-500 text-white p-1 mt-2">{{__('messages.es_97')}}</button>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </main>

    <!-- Footer -->
    <div class="w-full h-auto footer-container">
        @include('templates.footer')
    </div>

    <aside class="bg-gray-100">
        @include('templates.chat_ia')
    </aside>
</body>

</html>