<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Climate rules</title>
        <link rel="icon" href="{{ URL::asset('Img/logo_mini_transparent_square.png') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="css/welcome.css">


    </head>
    <body class="antialiased overflow-scroll">

        <div class="container">
            <div class="column" style="min-width: 550px">
                <img src="/Img/logo_big.svg">
                <div class="button container">
                    <a href="/login">
                        <button class="play_button"> {{__('play')}} </button>
                    </a>

                </div>
                <p class="copyright">©Dominik Frolík 2021-2022</p>
                <p class="copyright bold">
                    {{env('APP_VERSION', null)}}

                </p>
            </div>

            <div class="column" style="min-width: 550px">
                <p class="promo">
                    {{__('welcome_message')}}

                </p>



            </div>

        </div>


    </body>
</html>
