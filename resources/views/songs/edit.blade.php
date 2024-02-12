@extends('layouts.app')
@section('content')<!-- resources/views/songs/edit.blade.php -->


 <!-- ##### Breadcumb Area Start ##### -->
 <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
        <div class="bradcumbContent">
            <h2>Edit Song- {{ $song->title }}</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->


   <form action="{{ route('songs.update', $song->song_id) }}" method="post" enctype="multipart/form-data" style="max-width: 500px; margin: 30px auto 0; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); margin-bottom: 30px;">
    @csrf
    @method('PUT')

    <label for="title" style="display: block; margin-bottom: 10px;">Title:</label>
    <input type="text" name="title" value="{{ $song->title }}" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

    <label for="song_genre" style="display: block; margin-bottom: 10px;">Genre:</label>
    <input type="text" name="song_genre" value="{{ $song->song_genre }}" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

    <label for="song_length" style="display: block; margin-bottom: 10px;">Length:</label>
    <input type="number" name="song_length" value="{{ $song->song_length }}" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

    <label for="image" style="display: block; margin-bottom: 10px;">Image:</label>
    <input type="file" name="image" accept="image/*" required style="margin-bottom: 20px;">

    <label for="audio" style="display: block; margin-bottom: 10px;">Audio:</label>
    <input type="file" name="audio" accept="audio/*" required style="margin-bottom: 20px;">

    <!-- Artist selection -->
    <label for="artist_id" style="display: block; margin-bottom: 10px;">Select Artist:</label>
    <select name="artist_id" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        <option value="" selected disabled>Select an Artist</option>
        @foreach($artists as $artist)
            <option value="{{ $artist->artist_id }}" {{ $song->artist_id == $artist->artist_id ? 'selected' : '' }}>
                {{ $artist->name }}
            </option>
        @endforeach
    </select>

    <!-- Album selection -->
    <label for="album_id" style="display: block; margin-bottom: 10px;">Select Album:</label>
    <select name="album_id" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        <option value="" selected disabled>Select an Album</option>
        @foreach($albums as $album)
            <option value="{{ $album->album_id }}" {{ $song->album_id == $album->album_id ? 'selected' : '' }}>
                {{ $album->title }}
            </option>
        @endforeach
    </select>

    <!-- New Artist Field -->
    <label for="new_artist" style="display: block; margin-bottom: 10px;">New Artist:</label>
    <input type="text" name="new_artist" value="{{ old('new_artist') }}" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

    <!-- New Album Field -->
    <label for="new_album" style="display: block; margin-bottom: 10px;">New Album:</label>
    <input type="text" name="new_album" value="{{ old('new_album') }}" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

    <div class="form-group">
        <label for="song_release_date" style="display: block; margin-bottom: 10px;">Release Date:</label>
        <input type="date" name="song_release_date" id="song_release_date" class="form-control" value="{{ old('song_release_date') }}" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
    </div>

    <button type="submit" style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">Update Song</button>
</form>



@endsection
