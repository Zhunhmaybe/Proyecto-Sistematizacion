<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <!-- Aquí puedes agregar tus estilos globales -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <!-- Aquí puede ir tu barra de navegación si la tienes -->
        @yield('content')  <!-- El contenido específico de cada vista se inyecta aquí -->
    </div>

    <!-- Aquí puedes agregar tus scripts globales -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
