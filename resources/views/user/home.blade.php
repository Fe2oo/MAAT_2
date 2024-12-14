<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Hero Section Styling */
        .hero-section {
            background: url('{{ asset('user/assets/img/back.jpg') }}') no-repeat center center;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            position: relative;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.6);
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
        .services-section {
            padding: 60px 0;
        }
        .trip-card img {
            height: 200px;
            object-fit: cover;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 40px 0;
        }
        .navbar-nav .nav-link {
            color: black !important;
        }
    </style>
    <link rel="icon" href="{{ asset('user/assets/favicon.ico') }}" type="image/x-icon">

</head>
<body>

<!-- Navbar -->
<nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header" data-logobg="skin5">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <b class="logo-icon ps-2">
                <img src="{{ asset('dashborad/assets/images/logo-icon.png') }}" alt="homepage" class="light-logo" width="25"/>
            </b>
        </a>
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
            <i class="ti-menu ti-close"></i>
        </a>
    </div>

    <div class="navbar-collapse collapse flex-grow-1" id="navbarSupportedContent" data-navbarbg="skin5">
        <!-- Centered Navigation Links -->
        <ul class="navbar-nav mx-auto justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('trips.index') }}">Trips</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.index') }}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About Us</a>
            </li>
            @if(Auth::user()->role == "admin")
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.employee.index') }}">Admin</a>
                </li>
            @endif
        </ul>

        <!-- User Profile Dropdown -->
        <ul class="navbar-nav float-end">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="mdi mdi-account me-1 ms-1"></i> Profile
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fa fa-power-off me-1 ms-1"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero-section">
    <div class="hero-content">
        <h1>Welcome to MAAT Tourism</h1>
        <p>Discover amazing destinations with us</p>
        <a href="{{ route('trips.index') }}" class="btn btn-primary">Explore Our Trips</a>
    </div>
</div>
<!-- Services Section -->
<section id="services" class="services-section bg-light text-center">
    <div class="container">
        <h2>Our Services</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card p-4">
                    <i class="mdi mdi-airplane mdi-48px"></i>
                    <h4>Trip Bookings</h4>
                    <p>We offer the best deals into destinations all over Egypt.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4">
                    <i class="mdi mdi-hotel mdi-48px"></i>
                    <h4>Hotel Reservations</h4>
                    <p>Comfortable and affordable stays at top-rated hotels.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4">
                    <i class="mdi mdi-map mdi-48px"></i>
                    <h4>Tour Packages</h4>
                    <p>Discover exciting tour packages tailored to your preferences.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Trips Section -->
<section id="trips" class="text-center">
    <div class="container">
        <h2>Featured Trips</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="trip-card card">
                    <img src="user/assets/img/21-08-05_19-55-47.jpg" alt="Trip 1" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Trip to Pyramids</h5>
                        <p class="card-text">Explore the wonders of Egypt's capital city.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="trip-card card">
                    <img src="user/assets/img/sharm.jpg" alt="Trip 2" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Red Sea Adventure</h5>
                        <p class="card-text">Dive into the crystal-clear waters of the Red Sea.</p>


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="trip-card card">
                    <img src="user/assets/img/alex.jpg" alt="Trip 3" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Red Sea Adventure</h5>
                        <p class="card-text">Enjoy a luxury cruise through the sea.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="bg-light text-center py-5">
    <div class="container">
        <h2>What Our Clients Say</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p class="mb-0">MAAT Tourism provided an unforgettable experience. Highly recommend!</p>
                    "Mohamed Fayed"
                </blockquote>
            </div>
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p class="mb-0">Excellent service and great tour packages. Will travel again with MAAT!</p>
                    "Ahmed Mahomoud"
                </blockquote>
            </div>
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p class="mb-0">Amazing destinations and fantastic customer care. 5 stars!</p>
                    "Ali Sayed"
                </blockquote>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5">
    <div class="container text-center">
        <h2>Contact Us</h2>
        <p>For any inquiries or bookings, feel free to get in touch!</p>
        <a href="mailto:mohamed.fayed@msa.edu.eg" class="btn btn-outline-primary">Email Us</a>
        <p class="mt-4">call us: 01551101418</p>
        <p class="mt-4">what's app: 01001427288</p>
    </div>
</section>

<!-- Footer -->
<footer class="text-center">
    <div class="container">
        <p>&copy; 2024 MAAT Tourism. All rights reserved.</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            <li class="list-inline-item"><a href="#">Terms of Service</a></li>
        </ul>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
