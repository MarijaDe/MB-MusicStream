<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $primaryKey = 'album_id'; // Specify the correct primary key column

    protected $fillable = [
        'title', 'image', 'artist_id', 'release_date', 'description',
    ];

    // In the Album model
public function artistSongs()
{
    return $this->hasMany(Song::class, 'album_id', 'album_id');
}

public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id', 'artist_id');
    }

}