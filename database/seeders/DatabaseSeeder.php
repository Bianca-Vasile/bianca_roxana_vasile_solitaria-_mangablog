<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            MangaSeeder::class,
        ]);
        $this->call(MangaImageSeeder::class);

    }
}
