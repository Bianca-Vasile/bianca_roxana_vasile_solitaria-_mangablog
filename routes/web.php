<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MangaController;

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

// ✅ Pagine statiche
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
