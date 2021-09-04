@section('title','Climate rules')
@section('title_name',"Lobby")

<script src="/js/main.js"></script>

<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div id="lobby-list-div">
        @include('lobbies-list')
    </div>



</x-app-layout>
