<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Zone</title>

    <!-- Scripts -->
    <script src="js/azone.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/azone.css" type="text/css">
</head>
<body>
<header>
    <div class="hdrtitle" onclick="document.location.href='{{ url("/") }}'; return false;"><a
                href="{{ url('/') }}">{{ __('Admin Zone') }}</a></div>
    <nav>
        @guest
            <span class="action">{{ __('Signing in') }}</span>
        @else
            <span class="navigator" onmouseover="showDDMenu(this)" onmouseout="closeDDMenu()" onclick="return false;"><a
                        href="#">{{ __(Auth::user()->name) }}</a></span>
            <span class="action">{!! '@' !!}{{ ucfirst(Route::currentRouteName()) }}</span>
            <div id="dd_menu" class="h">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            </div>
        @endguest
    </nav>
    <br clear="all"/>
</header>
<div id="app">
    <div class="container">
        @yield('content')
    </div>
</div>
</body>
</html>
