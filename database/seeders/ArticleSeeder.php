<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'One Punch Man',
                'category' => 'Azione',
                'description' => 'Un eroe troppo potente per i suoi nemici.',
                'body' => 'Saitama sconfigge qualsiasi avversario con un solo pugno!',
                'image_path' => 'images/onepunch.jpg',
            ],
            [
                'title' => 'Naruto',
                'category' => 'Avventura',
                'description' => 'Il giovane ninja sogna di diventare Hokage.',
                'body' => 'Un viaggio pieno di sfide e amicizie tra ninja leggendari.',
                'image_path' => 'images/naruto.jpg',
            ],
            [
                'title' => 'Death Note',
                'category' => 'Thriller',
                'description' => 'Un quaderno che uccide chiunque vi venga scritto il nome.',
                'body' => 'Light Yagami e L in una battaglia di intelligenza e moralità.',
                'image_path' => 'images/deathnote.jpg',
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
