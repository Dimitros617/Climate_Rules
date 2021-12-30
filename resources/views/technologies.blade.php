@section('title','Climate rules')
@section('title_name', $my_nation->name)

@section('css', URL::asset('css/admin-setting.css'))
@section('css2', URL::asset('css/technologies.css'))

<script src="/js/main.js"></script>
<script src="/js/nations.js"></script>
<script src="/js/game.js"></script>
<script src="/js/technology.js"></script>
<script src="/js/admin-setting.js"></script>

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div hidden="" id="lobby-id" lobbyId="{{$allTechnologies[0]->lobby_id}}"></div>

    @include('lobby-admin-panel')

    <div class="bg-light shadow-md w-75 ms-auto me-auto d-block p-3 rounded-3 mb-2">

        <div class="w-100 justify-content-end d-flex">

            <div class="card-body row no-gutters align-items-center h-4rem">

                <div class="col">
                    <input class="form-control-borderless p-2 rounded-3 overflow-hidden fs-5 shadow-sm" id="search" type="search" placeholder="Zadejte hledaný výraz">

                </div>


                <div class="col-auto searchButtonDiv">


                    <span data-title="Najít">
                        <svg class=" cr-blue animate-02 hover-size-01 cursor-pointer me-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="3rem" width="3rem" viewBox="0 0 24 24"  ><path d="M0 0h24v24H0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                    </span>
                    <span onclick="swapCardAndRow('card-row-container','card-box-container', this)" active="1" class="card-row-swap">
                        <svg  class=" text-muted animate-02 hover-size-01 cursor-pointer" height="2rem" width="2rem" fill="currentColor" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"  viewBox="0 0 24 24" >
                            <rect fill="none" height="24" width="24"/>
                            <path
                                d="M3,17v-2c0-1.1,0.9-2,2-2h14c1.1,0,2,0.9,2,2v2c0,1.1-0.9,2-2,2H5C3.9,19,3,18.1,3,17z M3,7v2c0,1.1,0.9,2,2,2h14 c1.1,0,2-0.9,2-2V7c0-1.1-0.9-2-2-2H5C3.9,5,3,5.9,3,7z"/>
                        </svg>
                    </span>
                            {{--        Karty--}}
                    <span onclick="swapCardAndRow('card-box-container', 'card-row-container', this)" active="0" class="card-row-swap">
                        <svg  class=" text-muted animate-02 hover-size-01 cursor-pointer" height="2rem" width="2rem" fill="currentColor" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                        <rect fill="none" height="24" width="24"/>
                        <g>
                            <path
                                d="M14.67,6v4.5c0,0.55-0.45,1-1,1h-3.33c-0.55,0-1-0.45-1-1V6c0-0.55,0.45-1,1-1h3.33C14.22,5,14.67,5.45,14.67,6z M16.67,11.5H20c0.55,0,1-0.45,1-1V6c0-0.55-0.45-1-1-1h-3.33c-0.55,0-1,0.45-1,1v4.5C15.67,11.05,16.11,11.5,16.67,11.5z M14.67,18v-4.5c0-0.55-0.45-1-1-1h-3.33c-0.55,0-1,0.45-1,1V18c0,0.55,0.45,1,1,1h3.33C14.22,19,14.67,18.55,14.67,18z M15.67,13.5V18c0,0.55,0.45,1,1,1H20c0.55,0,1-0.45,1-1v-4.5c0-0.55-0.45-1-1-1h-3.33C16.11,12.5,15.67,12.95,15.67,13.5z M7.33,12.5H4c-0.55,0-1,0.45-1,1V18c0,0.55,0.45,1,1,1h3.33c0.55,0,1-0.45,1-1v-4.5C8.33,12.95,7.89,12.5,7.33,12.5z M8.33,10.5V6 c0-0.55-0.45-1-1-1H4C3.45,5,3,5.45,3,6v4.5c0,0.55,0.45,1,1,1h3.33C7.89,11.5,8.33,11.05,8.33,10.5z"/>
                        </g>
                        </svg>
                   </span>
                </div>

            </div>
            {{--        Řádky--}}


        </div>

        <div class="w-100 p-2 d-flex flex-wrap">

            <div class="form-check form-switch d-grid text-center justify-content-center">
                <input class="form-check-input m-0" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Name</label>
            </div>

        </div>

        <nav id="technologyButtonPanel" class="nav nav-pills nav-justified rounded-3 overflow-hidden mt-3">
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


    <div id="technologyBox" class="bg-white shadow-md w-75 ms-auto me-auto d-block p-3 rounded-3 mb-2">

        @include('technologies-box')

    </div>


    @include('button-panel')


</x-app-layout>
