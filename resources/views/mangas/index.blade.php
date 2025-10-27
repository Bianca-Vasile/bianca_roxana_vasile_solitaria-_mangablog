@extends('layouts.app')
@section('title', 'I miei Manga')

@section('content')
<h1 class="mb-4 text-danger">I miei Manga</h1>

<a href="{{ route('mangas.create') }}" class="btn btn-danger mb-4">+ Aggiungi Manga</a>

<div class="row">
  @foreach ($mangas as $manga)
  <div class="col-md-4 mb-4">
    <div class="card shadow-sm h-100">
      @if($manga->image_path)
      <img src="{{ asset('storage/' . $manga->image_path) }}" class="card-img-top" style="max-height:250px; object-fit:cover;">
      @endif
      <div class="card-body">
        <h5>{{ $manga->title }}</h5>
        <p class="text-muted">{{ $manga->author }}</p>
        <a href="{{ route('mangas.show', $manga) }}" class="btn btn-outline-danger btn-sm">Dettagli</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
