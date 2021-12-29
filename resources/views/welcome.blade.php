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
                    <a href="/lobbies">
                        <button class="play_button"> HRÁT </button>
                    </a>

                </div>
                <p class="copyright">©Nvias 2021</p>
            </div>

            <div class="column" style="min-width: 550px">
                <p class="promo">
                    Zážitkový projektový den, při němž chytrým a udržitelným investováním do nových technologií bojujete o záchranu planety.
                    <br>
                    Poznejte svůj stát a jeho specifika, implementujte technologie, plňte úkoly i své tajné cíle, zachraňte svět.
                    <br>
                    Projekt vznikl na motivy deskové hry Vládci klimatu od Tomáše Mrkvičky

                </p>


            </div>

        </div>


    </body>
</html>
