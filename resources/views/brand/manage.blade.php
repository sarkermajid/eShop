@extends('master')


@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card bg-dark text-white">
                        <div class="card-header"><h4>All Brands Information</h4></div>
                        <div class="card-body text-white">
                            <h3 class="text-success text-center">{{ Session::get('message') }}</h3>
                            <h3 class="text-danger text-center">{{ Session::get('message_delete') }}</h3>
                            <table class="table table-bordered text-white ">
                                <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->description }}</td>
                                        <td><img src="{{ asset($brand->image) }}" alt="" height="50" width="70"></td>
                                        <td>
                                            <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('brand.destroy', $brand->id) }}" method="post">
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
