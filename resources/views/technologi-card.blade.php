<div  class="technology-card card-box h-content bg-white rounded-4 shadow-md w-20rem m-2 animate-05 hover-size-001 " filter="0">
    <div class="w-100 p-2 d-flex flex justify-content-between animate-05 card-technology-color-bar" style="background-color: {{$technology->branch_color}}">
        <span class="technology-branch fw-bold fs-6 ">
            {{$technology->branch_name}}
        </span>
        <span class="technology-area text-end" data-title="{{$technology->area_name}}">
            <div class="pt-1 me-2" style="transform: scale(1.6)">
                @php echo htmlspecialchars_decode($technology->area_icon) @endphp
            </div>
        </span>
    </div>

    <div class="p-3">
        <div class="mb-2 ">
            <div class="position-relative text-center rounded-3 overflow-hidden">

                    <img class="w-100 mb-3" src="{{URL::asset($technology->img_url)}}">
                    <div class="technology-code fs-1 fw-bold text-white position-absolute " style="mix-blend-mode: difference; opacity: 0.9; bottom: 4px; left: 4px" >
                        {{$technology->code}}
                    </div>
            </div>
            <div class="text-center mt-3">
                <span class=" technology-name fw-bold fs-5 mt-5 text-center w-100 text-uppercase">
                    {{$technology->technology_name}}
                </span>
            </div>
        </div>

        @include('technologi-card-statistic-types')

        <div class=" fs-3 text-end mt-2 mb-1 d-flex flex justify-content-between">
            <div class="d-flex flex justify-content-start w-50">

                @include('technologi-card-work-status')

                @include('technologi-card-active-status')
            </div>
            <div class="pt-3">
                <span class="fs-5 text-muted">
                    Cena:
                </span>
                <span class="fw-bold d-inline-flex fs-2">
                        <span class="technology-price">{{$technology->price}}</span>
                        <span>
                            <div class="top-0 mb-3 p-2 mt-2"  style="transform: scale(1.4)"><img src="{{URL::asset('Img/CR-coin.svg')}}"></div>
                        </span>
                </span>
                <span class="w-100 fw-bold text-muted" style="font-size: 14px;">@if($technology->certificate == 1) +PATENT @endif</span>
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
