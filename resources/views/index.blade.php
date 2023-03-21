@extends('layouts.app')
@section('title', 'Home')
@section('content')

    <div class="wrapper">

        @include('layouts.navigation')

        <div class="content-page">
            <div class="container-fluid h-100">
                <div class="row align-self-center h-100">
                    <div class="col-sm-12 text-center align-self-center">
                        <h2 class="mb-4">Welcome back, {{ auth()->user()->name }}!</h2>
                        <img src="{{ asset('assets/images/placeholder.png') }}" class="img-fluid" alt="logo" width="300">
                        <h4 class="mt-4 mb-5">Start a conversation with your friends</h4>
                        <div class="mb-4">
                            <a href="{{ route('chat.index') }}" class="btn btn-primary">Start Chatting</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
