<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hafalanku - @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Admin, Dashboard, Bootstrap" />
    <link rel="shortcut icon" sizes="196x196" href="{{ asset('assets/images/logo.png') }}">

    <link rel="stylesheet" href="{{ asset('libs/bower/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/bower/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/misc-pages.css') }}">
</head>
<body class="simple-page">
    <div class="simple-page-wrap">
        <div class="simple-page-logo animated swing">
            <a href="{{ URL('/') }}">
                <span class="brand-icon"><img src="{{ asset('assets/images/logo-navbar.png') }}" style="height: 30px"/></span>
                <span>Hafalanku</span>
            </a>
        </div>

        @yield('content')
    </div>

	<script src="{{ asset('libs/bower/jquery/dist/jquery.js') }}"></script>
    @yield('scripts')
</body>
</html>