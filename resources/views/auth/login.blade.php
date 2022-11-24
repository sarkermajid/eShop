@extends('master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-6 mx-auto">
                    <div class="card bg-dark text-white">
                        <div class="card-header">Login form</div>
                        <div class="card-body text-white">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-md-3">Email Address</label>
                                    <div class="col-md-9">
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" name="" class="btn btn-outline-success" value="login">
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
