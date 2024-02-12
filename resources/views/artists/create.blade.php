@extends('layouts.app')
@section('content')<!-- resources/views/artists/create.blade.php -->
    
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
        <div class="bradcumbContent">
            <h2>Create Artist</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <form action="{{ route('artists.store') }}" method="post" enctype="multipart/form-data" style="max-width: 500px; margin: 30px auto 0; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); margin-bottom: 30px;">
    @csrf

    <label for="name" style="display: block; margin-bottom: 10px;">Name:</label>
    <input type="text" name="name" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

    <label for="image" style="display: block; margin-bottom: 10px;">Choose Image:</label>
    <input type="file" name="image" accept="image/*" style="margin-bottom: 20px;">

    <label for="genre" style="display: block; margin-bottom: 10px;">Genre:</label>
    <input type="text" name="genre" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

    <button type="submit" style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">Create Artist</button>
</form>



@endsection
