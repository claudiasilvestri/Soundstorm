<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            'pop',
            'rock',
            'indie',
            'ballad',
            'rap',
            'pop rock',
            'instrumental',
            'techno'
        ];

        foreach ($genres as $genre) {
            Genre::create([
                'name' => $genre
            ]);
        }
    }
}
