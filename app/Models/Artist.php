<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
  // Artist model

  use HasFactory;

  protected $primaryKey = 'artist_id';

  protected $fillable = [
    'name',
    'image',
    'genre',
    // Remove 'description' from the $fillable array
];

public function artistSongs()
{
    return $this->hasMany(Song::class, 'artist_id', 'artist_id');
}

public function albums()
    {
        return $this->hasMany(Album::class, 'artist_id', 'artist_id');
    }



}

