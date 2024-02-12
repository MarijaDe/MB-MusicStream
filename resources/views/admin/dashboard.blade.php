@extends('layouts.app')
<style>
    .container {
    margin-top: 50px; /* Adjust as needed */
    margin-bottom: 50px; /* Adjust as needed */
}

.card {
    margin-bottom: 20px; /* Adjust as needed */
}

.admin-actions {
    margin-top: 20px; /* Adjust as needed */
    text-align: center;
}

.admin-actions a {
    margin-right: 10px; /* Adjust as needed */
}

.admin-actions a {
    margin-right: 10px; /* Adjust as needed */
    margin-bottom: 10px; /* Add margin to the bottom of each button */
}
</style>
@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
    <div class="bradcumbContent">
        <h2>Admin Dashboard</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #007bff; color: #fff;">Admin Dashboard</div>

                <div class="card-body">
                    <p>Welcome, {{ Auth::user()->name }}!</p>
                    <p>This is your admin dashboard.</p>
                </div>

                <div class="admin-actions">
                    <a href="{{ route('songs.index') }}" class="btn btn-primary">Manage Songs</a>
                    <a href="{{ route('albums.index') }}" class="btn btn-success">Manage Albums</a>
                    <a href="{{ route('artists.index') }}" class="btn btn-info">Manage Artists</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
