@extends('master')


@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card bg-dark text-white">
                        <div class="card-header">Edit Category</div>
                        <div class="card-body text-white">
                            <h3 class="text-success text-center">{{ Session::get('message') }}</h3>
                            <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Description</label>
                                    <div class="col-md-9">
                                        <textarea name="description" class="form-control">{{ $category->description }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control mb-3" name="image">
                                        <img src="{{ asset($category->image) }}" alt="" height="50" width="70">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" name="update_category" class="btn btn-success" value="Update Category">
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
