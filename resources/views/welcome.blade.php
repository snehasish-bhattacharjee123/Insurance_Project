
@extends('frontend.exc.extend')
@section('content')  
<style>
    .form-floating .required-label:after {
        content: " *";
        color: red;
    }
</style>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
        <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner"> 
                @foreach($slider as $idex => $s) 
                    <div class="carousel-item {{$idex == 0? 'active': ''}}">
                        <img class="w-100" src="{{asset('storage/slider/'.$s->slider_image)}}" alt="Image">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <h1 class="display-3 text-dark mb-4 animated slideInDown">{{$s->slider_title}}</h1>
                                        <p class="fs-5 text-body mb-5">{{$s->slider_description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Nextt</span>
                </button>
            </div>
        </div>  
    
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="position-relative overflow-hidden rounded ps-5 pt-5 h-100" style="min-height: 400px;">  
                            @if($experience)
                                @php
                                    $image = json_decode($experience->about_image);
                                @endphp 
                                @if($image)
                                    <img class="position-absolute w-100 h-100" src="{{asset('storage/about/'.$image[0])}}" alt="" style="object-fit: cover;"> 
                                @else
                                    <img class="position-absolute w-100 h-100" src="{{asset('assets/front/img/about.jpg')}}" alt="" style="object-fit: cover;"> 
                                @endif 
                            
                            <div class="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3" style="width: 200px; height: 200px;">
                                <div class="d-flex flex-column justify-content-center text-center bg-primary rounded h-100 p-3">
                                    <h1 class="text-white mb-0">{{$experience->about_experience}}</h1>
                                    <h2 class="text-white">Years</h2>
                                    <h5 class="text-white mb-0">Experience</h5>
                                </div>
                            </div>
                            @else 
                                <img class="position-absolute w-100 h-100" src="{{asset('assets/front/img/about.jpg')}}" alt="" style="object-fit: cover;">  
                            @endif
                        </div> 
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="h-100">
                            <h1 class="display-6 mb-5">We're Here To Assist You With Exploring Protection</h1>
                            <p class="fs-5 text-primary mb-4">Aliqu diam amet diam et eos. Clita erat ipsum et lorem sed stet lorem sit clita duo justo erat amet</p>
                            <div class="row g-4 mb-4">
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 me-3" src="img/icon/icon-04-primary.png" alt="">
                                        <h5 class="mb-0">Flexible Insurance Plans</h5>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 me-3" src="img/icon/icon-03-primary.png" alt="">
                                        <h5 class="mb-0">Money Back Guarantee</h5>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 rounded-circle me-3" src="img/profile.jpg" alt=""> 
                                    @if($experience)
                                        <h5 class="mb-0">Call Us: +91 {{$experience->about_contact}}</h5>  
                                    @else 
                                        <h5 class="mb-0">Call Us: +91 7980225928</h5>   
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    <!-- About End -->




        <!-- Appointment Start -->
        <div class="container-fluid appointment my-5 py-5 wow fadeIn" data-wow-delay="0.1s" style="background" id="appointment-form">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                        <h1 class="display-6 text-white mb-5">We're Award Winning Insurance Company</h1>
                        <p class="text-white mb-5">Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet. Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna.</p>
                        <div class="bg-white rounded p-3">
                            <div class="d-flex align-items-center bg-primary rounded p-3">
                                <img class="flex-shrink-0 rounded-circle me-3" src="img/profile.jpg" alt="" > 
                                @if($experience)
                                    <h5 class="text-white mb-0">Call Us: +91 {{$experience->about_contact}}</h5> 
                                @else 
                                    <h5 class="text-white mb-0">Call Us: +91 7980225928</h5>  
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="bg-white rounded p-5">
                            <form id="appointment"> 
                                <div id="sendmessage" style="display:none;">Your appointment has been scheduled!</div>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="gname" name="name" placeholder="Guardian Name">
                                            <label for="gname" class="required-label">Your Name</label>
                                            <span class="text-danger" id="nameError"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="schedule-date" name="date" placeholder="Schedule Date">
                                            <label for="schedule-date" class="required-label">Schedule Date</label>
                                            <span class="text-danger" id="dateError"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6"> 
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="cname" name="number" placeholder="Your Mobile" oninput="this.value = this.value.slice(0,10)">
                                            <label for="cname" class="required-label">Your Mobile</label>
                                            <span class="text-danger" id="numberError"></span> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="cage" name="service" placeholder="Service Type">
                                            <label for="cage">Choice The Product</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 80px"></textarea>
                                            <label for="message">Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button id="form-button" class="btn btn-primary py-3 px-5" type="submit">Get Appointment</button>
                                    </div>
                                </div>
                            </form>
    
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Appointment End -->

    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-6 mb-5">Few Reasons Why People Choosing Us!</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <div class="row g-3">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="bg-light rounded h-100 p-3">
                                <div class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3"> 
                                    <img class="align-self-center mb-3" src="img/icon/icon-06-primary.png" alt="">
                                    <h5 class="mb-0">Easy Process</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                            <div class="bg-light rounded h-100 p-3"> 
                                <div class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3">
                                    <img class="align-self-center mb-3" src="img/icon/icon-03-primary.png" alt="">
                                    <h5 class="mb-0">Fast Delivery</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                            <div class="bg-light rounded h-100 p-3">
                                <div class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3">
                                    <img class="align-self-center mb-3" src="img/icon/icon-04-primary.png" alt="">
                                    <h5 class="mb-0">Policy Controlling</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                            <div class="bg-light rounded h-100 p-3">
                                <div class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3">
                                    <img class="align-self-center mb-3" src="img/icon/icon-07-primary.png" alt="">
                                    <h5 class="mb-0">Money Saving</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="position-relative rounded overflow-hidden h-100" style="min-height: 400px;">  
                    @if($experience)
                        @php
                            $image = json_decode($experience->about_image);
                        @endphp 

                        @if(count($image) > 1)
                            <img class="position-absolute w-100 h-100" src="{{asset('storage/about/'.$image[1])}}" alt="" style="object-fit: cover;"> 
                        @else
                            <img class="position-absolute w-100 h-100" src="{{asset('assets/front/img/about.jpg')}}" alt="" style="object-fit: cover;"> 
                        @endif 
                    @else 
                        <img class="position-absolute w-100 h-100" src="{{asset('assets/front/img/about.jpg')}}" alt="" style="object-fit: cover;">  
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Service Start --> 
    @if(count($service) > 0) 
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto" style="max-width: 500px;">
                <h1 class="display-6 mb-5">We Provide professional Insurance Services</h1>
            </div>
            <div class="row g-4 justify-content-center"> 
                
                    @foreach($service as $s)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item rounded h-100 p-5">
                                <div class="d-flex align-items-center ms-n5 mb-4">
                                    <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                                        <img class="img-fluid" src="img/icon/icon-10-light.png" alt="">
                                    </div>
                                    <h4 class="mb-0">{{$s->title}}</h4>
                                </div>
                                <p class="mb-6" style="word-wrap: break-word; overflow-wrap: break-word; white-space: normal;">{{$s->description}}</p>
                                <a class="btn btn-light px-3" href="{{route('product.page',$s->meta_title)}}">Read More</a>
                            </div>
                        </div>  
                    @endforeach
            </div>
        </div>
    </div> 
    @endif
    <!-- Service End -->    

@endsection
@section('script')
    <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
            }
        });

        $('#form-button').click(function(e) {
            e.preventDefault();

            // Clear previous error messages
            $('.text-danger').text('');

            // Get form values
            var name = $('#gname').val();
            var date = $('#schedule-date').val();
            var number = $('#cname').val();

            var isValid = true;

            // Validate fields
            if (!name) {
                $('#nameError').text('The Name field is required');
                isValid = false;
            }
            if (!date) {
                $('#dateError').text('The Date field is required');
                isValid = false;
            }
            if (!number) {
                $('#numberError').text('The Number field is required');
                isValid = false;
            }

            // If valid, proceed with AJAX request
            if (isValid) {
                var data = $('#appointment').serialize();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('appoinment.post') }}",
                    data: data,
                    success: function(response) { 
                        $('#appointment')[0].reset();
                        $('#sendmessage').show();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });
    });
</script> 
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (window.location.hash) {
            var elementId = window.location.hash.substring(1);
            var element = document.getElementById(elementId);
            if (element) {
                setTimeout(function() {
                    var elementPosition = element.getBoundingClientRect().top + window.scrollY;
                    window.scrollTo({
                        top: elementPosition,
                        behavior: 'smooth'
                    });
                }, 80);
            }
        }
    });
</script>



@endsection

