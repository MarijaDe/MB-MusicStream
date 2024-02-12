@extends('layouts.app')
@section('content')<!-- resources/views/albums/index.blade.php -->
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

        .text-center {
            text-align: center;
        }

        .mb-3 {
            margin-bottom: 1rem; /* Adjust margin as needed */
        }

        .mt-3 {
            margin-top: 1rem; /* Adjust margin as needed */
        }

        /* Container for the table */
        .table-container {
            max-width: 800px; /* Adjust the maximum width as needed */
            margin: 0 auto; /* Center the container horizontally */
        }
    </style>

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
        <div class="bradcumbContent">
            <h2>Manage Albums</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <div class="table-container">
    <a href="{{ route('albums.create') }}" class="btn btn-primary mb-3 mt-3">Create New Album</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Release Date</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $album)
                <tr>
                    <td>{{ $album->title }}</td>
                    <td>{{ $album->artist->name }}</td>
                    <td>{{ $album->release_date }}</td>
                    <td><img src="{{ $album->image }}" alt="{{ $album->title }}" style="max-width: 100px; max-height: 100px;"></td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('albums.edit', $album->album_id) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('albums.destroy', $album->album_id) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this album?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <div class="text-center mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Admin Dashboard</a>
    </div>

@endsection

