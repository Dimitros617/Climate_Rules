{{--mezera00--}}

<div  class=" technology-card card-box h-content bg-white rounded-4 shadow-lg w-20rem m-2 animate-05 hover-size-001 " filter="0">

    @include('technologi-card-header')

    <div class="p-3">
        <div class="mb-2 ">

            @include('technologi-card-image')
            <div class="text-center mt-3">
                <span class="technology-name fw-bold fs-5 mt-5 text-center w-100 text-uppercase">
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
            <div class="pt-5">
                <span class="fs-5 text-muted">
                    Cena:
                </span>
                <span class=" fw-bold d-inline-flex fs-2">
                        <span class="technology-price">{{$technology->price}}</span>
                        <span>
                            <div class="top-0 mb-3 p-2 mt-2"  style="transform: scale(1.4)"><img src="{{URL::asset('Img/CR-coin.svg')}}"></div>
                        </span>
                </span>
            </div>
        </div>

        <div>

            @foreach($technology->nations_status as $nation_status)

                @if( $nation_status->code == 'new')
                    @continue
                @endif

            <div class="bg-light rounded-2 shadow-sm d-flex flex justify-content-between overflow-hidden">
                <div class="d-grid p-2">
                    <span class="fw-bold fs-4">
                        {{$nation_status->nation_name}}
                    </span>
                    <span>
                        {{$nation_status->updated_at}}
                    </span>
                </div>
                <div class="" >
                    @include('technologi-card-verified-button')
                </div>

            </div>
            @endforeach
        </div>


    </div>
</div>
