<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .about-section {
            padding: 80px 0;
            background-color: #f1f1f1;
        }
        .about-title {
            font-size: 36px;
            font-weight: bold;
            color: #333;
            margin-bottom: 30px;
        }
        .about-text {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
        }
        .team-section {
            padding: 60px 0;
        }
        .team-title {
            font-size: 32px;
            margin-bottom: 40px;
        }
        .team-member {
            text-align: center;
            margin-bottom: 40px;
        }
        .team-member img {
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .team-member h5 {
            font-size: 22px;
            font-weight: bold;
        }
        .team-member p {
            color: #777;
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
<!-- About Us Section -->
<section class="about-section text-center">
    <div class="container">
        <h1 class="about-title">About MAAT Tourism</h1>
        <p class="about-text">
            MAAT Tourism is one of Egypt’s leading travel agencies, offering a wide range of tourism services and unforgettable experiences to local and international travelers. We specialize in creating custom travel packages tailored to your unique interests, ensuring you experience the best Egypt has to offer, from its breathtaking historical sites to its stunning natural landscapes.
        </p>
        <p class="about-text">
            At MAAT, we believe in providing not just trips, but memories that last a lifetime. Our dedicated team of experts, with decades of combined experience, ensures that every journey is seamless, enjoyable, and full of discovery.
        </p>
    </div>
</section>

<!-- Our Mission Section -->
<section class="container text-center py-5">
    <h2 class="mb-4">Our Mission</h2>
    <p class="lead">
        To provide exceptional travel experiences that immerse our clients in the rich culture, history, and natural beauty of Egypt, while promoting responsible and sustainable tourism.
    </p>
</section>

<!-- Team Section -->
<section class="team-section text-center">
    <div class="container">
        <h2 class="team-title">Meet Our Team</h2>
        <div class="row justify-content-center">
            <div class="col-md-4 team-member">
                <img src="user/assets/img/fayed.png" alt="Team Member 3" class="img-fluid" width="150">
                <h5>Mohamed Fayed</h5>
                <p>Full Stack Developer</p>
            </div>
        </div>

    </div>
</section>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
