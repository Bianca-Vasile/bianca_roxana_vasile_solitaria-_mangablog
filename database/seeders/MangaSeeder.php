<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manga;

class MangaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Manga::create([
            'title' => 'Naruto',
            'description' => 'Storia di un giovane ninja che sogna di diventare Hokage.',
            'number' => 1,
            'year' => 2000,
            'cover' => 'uploads/mangas/naruto.jpg', // ✅ NOME CAMPO GIUSTO
            'category_id' => 1,
        ]);

        Manga::create([
            'title' => 'One Piece',
            'description' => 'Le avventure di Luffy e della sua ciurma in cerca del tesoro One Piece.',
            'number' => 2,
            'year' => 1999,
            'cover' => 'uploads/mangas/onepiece.jpg', // ✅
            'category_id' => 2,
        ]);

        Manga::create([
            'title' => 'Attack on Titan',
            'description' => 'L’umanità combatte contro i giganti per la sopravvivenza.',
            'number' => 3,
            'year' => 2013,
            'cover' => 'uploads/mangas/attackontitan.jpg', // ✅
            'category_id' => 3,
        ]);
    }
}
