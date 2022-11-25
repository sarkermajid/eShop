@extends('master')


@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card bg-dark text-white">
                        <div class="card-header"><h4>All Cart Information</h4></div>
                        <div class="card-body text-white">
                            <h3 class="text-danger text-center">{{ Session::get('message_delete') }}</h3>
                            <table class="table table-bordered text-white ">
                                <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($carts as $cart)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cart->name }}</td>
                                        <td>{{ $cart->qty }}</td>
                                        <td>{{ $cart->price }}</td>
                                        <td>{{ $cart->options['total'] }}</td>
                                        <td><a href="{{ route('removeCart',['id'=>$cart->rowId]) }}" onclick="return confirm('Are you sure to remove this product ?')" class="btn btn-sm btn-danger">Remove</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered text-white">
                                <tr>
                                    <td>Subtotal</td>
                                    <td>Tk. {{ $subtotal }}</td>
                                    <td class="text-center"><button class="btn btn-success btn-sm">Checkout</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
