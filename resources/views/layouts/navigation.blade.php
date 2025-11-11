<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #6f42c1;">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold text-white d-flex align-items-center" href="{{ url('/') }}">
            🌸 <span class="ms-2">MangaBlog</span>
        </a>

        <!-- Toggle per mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Link -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('mangas') ? 'fw-bold' : '' }}" href="{{ route('mangas.index') }}">
                        📚 Tutti i Manga
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('mangas/create') ? 'fw-bold' : '' }}" href="{{ route('mangas.create') }}">
                        ➕ Aggiungi Manga
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
