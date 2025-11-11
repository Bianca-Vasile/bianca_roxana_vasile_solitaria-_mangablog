@extends('layouts.app')

@section('title', 'Lista Manga')

@section('content')
<div class="container py-5">

    {{-- 🔹 Titolo + Bottone in alto --}}
    <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
        <h1 class="m-0"
            style="background: linear-gradient(90deg, #6f42c1, #9b59b6); -webkit-background-clip: text; color: transparent;">
            🌸 Tutti i Manga
        </h1>

        <a href="{{ route('mangas.create') }}" class="btn btn-primary shadow-sm px-4 py-2 rounded-pill">
            ➕ Aggiungi un nuovo Manga
        </a>
    </div>

    {{-- ✅ Messaggio di conferma --}}
    @if (session('success'))
        <div class="alert alert-success text-center mx-auto"
             style="max-width: 600px; animation: fadeIn 0.8s ease-in-out;">
            {{ session('success') }}
        </div>
        <style>
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(-10px); }
                to { opacity: 1; transform: translateY(0); }
            }
        </style>
    @endif

    {{-- ✅ Lista Manga --}}
    @if ($mangas->count())
        <div class="row g-4">
            @foreach ($mangas as $manga)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        {{-- ✅ Immagine --}}
                        <img src="{{ asset($manga->image_path ?? 'images/default-manga.jpg') }}"
                             class="card-img-top rounded-top-4"
                             alt="{{ $manga->title }}"
                             style="height: 320px; object-fit: cover;">

                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold text-primary">{{ $manga->title }}</h5>
                            <p class="card-text text-muted">{{ $manga->description }}</p>
                            <p><strong>Numero:</strong> {{ $manga->number }}</p>
                            <p><strong>Anno:</strong> {{ $manga->year }}</p>
                            <span class="badge bg-secondary">{{ $manga->genre }}</span>
                        </div>

                        {{-- ✅ Pulsanti --}}
                        <div class="card-footer text-center bg-light border-top">
                            <a href="{{ route('mangas.edit', $manga->id) }}"
                               class="btn btn-warning btn-sm me-2 px-3">
                                ✏️ Modifica
                            </a>

                            <form action="{{ route('mangas.destroy', $manga->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('⚠️ Sei sicuro di voler eliminare questo manga?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm px-3">
                                    🗑️ Elimina
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- ✅ Paginazione --}}
        <div class="mt-5 d-flex justify-content-center">
            {{ $mangas->links('pagination::bootstrap-5') }}
        </div>

    @else
        <div class="alert alert-info text-center mt-5">
            Nessun manga disponibile.
            <a href="{{ route('mangas.create') }}" class="fw-bold text-decoration-none">Aggiungine uno!</a>
        </div>
    @endif
</div>
@endsection
