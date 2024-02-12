@extends('layouts.app')
@section('content')

<style>
        .oneMusic-albums {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Center the container */
        }
    
        .single-album-item {
            box-sizing: border-box;
            width: 100%;
            max-width: 250px; /* Adjust the maximum width as needed */
            margin: 0 15px 30px; /* Adjust margins as needed */
            text-align: center; /* Center text content */
            height: 350px; /* Fixed height to ensure consistent alignment */
        }
    
        /* Style for album images */
        .single-album-item img {
            max-width: 100%;
            height: 100%; /* Ensure the image fills the fixed height */
            object-fit: cover; /* Maintain aspect ratio and cover the container */
        }
    
        /* Style for album info */
        .album-info {
            padding: 15px; /* Adjust padding as needed */
        }
    
        /* Responsive adjustments */
        @media (min-width: 768px) {
            .single-album-item {
                flex: 0 0 calc(33.33% - 30px); /* Adjust as needed */
            }
        }
    
        @media (min-width: 992px) {
            .single-album-item {
                flex: 0 0 calc(25% - 30px); /* Adjust as needed */
            }
        }
    </style>
    
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>Latest Albums</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->



    <!-- ##### Album Category Area Start ##### -->
    <section class="album-catagory section-padding-100-0">
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

            <div class="row oneMusic-albums">
                @foreach($albums as $album)
                    <!-- Single Album -->
                    <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item filter-item {{ strtolower(substr($album->artist->name, 0, 1)) }}">
                        <div class="single-album">
                            <img src="{{ $album->image }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>{{ $album->artist->name }}</h5>
                                </a>
                                <p>{{ $album->title }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ##### Album Category Area End ##### -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- ##### Buy Now Area Start ##### -->
    <div class="oneMusic-buy-now-area mb-100">
        <div class="container">
            <div class="row">

                <!-- Single Album Area -->
                @foreach($albums as $item)
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="single-album-area">
                            <div class="album-thumb">
                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                                <!-- Album Price -->
                                <div class="album-price">
                                    <p>${{ $item['price'] }}</p>
                                </div>
                                <!-- Play Icon -->
                                <div class="play-icon">
                                    <a href="#" class="video--play--btn"><span class="icon-play-button"></span></a>
                                </div>
                            </div>
                            <div class="album-info">
                                <a href="#">
                                    <h5>{{ $item['title'] }}</h5>
                                </a>
                                <p>{{ $item['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    <!-- ##### Buy Now Area End ##### -->
    

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