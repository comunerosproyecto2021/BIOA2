<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIOA2</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/funcionalidad.js') }}" defer></script>
    <script src="{{ asset('js/mantenimientos.js') }}" defer></script>
    <script src="{{ asset('js/usuarios.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert2@11.js') }}" defer></script>
    <script src="{{ asset('js/ajax.js') }}" defer></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="flex-shrink-0 py-4 bg-dark text-white-50">
        <div class="text-center">
            <small>Copyright &copy; Todos los derechos reservados.</small>
        </div>
    </footer>
</body>
</html>
