<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    @vite(['resources/css/app.css'])
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body class="bg-gray-200 flex h-screen">
    @include('templates.header_ad')
    <main class="flex-1 lg:pl-72 p-6 space-y-8">
        <header class="flex items-center justify-between mb-8 bg-white shadow-lg p-6 rounded-lg">
            <div class="text-3xl font-semibold text-gray-900">Dashboard</div>
        </header>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Personal por Categoría</h3>
                <div class="w-full h-72">
                    <canvas id="doctors_chart"></canvas>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Citas por Categoría</h3>
                <div class="w-full h-72">
                    <canvas id="appointments_chart"></canvas>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Doctores de la Categoría</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($doctores->take(3) as $doctor)
                    <div class="bg-white shadow-md rounded-lg p-6 flex flex-col transition-transform transform hover:-translate-y-1 hover:shadow-lg">
                        <div class="text-xl font-bold text-green-800 mb-4">{{ $doctor->name }} {{ $doctor->lastName }}</div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-700 mb-2"><strong>Número:</strong> {{ $doctor->number }}</p>
                            <p class="text-sm text-gray-700 mb-2"><strong>Edad:</strong> {{ $doctor->age }}</p>
                            <p class="text-sm text-gray-700 mb-2"><strong>Género:</strong> {{ $doctor->gender }}</p>
                            <p class="text-sm text-gray-700"><strong>Correo:</strong> {{ $doctor->mail }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <script>
            const categoryId = @json($id);

            const createChart = (ctx, type, label, data, borderColor, backgroundColor, fill = false) => {
                if (ctx) {
                    new Chart(ctx, {
                        type: type,
                        data: {
                            labels: data.map(entry => entry.date),
                            datasets: [{
                                label: label,
                                data: data.map(entry => entry.count),
                                borderColor: borderColor,
                                backgroundColor: backgroundColor,
                                fill: fill,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            let label = context.dataset.label || '';
                                            if (label) {
                                                label += ': ';
                                            }
                                            if (context.parsed.y !== null) {
                                                label += new Intl.NumberFormat().format(context.parsed.y);
                                            }
                                            return label;
                                        }
                                    }
                                }
                            },
                            scales: {
                                x: {
                                    grid: {
                                        display: false,
                                    }
                                },
                                y: {
                                    grid: {
                                        borderDash: [5, 5],
                                    },
                                    ticks: {
                                        callback: function(value) {
                                            return new Intl.NumberFormat().format(value);
                                        }
                                    }
                                }
                            }
                        }
                    });
                } else {
                    console.error('Error al obtener el contexto para el gráfico:', ctx);
                }
            };

            axios.get(`/statistics/${categoryId}/personnel`)
                .then(response => {
                    console.log('Datos de Doctores:', response.data);
                    createChart(
                        document.getElementById('doctors_chart').getContext('2d'),
                        'line',
                        'Doctores',
                        response.data,
                        'rgba(0, 128, 0, 1)',  // Dark green
                        'rgba(0, 128, 0, 0.2)',  // Light green
                        true
                    );
                })
                .catch(error => console.error('Error al cargar los datos de doctores:', error));

            axios.get(`/statistics/${categoryId}/appointments`)
                .then(response => {
                    console.log('Datos de Citas:', response.data);
                    createChart(
                        document.getElementById('appointments_chart').getContext('2d'),
                        'line',
                        'Citas',
                        response.data,
                        'rgba(0, 128, 0, 1)',  // Dark green
                        'rgba(0, 128, 0, 0.2)',
                        true
                    );
                })
                .catch(error => console.error('Error al cargar los datos de citas:', error));
        </script>
    </main>
</body>

</html>
