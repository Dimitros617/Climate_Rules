
@include('js-localization::head')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta id="csrf_token" name="csrf-token" content="{{ csrf_token() }}">

    <!--

     -----------------------------------------------
     Tento systém vytvořil Dominik Frolík pro Nvias:

     -----------------------------------------------


     -->

     

    <title>@yield('title') | CR</title>
    <link rel="icon" href="{{ URL::asset('Img/logo_mini_transparent_square.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">


    <!-- Javascript -->

{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
{{--    <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>--}}

{{--    <script id="script-batch" type="text/javascript">--}}
{{--        (function(d){--}}
{{--            var js = d.createElement('script'); js.async = true; js.defer = true;--}}
{{--            js.src = "/js/jquery/jquery.min.js";--}}
{{--            d.getElementsByTagName('head')[0].appendChild(js);--}}

{{--            var jsUi = d.createElement('script'); jsUi.async = true; jsUi.defer = true;--}}
{{--            jsUi.src = "/js/jquery/jquery-ui.min.js";--}}
{{--            d.getElementsByTagName('head')[0].appendChild(jsUi);--}}
{{--        }(document));--}}

{{--        $(function(){--}}
{{--            $('div[onload]').trigger('onload');--}}
{{--            $('input[onload]').trigger('onload');--}}
{{--            $('span[onload]').trigger('onload');--}}
{{--        });--}}
{{--    </script>--}}
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <script src="/js/jquery/jquery.min.js"></script>
    <script src="/js/jquery/jquery-ui.min.js"></script>

    <script src="{{ URL::asset('js/main.js') }}" defer></script>
    <script src="{{ URL::asset('js/button-menu.js') }}"></script>
    <script src="{{ URL::asset('js/context-menu.js') }}"></script>
    <script  src="{{ URL::asset('js/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script  src="{{ URL::asset('js/sweetalert2/dist/sweetalert2.js') }}"></script>

    <script  src="{{ URL::asset('js/easter-eggs/index.js') }}"></script>


    <script src="/js/admin-setting.js"></script>
    <script src="/js/drag-and-drop-admin-menu.js"></script>
{{--    <script type="text/javascript" src="https://livejs.com/live.js"></script>--}}






    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-new.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/checkbox.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/context-menu.css') }}">
    <link rel="stylesheet" href="@yield('css')">
    <link rel="stylesheet" href="@yield('css2')">
    <link rel="stylesheet" href="@yield('css3')">
    <link rel="stylesheet" href="@yield('css4')">
    <link rel="stylesheet" href="@yield('css5')">

    <link rel="stylesheet" href="{{ URL::asset('css/quill/bubble.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/quill/snow.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap/css/bootstrap.css') }}">
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap/css/bootstrap-grid.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap/css/bootstrap-reboot.css') }}">--}}
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet">
{{--    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">--}}





    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    @section('link')
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" ></script>


</head>
<body class="font-sans antialiased">

    @yield('js-localization.head')

<div class="min-h-screen bg-gray-100 bg-su-blue-texture " style="padding-bottom: 8rem" >
    @livewire('navigation-dropdown')

<!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
{{--    <div class="footer">--}}

{{--        <span onclick="--}}

{{--             if(!isNaN(window.easterEggCount)){--}}
{{--                 window.easterEggCount++;--}}
{{--             }else {--}}
{{--                 window.easterEggCount = 0;--}}
{{--             }--}}

{{--             if(window.easterEggCount > 3){--}}
{{--            Swal.fire({--}}
{{--              title: 'Nice, objevil si mě XD',--}}
{{--               text: 'Víte, že dle průzkumu se 85% lidí snaží znovu usnout, aby dokončily svůj sen?',--}}
{{--              width: 600,--}}
{{--              padding: '3em',--}}
{{--              confirmButtonText: 'No to jsem jako nevěděl!',--}}
{{--              background: '#fff url(/user_files/trees.png)',--}}
{{--              backdrop: `--}}
{{--                rgba(0,0,123,0.4)--}}
{{--                url('/user_files/nyan-cat.gif')--}}
{{--                    left top--}}
{{--                    no-repeat--}}
{{--                    `--}}
{{--         })}--}}
{{--        ">©</span> <a href="https://www.dominikfrolik.cz/"> Dominik Frolík </a> |  Bakalářská práce 2021 pro <a href="https://www.zcu.cz/cs/index.html"> ZČU </a> v Plzni--}}

{{--    </div>--}}
</div>



@stack('modals')

@livewireScripts
</body>
</html>
