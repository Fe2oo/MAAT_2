<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icon Libraries (Optional, based on your navbar icons) -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/themify-icons@0.1.2/css/themify-icons.css">
    <style>
        .product-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 20px;
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .product-card-body {
            padding: 15px;
            text-align: center;
        }
        .product-price {
            color: #007bff;
            font-size: 18px;
            font-weight: bold;
        }
        .old-price {
            text-decoration: line-through;
            color: #999;
        }
        .navbar-nav .nav-link {
            color: black !important;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 40px 0;
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

<!-- Product Purchase Section -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 product-card">
            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
            <div class="product-card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p class="product-price">Price: ${{ $product->price }}</p>
                <form action="{{ route('products.purchase.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="form-group">
                        <label for="place">Shipping Address</label>
                        <input type="text" class="form-control" id="place" name="place" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Buy Now</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
