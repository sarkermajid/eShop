<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecommerce Project</title>
    <link rel="stylesheet" href="{{ asset('/') }}css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/all.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/style.css">
</head>
<body style="background-color: #bdc3c7;">


<nav class="navbar navbar-expand-md bg-dark py-3 navbar-dark shadow-lg">
    <div class="container">
        @if(isset(Auth::user()->id))
        <a href="{{ route('dashboard') }}" class="navbar-brand fw-bold"  style="font-family: cursive; color: #f39c12">Admin Panel</a>
        @else
        <a href="{{ route('home') }}" class="navbar-brand fw-bold" style="font-family: cursive; color: #2ecc71"><span class="h2" style="color: red">e</span>Shop</a>
        @endif
        <ul class="navbar-nav">
            @if(isset(Auth::user()->id))
            <li class="dropdown">
                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('category.create') }}" class="dropdown-item">Add Category</a></li>
                    <li><a href="{{ route('category.index') }}" class="dropdown-item">Manage Category</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Brand</a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('brand.create') }}" class="dropdown-item">Add Brand</a></li>
                    <li><a href="{{ route('brand.index') }}" class="dropdown-item">Manage Brand</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Product</a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('product.create') }}" class="dropdown-item">Add Product</a></li>
                    <li><a href="{{ route('product.index') }}" class="dropdown-item">Manage Product</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('product.create') }}" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()" class="dropdown-item">Logout</a></li>
                    <form action="{{ route('logout') }}" method="post" id="logoutForm">
                        @csrf
                    </form>
                </ul>
            </li>
            @else
            <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
            <li><a href="{{ route('product.all') }}" class="nav-link">Products</a></li>
            <li><a href="{{ route('category.all') }}" class="nav-link">Categories</a></li>
            <li><a href="{{ route('brand.all') }}" class="nav-link">Brands</a></li>
            <li><a href="{{ route('viewCart') }}" class="nav-link">Cart</a></li>
            @endif
        </ul>
    </div>
</nav>


@yield('body')

<footer class="footer-section py-2 bg-dark text-white border-top" style="margin-top: 300px;">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12">
                <p class="lead mt-3"> &copy; Copyright 2022 eShop - All Rights Reserved by <a href="https://facebook.com/sarkermajid21" class="text-decoration-none text-danger">Sarker Majid</a></p>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('/') }}js/bootstrap.bundle.js"></script>
<script src="{{ asset('/') }}js/jquery-3.6.1.min.js"></script>
</body>
</html>
