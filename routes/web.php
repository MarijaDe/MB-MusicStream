<?php
use App\Models\Song;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//  Route::get('/', function () {
//      return view('home');
//  });
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/buy-now', [AlbumController::class, 'buyNow'])->name('buyNow');

Route::get('/latest-songs', [SongController::class, 'latestSongs'])->name('latestSongs');

Route::get('/top-songs-of-week', [SongController::class, 'topSongsOfWeek'])->name('top.songs.of.week');
// Route for the randomData method
Route::get('/random-data', [HomeController::class, 'randomData'])->name('random.data');

Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');


// Route::get('/albums-store', [AlbumController::class, 'index'])->name('albums.store');
// Route::get('/albums-store', [AlbumController::class, 'filteralbum'])->name('albums.store');
// Route::get('/albums-store', [HomeController::class, 'loadMore'])->name('albums.store');

// Route::get('/', [HomeController::class, 'index']);
// // Route::get('/', [HomeController::class, 'buyNow']);
// // Route::get('/load-more-albums/{offset}', [HomeController::class, 'loadMoreAlbums']);
// Route::get('/', [HomeController::class, 'randomData']);
// Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
// // Route::get('/albums/{id}', [HomeController::class, 'show' ])->name('home.show');
// // Route::get('/songs/{id}/listen', 'SongController@listen')->name('song.listen');
// Route::get('/buy-now', [AlbumController::class, 'buyNow'])->name('buyNow');
// // Route::get('/songs', [SongController::class, 'index'])->name('songs.index');


// Route::get('/albums-store', [HomeController::class, 'albumsStore'])->name('albums-store');
// Route::resource('songs', SongController::class);
// Route::resource('artists', ArtistController::class);
// Route::resource('albums', AlbumController::class);

// // Route::get('/check-songs', function () {
// //     $songs = Song::all();
// //     return view('check-songs', compact('songs'));
// // });
// Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');




//Route::get('/', [AlbumController::class, 'index'])->name('albums.store');
Route::get('/albums-store', [AlbumController::class, 'index'])->name('albums.store');
Route::get('/albums-filter', [AlbumController::class, 'filteralbum'])->name('albums.filter');
//Route::get('/albums-load-more', [HomeController::class, 'loadMore'])->name('albums.loadMore');
//Route::get('/random-data', [HomeController::class, 'randomData']);
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
//Route::get('/buy-now', [AlbumController::class, 'buyNow'])->name('buyNow');
Route::get('/albums-store', [HomeController::class, 'albumsStore'])->name('albums-store');
Route::get('/artist-store', [ArtistController::class, 'showStoreView'])->name('artist.store');
Route::get('/songs-store', [SongController::class, 'showStoreSongView'])->name('songs.store');
//album-store
// It's recommended to have unique URLs for different routes. If these routes are intended for different purposes, consider changing one of the route URLs to avoid conflicts.
// Specific routes should come before resource declaration
// Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
// Route::post('/songs', [SongController::class, 'store'])->name('songs.store');
// Route::get('/songs', [SongController::class, 'index'])->name('songs.index');




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'admin'])->group(function () {
    // Your admin-only routes here
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');    
    Route::resource('albums', AlbumController::class);
    Route::resource('artists', ArtistController::class)->except(['store']);
    Route::resource('songs', SongController::class);
});
