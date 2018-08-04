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
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <div class="hdrtitle">{{ __('Admin Zone') }}</div>
            <nav>
                    <span class="navigator"
                          onclick="document.location.href='{{ route('login') }}'; return false;"><a
                                href="{{ route('login') }}">{{ __('Login') }}</a></span>
                <span class="navigator"
                      onclick="return feedBack('{{ route('feedback.get') }}');"><a
                            href="{{ route('feedback.get') }}">{{ __('Feedback') }}</a></span>
            </nav>
            <br clear="all"/>
        @endauth
    @endif
</header>
</body>
</html>
