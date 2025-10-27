<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MangaController extends Controller
{
    // ✅ Costruttore per proteggere le rotte
    public function __construct()
    {
        // Solo index e show sono pubblici
        $this->middleware('auth')->except(['index', 'show']);
    }

    // ✅ Mostra tutti i manga
    public function index()
    {
        $mangas = Manga::all();
        return view('mangas.index', compact('mangas'));
    }

    // ✅ Mostra form creazione (solo per utenti loggati)
    public function create()
    {
        return view('mangas.create');
    }

    // ✅ Salva un nuovo manga
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'number' => 'nullable|integer',
            'year' => 'nullable|integer',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $data['image_path'] = $path;
        }

        // ✅ collega l’autore (fumettista)
        $data['user_id'] = Auth::id();

        Manga::create($data);

        return redirect()->route('mangas.index')->with('success', 'Manga creato con successo!');
    }

    // ✅ Mostra dettaglio manga
    public function show($id)
    {
        $manga = Manga::findOrFail($id);
        return view('mangas.show', compact('manga'));
    }

    // ✅ Modifica manga
    public function edit(Manga $manga)
    {
        return view('mangas.edit', compact('manga'));
    }

    // ✅ Aggiorna manga
    public function update(Request $request, Manga $manga)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'number' => 'nullable|integer',
            'year' => 'nullable|integer',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $data['image_path'] = $path;
        }

        $manga->update($data);

        return redirect()->route('mangas.index')->with('success', 'Manga aggiornato!');
    }

    // ✅ Elimina manga
    public function destroy(Manga $manga)
    {
        $manga->delete();
        return redirect()->route('mangas.index')->with('success', 'Manga eliminato!');
    }
}
