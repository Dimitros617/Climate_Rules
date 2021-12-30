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

            <div id="status-table-container" class="light-transparent  rounded-5 w-100 p-2 p-md-5 pt-4 m-2 shadow-sm" lobbyId="{{$lobby->id}}">
                @include('local-status-table')
            </div>
            @include('local-status-map')

        </div>

    </div>

    @include('button-panel')


</x-app-layout>
