<!-- Main layout that has the header and footer of all pages -->
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
                <!-- Navigation bar with page logo -->
                <div id='logo_nav_bar'>
                    <!-- Clickable logo that returns user to main page -->
                    <a href="{{ url('') }}">
                        <img id='logo' src={{ asset('img/LOGO.PNG')}} alt="" height="90" width="90">
                    </a>
                    
                    <!-- Navigation bar -->
                    <div id="nav_bar">
                        @if (Route::has('login'))
                            <ul class="">
                                <!-- Options available to all users -->
                                <li><a href="{{ url('/news') }}">News</a></li>
                                <li><a href="{{ url('/tournaments') }}">Tournaments</a></li>
                                <li><a href="{{ url('/races') }}">Races</a></li>
                                <li><a href="{{ url('/horses') }}">Horses</a></li>
                                <li><a href="{{ url('/jockeys') }}">Jockeys</a></li>
                            <!-- Options only available to users that are logged in -->
                            @auth
                                <li><a href="{{ url('/bets') }}">Bets</a></li>
                                <!-- Option to manage database available to admin only -->
                                @if(Auth::user()->role=='admin')
                                    <li><a href="{{ url('/manage') }}">Options</a></li>
                                @endif
                                <li><a href="/users/{{Auth::user()->id}}"">Profile</a></li>
                                <li><a href="{{ route('logout') }}" 
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        @else
                                <!-- Options in case the user isn't logged in-->
                                <li><a href="{{ route('login') }}">Login</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @endif
                            @endauth
                            </ul>
                        @endif
                    </div>
                </div>

                <!-- Page content -->
                @yield('content')
                
            </div>
            <!-- Site footer with interactive top button -->
            <footer>
                <p>Posted by: André, Fábio e Márcio | Contacts | Terms and conditions |
                <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
                </p>
            </footer>
        </div>

    </body>

    <!-- Function to jump to the top of the page -->
    <script>
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

</html>
