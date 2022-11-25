@extends('master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card bg-dark text-white">
                        <div class="card-header">
                            <h4>Edit Product</h4>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                            <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="">Category Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="category_id" class="form-control">
                                            <option value="">--- Category Name ---</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="">Brand Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="brand_id" class="form-control">
                                            <option value="">--- Brand Name ---</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="">Title</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $product->title }}" class="form-control" name="title">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="">Description</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea type="text" class="form-control" name="description">{{ $product->description }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="">Price</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $product->price }}" class="form-control" name="price">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="">Image</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control mb-3" name="image">
                                        <img src="{{ asset($product->image) }}" alt="" height="50" width="70">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="">Product Code</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $product->code }}" class="form-control" name="code">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for=""></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-outline-success" name="" value="update product">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
