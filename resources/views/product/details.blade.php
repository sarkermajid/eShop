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
                    <p class="fs-3">TK. {{ $product->price }}</p>
                    <p class="fs-5">Category Name: {{ $product->category->name }}</p>
                    <p class="fs-5">Brand Name : {{ $product->brand->name }}</p>
                    <form action="{{ route('addToCart') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="title" value="{{ $product->title }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <div class="row mb-3">
                            <label for="" class="col-md-3">Order Amount</label>
                            <div class="col-md-5">
                                <input type="number" value="1" name="amount" class="form-control form-control-sm">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-outline-success btn-sm w-100" value="Add to cart">
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
