<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // Mostra tutti i fumettisti che hanno almeno un manga
    public function index()
    {
        $authors = User::has('mangas')->with('mangas')->get();
        return view('authors.index', compact('authors'));
    }

    // Mostra il dettaglio di un singolo fumettista
    public function show(User $author)
    {
        $author->load('mangas');
        return view('authors.show', compact('author'));
    }
}
