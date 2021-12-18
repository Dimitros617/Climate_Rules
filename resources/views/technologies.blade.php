@section('title','Climate rules')
@section('title_name', $my_nation->name)

@section('css', URL::asset('css/admin-setting.css'))
@section('css2', URL::asset('css/technologies.css'))

<script src="/js/main.js"></script>
<script src="/js/nations.js"></script>
<script src="/js/game.js"></script>
<script src="/js/admin-setting.js"></script>

<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="bg-white w-75 ms-auto me-auto d-block p-3 rounded-3 mb-2">

        <div class="w-100 justify-content-end d-flex">
            {{--        Řádky--}}
            <svg onclick="document.getElementById('card-box-container').setAttribute('hidden', ''); document.getElementById('card-row-container').removeAttribute('hidden')" checked="" class="cr-blue animate-02 hover-size-01 cursor-pointer" fill="currentColor" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="40px" viewBox="0 0 24 24"
                 width="40px" >
                <rect fill="none" height="24" width="24"/>
                <path
                    d="M3,17v-2c0-1.1,0.9-2,2-2h14c1.1,0,2,0.9,2,2v2c0,1.1-0.9,2-2,2H5C3.9,19,3,18.1,3,17z M3,7v2c0,1.1,0.9,2,2,2h14 c1.1,0,2-0.9,2-2V7c0-1.1-0.9-2-2-2H5C3.9,5,3,5.9,3,7z"/>
            </svg>
            {{--        Karty--}}

            <svg onclick="document.getElementById('card-box-container').removeAttribute('hidden'); document.getElementById('card-row-container').setAttribute('hidden', '')" checked="" class="cr-blue animate-02 hover-size-01 cursor-pointer" fill="currentColor" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="40px" viewBox="0 0 24 24"
                 width="40px" >
                <rect fill="none" height="24" width="24"/>
                <g>
                    <path
                        d="M14.67,6v4.5c0,0.55-0.45,1-1,1h-3.33c-0.55,0-1-0.45-1-1V6c0-0.55,0.45-1,1-1h3.33C14.22,5,14.67,5.45,14.67,6z M16.67,11.5H20c0.55,0,1-0.45,1-1V6c0-0.55-0.45-1-1-1h-3.33c-0.55,0-1,0.45-1,1v4.5C15.67,11.05,16.11,11.5,16.67,11.5z M14.67,18v-4.5c0-0.55-0.45-1-1-1h-3.33c-0.55,0-1,0.45-1,1V18c0,0.55,0.45,1,1,1h3.33C14.22,19,14.67,18.55,14.67,18z M15.67,13.5V18c0,0.55,0.45,1,1,1H20c0.55,0,1-0.45,1-1v-4.5c0-0.55-0.45-1-1-1h-3.33C16.11,12.5,15.67,12.95,15.67,13.5z M7.33,12.5H4c-0.55,0-1,0.45-1,1V18c0,0.55,0.45,1,1,1h3.33c0.55,0,1-0.45,1-1v-4.5C8.33,12.95,7.89,12.5,7.33,12.5z M8.33,10.5V6 c0-0.55-0.45-1-1-1H4C3.45,5,3,5.45,3,6v4.5c0,0.55,0.45,1,1,1h3.33C7.89,11.5,8.33,11.05,8.33,10.5z"/>
                </g>
            </svg>
        </div>
    </div>

    <div class="w-90 ms-auto me-auto d-block w-100">
        <div class="d-flex flex-wrap justify-content-center w-100">

            <div id="accordion" class="w-75">
                <div class="card w-100">
                    <div class="card-header cursor-pointer" id="headingOne" onclick="collapseElement(this.parentNode.parentNode.parentNode, this.parentNode,'collapse-ele')">
                        <h5 class="mb-0">
                            <button class="collapsed display-5 text-decoration-none border-0 bg-transparent p-2" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-bank2" viewBox="0 0 16 16">
                                    <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"/>
                                </svg>
                                Všechny technologie
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse-ele overflow-hidden animate-05 p-3 " aria-labelledby="headingOne" data-parent="#accordion" >

                        <div id="card-box-container" class="card-box d-flex flex-wrap">
                        @foreach($allTechnologies as $technology)
                            @include('technologi-card')
                        @endforeach
                        </div>

                        <div  id="card-row-container" class="card-row" hidden>
                            @foreach($allTechnologies as $technology)
                                @include('technologi-card-row')
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="display-3 card-header cursor-pointer text-decoration-none" id="headingTwo" onclick="collapseElement(this.parentNode,'collapse-ele')">
                        <h5 class="mb-0">
                            <button class="collapsed display-5 text-decoration-none border-0 bg-transparent p-2" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                                    <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                    <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                                Zpracovávané technologie
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse-ele overflow-hidden animate-05" aria-labelledby="headingTwo" data-parent="#accordion" style="height: 0px">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="display-3 card-header cursor-pointer text-decoration-none" id="headingTwo" onclick="collapseElement(this.parentNode,'collapse-ele')">
                        <h5 class="mb-0">
                            <button class="collapsed display-5 text-decoration-none border-0 bg-transparent p-2" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                                Moje technologie
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse-ele overflow-hidden animate-05" aria-labelledby="headingTwo" data-parent="#accordion" style="height: 0px">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                @if(Auth::permition()->admin ==1)
                <div class="card">
                    <div class="card-header cursor-pointer" id="headingThree" onclick="collapseElement(this.parentNode.parentNode.parentNode, this.parentNode,'collapse-ele')">
                        <h5 class="mb-0">
                            <button class="collapsed display-5 text-decoration-none border-0 bg-transparent p-2" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                                </svg>
                                Schválení technologií
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse-ele overflow-hidden animate-05" aria-labelledby="headingThree" data-parent="#accordion" style="height: 0px">
                        <div class="card-body">
                            @include('technologi-card-verified')
                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>

    </div>

    @include('button-panel')


</x-app-layout>
