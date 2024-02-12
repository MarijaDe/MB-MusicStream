@extends('layouts.app')
@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
    <div class="bradcumbContent">
        <h2>Edit Album - {{ $album->title }}</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<form action="{{ route('albums.update', $album->album_id) }}" method="post" enctype="multipart/form-data" style="max-width: 500px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); margin-bottom: 30px;">
    @csrf
    @method('PUT')

    <label for="title" style="display: block; margin-bottom: 10px;">Title:</label>
    <input type="text" name="title" value="{{ $album->title }}" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

   
    <input type="file" name="image" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" accept="image/*">

    <label for="description" style="display: block; margin-bottom: 10px;">Description:</label>
    <textarea name="description" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">{{ $album->description }}</textarea>

    <label for="artist_id" style="display: block; margin-bottom: 10px;">Select Artist:</label>
    <select name="artist_id" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        <option value="" selected disabled>Select an Artist</option>
        @foreach($artists as $artist)
            <option value="{{ $artist->id }}" {{ $album->artist_id == $artist->id ? 'selected' : '' }}>
                {{ $artist->name }}
            </option>
        @endforeach
    </select>

    <label for="new_artist" style="display: block; margin-bottom: 10px;">New Artist:</label>
    <input type="text" name="new_artist" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

    <label for="release_date" style="display: block; margin-bottom: 10px;">Release Date:</label>
    <input type="date" name="release_date" value="{{ $album->release_date }}" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

    <button type="submit" style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">Update Album</button>
</form>

@endsection

