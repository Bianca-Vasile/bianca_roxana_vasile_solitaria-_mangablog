@extends('layouts.app')
@section('title', 'Modifica Manga')

@section('content')
<div class="container">
  <h1 class="text-danger mb-4">✏️ Modifica Manga</h1>

  <form action="{{ route('mangas.update', $manga) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Titolo</label>
      <input type="text" name="title" class="form-control" value="{{ $manga->title }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Numero</label>
      <input type="number" name="number" class="form-control" value="{{ $manga->number }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Anno</label>
      <input type="number" name="year" class="form-control" value="{{ $manga->year }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Categoria</label>
      <input type="text" name="category" class="form-control" value="{{ $manga->category }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Descrizione</label>
      <textarea name="description" class="form-control" rows="3">{{ $manga->description }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Immagine</label><br>
      @if($manga->image_path)
        <img src="{{ asset('storage/' . $manga->image_path) }}" width="150" class="mb-2 rounded">
      @endif
      <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-danger">Aggiorna</button>
    <a href="{{ route('mangas.index') }}" class="btn btn-secondary">Annulla</a>
  </form>
</div>
@endsection
