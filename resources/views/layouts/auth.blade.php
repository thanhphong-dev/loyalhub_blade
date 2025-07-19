<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href={{ asset('images/logo/favicon.png') }} type="image/x-icon">

    <title>{{ config('app.name', 'Wind Lập Trình') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/css/auth.css']);
</head>
<body>
    <div id="app">
        <main class="page-login">
            @yield('content')
        </main>
    </div>
</body>
    @vite(['resources/js/auth.js'])
</html>
