@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="text-center">
    <h1 class="text-danger fw-bold mb-4">🩷 Benvenuto su Manga Blog 🩷</h1>
    <p class="fs-5">Il portale dedicato ai manga dei fumettisti indipendenti.</p>
    <a href="{{ route('mangas.index') }}" class="btn btn-danger btn-lg">➡️ Scopri i Manga</a>
</div>
@endsection
