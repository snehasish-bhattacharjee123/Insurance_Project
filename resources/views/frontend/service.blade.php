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
        <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" 
                style="background: url('{{ asset('assets/adminpanel/about/slider/'.$about->slider) }}') no-repeat center center; background-size: cover;">
            <div class="container py-5">
                <h1 class="display-4 animated slideInDown mb-4">Services</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Service</li>
                    </ol>
                </nav>
            </div>
        </div> 
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
       
@endsection