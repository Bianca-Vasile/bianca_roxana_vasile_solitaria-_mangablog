<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\AuthorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ✅ Home che mostra i manga
Route::get('/', [MangaController::class, 'index'])->name('home');

// ✅ CRUD articoli 
Route::resource('articles', ArticleController::class);

// ✅ CRUD manga
Route::resource('mangas', MangaController::class);

// ✅ Elenco autori (fumettisti)
Route::resource('authors', AuthorController::class)->only(['index', 'show']);

// ✅ Dashboard (protetta)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// ✅ Pagine statiche
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

// ✅ Rotta fittizia per evitare errore profile.edit
Route::get('/profile', function () {
    return redirect()->route('dashboard');
})->name('profile.edit');

require __DIR__.'/auth.php';
