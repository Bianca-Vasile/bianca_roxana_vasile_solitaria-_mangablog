@extends('layouts.app')

@section('title', 'Crea un nuovo Manga')

@section('content')
<div class="container">
    <h1 class="text-danger mb-4">Aggiungi un nuovo Manga</h1>

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

    <form action="{{ route('mangas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Titolo *</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Numero del fumetto</label>
            <input type="number" name="number" class="form-control" value="{{ old('number') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Anno di pubblicazione</label>
            <input type="number" name="year" class="form-control" value="{{ old('year') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <input type="text" name="category" class="form-control" value="{{ old('category') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Trama</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Copertina</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-danger">Salva Manga</button>
    </form>
</div>
@endsection
