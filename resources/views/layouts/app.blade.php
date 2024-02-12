<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>{{ isset($title) ? $title : 'One Music - Modern Music HTML5 Template' }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="lds-ellipsis">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

<!-- ##### Header Area Start ##### -->
<div id="header">
   <header class="header-area">
        <!-- Navbar Area -->
        <div class="oneMusic-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                    <!-- Nav brand -->
                    <a href="{{ url('/') }}" class="nav-brand"><img src="{{ asset('img/core-img/logo.png') }}" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/albums-store') }}">Albums</a></li>
                            <li><a href="{{ url('/artist-store') }}">Artists</a></li>
                            <li><a href="{{ url('/songs-store') }}">Songs</a></li>
                            @if (auth()->check() && auth()->user()->role == 'admin')
                                <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                            @endif
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @else
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="post" class="nav-link">
                                    @csrf
                                    <button type="submit" class="btn btn-link" style="padding: 0; border: none; background: none; color: red; cursor: pointer; font-weight: bold;">Logout</button>
                                </form>
                            </li>
                            @endguest
                        </ul>


                            <!-- Login/Register & Cart Button -->
                            <div class="login-register-cart-button d-flex align-items-center">
                               

                                <!-- Cart Button-->
                                <div class="cart-btn">
                                    <p><span class="icon-shopping-cart"></span> <span class="quantity">1</span></p>
                                </div> 
                            </div>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header> 
</div>
<!-- ##### Header Area End #####-->

    <div id="content">
        @section('content')

        @show
    </div>

    <!-- ##### Contact Area Start ##### -->
    <div id="contact">
        <section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url(img/bg-img/bg-2.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-heading white wow fadeInUp" data-wow-delay="100ms">
                            <p>See what’s new</p>
                            <h2>Get In Touch</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <!-- Contact Form Area -->
                        <div class="contact-form-area">
                            <form id="contactForm" action="{{ route('contact.submit') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group wow fadeInUp" data-wow-delay="100ms">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group wow fadeInUp" data-wow-delay="200ms">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group wow fadeInUp" data-wow-delay="300ms">
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group wow fadeInUp" data-wow-delay="400ms">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="500ms">
                                        <button class="btn oneMusic-btn mt-30" type="submit">Send <i class="fa fa-angle-double-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <div id="footer">
        <footer class="footer-area">
            <div class="container">
                <div class="row d-flex flex-wrap align-items-center">
                    <div class="col-12 col-md-6">
                        <a href="#"><img src="{{ asset('img/core-img/logo.png') }}" alt=""></a>
                        <p class="copywrite-text">
                            <a href="#">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </a>
                        </p>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="footer-nav">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('/albums-store') }}">Albums</a></li>
                                <li><a href="{{ url('/artists') }}">Artists</a></li>
                                <li><a href="{{ url('/songs') }}">Songs</a></li>
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- ##### Footer Area End ##### -->


<!-- Second version of jQuery -->
<script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>

<!-- Your custom JavaScript files -->
<script src="{{ asset('js/load-more.js') }}"></script>
<script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins/plugins.js') }}"></script>
<script src="{{ asset('js/active.js') }}"></script>




</body>
</html>