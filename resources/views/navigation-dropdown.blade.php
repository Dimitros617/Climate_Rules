<nav x-data="{ open: false }" class="  p-3 mb-4">
    <!-- Primary Navigation Menu -->
    <div class="w-100 d-block flex-wrap d-flex justify-content-between  p-0 ps-sm-5 pe-md-5">

        <!-- Logo -->

        <a href="/lobbies" class="w-md order-1 order-md-0">
            <div id="head_logo" class="animate-05 head_logo p-3 p-sm-4 pt-5 mt--2 ms-md-5 bg-white rounded-4 shadow-lg w-content">
                    <img class="h-5rem h-md-7rem pt-sm-4" src="{{ URL::asset('Img/logo_big.svg') }}">
            </div>
        </a>

        @if(View::hasSection('title_name'))

            <div class="display-1 mt-2 mt-md-5 fw-bold cr-gradient order-2 order-md-0 w-100 w-md-content text-center">@yield('title_name')</div>


        @endif

        <a href="@if (Auth::check()) {{ url('/logout') }} @else /login @endif" class="order-1 order-md-0">
        <div class="login_button light-transparent shadow-sm rounded-4 p-3 text-center cursor-pointer h-content me-3 animate-05">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-power mt-1" viewBox="0 0 16 16">
                <path d="M7.5 1v7h1V1h-1z"/>
                <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
            </svg>

            <p class="mt-2">@if (Auth::check()) {{__('sing_out')}} @else {{__('sign_in')}} @endif</p>

            <p class="mt-2 mb-0 pb-0 fw-bold cr-green text-uppercase">@if (Auth::check()) {{Auth::user()->nick}} @endif</p>
        </div>
        </a>



    </div>


</nav>
