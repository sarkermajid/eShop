@extends('master')


@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card bg-dark text-white">
                        <div class="card-header"><h4>All Products Information</h4></div>
                        <div class="card-body text-white">
                            <h3 class="text-success text-center">{{ Session::get('message') }}</h3>
                            <h3 class="text-danger text-center">{{ Session::get('message_delete') }}</h3>
                            <table class="table table-bordered text-white ">
                                <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Title</th>
                                    <th>Category Name</th>
                                    <th>Brand Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->brand->name }}</td>
                                        <td>{{ substr($product->description, '0','50').'...' }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td><img src="{{ asset($product->image) }}" alt="" height="50" width="70"></td>
                                        <td>
                                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Are you sure to delete this ?')" class="btn btn-danger btn-sm d-inline-block">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
