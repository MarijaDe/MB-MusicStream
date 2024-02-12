<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Album;
use Illuminate\Support\Facades\DB;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         // Inserting albums manually
         Album::create([
            'title' => 'Underground',
            'image' => 'img/bg-img/a2.jpg',
            'release_date' => '2022-01-01',
            'description' => 'A collection of the artist\'s greatest hits from different albums',
            'artist_id' => 1, // Assuming artist_id 1 exists
        ]);

        Album::create([
            'title' => 'In my mind',
            'image' => 'img/bg-img/a2.jpg',
            'release_date' => '2022-02-01',
            'description' => 'A collection of the artist\'s greatest hits from different albums',
            'artist_id' => 2, // Assuming artist_id 2 exists
        ]);
 }
}
