<!-- Footer Start -->
<div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="text-white mb-4"><img class="img-fluid me-3" src="img/icon/icon-02-light.png" alt="">Insure</h1>
                    <p>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square me-1" href="https://www.facebook.com/sanjoy.dutta.5680"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square me-1" href="https://www.instagram.com/sanjoydutta427/"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div> 
                @php 
                    $user = App\Models\User::first();
                @endphp
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>Howrah Ichapur</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+91 {{$user->number}}</p>
                    <p><i class="fa fa-envelope me-3"></i>{{$user->email}}</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="{{route('post.page')}}">Post</a>
                    <a class="btn btn-link" href="{{route('about.page')}}">About Us</a>
                    <a class="btn btn-link" href="{{route('contact.page')}}">Contact Us</a>
                    <a class="btn btn-link" href="{{route('service.page')}}">Our Services</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-secondary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center  mb-3 mb-md-0">
                        &copy; <a href="{{url('/')}}">Insurence</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/front/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/front/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/front/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/front/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/front/lib/counterup/counterup.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('assets/front/js/main.js')}}"></script>  
    </body>

</html> 