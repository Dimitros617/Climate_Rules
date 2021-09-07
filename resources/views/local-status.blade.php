@section('title','Climate rules')
@section('title_name', $my_nation->name)

<script src="/js/main.js"></script>
<script src="/js/nations.js"></script>
<script src="/js/game.js"></script>

<x-app-layout>
    <x-slot name="header">

    </x-slot>



    <div class="w-90 ms-auto me-auto d-block">
        <div class="d-flex flex-wrap justify-content-center">

            local status table
            local status flag

        </div>

        <div class="w-100 light-transparent mt-2 p-3 shadow-sm rounded-4">
            @include('global-status-temperature-bar')
        </div>
    </div>

    @include('button-panel')


</x-app-layout>
