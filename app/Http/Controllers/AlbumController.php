<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule; // Add this line to import the Rule class
use App\Models\Album;
use App\Models\Artist;
class AlbumController extends Controller

{

    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    public function buyNow()
    {
        $albums = Album::with('artist')->get();
        return view('home', ['albums' => $albums]); // Pass $albums variable to the view
    }


    // public function filteralbum()
    // {
    //     $albums = Album::all();
    //     return view('albums-store', compact('albums'));
    // }

    // AlbumController.php



    // public function loadMore(Request $request, $offset)
    // {
    //     $limit = 10; // Adjust the limit as needed
    //     $albums = Album::skip($offset)->take($limit)->get();

    //     return response()->json($albums);
    // }

  



    // public function buyNow()
    // {
    //     $albums = Album::all();
    //  //   dd($albums);
    //     return view('albums-store', compact('albums'));
    // }
    // public function buyNow()
    // {
    //     $albums = Album::all();
    
    //     return view('albums-store', compact('albums'));
    // }

    //crud


    //select an artist when creating a new album
    public function create()
    {
        $artists = Artist::all();
        return view('albums.create', compact('artists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:2048', // Limiting file size to 2MB, adjust as needed
            'description' => 'required|string',
            'release_date' => 'nullable|date',
            'artist_id' => 'nullable|exists:artists,artist_id',
            'new_artist' => 'nullable|string|max:255',
        ]);
    
        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imageUrl = '/images/' . $imageName;
        } else {
            return redirect()->back()->with('error', 'Please upload an image');
        }
    
        // Create a new album instance
        $album = new Album;
    
        // Assign values to album properties
        $album->title = $request->input('title');
        $album->image = $imageUrl;
        $album->description = $request->input('description');
        $album->release_date = $request->input('release_date');
    
        // Check if an existing artist is selected
        if ($request->filled('artist_id')) {
            $album->artist_id = $request->input('artist_id');
        } else {
            // If a new artist is provided, create it and associate with the album
            $newArtistName = $request->input('new_artist');
            $newArtist = Artist::create(['name' => $newArtistName]);
            $album->artist_id = $newArtist->artist_id;
        }
    
        // Save the album
        $album->save();
    
        return redirect()->route('albums.index')->with('success', 'Album created successfully');
    }

    // public function edit(Album $album)
    // {
    //     $artists = Artist::all();
    //     return view('albums.edit', compact('album', 'artists'));
    // }
    public function edit(Album $album)
    {
        // Retrieve all artists
        $artists = Artist::all();
    
        // Pass the $album and $artists variables to the view
        return view('albums.edit', compact('album', 'artists'));
    }
    


    // AlbumController.php

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'release_date' => 'nullable|date',
            'artist_id' => 'nullable|exists:artists,artist_id',
            'new_artist' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048', // Adjust the file size limit as needed
        ]);
    
        // Handle file upload if a new image is provided
    if ($request->hasFile('image')) {
        // Generate a unique file name for the image
        $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
        // Move the uploaded image to the public/images directory
        $request->file('image')->move(public_path('images'), $imageName);
        // Set the image URL for the album
        $album->image = '/images/' . $imageName;
    }

    
        // Update other album details
        $album->title = $request->input('title');
        $album->description = $request->input('description');
        $album->release_date = $request->input('release_date');
    
        // Check if a new artist is provided and not empty
        if ($request->filled('new_artist')) {
            $newArtistName = $request->input('new_artist');
            // Ensure that the new artist name is not empty
            if (!empty($newArtistName)) {
                // Create a new artist and associate with the album
                $newArtist = Artist::create(['name' => $newArtistName]);
                $album->artist_id = $newArtist->artist_id;
            }
        } elseif ($request->filled('artist_id')) {
            // Check if an existing artist is selected
            $album->artist_id = $request->input('artist_id');
        }
    
        // Save the updated album
        $album->save();
    
        // Redirect to the albums index page
        return redirect()->route('albums.index')->with('success', 'Album updated successfully');


    }
    

    
    
    


public function destroy(Album $album)
{
    $album->delete();

    return redirect()->route('albums.index')->with('success', 'Album deleted successfully');
}
   
}