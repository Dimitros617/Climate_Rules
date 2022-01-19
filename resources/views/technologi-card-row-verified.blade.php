<div class="technology-card card-row h-content bg-white rounded-4 overflow-hidden shadow-lg w-100 m-2 mb-3 animate-05 hover-size-001 " filter="0">

    <div class=" technology-name fw-bold fs-5 p-2 ps-3 pe-3 text-start w-100 text-uppercase">
        {{$technology->technology_name}}
    </div>

    <div class="w-100 d-inline-flex">

        <div class="w-25 d-inline-flex">
            {{--        Color module--}}

            <div class="p-2 ps-3 pe-3 w-50" style="background-color: {{$technology->branch_color}}">
                <div class="technology-code fs-2 fw-bold text-white  ">
                    {{$technology->code}}
                </div>
                <div class="d-flex justify-content-between text-white">
                    <span class="technology-branch text-small bottom-0">
                        {{$technology->branch_name}}
                    </span>
                    <span class="technology-area text-end bottom-0" data-title="{{$technology->area_name}}">
                        <div class="pt-1 me-2" style="transform: scale(1.6)">
                            @php echo htmlspecialchars_decode($technology->area_icon) @endphp
                        </div>
                    </span>
                </div>
            </div>

            {{--        Counter boxes--}}

            <div class="d-flex flex justify-content-start w-50">
                <div
                    class="d-grid text-center p-3 m-2 bg-light rounded-3 animate-05 hover-size-01 hover-shadow cursor-pointer z-0"
                    data-title="Státy, které mají technologii rozpracovanou."
                    onclick="showAndHideElement(this.parentNode.parentNode.parentNode.parentNode,'nation-work-status')">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                 class="bi bi-bag" viewBox="0 0 16 16">
                              <path
                                  d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg>
                        </span>
                    <span class="technology-work-status fw-bold fs-5">
        {{--                    Počet států kteří mají technologii nakoupenou--}}
                        {{$technology->workStatus}}
                        </span>

                </div>

                <div
                    class="d-grid text-center p-3 m-2 bg-light rounded-3 animate-05 hover-size-01 hover-shadow cursor-pointer z-0"
                    data-title="Státy které již dokončily technologii."
                    onclick="showAndHideElement(this.parentNode.parentNode.parentNode.parentNode,'nation-active-status')">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                 class="bi bi-patch-check" viewBox="0 0 16 16">
                              <path fill-rule="evenodd"
                                    d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                              <path
                                  d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
                            </svg>
                        </span>
                    <span class="technology-active-status fw-bold fs-5">
                            {{--                    Počet států kteří mají technologii dokončenou--}}
                        {{$technology->activeStatus}}
                        </span>

                </div>
            </div>
        </div>


        <div class="w-50">
            {{-- Statistic types boxes--}}

            <div class="bg-light rounded-3 p-3 m-3 ms-5 me-5  d-flex flex-wrap justify-content-around text-center ">

                @foreach($technology->statistics_types as $stat)
                    <div class="technology-statistic-type d-grid" code="{{$stat->code_name}}">
                        <span data-title="{{$stat->name}} " code="{{$stat->code_name}}">

                            <div class="pt-1 text-center justify-content-center d-flex"
                                 style="transform: scale(2)" >
                                @php echo htmlspecialchars_decode($stat->icon) @endphp
                            </div>
                        </span>
{{--                        style="color: @if($stat->index_move >= 0) green @else red @endif"--}}
                        <span class=" fw-bold mt-2" >
                            @if($stat->index_move >= 0)+@endif {{$stat->index_move}}
                        </span>
                    </div>
                @endforeach
            </div>

        </div>


        <div class="w-25 d-inline-flex">
            {{--    Price--}}

            <div class="pt-5 w-50 text-center">
                <span class="fs-5 text-muted">
                    Cena:
                </span>
                <span class="fw-bold d-inline-flex fs-2">
                    <span class="technology-price">{{$technology->price}}</span>
                    <span>
                        <div class="top-0 mb-3 p-2 mt-2" style="transform: scale(1.4)">
                            <img src="{{URL::asset('Img/CR-coin.svg')}}">
                        </div>
                    </span>
                </span>
            </div>

        </div>

    </div>

    <div class="rounded-3 bg-white p-2 nation-work-status mb-2 w-100 d-flex flex-wrap">
        @foreach($technology->nations_status as $nation_status)

            @if($nation_status->code == 'active')
                @continue
            @endif
            <div class="bg-light rounded-2 m-2 shadow-sm d-flex flex justify-content-between overflow-hidden w-25">
                <div class="d-grid p-2">
                    <span class="fw-bold fs-5">
                        {{$nation_status->nation_name}}
                    </span>
                </div>
                <div class="" >
                    <button type="button" onclick="changeNationToTechnologyStatus(this,{{$technology->id}},{{$nation_status->id}})" class="btn btn-primary w-100 h-100"> {{$nation_status->name}}</button>
                </div>

            </div>
        @endforeach
    </div>

    <div class="rounded-3 bg-white p-2 nation-active-status mb-2 w-100 d-flex flex-wrap">
        @foreach($technology->nations_status as $nation_status)

            @if($nation_status->code != 'active')
                @continue
            @endif
            <div class="bg-light rounded-2 m-2 shadow-sm d-flex flex justify-content-between overflow-hidden w-25">
                <div class="d-grid p-2">
                    <span class="fw-bold fs-5">
                        {{$nation_status->nation_name}}
                    </span>
                    <span>
                        {{$nation_status->updated_at}}
                    </span>
                </div>
                <div class="" >
                    <button type="button" onclick="changeNationToTechnologyStatus(this,{{$technology->id}},{{$nation_status->id}})" class="btn btn-primary w-100 h-100"> {{$nation_status->name}}</button>
                </div>

            </div>
        @endforeach
    </div>

</div>
