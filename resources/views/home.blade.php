@extends('layouts.app')
    <style> 
 .song-item {
    margin-bottom: 20px;
}

.song-info {
    display: flex;
    align-items: center;
}

.song-image {
    max-width: 100px;
    height: auto;
    margin-right: 10px;
}

.text-container {
    flex: 1;
}

.text-container p {
    margin: 0;
    font-size: 14px;
}
.album-thumb {
    position: relative;
    width: 100%;
    height: 0;
    padding-top: 100%; /* This creates a square aspect ratio (1:1) */
    overflow: hidden;
}

.album-thumb img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image covers the entire square without stretching */
}




    </style>
    @section('content')
        <!-- ##### Hero Area Start ##### -->
        <section class="hero-area">
            <div class="hero-slides owl-carousel">
                <!-- Single Hero Slide -->
                <div class="single-hero-slide d-flex align-items-center justify-content-center">
                    <!-- Slide Img -->
                    <div class="slide-img bg-img" style="background-image: url({{ asset('img/bg-img/bg-1.jpg') }});"></div>
                    <!-- Slide Content -->
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="hero-slides-content text-center">
                                    <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                                    <h2 data-animation="fadeInUp" data-delay="300ms">Beyond Time <span>Beyond Time</span></h2>
                                    <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Hero Slide -->
                <div class="single-hero-slide d-flex align-items-center justify-content-center">
                    <!-- Slide Img -->
                    <div class="slide-img bg-img" style="background-image: url({{ asset('img/bg-img/bg-2.jpg') }});"></div>
                    <!-- Slide Content -->
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="hero-slides-content text-center">
                                    <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                                    <h2 data-animation="fadeInUp" data-delay="300ms">Colorlib Music <span>Colorlib Music</span></h2>
                                    <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Hero Area End ##### -->

        <!-- ##### Latest Albums Area Start ##### -->
        <section class="latest-albums-area section-padding-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-heading style-2">
                            <p>See what’s new</p>
                            <h2>Latest Albums</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-9">
                        <div class="ablums-text text-center mb-70">
                            <p>Nam tristique ex vel magna tincidunt, ut porta nisl finibus. Vivamus eu dolor eu quam varius rutrum. Fusce nec justo id sem aliquam fringilla nec non lacus. Suspendisse eget lobortis nisi, ac cursus odio. Vivamus nibh velit, rutrum at ipsum ac, dignissim iaculis ante. Donec in velit non elit pulvinar pellentesque et non eros.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="albums-slideshow owl-carousel ">
                            @foreach($albums as $album)
                                <!-- Single Album -->
                                <div class="single-album d-flex flex-column align-items-center position-relative" style="height: 300px; overflow: hidden;">
                                <img src="{{ $album->image }}" alt="" class="w-100 h-100 object-fit-cover">
                                <div class="album-info">
                                    <a href="#">
                                        <h5>{{ $album->artist->name }}</h5>
                                    </a>
                                    <p>{{ $album->title }}</p>
                                    <a href="{{ asset('audio/dummy-audio.mp3') }}" class="play-icon text-center" style="font-size: 24px;">
                                        <span class="icon-play-button"></span> 
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>   
        </section>
        <!-- ##### Latest Albums Area End ##### -->

        <!-- ##### Buy Now Area Start ##### -->
<div class="oneMusic-buy-now-area mb-100">
    <div class="container">
        <div class="row" id="albumContainer">

            <!-- Single Album Area -->
            @foreach($albums->take(4) as $item) <!-- Limit to 4 albums initially -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-album-area" style="height: 400px; overflow: hidden;">
                        <div class="album-thumb">
                            <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-100 h-100 object-fit-cover">
                            <!-- Album Price -->
                            <div class="album-price">
                                <p>$100</p>
                            </div>
                            <!-- Play Icon
                            <div class="play-icon">
                                <a href="{{ asset('audio/dummy-audio.mp3') }}" class="video--play--btn"><span class="icon-play-button"></span></a>
                            </div> -->
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>{{ $item->title }}</h5>
                            </a>
                            <p>{{ $item->description }}</p>
                            <button class="btn btn-primary add-to-cart-btn" data-album-id="{{ $item->id }}">Add to Cart</button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="row">
            <div class="col-12">
                <div class="load-more-btn text-center">
                    <button class="btn oneMusic-btn" id="loadMoreBtn">Load More <i class="fa fa-angle-double-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Buy Now Area End ##### -->

