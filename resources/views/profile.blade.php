@extends('layouts.app')
@section('title', 'Profile')
@section('content')

    <div class="wrapper">

        @include('layouts.navigation')

        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Profile</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('profile.update') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')

                                    <div class="row mb-0">
                                        <div class="col-lg-9">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3 align-self-center" for="email">Full Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="name" placeholder="Enter your email" value="{{ auth()->user()->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3 align-self-center" for="email">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" name="email" placeholder="Enter your email" value="{{ auth()->user()->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3 align-self-center" for="pwd1">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" name="password" placeholder="Enter your password">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label class="control-label col-sm-3 align-self-center" for="pwd1">Confirm Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Enter your password confirmation">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group text-center">
                                                <img src="{{ auth()->user()->photo_url }}" alt="Profile Picture" width="100">
                                                <br>
                                                <br>
                                                <input type="file" name="photo" id="photo" hidden>
                                                <button type="button" class="btn btn-primary" onclick="$('#photo').click();">
                                                    Select Photo
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary">Save Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
