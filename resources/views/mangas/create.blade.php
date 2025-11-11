@extends('layouts.app')

@section('title', 'Crea un nuovo Manga')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5 fw-bold"
        style="background: linear-gradient(90deg, #6f42c1, #9b59b6);
               -webkit-background-clip: text;
               color: transparent;">
        🌸 Aggiungi un nuovo Manga
    </h1>

    {{-- Messaggi di errore --}}
    @if ($errors->any())
        <div class="alert alert-danger shadow-sm rounded-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('mangas.store') }}" method="POST" enctype="multipart/form-data"
          class="shadow-lg p-5 rounded-4 bg-white">
        @csrf

        {{-- Titolo --}}
        <div class="mb-4">
            <label for="title" class="form-label fw-bold">Titolo</label>
            <input type="text" name="title" id="title"
                   value="{{ old('title') }}"
                   class="form-control border-0 shadow-sm bg-light"
                   required>
        </div>

        {{-- Descrizione --}}
        <div class="mb-4">
            <label for="description" class="form-label fw-bold">Descrizione</label>
            <textarea name="description" id="description" rows="4"
                      class="form-control border-0 shadow-sm bg-light"
                      required>{{ old('description') }}</textarea>
        </div>

        {{-- Numero --}}
        <div class="mb-4">
            <label for="number" class="form-label fw-bold">Numero</label>
            <input type="number" name="number" id="number"
                   value="{{ old('number') }}"
                   class="form-control border-0 shadow-sm bg-light" required>
        </div>

        {{-- Anno --}}
        <div class="mb-4">
            <label for="year" class="form-label fw-bold">Anno</label>
            <input type="number" name="year" id="year"
                   value="{{ old('year') }}"
                   class="form-control border-0 shadow-sm bg-light" required>
        </div>

        {{-- Categoria --}}
        <div class="mb-4">
            <label for="category_id" class="form-label fw-bold">Categoria</label>
            <select name="category_id" id="category_id"
                    class="form-select border-0 shadow-sm bg-light" required>
                <option value="">-- Seleziona categoria --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Copertina --}}
        <div class="mb-4">
            <label for="cover" class="form-label fw-bold">Copertina (opzionale)</label>
            <input type="file" name="cover" id="cover"
                   class="form-control border-0 shadow-sm bg-light" accept="image/*">
        </div>

        {{-- Pulsanti --}}
        <div class="text-center mt-5">
            <button type="submit" class="btn btn-primary px-5 rounded-pill shadow-sm">
                💾 Salva Manga
            </button>
            <a href="{{ route('mangas.index') }}" class="btn btn-outline-secondary rounded-pill ms-3">
                ↩️ Torna indietro
            </a>
        </div>
    </form>
</div>
@endsection
