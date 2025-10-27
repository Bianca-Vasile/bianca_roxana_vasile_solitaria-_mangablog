<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Crea Articolo</title>
    <style>
        body { font-family: 'Segoe UI'; background: #fff3e0; padding: 30px; }
        .form-container { max-width: 700px; margin: auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        label { font-weight: bold; display: block; margin-top: 10px; }
        input, textarea { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px; }
        button { background: #d32f2f; color: white; border: none; padding: 10px 20px; border-radius: 8px; cursor: pointer; margin-top: 15px; }
        a { color: #d32f2f; }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Crea Nuovo Articolo</h1>
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Titolo</label>
            <input type="text" name="title">

            <label>Categoria</label>
            <input type="text" name="category">

            <label>Descrizione</label>
            <textarea name="description"></textarea>

            <label>Corpo</label>
            <textarea name="body"></textarea>

            <label>Immagine</label>
            <input type="file" name="image">

            <button type="submit">Salva</button>
        </form>
        <a href="{{ route('articles.index') }}">⬅️ Torna alla lista</a>
    </div>
</body>
</html>
