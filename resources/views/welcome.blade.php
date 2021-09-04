<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Climate rules</title>
        <link rel="icon" href="{{ URL::asset('img/logo_mini_transparent_square.png') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="css/welcome.css">


    </head>
    <body class="antialiased">

        <div class="container">
            <div class="column">
                <img src="/Img/logo_big.svg">
                <p class="copyright">©Nvias 2021</p>
            </div>
            <div class="column">
                <p class="promo">
                    Na motivy deskové hry Vládci klimatu
                    od Tomáše Mrkvičkyy
                    <br><br>
                    Zážitkový projektový den,
                    při němž chytrým a udržitelným
                    investováním do nových technologií
                    bojujete o záchranu planety.
                    <br><br>
                    Poznávají svůj stát a jeho specifika, implementují technologie plněním úkolů
                    s nimi spojených, např. zjišťováním jejich zásadních aspektů, výhod, nevýhod.
                </p>
                <div class="button container">
                    <a href="/lobbies">
                    <button class="play_button"> HRÁT </button>
                    </a>

                </div>

            </div>

        </div>


    </body>
</html>
