<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artist;
use Illuminate\Support\Facades\DB;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inserting artists manually
        Artist::create([
            'name' => 'Sam Smith',
            'image' => 'img/bg-img/a2.jpg',
            'genre' => 'Pop',
        ]);

        Artist::create([
            'name' => 'William Parker',
            'image' => 'img/bg-img/pa2.jpg',
            'genre' => 'Rock',
        ]);
    }
}
