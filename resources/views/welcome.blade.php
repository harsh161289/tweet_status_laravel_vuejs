<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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

            .content {
                text-align: center;
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
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                <div class="row">
                    <blockquote class=\"twitter-tweet\"><p lang=\"fr\" dir=\"ltr\">Nous allons surprendre nos Diables Rouges avec vos tweets ! Encouragez-les avec Red, la mascotte officielle des Diables Rouges, pour ce match contre l’Arabie Saoudite !  🇧🇪⚽😈✌️ <a href=\"https://twitter.com/hashtag/reddevilsmascot?src=hash&amp;ref_src=twsrc%5Etfw\">#reddevilsmascot</a> <a href=\"https://twitter.com/hashtag/CoachedbyING?src=hash&amp;ref_src=twsrc%5Etfw\">#CoachedbyING</a> <a href=\"https://twitter.com/hashtag/reddevils?src=hash&amp;ref_src=twsrc%5Etfw\">#reddevils</a> <a href=\"https://twitter.com/hashtag/BELKSA?src=hash&amp;ref_src=twsrc%5Etfw\">#BELKSA</a> <a href=\"https://twitter.com/hashtag/REDTOGETHER?src=hash&amp;ref_src=twsrc%5Etfw\">#REDTOGETHER</a> <a href=\"https://twitter.com/INGBelgique?ref_src=twsrc%5Etfw\">@INGBelgique</a> <a href=\"https://twitter.com/INGBelgie?ref_src=twsrc%5Etfw\">@INGBelgie</a></p>&mdash; ING België (@INGBelgie) <a href=\"https://twitter.com/INGBelgie/status/978401966870220800?ref_src=twsrc%5Etfw\">March 26, 2018</a></blockquote>\n<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>\n
                </div>
            </div>
        </div>
    </body>
</html>
