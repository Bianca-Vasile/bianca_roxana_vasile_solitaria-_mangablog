<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $validated['image_path'] = $path;
        }

        Article::create($validated);

        return redirect()->route('articles.index')->with('success', 'Articolo creato con successo!');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($article->image_path && Storage::exists('public/' . $article->image_path)) {
                Storage::delete('public/' . $article->image_path);
            }

            $path = $request->file('image')->store('images', 'public');
            $validated['image_path'] = $path;
        }

        $article->update($validated);

        return redirect()->route('articles.index')->with('success', 'Articolo aggiornato!');
    }

    public function destroy(Article $article)
    {
        if ($article->image_path && Storage::exists('public/' . $article->image_path)) {
            Storage::delete('public/' . $article->image_path);
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Articolo eliminato!');
    }
}
