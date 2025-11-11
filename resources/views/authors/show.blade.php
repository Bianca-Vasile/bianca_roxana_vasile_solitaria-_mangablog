@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-danger mb-4">{{ $author->name }}</h1>

    <h3 class="mb-3">Manga pubblicati</h3>
    <div class="row">
        @forelse($author->mangas as $manga)
            <div class="col-md-4 mb-3">
                <div class="card p-3 shadow-sm">
                    <h5>{{ $manga->title }}</h5>
                    <p>{{ $manga->description }}</p>
                </div>
            </div>
        @empty
            <p>Questo autore non ha ancora pubblicato manga.</p>
        @endforelse
    </div>
</div>
@endsection
