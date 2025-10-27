@extends('layouts.app')
@section('title', 'Contatti')

@section('content')
<div class="container text-center">
    <h1 class="text-danger mb-4">📬 Contattaci</h1>

    <p class="lead">Hai un manga da condividere o vuoi collaborare? Scrivici!</p>

    <div class="card shadow-sm p-4 mx-auto" style="max-width: 500px;">
        <form>
            <div class="mb-3 text-start">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" placeholder="Il tuo nome">
            </div>

            <div class="mb-3 text-start">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="nome@email.com">
            </div>

            <div class="mb-3 text-start">
                <label class="form-label">Messaggio</label>
                <textarea class="form-control" rows="3" placeholder="Scrivi il tuo messaggio..."></textarea>
            </div>

            <button type="submit" class="btn btn-danger">Invia</button>
        </form>
    </div>

    <p class="mt-4">
        Oppure scrivici direttamente su  
        <a href="mailto:info@mangablog.it" class="text-danger fw-bold">info@mangablog.it</a>
    </p>
</div>
@endsection
