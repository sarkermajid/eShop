@extends('master')

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <p class="display-5 fw-bold text-center text-decoration-underline pb-3" style="font-family: cursive">All Brand's</p>
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
