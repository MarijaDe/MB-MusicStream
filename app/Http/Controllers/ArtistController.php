<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;


class ArtistController extends Controller
{
    public function index()
{
    $artists = Artist::all();
    return view('artists.index', compact('artists'));
}
public function showStoreView()
{
    $artists = Artist::all();
    return view('artist-store', compact('artists'));
}


    public function create()
    {
        return view('artists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:artists',
            'image' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Artist::create($request->all());

        return redirect()->route('artists.index')->with('success', 'Artist created successfully');
    }

    public function edit(Artist $artist)
    {
        return view('artists.edit', compact('artist'));
    }

    public function update(Request $request, Artist $artist)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:artists,name,' . $artist->artist_id . ',artist_id',
        'image' => 'nullable|image|max:2048', // Adjust the file size limit as needed
    ]);
    

    // Update artist name
    $artist->name = $request->input('name');

    // Handle file upload if a new image is provided
    if ($request->hasFile('image')) {
        // Generate a unique file name for the image
        $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
        // Move the uploaded image to the public/images directory
        $request->file('image')->move(public_path('images'), $imageName);
        // Set the image URL for the artist
        $artist->image = '/images/' . $imageName;
    }

    // Save the updated artist
    $artist->save();

    // Redirect to the artists index page
    return redirect()->route('artists.index')->with('success', 'Artist updated successfully');
}

    

    

    

    


    public function destroy(Artist $artist)
{
    // Delete associated songs first
    $artist->albums->each(function ($album) {
        $album->artistSongs()->delete();
    });

    // Now, delete associated albums
    $artist->albums()->delete();

    // Now, delete the artist
    $artist->delete();

    return redirect()->route('artists.index')->with('success', 'Artist deleted successfully');
}



}