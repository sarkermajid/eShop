@extends('master')

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row  py-5 bg-dark text-white">
                <div class="col-md-6">
                    <img src="{{ asset($product->image) }}" alt="" height="500" width="500">
                </div>
                <div class="col-md-6">
                    <h2>{{ $product->title }}</h2>
                    <p class="fs-3">{{ $product->description }}</p>
                    <p class="fs-3">Code : {{ $product->code }}</p>
                    <p class="fs-5">Category Name: {{ $product->category->name }}</p>
                    <p class="fs-5">Brand Name : {{ $product->brand->name }}</p>
                    <a href="" class="btn btn-success d-block">Add to Cart</a>
                </div>
            </div>
        </div>
    </section>

@endsection
