<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/404.css'])
</head>

<body class="bg-gray-100">
    <section class="page_404 flex items-center justify-center h-screen">
        <div class="container text-center">
            <div class="">
                <div class="four_zero_four_bg mb-8">
                    <h1 class="text-center text-9xl font-bold text-gray-700">404</h1>
                </div>
                <div class="contant_box_404">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Parece que te has perdido</h3>
                    <p class="text-gray-600 mb-6">La página que buscas no está disponible!</p>
                    <a href="/" class="link_404 rounded-lg">Volver al inicio</a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
