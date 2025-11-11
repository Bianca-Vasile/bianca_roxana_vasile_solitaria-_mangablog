@extends('layouts.app')

@section('title', 'Modifica Manga')

@section('content')
<div class="container py-5">

    <h1 class="text-center mb-5 fw-bold"
        style="background: linear-gradient(90deg, #6f42c1, #9b59b6);
               -webkit-background-clip: text;
               color: transparent;">
        ✏️ Modifica Manga
    </h1>

    {{-- Messaggi di errore --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form di modifica --}}
    <div class="card shadow-lg border-0 rounded-4 p-4 mx-auto" style="max-width: 700px;">
        <form action="{{ route('mangas.update', $manga) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Titolo --}}
            <div class="mb-4">
                <label for="title" class="form-label fw-bold">Titolo</label>
                <input type="text" name="title" id="title"
                       class="form-control rounded-pill @error('title') is-invalid @enderror"
                       value="{{ old('title', $manga->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Descrizione --}}
            <div class="mb-4">
                <label for="description" class="form-label fw-bold">Descrizione</label>
                <textarea name="description" id="description" rows="4"
                          class="form-control rounded-4 @error('description') is-invalid @enderror"
                          required>{{ old('description', $manga->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Numero --}}
            <div class="mb-4">
                <label for="number" class="form-label fw-bold">Numero</label>
                <input type="number" name="number" id="number"
                       class="form-control rounded-pill @error('number') is-invalid @enderror"
                       value="{{ old('number', $manga->number) }}" required>
                @error('number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Anno --}}
            <div class="mb-4">
                <label for="year" class="form-label fw-bold">Anno</label>
                <input type="number" name="year" id="year"
                       class="form-control rounded-pill @error('year') is-invalid @enderror"
                       value="{{ old('year', $manga->year) }}" required>
                @error('year')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Categoria --}}
            <div class="mb-4">
                <label for="category_id" class="form-label fw-bold">Categoria</label>
                <select name="category_id" id="category_id"
                        class="form-select rounded-pill @error('category_id') is-invalid @enderror">
                    <option value="">-- Nessuna categoria --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $manga->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Immagine --}}
            <div class="mb-4">
                <label for="image" class="form-label fw-bold">Immagine</label>

                @if ($manga->image_path)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $manga->image_path) }}"
                             alt="{{ $manga->title }}"
                             class="rounded shadow-sm"
                             style="max-height: 200px; object-fit: cover;">
                    </div>
                @endif

                <input type="file" name="image" id="image"
                       class="form-control rounded-pill @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Pulsanti --}}
            <div class="d-flex justify-content-between mt-5">
                <a href="{{ route('mangas.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                    ← Torna indietro
                </a>

                <button type="submit" class="btn btn-success rounded-pill px-5 shadow-sm">
                    💾 Salva modifiche
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
