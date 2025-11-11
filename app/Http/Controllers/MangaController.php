<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MangaController extends Controller
{
    // Mostra tutti i manga
    public function index()
    {
        $mangas = Manga::with('category')->paginate(6);
        return view('mangas.index', compact('mangas'));
    }

    // Form creazione
    public function create()
    {
        $categories = Category::all();
        return view('mangas.create', compact('categories'));
    }

    // Salva un nuovo manga
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'number' => 'required|integer',
            'year' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('uploads/mangas', 'public');
        }

        Manga::create($validated);

        return redirect()->route('mangas.index')->with('success', 'Manga aggiunto con successo!');
    }

    // Mostra un manga
    public function show(Manga $manga)
    {
        return view('mangas.show', compact('manga'));
    }

    // Form modifica
    public function edit(Manga $manga)
    {
        $categories = Category::all();
        return view('mangas.edit', compact('manga', 'categories'));
    }

    // Aggiorna un manga
    public function update(Request $request, Manga $manga)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'number' => 'required|integer',
            'year' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($manga->image_path && Storage::disk('public')->exists($manga->image_path)) {
                Storage::disk('public')->delete($manga->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('uploads/mangas', 'public');
        }

        $manga->update($validated);

        return redirect()->route('mangas.index')->with('success', 'Manga aggiornato con successo!');
    }

    // Elimina un manga
    public function destroy(Manga $manga)
{
    // ✅ Se l'immagine non è quella di default, la elimina fisicamente
    if ($manga->image_path && $manga->image_path !== 'images/default-manga.jpg') {
        $imagePath = public_path($manga->image_path);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // ✅ Elimina il manga dal database
    $manga->delete();

    // ✅ Messaggio di successo
    return redirect()->route('mangas.index')->with('success', '✅ Manga eliminato con successo!');
}


}
