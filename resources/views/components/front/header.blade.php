<!-- NAVBAR AREA START -->
<nav class="navbar navbar-expand-lg navbar-light container-fluid py-3 position-fixed">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('images/car-logo1.png')}}" alt="rentacar" /></a>
        <button class="navbar-toggler me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav align-items-center justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link px-3 {{$page_index == 'home' ? 'active' : ''}}" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{$page_index == 'about' ? 'active' : ''}}" href="{{url('/about-us')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{$page_index == 'booking' ? 'active' : ''}}" href="{{url('/booking')}}">Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{$page_index == 'car' ? 'active' : ''}}" href="{{url('/cars')}}">Cars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{$page_index == 'contact' ? 'active' : ''}}" href="{{url('/contact-us')}}">Contact</a>
                    </li>
                    @if(Cookie::has('customer_token'))
                        <a class="fw-bold text-capitalize px-3 py-2 mx-2 btn btn-outline-danger" href="{{url('/user/logout')}}">Logout</a>
                        <a class="fw-bold text-capitalize px-3 py-2 btn btn-outline-success" href="{{url('/user/dashboard')}}">Dashboard</a>
                    @else
                        <a class="fw-bold text-capitalize px-3 py-2 btn btn-outline-danger" href="{{url('/login')}}">Login</a>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- NAVBAR AREA END -->
