@extends('layouts.app')
@section('title', $manga->title)

@section('content')
<div class="container">
  <div class="card shadow-sm">
    @if($manga->image_path)
      <img src="{{ asset('storage/' . $manga->image_path) }}" class="card-img-top" style="max-height:400px; object-fit:cover;">
    @endif
    <div class="card-body">
      <h1 class="text-danger">{{ $manga->title }}</h1>
      <p><strong>Numero:</strong> {{ $manga->number }}</p>
      <p><strong>Anno:</strong> {{ $manga->year }}</p>
      <p><strong>Categoria:</strong> {{ $manga->category }}</p>
      <p>{{ $manga->description }}</p>

      <a href="{{ route('mangas.index') }}" class="btn btn-secondary">⬅️ Torna alla lista</a>
      <a href="{{ route('mangas.edit', $manga) }}" class="btn btn-warning">✏️ Modifica</a>

      <form action="{{ route('mangas.destroy', $manga) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo manga?')">🗑️ Elimina</button>
      </form>
    </div>
  </div>
</div>
@endsection
