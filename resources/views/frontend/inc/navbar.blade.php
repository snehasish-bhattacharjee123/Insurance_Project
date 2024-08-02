<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex align-items-center">
            <h1 class="m-0"><img class="img-fluid me-3" src="img/icon/icon-02-primary.png" alt="">Insurence</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
                <a href="{{route('post.page')}}" class="nav-item nav-link pink-animation {{ Request::routeIs('post.page') ? 'active' : '' }}">Posts</a>
                <a href="{{route('first.page')}}" class="nav-item nav-link {{ Request::routeIs('first.page') ? 'active' : '' }}">Home</a>
                <a href="{{route('about.page')}}" class="nav-item nav-link {{ Request::routeIs('about.page') ? 'active' : '' }}">About Us</a>
                <a href="{{route('service.page')}}" class="nav-item nav-link">Our Services</a>
                
                <a href="contact.html" class="nav-item nav-link">Contact Us</a>
            </div>
        </div>
        {{--<a href="" class="btn btn-primary px-3 d-none d-lg-block">Get A Quote</a>--}}
    </nav>