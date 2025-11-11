<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manga;

class MangaImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            'Naruto' => 'images/naruto.jpg',
            'One Piece' => 'images/onepiece.jpg',
            'Bleach' => 'images/bleach.jpg',
            'Attack on Titan' => 'images/attack-on-titan.jpg',
            'Demon Slayer' => 'images/demon-slayer.jpg',
        ];

        foreach ($images as $title => $path) {
            $manga = Manga::where('title', $title)->first();
            if ($manga) {
                $manga->image_path = $path;
                $manga->save();
            }
        }
    }
}
