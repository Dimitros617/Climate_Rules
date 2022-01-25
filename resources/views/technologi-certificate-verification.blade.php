<div>

    <div id="technology-certificate-verification" admin="{{Auth::permition()->admin}}" first_try="{{$my_nation_technology->first_try}}" hidden></div>
    <input hidden id="admin-pay" class="form-check-input m-0 p-0 ms-1 me-3 mt-1 hidden" role="switch" type="checkbox">

    <div class="fw-bold text-black text-center w-100 fs-2 mb-3 pb-1 mt-2" style="border-bottom: 2px solid black">T31 - Název technologie</div>

    <div class="d-grid w-100 mb-4">
        <div class="flex-wrap d-flex w-100">
            <div class="w-25 d-grid text-end me-3">
                <span class="fw-bold fs-3 text-black">Popis</span>
                <span>MIT (+MIK)</span>
            </div>
            <div class="w-70">
                <textarea @if($my_nation_technology->first_try == 1 && Auth::permition()->admin !=1) disabled @endif id="technology-certificate-description" class="w-100 p-2 rounded-2 shadow-sm" style="min-height: 100px; min-width: 100%; max-width: 100%" maxlength="2000" placeholder="Zde popište technologii, max 2000 znaků." >{{$my_nation_technology->chose_description}}</textarea>
            </div>
        </div>

    </div>

    <div class="d-grid w-100 mb-4">
        <div class="flex-wrap d-flex w-100">
            <div class="w-25 d-grid text-end me-3">
                <span class="fw-bold fs-3 text-black">Výhody</span>
                <span>MIT+MUR (+MIK)</span>
            </div>
            <div class="w-70">
                <textarea @if($my_nation_technology->first_try == 1 && Auth::permition()->admin !=1) disabled @endif id="technology-certificate-benefits" class="w-100 p-2 rounded-2 shadow-sm" style="min-height: 100px; min-width: 100%; max-width: 100%" maxlength="2000" placeholder="Zde popište výhody technologie, max 2000 znaků.">{{$my_nation_technology->chose_benefits}}</textarea>
            </div>
        </div>

    </div>

    <div class="d-grid w-100 mb-4">
        <div class="flex-wrap d-flex w-100">
            <div class="w-25 d-grid text-end me-3">
                <span class="fw-bold fs-3 text-black">Nevýhody</span>
                <span>MIT+MUR (+MIK)</span>
            </div>
            <div class="w-70">
                <textarea @if($my_nation_technology->first_try == 1 && Auth::permition()->admin !=1) disabled @endif id="technology-certificate-disadvantages" class="w-100 p-2 rounded-2 shadow-sm" style="min-height: 100px; min-width: 100%; max-width: 100%" maxlength="2000" placeholder="Zde popište nevýhody technologie, max 2000 znaků.">{{$my_nation_technology->chose_disadvantages}}</textarea>
            </div>
        </div>

    </div>

    <div class="d-grid w-100 mb-4">
        <div class="flex-wrap d-flex w-100">
            <div class="w-25 d-grid text-end me-3">
                <span class="fw-bold fs-3 text-black">Business využití</span>
                <span>MUR</span>
            </div>
            <div class="w-70">
                <textarea @if($my_nation_technology->first_try == 1 && Auth::permition()->admin !=1) disabled @endif id="technology-certificate-business" class="w-100 p-2 rounded-2 shadow-sm" style="min-height: 100px; min-width: 100%; max-width: 100%" maxlength="2000" placeholder="Zde popište business využití technologe, max 2000 znaků.">{{$my_nation_technology->chose_people}}</textarea>
            </div>
        </div>

    </div>

    <div class="d-grid w-100 mb-4">
        <div class="flex-wrap d-flex w-100">
            <div class="w-25 d-grid text-end me-3">
                <span class="fw-bold fs-3 text-black">Zdůvodnění přínosu pro lidi</span>
                <span>MOO (+MIK)</span>
            </div>
            <div class="w-70">
                <textarea @if($my_nation_technology->first_try == 1 && Auth::permition()->admin !=1) disabled @endif id="technology-certificate-people" class="w-100 p-2 rounded-2 shadow-sm" style="min-height: 100px; min-width: 100%; max-width: 100%" maxlength="2000" placeholder="Zde zdůvodněte přínos pro lidi, max 2000 znaků.">{{$my_nation_technology->chose_description}}</textarea>
            </div>
        </div>

    </div>

    <div class="d-flex flex-wrap mb-3 mt-2 justify-content-center">

        <input onclick="

        if(this.checked){
            document.getElementsByClassName('swal2-confirm')[0].removeAttribute('disabled')
            document.getElementById('one-pay-deny').checked = false;
            document.getElementsByClassName('swal2-deny')[0].setAttribute('disabled','')

        }else{
            document.getElementsByClassName('swal2-confirm')[0].setAttribute('disabled','')
        }

        " @if($my_nation_technology->first_try == 1 && Auth::permition()->admin !=1) disabled @endif type="checkbox" style="transform: scale(1.2)" id="one-pay-verify" class=" form-check-input m-0 p-0 ms-1 me-3" role="switch">
        <span >
            @if($my_nation_technology->first_try == 1 && Auth::permition()->admin !=1)
                Formulář nelze znovu odeslat, počkejte na schválení nebo na vrácení.
            @elseif($my_nation_technology->first_try == 1 && Auth::permition()->admin ==1)
                Opravdu chci tento formulář schválit.
            @else
                Opravdu chci tento formulář odeslat a jsem si vědom, že to mohu udělat <b class="text-red"> pouze jednou. </b>
            @endif
        </span>
    </div>

    @if($my_nation_technology->first_try == 1 && Auth::permition()->admin ==1)
        <div class="d-flex flex-wrap mb-3 mt-2 justify-content-center">

            <input onclick="

            if(this.checked){
                document.getElementsByClassName('swal2-deny')[0].removeAttribute('disabled');
                document.getElementById('one-pay-verify').checked = false;
                document.getElementsByClassName('swal2-confirm')[0].setAttribute('disabled','')

            }else{
                document.getElementsByClassName('swal2-deny')[0].setAttribute('disabled','')
            }

            "type="checkbox" style="transform: scale(1.2)" id="one-pay-deny" class=" form-check-input m-0 p-0 ms-1 me-3" role="switch">
            <span >
                Opravdu chci tento formulář zamítnout a vrátit k přepracování.
            </span>
        </div>
    @endif

</div>
