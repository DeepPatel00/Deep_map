<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>GSW</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link href="{{ URL::to('/') }}/public/assets/img/favicon.png" rel="icon">
    <link href="{{ URL::to('/') }}/public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ URL::to('/') }}/public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/public/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ URL::to('/') }}/public/assets/css/main.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- =======================================================
  * Template Name: Impact
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
      .hero {
    
    background:#F0F0F0 !important ;
    
}
.hero h2 {
    
    color: #C69214;
}
.hero p {
        color: #00205B;
   
}
.hero .btn-get-started {
    color: #00205B;
    background: #C69214;
}
.header {
   
    background-color: #00205B;
}
.hero .icon-box {
   
    background: #00205B;
    
}
.hero .icon-box:hover {
    background: #00205B;
}
  </style>
</head>

<body>
    <header id="header" class="header d-flex align-items-center">

        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="{{URL::to('/')}}" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="{{ URL::to('/') }}/public/assets/img/logo.png" alt=""> -->
                <h1>GSW<span></span></h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{URL::to('/')}}" class="<?= request()->is('/') ? 'active' : '' ?>">Home</a></li>
                    <li><a href="{{URL::to('/map')}}" class="<?= request()->is('map') ? 'active' : '' ?>">Map</a></li>
                    <li><a href="{{URL::to('/events')}}" class="<?= request()->is('events') ? 'active' : '' ?>">Events</a></li>
                    <li><a href="{{URL::to('/club')}}" class="<?= request()->is('club') ? 'active' : '' ?>">Clubs</a></li>
                    
                </ul>
            </nav><!-- .navbar -->

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->
    <!-- End Header -->


    <main id="main">
        @yield('content')
    </main>


   

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ URL::to('/') }}/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::to('/') }}/public/assets/vendor/aos/aos.js"></script>
    <script src="{{ URL::to('/') }}/public/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ URL::to('/') }}/public/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ URL::to('/') }}/public/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ URL::to('/') }}/public/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ URL::to('/') }}/public/assets/vendor/php-email-form/validate.js"></script>
    @yield('page_script')
    <!-- Template Main JS File -->
    <script src="{{ URL::to('/') }}/public/assets/js/main.js"></script>

</body>

</html>