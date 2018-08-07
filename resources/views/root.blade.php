<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Zone</title>

    <script src="/js/azone.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/azone.css" type="text/css">

</head>
<body>
<header>
    @if (Route::has('login'))
        <div class="hdrtitle">{{ __('Admin Zone') }}</div>
        <nav>
            @auth
                <span class="navigator" onclick="document.location.href='{{ route('emails') }}'; return false;"><a
                            href="#">{{ __('E-mails') }}</a></span>
            @else
                <span class="navigator"
                      onclick="document.location.href='{{ route('login') }}'; return false;"><a
                            href="{{ route('login') }}">{{ __('Login') }}</a></span>
            @endauth
            <span class="navigator" onclick="return feedBack();"><a href="#">{{ __('Feedback') }}</a></span>
            @auth
                <span class="navigator" onmouseover="showDDMenu(this)" onmouseout="closeDDMenu()"
                      onclick="return false;"><a
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
                @endauth
        </nav>
        <br clear="all"/>
    @endif
</header>
@yield('content')
@if(session()->get('msgsent'))
    @yield('response')
@endif
</body>
</html>
