<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $primaryKey = 'song_id';

    protected $fillable = ['title', 'song_genre', 'song_length', 'image', 'audio_url', 'artist_id', 'album_id'];


    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id', 'artist_id');
    }
    
    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'album_id');
    }
    /*Your Song model looks good, and you've correctly defined relationships with the Artist and Album models using the belongsTo method. The protected $fillable array is used to specify which attributes are mass-assignable. However, since you are creating the Song model using the new Song([...]) syntax in the controller, you don't necessarily need the $fillable property.

If you're not using mass assignment, you can remove the $fillable property.  */

}
