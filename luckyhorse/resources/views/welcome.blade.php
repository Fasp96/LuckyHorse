<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>luckyhorse</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #eed5b1;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }


            .content {
                text-align: center;
            }

            .title {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links > a {
                color: #fff;
                padding: 25px;
                font-size: 30px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }


            footer{
                background-color: black;
                color: #fff;
            }


            a {
                background-color: #333;
                float: right;
                display: block;
                text-align: center;
                text-decoration: none;
            }

            a:hover {
                background-color:orange;
                
            }

            #myBtn {
                background-color:black;
                color:white;
                border:none;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-left links">
                    @auth
                        <a href="{{ url('/tournaments') }}">TOURNAMENTS</a>
                        <a href="{{ url('/races') }}">RACES</a>
                        <a href="#jockeys">JOCKEIS</a>
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="#news">NEWS</a>
                        <img src={{ asset('img/LOGO.PNG')}} alt="" id="logo" height="90" width="90">
                        
                        
                        
                        
                        <a href="{{ url('/horses') }}">Add Horse</a>
                        <a href="{{ url('/jockeys') }}">Add Jockey</a>
                    @else
                        <a href="#news">NEWS</a>
                        <a href="{{ url('/tournaments') }}">TOURNAMENTS</a>
                        <a href="{{ url('/races') }}">RACES</a>
                        <a href="#jockeys">JOCKEYS</a>
                        <a href="{{ route('login') }}">Login</a>
                        <img src={{ asset('img/LOGO.PNG')}} alt="" id="logo" height="90" width="90">

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                        
                     

                    @endauth
                </div>
            @endif
<!--           -->
            <div class="top-left">

                <div class="title">

                  <!--  <img src={{ asset('img/LOGO.PNG')}} alt="" id="logo" height="70" width="70"> -->


                </div>
            

            </div>


        </div>

        <footer>

                <p>Posted by: André, Fábio e Márcio | Contacts | termos e condições |
                <button onclick="topFunction()" id="myBtn" title="Go to top">Top
                    <script>
                        function topFunction() {
                             document.body.scrollTop = 0;
                             document.documentElement.scrollTop = 0;
                        }
                    </script>
                </button>
                </p>

        </footer>
    </body>
</html>
