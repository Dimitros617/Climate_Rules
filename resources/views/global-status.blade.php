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

    <div hidden="" id="lobby-id" lobbyId="{{$nations[0]->lobby_id}}"></div>

    @include('lobby-admin-panel')



    <div class="w-100 w-md-90 ms-auto me-auto d-block">
        <div class="d-flex flex-wrap justify-content-center">


            @if(Auth::permition()->admin ==1)
                <div class=" w-100 w-xl-75 w-sm-90 form-check form-switch d-grid text-center justify-content-end p-0 pt-2 mt--2 mb-2">
                    <input onchange="advancedAdminTool(this)" style="transform: scale(1.2)" class="form-check-input ms-auto me-auto p-0 d-block "  type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label mt-1 fw-bold" style=" font-size: 10px" for="flexSwitchCheckDefault">{{__("central_bank_tools")}}</label>
                </div>
            @endif

            <div id="status-table-container" class="light-transparent d-block justify-content-between rounded-5 w-100  p-5 pb-3 pt-4 m-2 shadow-sm  "  style="max-width: 1100px; overflow-x: scroll" lobbyId="{{$nations[0]->lobby_id}}">
            @include('global-status-table')
            </div>
            @include('global-status-earth')
            <div class="light-transparent  rounded-5 w-100 w-md-25  p-2 m-2 d-grid text-center shadow-sm w-content w-xl-100 " style="min-width: 400px">
                <span class="text-center display-5 fw-bold mt-2  mb-2 text-uppercase"> {{__('global_event')}}</span>
                <span class="text-center my-4"> {{__('global_event_missing')}}</span>
            </div>
            <div class="w-100 h-content light-transparent mt-2 p-3 shadow-sm rounded-4">
                @include('global-status-temperature-bar')
            </div>

        </div>


    </div>

    @include('button-panel')


</x-app-layout>
