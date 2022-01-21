@section('title','Climate rules')
@section('title_name', $my_nation->name)

@section('css', URL::asset('css/admin-setting.css'))

<script src="/js/main.js"></script>
<script src="/js/nations.js"></script>
<script src="/js/game.js"></script>


<x-app-layout>
    <x-slot name="header">

    </x-slot>

    {{--Context menu--}}

    <div hidden="" id="lobby-id" lobbyId="{{$lobby->id}}"></div>

    @include('lobby-admin-panel')




    <div class="w-90 ms-auto me-auto d-block">

        <div class="d-flex flex-wrap justify-content-center">
            <div class=" w-75 p-4 m-4 shadow-md rounded-3 bg-white d-flex flex-wrap">

                <div class="w-50 d-grid">
                    <div class="fw-bold fs-2 mb-2" style="    border-bottom: 2px solid black;">
                            <span class="pb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bank2" viewBox="0 0 16 16">
                                  <path d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916l-7.5-5zM12.375 6v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zM.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1H.5z"/>
                                </svg>
                            </span>
                        Souhrn
                    </div>

                    <div class="d-flex flex-wrap justify-content-between">
                        <span class="fs-4 pt-1">
                            Zůstatek</span>
                        <span>
                            <span class="fs-3 fw-bold">50</span>
                            <img style="width: 1.3rem; margin-top: -0.5rem" src="{{URL::asset('Img/CR-coin.svg')}}">
                        </span>

                    </div>

                    <div class="d-flex flex-wrap justify-content-between">
                        <span class="fs-5 pt-1">Půjčky jiným</span>
                        <span>
                            <span class="fs-4 fw-bold">0</span>
                            <img style="width: 1.3rem; margin-top: -0.5rem" src="{{URL::asset('Img/CR-coin.svg')}}">
                        </span>

                    </div>

                    <div class="d-flex flex-wrap justify-content-between">
                        <span class="fs-5 pt-1">Dluhy ostatním</span>
                        <span>
                            <span class="fs-4 fw-bold">0</span>
                            <img style="width: 1.3rem; margin-top: -0.5rem" src="{{URL::asset('Img/CR-coin.svg')}}">
                        </span>

                    </div>
                </div>

                <div class=" w-50 d-grid">

                    <button class="btn btn-primary w-90 m-2 ms-5">Jednorázová platba</button>
                    <button class="btn btn-primary w-90 m-2 ms-5">Půjčit někomu</button>
                    <button class="btn btn-primary w-90 m-2 ms-5">Zažádat o půjčku</button>

                </div>

            </div>

        </div>

        <div class="d-flex flex-wrap w-75 bg-white rounded-3 shadow-md p-4 mx-auto">

            <div class="rounded-3 shadow-sm p-3 m-1 w-100 d-flex flex-wrap justify-content-between bg-light">

                <div class="d-flex flex-wrap">
                    <span class="pt-3">15:00</span>
                    <div class="d-grid ms-4">
                        <div>
    {{--                        <span class=" text-muted">Typ platby: </span>--}}
                            <span>
                            Běžná platba
                            </span>
                            <span data-title="Popisek platby">
                                <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
                                </svg>
                            </span>
                        </div>

                        <div>
                            <span class=" text-muted">Od: </span>
                            <span class="fs-5 fw-bold">Euronia</span>
                        </div>

                    </div>
                </div>

                <div>
                    <span class="fw-bold fs-2">
                        -5
                    </span>
                    <span>
                        <img style="width: 1.3rem; margin-top: -0.5rem" src="{{URL::asset('Img/CR-coin.svg')}}">
                    </span>
                </div>
            </div>

        </div>

    </div>

    @include('button-panel')


</x-app-layout>
