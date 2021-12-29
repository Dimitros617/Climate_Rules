<div  class=" card-box h-content bg-white rounded-4 shadow-lg w-20rem m-2 animate-05 hover-size-001 ">
    <div class="w-100 p-2 d-flex flex justify-content-between animate-05 card-technology-color-bar" style="background-color: {{$technology->branch_color}}">
        <span class="fw-bold fs-6 ">
            {{$technology->branch_name}}
        </span>
        <span class="text-end" data-title="{{$technology->area_name}}">
            <div class="pt-1 me-2" style="transform: scale(1.6)">
                @php echo htmlspecialchars_decode($technology->area_icon) @endphp
            </div>
        </span>
    </div>

    <div class="p-3">
        <div class="mb-2 ">
            <div class="position-relative text-center rounded-3 overflow-hidden">

                    <img class="w-100 mb-3" src="{{URL::asset($technology->img_url)}}">
                    <div class="fs-1 fw-bold text-white position-absolute " style="mix-blend-mode: difference; opacity: 0.9; bottom: 4px; left: 4px" >
                        {{$technology->code}}
                    </div>
            </div>
            <div class="text-center mt-3">
                <span class="fw-bold fs-5 mt-5 text-center w-100 text-uppercase">
                    {{$technology->technology_name}}
                </span>
            </div>
        </div>

        <div class="bg-light rounded-3 p-3 w-100 d-flex flex-wrap justify-content-around text-center ">

            <div class="w-100 d-flex flex-wrap justify-content-around text-center ">
            @foreach($technology->statistics_types as $stat)
            <div class="d-grid">
                <span data-title="{{$stat->name}} " code="{{$stat->code_name}}">

                    <div class="pt-1 text-center justify-content-center d-flex text-black" style="transform: scale(2)" >
                        @php echo htmlspecialchars_decode($stat->icon) @endphp
                    </div>
                </span>
{{--                style="color: @if($stat->index_move >= 0) green @else red @endif"--}}
                <span class=" fw-bold mt-2" >
                    @if($stat->index_move >= 0)+@endif {{$stat->index_move}}
                </span>
            </div>
            @endforeach
            </div>
            <div class="w-100 d-flex flex-wrap justify-content-around text-center">
            @foreach($technology->special_events as $event)
                <div class="d-grid">
                    <span class=" m-1 mt-2 fs-5 fw-bold">{{$event->code}}</span>
                    <span class=" fs-6 ">{{$event->coefficient}}%</span>
                </div>
            @endforeach
            </div>
        </div>
        <div class=" fs-3 text-end mt-2 mb-1 d-flex flex justify-content-between">
            <div class="d-flex flex justify-content-start w-50">
                <div class="d-grid text-center p-3 m-2 bg-light rounded-3 animate-05 hover-size-01 hover-shadow cursor-pointer z-0"
                     data-title="Státy, které mají technologii rozpracovanou."
                     onclick="showAndHideElement(this.parentNode.parentNode.parentNode,'nation-work-status')">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                          <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                        </svg>
                    </span>
                    <span class="fw-bold fs-5">
    {{--                    Počet států kteří mají technologii nakoupenou--}}
                        {{$technology->workStatus}}
                    </span>

                </div>

                <div class="d-grid text-center p-3 m-2 bg-light rounded-3 animate-05 hover-size-01 hover-shadow cursor-pointer z-0"
                     data-title="Státy které již dokončily technologii."
                     onclick="showAndHideElement(this.parentNode.parentNode.parentNode,'nation-active-status')">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-patch-check" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                          <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
                        </svg>
                    </span>
                    <span class="fw-bold fs-5">
                        {{--                    Počet států kteří mají technologii dokončenou--}}
                        {{$technology->activeStatus}}
                    </span>

                </div>
            </div>
            <div class="pt-5">
                <span class="fs-5 text-muted">
                    Cena:
                </span>
                    <span class="fw-bold d-inline-flex fs-2">
                    {{$technology->price}}
                        <span>
                            <div class="top-0 mb-3 p-2 mt-2"  style="transform: scale(1.4)"><img src="{{URL::asset('Img/CR-coin.svg')}}"></div>
                        </span>
                </span>
            </div>
        </div>

        <div class="rounded-3 bg-light p-2 nation-work-status mb-2" hidden>
            @foreach($technology->nations_status as $nation_status)

                @if($nation_status->code == 'active')
                    @continue
                @endif
                <div class="bg-white rounded-2 m-2 shadow-sm d-flex flex justify-content-between overflow-hidden">
                    <div class="d-grid p-2">
                    <span class="fw-bold fs-5">
                        {{$nation_status->nation_name}}
                    </span>
                    </div>
                    <div class="" >
                        <button type="button" disabled class="btn btn-primary w-100 h-100"> {{$nation_status->name}}</button>
                    </div>

                </div>
            @endforeach
        </div>

        <div class="rounded-3 bg-light p-2 nation-active-status mb-2" hidden>
            @foreach($technology->nations_status as $nation_status)

                @if($nation_status->code != 'active')
                    @continue
                @endif
                <div class="bg-white rounded-2 m-2 shadow-sm d-flex flex justify-content-between overflow-hidden">
                    <div class="d-grid p-2">
                    <span class="fw-bold fs-5">
                        {{$nation_status->nation_name}}
                    </span>
                    </div>
                    <div class="" >
                        <button type="button" disabled class="btn btn-primary w-100 h-100"> {{$nation_status->name}}</button>
                    </div>

                </div>
            @endforeach
        </div>


        <div class="w-100">
            <button type="button" class="btn btn-primary w-100 text-uppercase" onclick="changeNationToTechnologyStatus(this,{{$technology->id}})">

                @if(count($technology->nations_status) == 0)
                    Koupit
                @else
                    @php
                    $ret = "Koupit";

                    foreach ($technology->nations_status as $nation_stat){
                        if($nation_stat->nation_id == $my_nation->id){
                            $ret = $nation_stat->name;
                        }
                    }

                    echo $ret;

                    @endphp
                @endif

            </button>
        </div>

        @if(Auth::permition()->admin ==1)
            <div class="bg-light rounded-4">
                <div class="w-100 text-center p-1 animate-05 hover-size-01  mt-2 cursor-pointer " onclick="showAndHideElement(this.parentNode,'setting')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-down animate-05 hover-size-01 show" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-up hide" viewBox="0 0 16 16" hidden="">
                        <path fill-rule="evenodd" d="M7.776 5.553a.5.5 0 0 1 .448 0l6 3a.5.5 0 1 1-.448.894L8 6.56 2.224 9.447a.5.5 0 1 1-.448-.894l6-3z"/>
                    </svg>
                </div>
                @include('technologi-card-admin-setting')
            </div>
        @endif
    </div>
</div>
