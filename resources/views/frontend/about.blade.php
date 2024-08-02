@extends('frontend.exc.extend')
@section('content') 
<style>
    .page-header {
        background-size: cover;
        background-position: center center; 
    }

    @media (min-width: 992px) {
        .page-header {
            height: 550px;
        }
    }

    @media (max-width: 991px) {
        .page-header {
            height: auto;
            padding-top: 60px;
            padding-bottom: 60px;
        }
    } 

    .team-item {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .team-item img {
        max-height: 200px; /* Adjust as needed */
        object-fit: cover;
    }

    .team-item .text-center {
        flex-grow: 1;
    }

    .team-text {
        flex-shrink: 0;
    }

    .fixed-height {
        height: 300px; /* Adjust this value as needed */
        overflow: hidden;
    }
</style>
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
    <!-- Spinner End -->

    @if($about->slider)
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" 
                style="background: url('{{ asset('assets/adminpanel/about/slider/'.$about->slider) }}') no-repeat center center; background-size: cover;">
            <div class="container py-5">
                <h1 class="display-4 animated slideInDown mb-4">About Us</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    @else 
        <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <h1 class="display-4 animated slideInDown mb-4">About Us</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div> 
    @endif
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden rounded ps-5 pt-5 h-100" style="min-height: 400px;"> 
                        @if($about->image)
                            <img class="position-absolute w-100 h-100" src="{{ asset('assets/adminpanel/about/profile/' . $about->image) }}" alt="" style="object-fit: cover;"> 
                        @else 
                            <img class="position-absolute w-100 h-100" src="img/about.jpg" alt="" style="object-fit: cover;"> 
                        @endif
                        <div class="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3" style="width: 200px; height: 200px;">
                            <div class="d-flex flex-column justify-content-center text-center bg-primary rounded h-100 p-3"> 
                                @if($about->experience)
                                    <h1 class="text-white mb-0">{{$about->experience}}</h1> 
                                @else 
                                    <h1 class="text-white mb-0">10</h1>  
                                @endif
                                <h2 class="text-white">Years</h2>
                                <h5 class="text-white mb-0">Experience</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100"> 
                        @if($about->heading_about)
                            <h1 class="display-6 mb-5">{{$about->heading_about}}</h1>
                        @else
                            <h1 class="display-6 mb-5">We're Here To Assist You With Exploring Protection</h1> 
                        @endif 
                        @if($about->highlight_description)
                            <p class="fs-5 text-primary mb-4">{{$about->highlight_description}}</p>
                        @else 
                            <p class="fs-5 text-primary mb-4">Aliqu diam amet diam et eos. Clita erat ipsum et lorem sed stet lorem sit clita duo justo erat amet</p> 
                        @endif
                        
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
                        @if($about->description)
                            <p class="mb-4">{{$about->description}}</p> 
                        @else 
                            <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p> 
                        @endif
                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex align-items-center">
                                <img class="flex-shrink-0 rounded-circle me-3" src="img/profile.jpg" alt="" > 
                                @if($about->number)
                                 <h5 class="mb-0">Call Us: +91 {{$about->number}}</h5>
                                @else 
                                    <h5 class="mb-0">Call Us: +91 9330668959</h5> 
                                @endif                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->



    <!-- Team Start --> 
    @if($about->image_social)
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto" style="max-width: 500px;">
                <h1 class="display-6 mb-5">Find Me On Social Media</h1>
            </div>
            <div class="row g-4" style="display: flex; justify-content: center;">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="{{ asset('assets/adminpanel/about/social/' . $about->image_social) }}"" alt="">
                        <div class="text-center p-4">
                            <h5>{{$about->name}}</h5>
                            <span>{{$about->Designation_title}}</span>
                        </div>
                        <div class="team-text text-center bg-white p-4">
                            <h5>{{$about->name}}</h5>
                            <p>{{$about->Designation_title}}</p>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-square btn-light m-1" href="https://www.instagram.com/sanjoy.dutta.5680/" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-light m-1" href="https://www.facebook.com/sanjoy.dutta.5680" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-light m-1" href="" target="_blank"><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-square btn-light m-1" href="" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    @endif
    <!-- Team End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> 
@endsection