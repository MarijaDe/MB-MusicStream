<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Album;
use App\Models\Song;
use App\Models\Artist;



class HomeController extends Controller
{
    //
    public function index()
    {
        $songs = Song::with(['artist' => function ($query) {
            $query->select('artist_id', 'name', 'image'); // Select only the necessary columns from the artist table
        }])->limit(6)->get(['title', 'artist_id']); // Retrieve the title and artist_id columns
        $albums = Album::with('artist')->limit(4)->get();
        // Fetch random data
        $randomData = $this->randomData();
    
        return view('home', compact('songs', 'albums', 'randomData'));
    }
    
    public function randomData()
    {
        $weekTopItems = Song::limit(6)->get();
        $newHitsItems = Album::inRandomOrder()->limit(6)->get();
        $popularArtists = Artist::inRandomOrder()->limit(6)->get();
        $albums = Album::inRandomOrder()->limit(5)->get();
    
        return compact('weekTopItems', 'newHitsItems', 'popularArtists', 'albums');
    }
    
    
    

    // public function albumsStore()
    // {
    //     // Your logic to fetch albums and pass them to the view
    //     $albums = Album::paginate(16); // Adjust the pagination count as needed

    //     return view('albums-store', compact('albums'));
    // }
    
//     public function albumsStore()
// {
//     // Your logic to fetch all albums and pass them to the view
//     $albums = Album::all(); // Fetch all albums

//     return view('albums-store', compact('albums'));
// }
public function albumsStore()
{
    // Your logic to fetch all albums and pass them to the view
    $albums = Album::all(); // Fetch all albums

    return view('albums-store', compact('albums'));
}




    // public function show($id)
    // {
    //     $album = Album::with('songs')->findOrFail($id);
    //     return view('welcome', ['albumId' => $id]);
    // }
}
