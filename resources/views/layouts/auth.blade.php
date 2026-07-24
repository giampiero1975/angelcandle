<!DOCTYPE HTML>
<html lang="it">
<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
    </noscript>
    
</head>
<body class="is-preload">

@include('layouts.header')

<div style="background-color: yellow; padding: 20px; text-align: center;">
    QUESTO È UN TEST DEL LAYOUT DI AUTENTICAZIONE
</div>
@yield('content')

@include('layouts.footer')

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.poptrox.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.scrollex.min.js') }}"></script>
<script src="{{ asset('assets/js/browser.min.js') }}"></script>
<script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
<script src="{{ asset('assets/js/util.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>