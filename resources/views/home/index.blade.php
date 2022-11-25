@extends('master')

@section('body')

    <section>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('/') }}img/category2.jpg" class="d-block w-100" alt="..." height="600">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/') }}img/category3.jpg" class="d-block w-100" alt="..." height="600">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/') }}img/category4.jpg" class="d-block w-100" alt="..." height="600">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/') }}img/category5.jpg" class="d-block w-100" alt="..." height="600">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row mb-3">
                <p class="display-5 fw-bold text-center text-decoration-underline pb-3" style="font-family: cursive">Product's</p>
                @foreach($products as $product)
                    <div class="col-md-4 mb-3">
                        <div class="card card-body bg-dark text-white h-100">
                            <img src="{{ asset($product->image) }}" alt="" height="200">
                            <h3 class="pt-3">{{ $product->title }}</h3>
                            <h5 class="pt-3">Tk.{{ $product->price }}</h5>
                            <span class="pb-3">Category : {{ $product->category->name }} </span>
                            <span class="pb-3">Brand : {{ $product->brand->name }} </span>
                            <a href="{{ route('product.details',['id'=>$product->id]) }}" class="btn btn-primary btn-sm">Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <p class="display-5 fw-bold text-center text-decoration-underline pb-3" style="font-family: cursive">Categories</p>
                @foreach($categories as $category)
                    <div class="col-md-4 mb-3">
                        <div class="card card-body bg-dark text-white h-100">
                            <img src="{{ asset($category->image) }}" alt="" height="200">
                            <h3 class="pt-3">{{ $category->name }}</h3>
                            <p class="pt-3">{{ $category->description }}</p>
                            <a href="{{ route('category.details',['id'=>$category->id]) }}" class="btn btn-primary btn-sm">view products</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <p class="display-5 fw-bold text-center text-decoration-underline pb-3" style="font-family: cursive">Brand's</p>
                @foreach($brands as $brand)
                    <div class="col-md-4 mb-3">
                        <div class="card card-body bg-dark text-white h-100">
                            <img src="{{ asset($brand->image) }}" alt="" height="200">
                            <h3 class="pt-3">{{ $brand->name }}</h3>
                            <p class="pt-3">{{ $brand->description }}</p>
                            <a href="{{ route('brand.details',['id'=>$brand->id]) }}" class="btn btn-primary btn-sm">view products</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
