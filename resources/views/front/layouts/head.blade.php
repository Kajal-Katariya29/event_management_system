<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <script src="{{asset('front/js/bootstrap.bundle.js')}}"></script>

    @yield('styles')
</head>
