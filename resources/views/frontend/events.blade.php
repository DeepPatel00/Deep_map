@extends('frontend.common')
@section('content')



<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio sections-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Events</h2>
            <p>An event website is practically a cost-free digital advertisement for the event you’re organizing. But even though it’s relatively easy to create a page, you want to make sure attendees are prepared with the details. To ensure it’s effective, make sure to add these 20 important details when building an event website.</p>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">



            <div class="row gy-4 portfolio-container">
                @if(!empty($data))
                @foreach($data as $d)
                <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <a href="{{URL::to('/public/event/')}}/{{$d->img}}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{URL::to('/public/event/')}}/{{$d->img}}" class="img-fluid" height="500px" alt="image{{$d->id}}"></a>
                        <div class="portfolio-info">
                            <a href="{{URL::to('Event-Details')}}/{{$d->id}}" title="More Details">
                            <h4>{{$d->name}}</h4>
                            <p>{{ mb_strimwidth($d->description ?? "---", 0, 218, "...") }}</p><br>
                            <i>{{$d->date }} &nbsp;{{ date("h:i:sa",strtotime($d->time)); }}</i>&nbsp;
                            </a></p>
                            <a class="btn btn-success" href="{{URL::to('Event-Details')}}/{{$d->id}}">Details</a>&nbsp;
                            &nbsp;&nbsp; <button class="btn btn-success float-end eventRegister" data-bs-toggle="modal" data-id="{{$d->id}}" data-bs-target="#modal-report">Register</button>
                        </div>
                    </div>
                </div><!-- End Portfolio Item -->
                @endforeach
                @endif
            </div><!-- End Portfolio Container -->

        </div>

    </div>
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Register</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{URL::to('/register-event')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">RSVP No</label>
                                    <input type="hidden" name="event_id" class="event_id">
                                    <input type="text" placeholder="Enter RSVP NO" name="rsvp" class="form-control RsvpEvent" required>
                                </div>
                            </div>
                            <div class="col-lg-6 extrafield">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" placeholder="Enter Name" name="name" class="form-control OldName" required>
                                </div>
                            </div>
                            <div class="col-lg-6 extrafield">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" placeholder="Enter Email" required name="email" class="form-control OldEmail">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <p class="alreadregister"></p>
                        <button type="submit" class="btn btn-primary alreadregisterbtn ms-auto">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!-- End Portfolio Section -->

@endsection
@section('page_script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $(document).on("click", ".eventRegister", function() {
            var event_id = $(this).data('id');
            $('.event_id').val(event_id);
        });
        $(".extrafield").hide();
        $(document).on("keyup", ".RsvpEvent", function() {
            var Rsvp_no = $(this).val();
            var event_id=$('.event_id').val();
            $.ajax({
                url: '{{URL::to("/CheckRegister")}}',
                method: 'post',
                data: {
                    no: Rsvp_no,
                    event_id:event_id,
                    type:'event'
                },
                dataType: 'json',
                success: function(response) {
                    $(".alreadregister").html('');
                    $(".alreadregisterbtn").show();
                    if (response.status == true) {
                        
                        $('.OldName').val(response.data.name);
                        $('.OldEmail').val(response.data.email);
                        $('.OldName').attr('readonly', true);
                        $('.OldEmail').attr('readonly', true);
                        $(".extrafield").hide();
                        if(response.already == true){
                            $(".alreadregister").html('Already Register with this event');
                            $(".alreadregisterbtn").hide();
                        }
                    } else {
                        $('.OldName').val("");
                        $('.OldEmail').val("");
                        $('.OldName').attr('readonly', false);
                        $('.OldEmail').attr('readonly', false);
                        $(".extrafield").show();
                    }
                }
            });
        });
    });
</script>
@endsection