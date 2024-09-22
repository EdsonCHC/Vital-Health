<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expediente de: {{ $user->name }} {{ $user->lastName }}</title>
    <link rel="stylesheet" href="{{ asset('css/file.css') }}">
    <style>
        /* Base styles */

        @page {
            margin: 20mm;
        }

        .page-break {
            page-break-before: always;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
        }

        .p-4 {
            padding: 1rem;
        }

        .p-2 {
            padding: 0.5rem;
        }

        .mx-4 {
            margin-left: 1rem;
            margin-left: 1rem;
        }

        .mb-6 {
            margin-bottom: 1.5rem;
        }

        .mb-8 {
            margin-bottom: 2rem;
        }

        .font-bold {
            font-weight: bold;
        }

        .font-semibold {
            font-weight: 600;
        }

        .text-3xl {
            font-size: 1.875rem;
            line-height: 2.25rem;
        }

        .text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem;
        }

        .text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem;
        }

        .text-gray-700 {
            color: #4a5568;
        }

        .text-gray-500 {
            color: #6b7280;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .bg-gray-50 {
            background-color: #f9fafb;
        }

        .border {
            border: 1px solid #e2e8f0;
        }

        .rounded {
            border-radius: 0.375rem;
        }

        .rounded-full {
            border-radius: 9999px;
        }

        .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .shadow-2xl {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .hover\:shadow-2xl:hover {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .grid {
            display: grid;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .flex {
            display: flex;
        }

        .justify-between {
            justify-content: space-between;
        }

        .items-start {
            align-items: flex-start;
        }

        .items-center {
            align-items: center;
        }

        .w-full {
            width: 100%;
        }

        .h-12 {
            height: 3rem;
        }

        .h-24 {
            height: 6rem;
        }

        .list-disc {
            list-style-type: disc;
        }

        .pl-5 {
            padding-left: 1.25rem;
        }
    </style>
</head>

<body>
    <div class="container p-4">
        <h1 class="text-3xl font-bold mb-6">Expediente Medico</h1>
        <!-- Section I: Patient Information -->
        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Sección I. Información del paciente</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold">Nombre</label>
                    <input type="text" class="w-full p-2 border rounded" value="{{ $user->name }} {{ $user->lastName }}"
                        readonly>
                </div>
                <div>
                    <label class="block font-bold">Fecha de Nacimiento</label>
                    <input type="date" class="w-full p-2 border rounded" value="{{ $user->birth }}" readonly>
                </div>
                <div>
                    <label class="block font-bold">Género</label>
                    <input type="text" class="w-full p-2 border rounded text-input" value="{{ $user->gender }}"
                        readonly>
                </div>
                <div>
                    <label class="block font-bold">Correo Electrónico</label>
                    <input type="text" class="w-full p-2 border rounded" value="{{ $user->mail }}" readonly>
                </div>
                <div>
                    <label class="block font-bold">Residencia</label>
                    <input type="text" class="w-full p-2 border rounded" value="{{ $user->address }}" readonly>
                </div>
                <div>
                    <label class="block font-bold">Tipo de Sangre</label>
                    <input type="text" class="w-full p-2 border rounded" value="{{ $user->blood }}" readonly>
                </div>
            </div>
        </section>

        <div class="page-break"></div>

        <!-- Section II: Medical history -->
        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Sección II. Historial Medico</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @if (isset($citas) && $citas->isEmpty())
                    <p>No Tienes Citas Finalizadas...</p>
                @else
                    <div class="gap-4">
                        @foreach ($citas as $cita)
                            <div class="border rounded p-4 mx-4 bg-white">
                                <label class="block font-bold text-lg text-gray-700">
                                    Especialidad de la Cita
                                </label>
                                <p class="w-full p-2 border rounded bg-gray-50">
                                    {{ $cita->category->nombre ?? 'No disponible' }}
                                </p>

                                <label class="block font-bold text-lg text-gray-700 mt-4">
                                    Doctor
                                </label>
                                <p class="w-full p-2 border rounded bg-gray-50">
                                    {{ $cita->doctor->name ?? 'No disponible' }}
                                    {{ $cita->doctor->lastName ?? 'No disponible' }}
                                </p>

                                <label class="block font-bold text-lg text-gray-700 mt-4">
                                    Hora
                                </label>
                                <p class="w-full p-2 border rounded bg-gray-50">
                                    {{ !empty($cita->hour) ? (new DateTime($cita->hour))->format('h:i A') : 'No disponible' }}
                                </p>

                                <label class="block font-bold text-lg text-gray-700 mt-4">
                                    Fecha
                                </label>
                                <p class="w-full p-2 border rounded bg-gray-50">
                                    {{ !empty($cita->date) ? (new DateTime($cita->date))->format('j \d\e F \d\e Y') : 'No disponible' }}
                                </p>

                                <label class="block font-bold text-lg text-gray-700 mt-4">
                                    Descripción
                                </label>
                                <p class="w-full p-2 border rounded bg-gray-50">
                                    {{ $cita->description ?? 'No disponible' }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        <div class="page-break"></div>

        <!-- Section III: Assigned medication -->
        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Sección III. Medicaciones</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @if ($recetas->isEmpty())
                    <p>No Tienes Medicamentos Asignados...</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
                        @foreach ($recetas as $receta)
                            <article class="bg-white p-6 mb-6 shadow-lg hover:shadow-2xl rounded-lg border">
                                <div class="flex justify-between items-start pb-4 mb-4 border-b">
                                    <div class="flex items-center">
                                        <div class="pr-3">
                                            <object class="h-12 w-12 rounded-full object-cover"
                                                data="{{ asset('storage/svg/medicine_example.svg') }}"
                                                type="image/svg+xml"></object>
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold">{{ $receta->titulo }}</p>
                                            <p class="text-sm text-gray-500">Fecha de Entrega:
                                                {{ $receta->fecha_entrega }}
                                            </p>
                                            <p class="text-sm text-gray-500">Estado: {{ $receta->estado }}</p>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="font-medium text-xl mb-4">Medicamento</h3>
                                <div class="p-4 bg-gray-50 rounded">
                                    <h4 class="text-lg font-semibold mb-2">Nombre:</h4>
                                    <p>{{ $receta->medicamento->name ?? 'No tiene medicamentos'}}</p>
                                    <h4 class="text-lg font-semibold mb-2 mt-2">Número de Lote:</h4>
                                    <p>{{ $receta->medicamento->batch_number ?? 'No tiene medicamentos'}}</p>
                                    <h4 class="text-lg font-semibold mb-2 mt-2">Cantidad:</h4>
                                    <p>{{ $receta->medicamento->quantity ?? 'No tiene medicamentos'}}</p>
                                    <h4 class="text-lg font-semibold mb-2 mt-2">Fecha de Expiración:</h4>
                                    <p>{{ $receta->medicamento->expiration_date ?? 'No tiene medicamentos'}}</p>
                                    <h4 class="text-lg font-semibold mb-2 mt-2">Descripción:</h4>
                                    <p>{{ $receta->medicamento->description ?? 'No tiene medicamentos'}}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        <div class="page-break"></div>

        <!-- Section IV: Medical Exams -->
        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Sección IV. Exámenes Medicos</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @if ($exams->isEmpty())
                    <p>No Tienes Exámenes Médicos...</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
                        @foreach ($exams as $exam)
                            <div class="bg-white p-6 mb-6 shadow-md hover:shadow-lg rounded-lg border border-gray-200">
                                <h3 class="font-semibold text-xl mb-3 text-gray-800">
                                    {{ $exam->nombre }}
                                </h3>
                                <p class="text-gray-600 mb-1"><span class="font-medium">Fecha:</span> {{ $exam->exam_date }}</p>
                                <p class="text-gray-600 mb-1"><span class="font-medium">Tipo:</span> {{ $exam->exam_type }}</p>
                                <p class="text-gray-600"><span class="font-medium">Descripción:</span> {{ $exam->notes }}</p>
                            </div>

                        @endforeach
                    </div>
                @endif
            </div>
        </section>
        <div class="flex justify-between">
            <h2 class="font-medium text-gray-600">&copy; 2024 Vital Health. Todos los derechos
                reservados.
            </h2>
        </div>
    </div>
</body>

</html>