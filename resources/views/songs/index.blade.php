@extends('layouts.app')<!-- resources/views/songs/index.blade.php -->
@section('content')

<style> 
.btn-group {
    display: flex;
    align-items: center;
}

.btn-group .btn {
    margin-right: 5px; /* Adjust the margin as needed */
}

.btn-custom {
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
    }

.table {
        font-family: Arial, sans-serif; /* Change to your preferred font family */
        font-size: 14px; /* Adjust the font size as needed */
        font-weight: normal; /* Adjust the font weight as needed */
    }

</style> 
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
    <div class="bradcumbContent">
        <h2>Manage Songs</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="table-responsive">
                <a href="{{ route('songs.create') }}" class="btn btn-primary mb-3 mt-3">Create New Song</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 20%;">Title</th>
                            <th style="width: 10%;">Genre</th>
                            <th style="width: 10%;">Length</th>
                            <th style="width: 15%;">Image</th>
                            <th style="width: 15%;">Audio</th>
                            <th style="width: 15%;">Artist</th>
                            <th style="width: 15%;">Album</th>
                            <th style="width: 10%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($songs as $song)
                            <tr>
                                <td>{{ $song->title }}</td>
                                <td>{{ $song->song_genre }}</td>
                                <td>{{ $song->song_length }}</td>
                                <td>
                                    <img src="{{ asset($song->image) }}" alt="{{ $song->title }}" style="max-width: 100px; max-height: 100px;">
                                </td>
                                <td>
                                    <audio controls>
                                        <source src="{{ asset($song->audio_url) }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>

                                </td>
                                <td>{{ $song->artist->name }}</td>
                                <td>{{ $song->album->title }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('songs.edit', $song->song_id) }}" class="btn btn-info btn-sm">Edit</a>
                                        <form action="{{ route('songs.destroy', $song->song_id) }}" method="post" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this song?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="text-center mb-3">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Admin Dashboard</a>
</div>




@endsection
