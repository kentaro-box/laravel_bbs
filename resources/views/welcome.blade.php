<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bulletin Board System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="my.css" rel="stylesheet" type="text/css">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #0b6998;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                width: 100%;
                margin: 0 auto;

            }
            body {
                display: block;
                width: 360px;
                margin: 0 auto;
            }
            a {
                text-decoration: none;
                color: #ad0101;
                padding: 0 10px;
                font-size: 1.2em;
                display: inline-block;

            }
            a:hover {
                transition: 0.5s;
                color: #e20404;
                -webkit-animation: zoom .3s;
                animation: zoom .3s;
                
            }
            @keyframes zoom {
            50% {
                transform: scale(1.05);
            }
            }
            @-webkit-keyframes zoom {
            50% {
                -webkit-transform: scale(1.05);
            }
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

            .content {
                text-align: center;
                width: 100%;
                margin: 0 auto;
                vertical-align: middle;
                height: 100vh;
                display: table-cell;
                max-width: 360px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                margin-left: 8px;
            }
        </style>
    </head>
    <body>
            <div class="content">
                <div class="title m-b-md">
                Bulletin Board System
                </div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a> or 
                        <a href="/logout"> Logout</a>
                    @else
                        <a href="{{ route('login') }}">Login</a> or 
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
            @endif
                
            </div>
    </body>
</html>
