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
<body style="background-color: #bdc3c7">

<nav class="navbar navbar-expand-md bg-dark py-3 navbar-dark shadow-lg">
    <div class="container">
        <a href="" class="navbar-brand">Ecommerce Project</a>
        <ul class="navbar-nav">
            <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
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
        </ul>
    </div>
</nav>


@yield('body')

<script src="{{ asset('/') }}js/bootstrap.bundle.js"></script>
<script src="{{ asset('/') }}js/jquery-3.6.1.min.js"></script>
</body>
</html>
