@extends('layouts.app')
@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
    <div class="bradcumbContent">
        <h2>Create Album</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<form action="{{ route('albums.store') }}" method="post" enctype="multipart/form-data" style="max-width: 500px; margin: 30px auto 0; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); margin-bottom: 30px;">
    @csrf

    <label for="title" style="display: block; margin-bottom: 10px;">Title:</label>
    <input type="text" name="title" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

    <label for="image" style="display: block; margin-bottom: 10px;">Image:</label>
    <input type="file" name="image" accept="image/*" style="margin-bottom: 20px;">

    <label for="release_date" style="display: block; margin-bottom: 10px;">Release Date:</label>
    <input type="date" name="release_date" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

    <label for="description" style="display: block; margin-bottom: 10px;">Description:</label>
    <textarea name="description" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;"></textarea>

    <label for="artist_id" style="display: block; margin-bottom: 10px;">Artist:</label>
    <select id="artist_id" name="artist_id" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        <option value="">Select an artist</option>
        @foreach ($artists as $artist)
            <option value="{{ $artist->artist_id }}">{{ $artist->name }}</option>
        @endforeach
    </select>

    <label for="new_artist" style="display: block; margin-bottom: 10px;">New Artist:</label>
    <input type="text" name="new_artist" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

    <button type="submit" style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">Create Album</button>
</form>
@endsection
