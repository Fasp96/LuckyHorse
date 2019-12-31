<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Luckyhorse</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        

    </head>
    <body>
    <div id="app"></div>
        <div id="page-container">
            <div id="content-wrap">
                <div id='logo_nav_bar'>
                    <a href="{{ url('') }}">
                        <img id='logo' src={{ asset('img/LOGO.PNG')}} alt="" height="90" width="90">
                    </a>
                    <div id="nav_bar">
                        @if (Route::has('login'))
                            <ul class="">
                                <li><a href="{{ url('/news') }}">News</a></li>
                                <li><a href="{{ url('/tournaments') }}">Tournaments</a></li>
                                <li><a href="{{ url('/races') }}">Races</a></li>
                                <li><a href="{{ url('/horses') }}">Horses</a></li>
                                <li><a href="{{ url('/jockeys') }}">Jockeys</a></li>
                            @auth
                                <li><a href="{{ url('/bets') }}">Bets</a></li>
                                <!--                               
                                <li><a href="{{ url('/add_horses') }}">Add Horse</a></li>
                                <li><a href="{{ url('/add_jockeys') }}">Add Jockey</a></li>
                                <li><a href="{{ url('/add_races') }}">Add Race</a></li>
                                <li><a href="{{ url('/add_tournaments') }}">Add Tournament</a></li>
                                <li><a href="{{ url('/add_news') }}">Add News</a></li>
                                <li><a href="{{ url('/users') }}">Manage Users</a></li>
                                -->
                                <li><a href="{{ url('/manage') }}">Options</a></li>
                                <li><a href="{{ url('/home') }}">Home</a></li>
                        @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                            @endauth
                            </ul>
                        @endif
                    </div>
                </div>

                @yield('content')
                
            </div>
            <footer>
                <p>Posted by: André, Fábio e Márcio | Contacts | Terms and conditions |
                <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
                </p>
            </footer>
        </div>

    </body>

    <script>
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

</html>
