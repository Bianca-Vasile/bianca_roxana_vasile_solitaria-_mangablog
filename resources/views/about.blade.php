@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="container py-5 text-center">
    <h1 class="text-primary fw-bold mb-4">👋 Benvenuto su MangaBlog!</h1>
    <p class="lead">Un piccolo blog dove puoi gestire e condividere i tuoi manga preferiti.</p>
    <p>Creato  da Bianca .</p>
    <a href="{{ route('mangas.index') }}" class="btn btn-outline-primary mt-3">⬅️ Torna ai Manga</a>
</div>
@endsection
