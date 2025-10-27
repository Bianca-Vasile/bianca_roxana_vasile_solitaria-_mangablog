<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Manga Blog')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fafafa;
            font-family: 'Segoe UI';
        }
        nav.navbar {
            background-color: #d32f2f;
        }
        .navbar-brand {
            font-weight: bold;
            color: white !important;
        }
        .nav-link {
            color: white !important;
            font-weight: 500;
        }
        .nav-link:hover {
            text-decoration: underline;
        }
        footer {
            background: #222;
            color: #ccc;
            padding: 20px;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">🩷 Manga Blog</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('mangas.index') }}">I miei Manga</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Chi siamo</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contatti</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- CONTENUTO PRINCIPALE --}}
    <main class="container py-4">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer>
        <p>Manga Blog © {{ date('Y') }} | Creato da Bianca</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
