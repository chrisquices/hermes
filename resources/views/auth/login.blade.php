@extends('layouts.guest')
@section('title', 'Login')
@section('content')
    <div class="wrapper">
        <section class="login-content">
            <div class="container">
                <div class="row align-items-center justify-content-center height-self-center">
                    <div class="col-lg-8">
                        <div class="card auth-card bg-light" style="border: 1px solid #e1e5ed;">
                            <div class="card-body p-0">
                                <div class="row align-items-center auth-content">
                                    <div class="col-lg-7 align-self-center">
                                        <div class="p-3">
                                            <h2 class="mb-4">Hermes</h2>
                                            <form action="{{ route('login') }}" method="POST" autocomplete="off">
                                                @csrf

                                                <div class="row">
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="floating-label form-group">
                                                            <input class="floating-input form-control" type="email" name="email" placeholder=" " value="rosphrethic@hermes.com">
                                                            <label>Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input class="floating-input form-control" type="password" name="password" placeholder=" " value="password">
                                                            <label>Password</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2">Sign In</button>
                                                <a href="{{ route('register') }}" class="btn btn-outline-primary text-primary">Create an account!</a>

                                                @if(count($errors) > 0)
                                                    @foreach( $errors->all() as $message )
                                                        <div class="alert alert-danger display-hide">
                                                            <button class="close" data-close="alert"></button>
                                                            <span>{{ $message }}</span>
                                                        </div>
                                                    @endforeach
                                                @endif

                                                <hr>
                                                <p>
                                                    We've prepared other users for you!
                                                    <br>
                                                    <br>
                                                    <span class="text-primary fw-bold">User 1:</span> jacksepticeye@hermes.com
                                                    <span class="text-primary fw-bold">User 2:</span> ludwig@hermes.com
                                                    <span class="text-primary fw-bold">User 3:</span> fuslie@hermes.com
                                                    <br>
                                                    <span class="text-primary fw-bold">Password:</span> password
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 content-right">
                                        <img src="{{ asset('assets/images/placeholder.png') }}" class="img-fluid image-right pr-3" alt="" width="300">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
