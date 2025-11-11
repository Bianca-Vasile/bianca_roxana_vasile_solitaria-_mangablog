<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    // forza Laravel a usare la tabella "authors"
    protected $table = 'authors';

    protected $fillable = ['name'];

    public function mangas()
    {
        return $this->hasMany(Manga::class);
    }
}
