@extends('layouts.app')
@section('content')<!-- resources/views/artists/index.blade.php -->
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
            <h2>Manage Artists</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->


    <div class="table-container">
        <a href="{{ route('artists.create') }}" class="btn btn-primary mb-3 mt-3">Create New Artist</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Genre</th>
                    <th>Image</th> <!-- Added Image field -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artists as $artist)
                    <tr>
                        <td>{{ $artist->name }}</td>
                        <td>{{ $artist->genre }}</td>
                        <td><img src="{{ asset($artist->image) }}" alt="Artist Image" style="width: 100px;"></td> <!-- Display image -->
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('artists.edit', $artist->artist_id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('artists.destroy', $artist->artist_id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this artist?')">Delete</button>
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
