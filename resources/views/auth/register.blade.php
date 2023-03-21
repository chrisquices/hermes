@extends('layouts.guest')

@section('content')
    <div class="wrapper">
        <section class="login-content">
            <div class="container">
                <div class="row align-items-center justify-content-center height-self-center">
                    <div class="col-lg-8">
                        <div class="card auth-card bg-light">
                            <div class="card-body p-0">
                                <div class="row align-items-center auth-content">
                                    <div class="col-lg-7 align-self-center">
                                        <div class="p-3">
                                            <h2 class="mb-2">Sign Up</h2>
                                            <p>Create your hermes account.</p>
                                            <form action="{{ route('register') }}" method="POST" autocomplete="off">
                                                @csrf

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="floating-label form-group">
                                                            <input class="floating-input form-control" type="text" name="name" placeholder=" " required>
                                                            <label>Full Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="floating-label form-group">
                                                            <input class="floating-input form-control" type="email" name="email" placeholder=" " required>
                                                            <label>Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="floating-label form-group">
                                                            <input class="floating-input form-control" type="password" name="password" placeholder=" " required>
                                                            <label>Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="floating-label form-group">
                                                            <input class="floating-input form-control" type="password" name="password_confirmation" placeholder=" " required>
                                                            <label>Confirm Password</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Sign Up</button>
                                                <p class="mt-3">
                                                    Already have an Account? <a href="{{ route('login') }}" class="text-primary">Sign In</a>
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
