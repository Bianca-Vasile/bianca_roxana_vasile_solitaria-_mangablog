@extends('layouts.app')
@section('title', 'Chi siamo')

@section('content')
<div class="container text-center">
    <h1 class="text-danger mb-4">👩‍🎨 Chi siamo</h1>

    <p class="lead">
        <strong>Manga Blog</strong> è una piattaforma dedicata agli amanti dei manga e ai fumettisti indipendenti.  
        Qui puoi condividere le tue storie, leggere le opere di altri autori e far conoscere la tua passione per il disegno e la narrazione giapponese.
    </p>

    <p>
        Questo progetto è stato realizzato da <strong>Bianca</strong> con Laravel   
        come parte del percorso di studi web developer.
    </p>

    <img src="{{ asset('storage/images/Saitama_(One-Punch_Man).jpg') }}" alt="Saitama" 
         class="rounded shadow mt-3" style="width:200px; height:auto;">
</div>
@endsection
