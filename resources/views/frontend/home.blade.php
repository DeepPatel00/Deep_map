@extends('frontend.common')
@section('content')

<section id="hero" class="hero">
    <div class="container position-relative">
        <div class="row gy-5" data-aos="fade-in">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                <h2>TAKE TOMORROW BY STORM!</h2>
                <p>The GSW Interactive Map and Event Discovery page is here to help student, faculty, and staff easily navigate around campus. Services include an interactive map, event page, and a clubs page.</p>
                <p>{{$textTitle}}
                <img src="{{$icon}}" alt="{{$textTitle}}" title="{{$textTitle}}"></p>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="https://www.gsw.edu/" class="btn-get-started">GSW MAIN SITE</a>
                    
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <img src="{{ URL::to('/') }}/public/assets/img/hero-img.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
            </div>
        </div>
    </div>

    <div class="icon-boxes position-relative">
        <div class="container position-relative">
            <div class="row gy-4 mt-5">

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <a href="https://www.facebook.com/GeorgiaSouthwestern">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-facebook"></i></div>
                        <h4 class="title"><a href="" class="stretched-link">Facebook</a></h4>
                    </div>
                    </a>
                </div>
                <!--End Icon Box -->

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <a href="https://twitter.com/GaSouthwestern">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-twitter"></i></div>
                        <h4 class="title"><a href="" class="stretched-link">Twitter</a></h4>
                    </div>
                    </a>
                </div>
                <!--End Icon Box -->

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <a href="https://www.instagram.com/georgiasouthwestern/">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-instagram"></i></div>
                        <h4 class="title"><a href="" class="stretched-link">Instagram</a></h4>
                    </div>
                    </a>
                </div>
                <!--End Icon Box -->

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <a href="https://www.youtube.com/user/GeorgiaSouthwestern">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-youtube"></i></div>
                        <h4 class="title"><a href="" class="stretched-link">You Tube</a></h4>
                    </div>
                    </a>
                </div>
                <!--End Icon Box -->

            </div>
        </div>
    </div>

    </div>
</section>


@endsection
@section('page_script')
<script>
</script>
@endsection