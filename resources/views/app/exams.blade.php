<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Exámenes</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/loader.css', 'resources/js/preloader.js', 'resources/js/examu.js', 'resources/js/scroll.js'])
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    @include('templates.loader')

    <!-- Header -->
    <div class="w-full h-auto">
        @include('templates.header')
    </div>

    <!-- Main Content -->
    <main class="flex-1 p-4 mt-6 lg:max-w-screen-2xl lg:mx-auto lg:rounded-md">
        <section class="flex flex-col lg:flex-row justify-between items-center mx-4 mb-6">
            <div class="flex-1 lg:mr-4 text-center lg:text-left">
                <h2 class="font-bold text-2xl text-vh-green-medium">Exámenes Personales</h2>
                <p class="text-sm mt-2">Los exámenes son necesarios para las citas</p>
            </div>
            <div>
                <button type="button" id="menu-buttone"
                    class="mt-4 lg:mt-0 inline-flex justify-center gap-x-1.5 rounded-md bg-vh-green px-3 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-vh-green-medium"
                    aria-expanded="false" aria-haspopup="true">
                    <h2>Exámenes Finalizados</h2>
                </button>
            </div>
        </section>

        <!-- Sección de Exámenes Pendientes -->
        <section id="pendientes" class="lg:px-16 lg:py-12 bg-gray-50">
            @if(isset($examenes) && $examenes->where('state', '1')->isEmpty())
                <div class="text-center py-8">
                    <p class="text-lg font-semibold text-gray-700">No tienes exámenes programados.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($examenes->where('state', '1') as $examen)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <div class="p-6 flex flex-col">
                                <h2 class="text-2xl font-bold text-gray-800 mb-2">Tipo de Examen</h2>
                                <p class="text-lg text-gray-700 mb-4">{{ $examen->exam_type ?? 'No disponible' }}</p>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Fecha</h3>
                                <p class="text-lg text-gray-700 mb-4">
                                    {{ !empty($examen->exam_date) ? (new DateTime($examen->exam_date))->format('j \d\e F \d\e Y') : 'No disponible' }}
                                </p>
                                <h4 class="text-lg font-semibold text-gray-800 mb-2">Notas</h4>
                                <p class="text-base text-gray-600">{{ $examen->notes ?? 'No disponible' }}</p>
                                <h4 class="text-lg font-semibold text-gray-800 mb-2">Estado</h4>
                                <p class="text-base text-gray-600">{{ $examen->state == "1" ? 'Pendiente' : 'Finalizado' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>

        <!-- Sección de Exámenes Finalizados -->
        <section id="finalizados" class="lg:px-16 lg:py-12 bg-gray-50 hidden">
            @if(isset($examenes) && $examenes->where('state', '0')->isEmpty())
                <div class="text-center py-8">
                    <p class="text-lg font-semibold text-gray-700">No tienes exámenes finalizados.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($examenes->where('state', '0') as $examen)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <div class="p-6 flex flex-col" data-id="{{$examen->id}}">
                                <h2 class="text-2xl font-bold text-gray-800 mb-2">Tipo de Examen</h2>
                                <p class="text-lg text-gray-700 mb-4">{{ $examen->exam_type ?? 'No disponible' }}</p>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Fecha</h3>
                                <p class="text-lg text-gray-700 mb-4">
                                    {{ !empty($examen->exam_date) ? (new DateTime($examen->exam_date))->format('j \d\e F \d\e Y') : 'No disponible' }}
                                </p>
                                <h4 class="text-lg font-semibold text-gray-800 mb-2">Notas</h4>
                                <p class="text-base text-gray-600">{{ $examen->notes ?? 'No disponible' }}</p>
                                <h4 class="text-lg font-semibold text-gray-800 mb-2">Estado</h4>
                                <p class="text-base text-gray-600">{{ $examen->state == "1" ? 'Pendiente' : 'Finalizado' }}</p>
                                <button class="bg-slate-500 text-white p-1 results">Resultados</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        @include('templates.footer')
    </footer>

    <!-- Chat IA -->
    <div class="fixed bottom-0 right-0 p-4">
        @include('templates.chat_ia')
    </div>
</body>

</html>
