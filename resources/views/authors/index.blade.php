@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-danger mb-4">Fumettisti</h1>

    <div class="row">
        @forelse($authors as $author)
            <div class="col-md-4 mb-3">
                <div class="card p-3 shadow-sm">
                    <h5>{{ $author->name }}</h5>
                    <p class="text-muted">Manga pubblicati: {{ $author->mangas->count() }}</p>
                    <a href="{{ route('authors.show', $author) }}" class="btn btn-outline-danger btn-sm">Vedi profilo</a>
                </div>
            </div>
        @empty
            <p>Nessun autore trovato.</p>
        @endforelse
    </div>
</div>
@endsection
