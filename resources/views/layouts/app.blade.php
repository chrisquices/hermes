<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/site.webmanifest') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/backend.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/fonts/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/material-icons/css/material-icons.css') }}">

    @livewireStyles

</head>

<body class=" ">
<div id="loading">
    <div id="loading-center">
    </div>
</div>

@yield('content')

<script src="../assets/js/backend-bundle.min.js"></script>

<script src="../assets/js/app.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@yield('scripts')

@if(session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-right',
            title: '{{ session('success') }}',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-right',
            title: '{{ session('error') }}',
            icon: 'error',
            timer: 2000,
            showConfirmButton: false,
        });
    </script>
@endif

@livewireScripts

</body>
</html>
