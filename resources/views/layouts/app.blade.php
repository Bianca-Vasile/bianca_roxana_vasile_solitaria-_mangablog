<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'MangaBlog')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="bg-light" style="font-family: 'Figtree', sans-serif;">

    <!-- NAVBAR -->
    @include('layouts.navigation')

    <!-- CONTENUTO PRINCIPALE -->
    <main class="container py-5">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="text-center py-4 mt-5 bg-dark text-light shadow-lg">
        <p class="mb-0">© {{ date('Y') }} <strong>MangaBlog</strong> | Progetto di <span class="text-warning">Bianca 💫</span></p>
        <p class="small mb-0">Creato con Laravel & Bootstrap 💻</p>
    </footer>

    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