<!-- ***** Featured Artist Area Start ***** -->
<section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url('img/bg-img/bg-4.jpg');">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-12 col-md-5 col-lg-4">
                <div class="featured-artist-thumb">
                    <img src="{{ asset('img/bg-img/fa.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-8">
                <div class="featured-artist-content">
                    <!-- Section Heading -->
                    <div class="section-heading white text-left mb-30">
                        <p>See what’s new</p>
                        <h2>Buy What’s New</h2>
                    </div>
                    <p>Nam tristique ex vel magna tincidunt, ut porta nisl finibus. Vivamus eu dolor eu quam varius rutrum. Fusce nec justo id sem aliquam fringilla nec non lacus. Suspendisse eget lobortis nisi, ac cursus odio. Vivamus nibh velit, rutrum at ipsum ac, dignissim iaculis ante. Donec in velit non elit pulvinar pellentesque et non eros.</p>
                    <div class="song-play-area">
                        <div class="song-name">
                            <p>01. Main Hit Song</p>
                        </div>
                        <audio preload="auto" controls>
                            <source src="{{ asset('audio/dummy-audio.mp3') }}">
                        </audio>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Featured Artist Area End ***** -->

<!-- ***** Miscellaneous Area Start ***** -->
<section class="miscellaneous-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- ***** Weeks Top ***** -->
            <div class="col-12 col-lg-4">
                <div class="weeks-top-area mb-100">
                    <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                        <p>See what’s new</p>
                        <h2>This week’s top</h2>
                    </div>

                    <!-- Single Top Item -->
                    @foreach($songs as $song)
                        <div class="song-item">
                            <div class="song-info">
                                <img src="{{ $song->artist->image }}" alt="Artist Image" class="song-image">
                                <div class="text-container">
                                    <h3> {{ $song->title }}</h3>
                                    <p> {{ $song->artist->name }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- ***** New Hits Songs ***** -->
            <div class="col-12 col-lg-4">
                <div class="new-hits-area mb-100">
                    <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                        <p>See what’s new</p>
                        <h2>New Hits</h2>
                    </div>

                    <!-- Single New Item -->
                    @if(isset($randomData['newHitsItems']))
                        @foreach($randomData['newHitsItems'] as $song)
                            <div class="song-item">
                                <div class="song-info">
                                    <img src="{{ $song->image }}" alt="Song Image" class="song-image">
                                    <div class="text-container">
                                        <h6>{{ $song->artist->name }}</h6>
                                        <p>{{ $song->title }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- ***** Popular Artists ***** -->
            <div class="col-12 col-lg-4">
        <div class="new-hits-area mb-100">
        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
            <p>See what’s new</p>
            <h2>Top 6 Artists</h2>
        </div>

        <!-- Single Artist -->
        @if(isset($randomData['popularArtists']))
            @foreach($randomData['popularArtists'] as $artist)
                <div class="song-item">
                    <div class="song-info">
                        <img src="{{ $artist->image }}" alt="{{ $artist->name }} Image" class="song-image">
                        <div class="text-container">
                            <h6>{{ $artist->name }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

        </div>
    </div>
</section>
<!-- ***** Miscellaneous Area End ***** -->


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                // Click event for Load More button
                $('#loadMoreBtn').on('click', function (e) {
                    e.preventDefault();

                    // Redirect to the albums-store view
                    window.location.href = '/albums-store'; // Change the URL as needed
                });
            });
        </script>
    @endsection