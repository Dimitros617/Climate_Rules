<div class="d-grid ">
    <span class="fs-2 mb-4 mt-2 fw-bold pb-1 text-black" style="border-bottom: 2px solid black;">Nastavení daní</span>


    <div class="fw-bold fs-5 mb-3 text-black">Očekávaný příjem za další období</div>

    <div class="d-inline-flex text-black p-2 justify-content-center">
        <div class="d-grid text-center" data-toggle="tooltip" data-placement="bottom" title="{{$statistic_types->economy_name}}">
            <span style="transform: scale(2.5)">
                @php echo htmlspecialchars_decode($statistic_types->economy_icon) @endphp
            </span>
            <span class="fw-bold fs-3 p-2">
                {{$statistic_types->economy}}
            </span>
        </div>
        <div class="fw-bold fs-3 p-2" style="padding-top: 1.8rem !important;">
            *
        </div>
        <div class="d-grid text-center" data-toggle="tooltip" data-placement="bottom" title="{{$statistic_types->tax_name}}">
            <span style="transform: scale(2.5)">
                @php echo htmlspecialchars_decode($statistic_types->tax_icon) @endphp
            </span>
            <span class="fw-bold fs-3 p-2 pt-7">
                {{$statistic_types->actual_tax}}
            </span>
        </div>
        <div class="fw-bold fs-3 p-2" style="padding-top: 1.5rem !important;">
            =
        </div>
        <div class="d-grid text-center" data-toggle="tooltip" data-placement="bottom" title="Příjem">
            <span>
                <img style="transform: scale(2)" src="{{URL::asset('Img/CR-coin.svg')}}">
            </span>
            <span id="nation-income" class="fw-bold fs-3 p-2">
                @php if($statistic_types->economy * $statistic_types->actual_tax > 0){ echo '+'; }else{ echo '-'; } echo $statistic_types->economy * $statistic_types->actual_tax;  @endphp
            </span>
        </div>


    </div>

    <div class="fw-bold fs-5 mb-1 text-black mt-3"> Upravit daň na další období</div>
    <div class="fs-7 mb-3"> Daň ovlivnuje náladu obyvatelstva.</div>

    <input type="number" id="nation-tax-increse" value="0" hidden>

    <div class="d-flex flex-wrap justify-content-center fs-3 text-black mb-4">
        <div onclick="changeNationTaxButton(this)" class="change-tax-button p-3 mx-1 w-20 fw-bold text-center rounded-3 bg-light hover-size-01 hover-shadow animate-02 cursor-pointer" value="-1" @if($statistic_types->before_tax == null) hidden @endif>{{$statistic_types->before_tax}}</div>
        <div onclick="changeNationTaxButton(this)" class="change-tax-button p-3 mx-1 w-20 fw-bold text-center rounded-3 cr-bg-blue hover-size-01 hover-shadow animate-02 cursor-pointer" value="0">{{$statistic_types->actual_tax}}</div>
        <div onclick="changeNationTaxButton(this)" class="change-tax-button p-3 mx-1 w-20 fw-bold text-center rounded-3 bg-light hover-size-01 hover-shadow animate-02 cursor-pointer" value="1" @if($statistic_types->after_tax == null) hidden @endif>{{$statistic_types->after_tax}}</div>
    </div>

    <div class="d-flex flex-wrap mb-3 mt-2 justify-content-center mt-2">

        <input onclick="

        if(this.checked){
            document.getElementsByClassName('swal2-confirm')[0].removeAttribute('disabled')
        }else{
            document.getElementsByClassName('swal2-confirm')[0].setAttribute('disabled','')
        }

        " type="checkbox" style="transform: scale(1.2)" id="change-tax-verify" class=" form-check-input m-0 p-0 ms-1 me-3" role="switch">
        <span >Opravdu chci změnit daně na příští období. Vím, že to mohu udělat jen jednou za období.</span>
    </div>

</div>
