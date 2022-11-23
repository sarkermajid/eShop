@extends('master')

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row mb-3">
                <p class="display-5 fw-bold text-center text-decoration-underline pb-3" style="font-family: cursive">Products by Brand</p>
                @foreach($products as $product)
                    <div class="col-md-4 mb-3">
                        <div class="card card-body bg-dark text-white h-100">
                            <img src="{{ asset($product->image) }}" alt="" height="200">
                            <h3 class="pt-3">{{ $product->title }}</h3>
                            <span class="pb-3">Category : {{ $product->category->name }} </span>
                            <span class="pb-3">Brand : {{ $product->brand->name }} </span>
                            <a href="{{ route('product.details',['id'=>$product->id]) }}" class="btn btn-primary btn-sm">Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
