@extends('frontend.common')
@section('content')



<!-- ======= About Us Section ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>{{$page_title}}</h2>
        </div>

        <div class="row gy-4">
            <div class="col-lg-6">
                <h3>{{$data->name}}</h3>

                <?php if ($page_title == "Club Details") {
                    $img = "club/" . $data->logo;
                } else {
                    $img = "event/" . $data->img;
                }
                ?>
                <img src="{{URL::to('public')}}/<?= $img ?>" class="img-fluid rounded-4 mb-4" alt="">
            </div>
            <div class="col-lg-6">
                <div class="content ps-0 ps-lg-5">
                    <ul>
                        <li><i class="bi bi-check-circle-fill"></i> {{$data->description}}</li>
                        <li><i class="bi bi-check-circle-fill"></i> {{$data->date }} &nbsp;{{ date("h:i:sa",strtotime($data->time)); }}</li>
                    </ul>


                </div>
            </div>
        </div>

    </div>
</section><!-- End About Us Section -->


@endsection
@section('page_script')