@extends('layouts.app')

@section('title', $manga->title)

@section('content')
<div class="container py-5">

    <h1 class="text-center mb-5 fw-bold"
        style="background: linear-gradient(90deg, #6f42c1, #9b59b6);
               -webkit-background-clip: text;
               color: transparent;">
        📖 {{ $manga->title }}
    </h1>

    <div class="card shadow-lg border-0 rounded-4 mx-auto overflow-hidden" style="max-width: 800px;">
        {{-- Immagine --}}
        <img src="{{ $manga->image_path ? asset('storage/' . $manga->image_path) : asset('images/default-manga.jpg') }}"
             class="card-img-top"
             alt="{{ $manga->title }}"
             style="object-fit: cover; max-height: 400px; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">

        {{-- Contenuto --}}
        <div class="card-body p-4">
            <h3 class="fw-bold mb-3">{{ $manga->title }}</h3>
            <p class="text-muted mb-4">{{ $manga->description }}</p>

            <ul class="list-unstyled mb-4">
                <li><strong>Numero:</strong> {{ $manga->number }}</li>
                <li><strong>Anno:</strong> {{ $manga->year }}</li>
                <li><strong>Categoria:</strong> {{ $manga->category->name ?? 'Senza categoria' }}</li>
            </ul>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('mangas.edit', $manga) }}" class="btn btn-outline-success rounded-pill px-4">
                    ✏️ Modifica
                </a>

                <form action="{{ route('mangas.destroy', $manga) }}" method="POST"
                      onsubmit="return confirm('Sei sicuro di voler eliminare questo manga?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger rounded-pill px-4">
                        🗑️ Elimina
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Pulsante per tornare alla lista --}}
    <div class="text-center mt-5">
        <a href="{{ route('mangas.index') }}" class="btn btn-primary rounded-pill px-5 shadow-sm">
            ← Torna alla lista dei manga
        </a>
    </div>
</div>
@endsection
