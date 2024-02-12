@extends('layouts.app')
@section('content')

<style>
/* Adjust the size of the song blocks */
.single-song-item {
    width: 100%; /* Ensure each block takes up the full width of its container */
    max-width: 200px; /* Set a maximum width for the song blocks */
    margin: 0 auto; /* Center the blocks horizontally */
    margin-bottom: 20px; /* Add some space between the blocks */
}

/* Ensure the images maintain aspect ratio */
.single-song-item img {
    width: 100%; /* Make the images fill the entire width of their container */
    height: auto; /* Automatically adjust the height to maintain aspect ratio */


    display: block; /* Ensure the images behave as block elements */
}

/* Style the song info */
.song-info {
    text-align: center; /* Center-align the song info */
}

/* Optionally, add hover effects or other styles */
.single-song-item:hover {
    /* Add hover effects */
}

    </style>
    
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>Latest songs</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->



    <!-- ##### song Category Area Start ##### -->
    <section class="song-catagory section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="browse-by-catagories catagory-menu d-flex flex-wrap align-items-center mb-70">
                        <a href="#" data-filter="*">Browse All</a>
                        @foreach(range('A', 'Z') as $letter)
                            <a href="#" data-filter=".{{ strtolower($letter) }}" class="filter-letter">{{ $letter }}</a>
                        @endforeach
                        <a href="#" data-filter=".number">0-9</a>
                    </div>
                </div>
            </div>

            <div class="row oneMusic-songs">
    @foreach($songs as $song)
        <!-- Single song -->
        <div class="col-6 col-md-3 single-song-item">
            <div class="single-song">
                <img src="{{ $song->image }}" alt="{{ $song->name }}" class="song-image">
                <div class="song-info">
                    <a href="#">
                        <h5>{{ $song->name }}</h5>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>


            </div>
        </div>
    </section>
    <!-- ##### song Category Area End ##### -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
   
    

    <!-- ##### Add Area Start ##### -->
    <div class="add-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="adds">
                        <a href="#"><img src="img/bg-img/add3.gif" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Add Area End ##### -->

    <!-- ##### Song Area Start ##### -->
    <div class="one-music-songs-area mb-70">
        <div class="container">
            <div class="row">

                <!-- Single Song Area -->
                <div class="col-12">
                    <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                        <div class="song-thumbnail">
                            <img src="{{ asset('img/bg-img/s1.jpg') }}" alt="">
                        </div>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p>Pure</p>
                            </div>
                            <audio preload="auto" controls>
                                <source src="{{ asset('audio/dummy-audio.mp3') }}">
                            </audio>
                        </div>
                    </div>
                </div>
                <!-- Single Song Area -->
                <div class="col-12">
                    <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                        <div class="song-thumbnail">
                            <img src="{{ asset('img/bg-img/s1.jpg') }}" alt="">
                        </div>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p>Faith</p>
                            </div>
                            <audio preload="auto" controls>
                                <source src="{{ asset('audio/dummy-audio.mp3') }}">
                            </audio>
                        </div>
                    </div>
                </div>
                <!-- Single Song Area -->
                <div class="col-12">
                    <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                        <div class="song-thumbnail">
                            <img src="{{ asset('img/bg-img/s1.jpg') }}" alt="">
                        </div>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p>Believe</p>
                            </div>
                            <audio preload="auto" controls>
                                <source src="{{ asset('audio/dummy-audio.mp3') }}">
                            </audio>
                        </div>
                    </div>
                </div>
                <!-- Repeat similar blocks for other songs -->
            </div>
        </div>
    </div>
    <!-- ##### Song Area End ##### -->

    <script>
    $(document).ready(function () {
        // Add click event to filter letters
        $('.filter-letter').on('click', function (e) {
            e.preventDefault();
            var filterClass = $(this).data('filter');
            $('.filter-item').hide();
            if (filterClass === '.number') {
                $('.filter-item.number').show();
            } else {
                $('.filter-item' + filterClass).show();
            }
        });

        // Add click event to "Browse All"
        $('a[data-filter="*"]').on('click', function (e) {
            e.preventDefault();
            $('.filter-item').show();
        });
    });
</script>

@endsection