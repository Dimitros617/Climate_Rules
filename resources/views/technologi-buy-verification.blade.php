<div class="d-grid">
    <span class="fs-2 mb-4 mt-2 fw-bold pb-1 text-black" style="border-bottom: 2px solid black;">Investice do technologie - {{$technology->code}}</span>

    <div class="d-flex flex-wrap mb-3">
        <div class="d-grid w-50" style="min-width: 25rem">

            <div class="d-flex flex-wrap mb-3">
                <span class="w-7rem pt-1 text-end me-3">Kupující:</span>
                <span id="one-pay-nation-from" class="fs-4 fw-bold text-black" name="{{$my_nation->name}}" nation_id="{{$my_nation->id}}">{{$my_nation->name}}</span>
            </div>

            <div class="d-flex flex-wrap mb-3">
                <span class="w-7rem pt-1 text-end me-3">Technologie:</span>
                <span id="one-pay-technology" class="fs-4 fw-bold text-black w-75 text-start" >{{$technology->technology_name}} </span>
            </div>

            <div class="d-flex flex-wrap mb-3 ">
                <span class="w-7rem pt-1 text-end me-3">Stav:</span>
                <div class="d-grid w-75">
                    <div class="d-flex flex-wrap mb-3 ">
                    @include('technologi-card-work-status')
                    @include('technologi-card-active-status')
                    </div>
                    <div>
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
                    </div>

                </div>

            </div>



        </div>

        <div class="d-grid w-50 bg-light rounded-3 shadow-sm p-4" style="min-width: 25rem">
            <div class="d-flex flex-wrap justify-end w-100 mb-3">
                <span class="fs-4 pt-1 w-70 text-end">Aktuální zůstatek: </span>
                <span class="fs-3  fw-bold w-5rem">{{$my_nation->money}}</span>
                <img style="width: 1.3rem; margin-top: -0.5rem" src="{{URL::asset('Img/CR-coin.svg')}}">
            </div>

            <div class="d-flex flex-wrap justify-end w-100">
                <span class="fs-3 text-black pt-1 w-70 text-end">Cena: </span>
                <span class="fs-3 text-black fw-bold w-5rem">{{$technology->price}}</span>
                <img style="width: 1.3rem; margin-top: -0.5rem" src="{{URL::asset('Img/CR-coin.svg')}}">
            </div>

            <div class="d-flex flex-wrap justify-end w-100" style="border-bottom: 2px solid black">
                <span class="fs-3 text-black pt-1 w-70 text-end">Licence: </span>
                <span class="fs-3 text-black fw-bold w-5rem">{{$technology->patent_price}}</span>
                <img style="width: 1.3rem; margin-top: -0.5rem" src="{{URL::asset('Img/CR-coin.svg')}}">

            </div>

{{--            <div class="d-flex flex-wrap justify-end w-100" style="border-bottom: 2px solid black">--}}
{{--                <span class="fs-3 text-black pt-1 pb-1 w-70 fw-bold text-end">Cena celkem: </span>--}}
{{--                <span class="fs-3 text-black fw-bold w-5rem">--}}
{{--                    @php echo $technology->price + $technology->patent_price @endphp--}}
{{--                </span>--}}
{{--                <img style="width: 1.3rem; margin-top: -0.5rem" src="{{URL::asset('Img/CR-coin.svg')}}">--}}

{{--            </div>--}}

{{--            <div class="d-flex flex-wrap justify-end w-100 mt-2">--}}
{{--                <span class="fs-4  pt-1 w-70 text-end">Zůstatek po koupi: </span>--}}
{{--                <span class="fs-3  fw-bold w-5rem">--}}
{{--                    @php echo $my_nation->money - ($technology->price + $technology->patent_price) @endphp--}}
{{--                </span>--}}
{{--                <img style="width: 1.3rem; margin-top: -0.5rem" src="{{URL::asset('Img/CR-coin.svg')}}">--}}

{{--            </div>--}}

        </div>
    </div>

    @if(Auth::check() && Auth::permition()->admin == "1")
        <div class="d-flex flex-wrap mb-3 justify-content-center">

            <input id="admin-pay" class="form-check-input m-0 p-0 ms-1 me-3 mt-1" role="switch" type="checkbox"
                   onclick="

            if(document.getElementById('one-pay-verify').checked){
                document.getElementById('one-pay-verify').click()
            }

            if(this.checked){
                document.getElementById('one-pay-nation-from').innerHTML = 'Centrální banka'
                document.getElementById('one-pay-my-nation-select').removeAttribute('hidden');
                document.getElementById('one-pay-my-nation-select').removeAttribute('disabled');


            }else{
                document.getElementById('one-pay-nation-from').innerHTML = document.getElementById('one-pay-nation-from').getAttribute('name');
                document.getElementById('one-pay-my-nation-select').setAttribute('hidden', '');
                document.getElementById('one-pay-my-nation-select').setAttribute('disabled', '');
                document.getElementById('one-pay-nation-to').options.selectedIndex = 0;

            }"
            >
            <span class="pt-1 text-end text-red">Provést platbu jako centrální banka</span>
        </div>
    @endif

    <div class="d-flex flex-wrap mb-3 mt-2 justify-content-center">

        <input onclick="

        if(this.checked){
            document.getElementsByClassName('swal2-confirm')[0].removeAttribute('disabled')
        }else{
            document.getElementsByClassName('swal2-confirm')[0].setAttribute('disabled','')
        }

        " type="checkbox" style="transform: scale(1.2)" id="one-pay-verify" class=" form-check-input m-0 p-0 ms-1 me-3" role="switch">
        <span > Opravdu chci tuto platbu odeslat.</span>
    </div>

</div>
