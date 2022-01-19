@section('title','Climate rules')
@section('title_name', $my_nation->name)

@section('css', URL::asset('css/admin-setting.css'))
@section('css2', URL::asset('css/technologies.css'))

<script src="/js/main.js"></script>
<script src="/js/nations.js"></script>
<script src="/js/game.js"></script>
<script src="/js/technology.js"></script>
<script src="/js/admin-setting.js"></script>
<script src="/js/technologies-filter.js"></script>

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div hidden="" id="lobby-id" lobbyId="{{$allTechnologies[0]->lobby_id}}"></div>

    @include('lobby-admin-panel')

    <div class="bg-light shadow-md w-80 ms-auto me-auto d-block p-3 rounded-3 mb-2">

        @include('technologies-filters')
        <nav id="technologyButtonPanel" class="nav nav-pills nav-justified rounded-3 overflow-hidden mt-5">
            <a class="cr-btn fs-5 cr-btn-active" onclick="collapseElement(this.parentNode, this, 'collapse-ele', 'newTechnologies')">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                Nové Technologie
            </a>
            <a class="cr-btn fs-5"  onclick="collapseElement(this.parentNode, this, 'collapse-ele', 'workTechnologies')">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><g><rect height="8.48" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -6.8717 17.6255)" width="3" x="16.34" y="12.87"/><path d="M17.5,10c1.93,0,3.5-1.57,3.5-3.5c0-0.58-0.16-1.12-0.41-1.6l-2.7,2.7L16.4,6.11l2.7-2.7C18.62,3.16,18.08,3,17.5,3 C15.57,3,14,4.57,14,6.5c0,0.41,0.08,0.8,0.21,1.16l-1.85,1.85l-1.78-1.78l0.71-0.71L9.88,5.61L12,3.49 c-1.17-1.17-3.07-1.17-4.24,0L4.22,7.03l1.41,1.41H2.81L2.1,9.15l3.54,3.54l0.71-0.71V9.15l1.41,1.41l0.71-0.71l1.78,1.78 l-7.41,7.41l2.12,2.12L16.34,9.79C16.7,9.92,17.09,10,17.5,10z"/></g></g></svg>
                Rozpracované technologie
            </a>
            <a class="cr-btn fs-5" onclick="collapseElement(this.parentNode, this, 'collapse-ele', 'activeTechnologies')">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M16.59 7.58L10 14.17l-3.59-3.58L5 12l5 5 8-8zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/></svg>
                Aktivní technologie
            </a>
            @if(Auth::permition()->admin ==1)
            <a class="cr-btn fs-5"  onclick="collapseElement(this.parentNode, this, 'collapse-ele', 'adminTechnologies')">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M17.66,9.53l-7.07,7.07l-4.24-4.24l1.41-1.41l2.83,2.83l5.66-5.66L17.66,9.53z M4,12c0-2.33,1.02-4.42,2.62-5.88L9,8.5v-6H3 l2.2,2.2C3.24,6.52,2,9.11,2,12c0,5.19,3.95,9.45,9,9.95v-2.02C7.06,19.44,4,16.07,4,12z M22,12c0-5.19-3.95-9.45-9-9.95v2.02 c3.94,0.49,7,3.86,7,7.93c0,2.33-1.02,4.42-2.62,5.88L15,15.5v6h6l-2.2-2.2C20.76,17.48,22,14.89,22,12z"/></svg>
                Schválení technologií
            </a>
            @endif
        </nav>

    </div>


    <div id="technologyBox" class="bg-white shadow-md w-80 ms-auto me-auto d-block p-3 rounded-3 mb-2">

        @include('technologies-box')

    </div>


    @include('button-panel')


</x-app-layout>
