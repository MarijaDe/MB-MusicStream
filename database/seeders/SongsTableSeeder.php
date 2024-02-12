<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Song;
use App\Models\Album;
use Illuminate\Support\Facades\DB;

class SongsTableSeeder extends Seeder
{

    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inserting songs manually
        Song::create([
            'title' => 'Faded',
            'song_genre' => 'Pop',
            'song_length' => 180,
            'song_release_date' => '2022-01-15',
            'image' => 'img/bg-img/wt1.jpg',
            'audio_url' => 'audio/dummy-audio.mp3',
            'artist_id' => 1, // Assuming artist_id 1 exists
            'album_id' => 1, // Assuming album_id 1 exists
        ]);

        Song::create([
            'title' => 'Sorry',
            'song_genre' => 'Rock',
            'song_length' => 180,
            'song_release_date' => '2022-02-20',
            'image' => 'img/bg-img/wt1.jpg',
            'audio_url' => 'audio/dummy-audio.mp3',
            'artist_id' => 2, // Assuming artist_id 2 exists
            'album_id' => 2, // Assuming album_id 2 exists
        ]);
    }
}
