<?php

// app/Http/Controllers/SongController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Artist;
use App\Models\Album;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{



    public function index()
    {
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    public function showStoreSongView()
    {
        $songs = Song::all();
        return view('songs-store', compact('songs'));
    }
// public function LatestSongs()
// {
//     // Retrieve the latest songs
//     $songs = Song::latest()->get();
    
//     // Pass the $songs variable to the view
//     return view('home')->with('songs', $songs);
// }

public function create()
{
    $artists = Artist::all();
    $albums = Album::all();

    return view('songs.create', compact('artists', 'albums'));
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'song_genre' => 'required|string|max:255',
        'song_length' => 'required|integer',
        'song_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'audio_song' => 'required|mimes:mp3,wav',
        'new_artist' => 'nullable|string|max:255',
        'artist_id' => 'nullable|exists:artists,artist_id', // Ensure artist_id exists in the artists table
        'new_album' => 'nullable|string|max:255',
    ]);
    
   // Store the song image
   $imagePath = $request->file('song_image')->store('images/songs', 'public');
  // $audioUrl = '';
 // Store the audio song
//if ($request->hasFile('audio_song')) {
    // Store the audio file in the 'public' disk under the 'song-audio' directory
   // $audioPath = $request->file('audio_song')->store('song-audio', 'public');

    // Check if the audio file was stored successfully
   // if ($audioPath) {
        // If successful, generate the audio URL using the Storage facade
  //      $audioUrl = Storage::disk('public')->url($audioPath);
  //  } else {
  //      // If storing the audio file failed, set the audio URL to an empty string
  //      $audioUrl = '';
 //   }
//} else {
    // If no audio file was provided, set the audio URL to an empty string
 //   $audioUrl = '';
//}


    // Get the artist_id and album_id
    $artistId = $request->input('artist_id');
    $newArtistName = $request->input('new_artist');
    $albumId = $request->input('album_id');
    $newAlbumTitle = $request->input('new_album');
    
    // Create a new artist if new_artist is provided
    if ($newArtistName) {
        $artist = Artist::create(['name' => $newArtistName]);
        $artistId = $artist->id;
    }
    
    // Create a new album if new_album is provided
    if ($newAlbumTitle) {
        // Check if artist_id is provided
        if (!$artistId) {
            // Redirect back with an error if artist_id is missing
            return redirect()->back()->with('error', 'Artist ID is required to create an album');
        }
    
        // Create the album with the provided title and artist_id
        $album = Album::create([
            'title' => $newAlbumTitle,
            'artist_id' => $artistId,
        ]);
    
        // Retrieve the album_id
        $albumId = $album->id;
    }
    
    // Create the song with the provided data
    $song = new Song([
        'title' => $request->input('title'),
        'song_genre' => $request->input('song_genre'),
        'song_length' => $request->input('song_length'),
        'image' => $imagePath,
        'audio_url' => $audioUrl,
        'artist_id' => $artistId,
        'album_id' => $albumId,
    ]);
    
    // Save the song to the database
    $song->save();
    
    // Redirect to the songs index page with a success message
    return redirect()->route('songs.index')->with('success', 'Song created successfully');
        }





    public function edit(Song $song)
    {
    $artists = Artist::all();
    $albums = Album::all();

    return view('songs.edit', compact('song', 'artists', 'albums'));
        }

        public function update(Request $request, Song $song)
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'song_genre' => 'required|string|max:255',
                'song_length' => 'required|integer',
                'song_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Updated validation for image
                'audio_song' => 'nullable|mimes:mp3,wav', // Updated validation for audio song
                'artist_id' => 'nullable|exists:artists,artist_id',
                'new_artist' => 'nullable|string|max:255',
                'album_id' => 'nullable|exists:albums,album_id',
                'new_album' => 'nullable|string|max:255',
            ]);
        
             // Handle image upload if a new image is provided
    if ($request->hasFile('song_image')) {
        $imagePath = $request->file('song_image')->store('images', 'public');
        $song->image = $imagePath;
    }
        
            // Handle file upload if a new audio file is provided
            if ($request->hasFile('audio_song')) {
                $audioPath = $request->file('audio_song')->store('song-audio', 'public');
                $song->audio_url = $audioPath;
            }
        
            // Update other song details
            $song->title = $request->input('title');
            $song->song_genre = $request->input('song_genre');
            $song->song_length = $request->input('song_length');
        
            // Check if a new artist is provided and not empty
            if ($request->filled('new_artist')) {
                $newArtistName = $request->input('new_artist');
                // Ensure that the new artist name is not empty
                if (!empty($newArtistName)) {
                    // Create a new artist and associate with the song
                    $newArtist = Artist::create(['name' => $newArtistName]);
                    $song->artist_id = $newArtist->artist_id;
                }
            } elseif ($request->filled('artist_id')) {
                // Check if an existing artist is selected
                $song->artist_id = $request->input('artist_id');
            }
        
            // Check if a new album is provided and not empty
            if ($request->filled('new_album')) {
                $newAlbumTitle = $request->input('new_album');
                // Ensure that the new album title is not empty
                if (!empty($newAlbumTitle)) {
                    // Create a new album and associate with the song
                    $newAlbum = Album::create([
                        'title' => $newAlbumTitle,
                        'artist_id' => $song->artist_id // Assuming 'artist_id' is the foreign key in the albums table
                    ]);
                    $song->album_id = $newAlbum->album_id;
                }
            } elseif ($request->filled('album_id')) {
                // Check if an existing album is selected
                $song->album_id = $request->input('album_id');
            }
        
            // Save the updated song
            $song->save();
        
            // Redirect to the songs index page
            return redirect()->route('songs.index')->with('success', 'Song updated successfully');
        }
        


    public function destroy(Song $song)
    {
    $song->delete();

    return redirect()->route('songs.index')->with('success', 'Song deleted successfully');
    }

}


