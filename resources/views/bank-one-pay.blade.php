<div class="d-grid">
    <span class="fs-2 mb-4 mt-2 fw-bold pb-1 text-black" style="border-bottom: 2px solid black;">{{ __('send_a_one-time_payment')}}</span>
    <div class="d-flex flex-wrap mb-3">
        <span class="w-7rem pt-1 text-end pe-3">{{ __('from_state')}}:</span>
        <span id="one-pay-nation-from" class="fs-4 fw-bold text-black" name="{{$my_nation->name}}" nation_id="{{$my_nation->id}}">{{$my_nation->name}}</span>
    </div>

    @if(Auth::check() && Auth::permition()->admin == "1")
        <div class="d-flex flex-wrap mb-3">
            <span class="w-7rem pt-1 pe-3"></span>
            <input id="admin-pay" class="form-check-input m-0 p-0 ms-1 me-3 mt-1 " role="switch" type="checkbox"
            onclick="

            if(document.getElementById('one-pay-verify').checked){
                document.getElementById('one-pay-verify').click()
            }

            if(this.checked){
                document.getElementById('one-pay-nation-from').innerHTML = '{{__('central_bank')}}'
                document.getElementById('one-pay-my-nation-select').removeAttribute('hidden');
                document.getElementById('one-pay-my-nation-select').removeAttribute('disabled');
                document.getElementById('amouth-admin').removeAttribute('hidden');
                document.getElementById('amouth-user').setAttribute('hidden', '');

            }else{
                document.getElementById('one-pay-nation-from').innerHTML = document.getElementById('one-pay-nation-from').getAttribute('name');
                document.getElementById('one-pay-my-nation-select').setAttribute('hidden', '');
                document.getElementById('one-pay-my-nation-select').setAttribute('disabled', '');
                document.getElementById('one-pay-nation-to').options.selectedIndex = 0;
                document.getElementById('amouth-admin').setAttribute('hidden', '');
                document.getElementById('amouth-user').removeAttribute('hidden');


            }"
            >
            <span class="pt-1 text-end pe-3 text-red">{{ __('send_the_payment_as_a_central_bank')}}</span>

        </div>
    @endif

    <div class="d-flex flex-wrap mb-3">
        <span class="w-7rem pt-1 text-end pe-3">{{ __('to_state')}}:</span>
        <span class="w-50">
            <select id="one-pay-nation-to" class="rounded-2 shadow-sm p-2 w-100" onclick="if(document.getElementById('one-pay-verify').checked)document.getElementById('one-pay-verify').click()">
                <option disabled id="one-pay-blank-nation-select" value="-">---</option>
                <option id="one-pay-my-nation-select" value="null">Centrální banka</option>
                @foreach($allNations as $nation)
                <option @if($nation->id == $my_nation->id && Auth::permition()->admin !=1) hidden disabled @endif id="one-pay-my-nation-select" value="{{$nation->id}}">{{$nation->name}}</option>
                @endforeach
            </select>
        </span>
    </div>

    <div class="d-flex flex-wrap mb-3">
        <span class="w-7rem pt-1 text-end pe-3">{{ __('amount')}}:</span>
        <span id="amouth-user">
            <span class="p-2 fw-bold">1</span>
            <input type="range" value="1" min="1" max="{{$my_nation->money}}" id="one-pay-amouth" oninput="this.parentNode.getElementsByClassName('number')[0].value = this.value" class="range" onclick="if(document.getElementById('one-pay-verify').checked)document.getElementById('one-pay-verify').click()">
            <input type="number" value="1" min="1" max="{{$my_nation->money}}" class="w-4rem number p-2 fw-bold border-1 shadow-sm rounded-2"
                   onclick="if(document.getElementById('one-pay-verify').checked)document.getElementById('one-pay-verify').click()"
                   onchange="

                       if(document.getElementById('one-pay-verify').checked){
                           document.getElementById('one-pay-verify').click();
                       }

                       if(this.value < 1){
                            this.value = 1 ;
                       }
                       if(this.value > {{$my_nation->money}}){
                            this.value = {{$my_nation->money}}
                       }

                       "
                   oninput="this.parentNode.getElementsByClassName('range')[0].value = this.value" >


        </span>
        <span id="amouth-admin" hidden>
            <input id="one-pay-amouth-admin" type="number" value="1" min="1"  class="w-4rem number p-2 fw-bold border-0">
        </span>
    </div>

    <div class="d-flex flex-wrap mb-3 mt-4">
        <span class="w-7rem pt-1 text-end pe-3">{{ __('note')}}:</span>
        <span class="w-75"><textarea id="one-pay-description" maxlength="350" class="w-100 rounded-2 shadow-sm p-2" style="max-height: 200px; min-height: 50px" placeholder="Zde můžete zadat poznámku k platbě, MAX 350 znaků"></textarea></span>
    </div>


    <div class="d-flex flex-wrap mb-3 mt-2 justify-content-center">

        <input onclick="

        if(this.checked){
            document.getElementsByClassName('swal2-confirm')[0].removeAttribute('disabled')
        }else{
            document.getElementsByClassName('swal2-confirm')[0].setAttribute('disabled','')
        }

        " type="checkbox" style="transform: scale(1.2)" id="one-pay-verify" class="verify-checkbox form-check-input m-0 p-0 ms-1 me-3" role="switch">
        <span onclick="document.getElementsByClassName('verify-checkbox')[0].click()" >{{ __('i_really_want_to_send_this_payment')}}.</span>
    </div>

</div>
