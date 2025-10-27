<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Manga Blog</title>
    <style>
        body { font-family: 'Segoe UI'; background-color: #fafafa; margin: 40px; }
        .container { max-width: 800px; margin: auto; }
        h1 { color: #d32f2f; text-align: center; }
        .card { background: white; border-radius: 10px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        img { border-radius: 10px; margin-top: 10px; }
        .actions { margin-top: 10px; }
        a, button { text-decoration: none; color: #d32f2f; margin-right: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manga Blog 🩵</h1>
        <a href="{{ route('articles.create') }}">➕ Crea nuovo articolo</a>
        <hr>

        @foreach($articles as $article)
            <div class="card">
                <h2>{{ $article->title }}</h2>
                <p><b>Categoria:</b> {{ $article->category ?? 'Nessuna' }}</p>
                <p>{{ $article->description }}</p>

                @if($article->image_path)
                    <img src="{{ asset('storage/' . $article->image_path) }}" width="300">
                @endif

                <div class="actions">
                    <a href="{{ route('articles.show', $article) }}">👁️ Leggi</a>
                    <a href="{{ route('articles.edit', $article) }}">✏️ Modifica</a>
                    <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Vuoi eliminare questo articolo?')">🗑️ Elimina</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
