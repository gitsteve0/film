<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/client.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link href="{{ asset('css/videojs.css') }}" rel="stylesheet" />
</head>
<body class="bg-dark">
@include('client.app.nav')
@include('client.app.alert')
@yield('content')
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/videojs.js') }}"></script>
</body>
</html>