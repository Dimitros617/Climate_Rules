@section('title','Climate rules')
@section('title_name', $my_nation->name)

@section('css', URL::asset('css/admin-setting.css'))

<script src="/js/main.js"></script>
<script src="/js/nations.js"></script>
<script src="/js/game.js"></script>
<script src="/js/bank.js"></script>


<x-app-layout>
    <x-slot name="header">

    </x-slot>

    {{--Context menu--}}

    <div hidden="" id="lobby-id" lobbyId="{{$lobby->id}}"></div>

    @include('lobby-admin-panel')




    <div class="w-100 w-md-90 ms-auto me-auto d-block">

        <div class="d-flex flex-wrap justify-content-center">

            @if(Auth::permition()->admin ==1)
            <div class=" w-100 w-xl-75 w-sm-90 form-check form-switch d-grid text-center justify-content-end p-0 pt-2 mt--2 mb-2">
                <input onchange="advanceCentralBankTools(this)" style="transform: scale(1.2)" class="form-check-input ms-auto me-auto p-0 d-block "  type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label mt-1 fw-bold" style=" font-size: 10px" for="flexSwitchCheckDefault">{{__("central_bank_tools")}}</label>
            </div>
            @endif

            <div class="w-100 w-xl-75 w-sm-90  p-4 mb-4 shadow-md rounded-3 bg-white d-flex flex-wrap">

                <div class="w-100 w-md-50 d-grid">
                    <div class="fw-bold fs-2 mb-2 text-center text-md-start" style="    border-bottom: 2px solid black;">
                            <span class="pb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bank2 mb-1" viewBox="0 0 16 16">
                                  <path d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916l-7.5-5zM12.375 6v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zM.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1H.5z"/>
                                </svg>
                            </span>
                            {{ __('summarize')}}
                    </div>

                    <div class="d-flex flex-wrap justify-content-between">
                        <span class="fs-4 pt-1">
                            {{ __('balance')}}</span>
                        <span>
                            <span class="fs-3 fw-bold">{{$my_nation->money}}</span>
                            <img style="width: 1.3rem; margin-top: -0.5rem" src="{{URL::asset('Img/CR-coin.svg')}}">
                        </span>

                    </div>


                    <div class="d-flex flex-wrap justify-content-between">
                        <span class="fs-5 pt-1">{{ __('loans_to_others')}}</span>
                        <span>
                            <span class="fs-4 fw-bold">0</span>
                            <img style="width: 1.3rem; margin-top: -0.5rem" src="{{URL::asset('Img/CR-coin.svg')}}">
                        </span>

                    </div>

                    <div class="d-flex flex-wrap justify-content-between">
                        <span class="fs-5 pt-1">{{ __('debts_to_others')}}</span>
                        <span>
                            <span class="fs-4 fw-bold">0</span>
                            <img style="width: 1.3rem; margin-top: -0.5rem" src="{{URL::asset('Img/CR-coin.svg')}}">
                        </span>

                    </div>

                    <div class="d-flex flex-wrap justify-content-between ">
                        <span class="fs-5 pt-1">{{ __('value_of_technology')}}</span>
                        <span>
                            <span class="fs-4 fw-bold">{{$technology_value}}</span>
                            <img style="width: 1.3rem; margin-top: -0.5rem" src="{{URL::asset('Img/CR-coin.svg')}}">
                        </span>

                    </div>
                    <div class="d-flex flex-wrap justify-content-between ">
                        <span class="fs-5 pt-1">{{ __('income_for_a_longer_period')}}</span>
                        <span>
                            <span class="fs-4 fw-bold">{{$next_round_icome}}</span>
                            <img style="width: 1.3rem; margin-top: -0.5rem" src="{{URL::asset('Img/CR-coin.svg')}}">
                        </span>

                    </div>
                </div>

                <div class="w-100 w-md-50 d-grid ">

                    <button class="btn btn-primary w-90 m-2 ms-auto me-auto ms-md-5 mt-4 mt-md-0" onclick="getOnePayForm({{$lobby->id}})">{{ __('one-time_payment')}}</button>
                    <button class="btn btn-primary w-90 m-2 ms-auto me-auto ms-md-5" disabled>{{ __('lend_to_somebody')}}</button>
                    <button class="btn btn-primary w-90 m-2 ms-auto me-auto ms-md-5" disabled>{{ __('apply_for_a_loan')}}</button>
                    <button class="btn btn-primary w-90 m-2 ms-auto me-auto ms-md-5" @if($edit_tax == 1) disabled @endif onclick="changeNationTax()">{{ __('change_taxes')}}</button>

                </div>

            </div>

{{--            Admin panel přehledu--}}
            @if(Auth::check() && Auth::permition()->admin == "1")
            <div class="central-bank-tools w-100 w-xl-75 w-sm-90  p-4 mb-4 shadow-md rounded-3 bg-white d-flex flex-wrap" hidden>

                <div class="w-100 w-md-50 pe-3 d-grid">
                    <div class="fw-bold fs-2 mb-2 text-center text-md-start" style="    border-bottom: 2px solid black; height: 3.5rem;">
                        {{ __('overview_of_states')}}
                    </div>

                    @foreach($allNations as $nation)
                    <div class="fast-pay-nation-row d-flex flex-wrap justify-content-between" nationId="{{$nation->id}}">
                        <div class="d-flex">
                            <div class=" form-check form-switch d-grid text-center justify-content-center p-0 pt-3">
                                <input onchange="changeFastPay()" style="transform: scale(1.2)" class="form-check-input m-0 p-0 ms-1"  type="checkbox" role="switch" nationId="{{$nation->id}}" id="flexSwitchCheckDefault">
                                <label class="form-check-label mt-1 fw-bold" style=" font-size: 10px" for="flexSwitchCheckDefault"></label>
                            </div>

                            <span class="ms-4 fs-4 pt-1 text-start">
                                {{$nation->name}}
                            </span>
                        </div>
                        <span>
                            <span class="fs-3 fw-bold nation-money">{{$nation->money}}<span class="nation-money-add "></span></span>
                            <img style="width: 1.3rem; margin-top: -0.5rem" src="{{URL::asset('Img/CR-coin.svg')}}">
                        </span>

                    </div>
                    @endforeach
                </div>

                <div class="w-100 w-md-50 ps-3 d-grid ">

                    <div class="fw-bold fs-2 mb-2 text-center text-md-start" style="    border-bottom: 2px solid black; height: 3.5rem;">
                        {{ __('fast_payments')}}
                    </div>

                    <div class="d-flex flex-wrap mb-3">
                        <span class="w-10rem pt-1 text-end pe-3">{{ __('transaction_type')}}:</span>
                        <span class="w-50">
                            <select id="one-pay-transaction-type" class="rounded-2 shadow-sm p-2 w-100" >
                                @foreach($allTransactionTypes as $transactionType)
                                    <option id="fast-pay-transaction-type-select" value="{{$transactionType->code}}">{{__($transactionType->name)}}</option>
                                @endforeach
                            </select>
                        </span>
                    </div>


                    <div class="d-flex flex-wrap mb-3">
                        <span class="w-10rem pt-1 text-end pe-3">{{ __('amount')}}:</span>
                        <span class="w-50">
                            <input onchange="changeFastPay()" id="fast-pay-amouth-admin" type="number" value="1"  class="number p-2 fw-bold rounded-2 shadow-sm  w-100">
                         </span>
                    </div>

                    <div class="d-flex flex-wrap mb-3 ">
                        <span class="w-10rem pt-1 text-end pe-3">{{ __('note')}}:</span>
                        <span class="w-50"><textarea id="fast-pay-description" maxlength="350" class="w-100 rounded-2 shadow-sm p-2" style="max-height: 200px; min-height: 50px" placeholder="Zde můžete zadat poznámku k platbě, MAX 350 znaků"></textarea></span>
                    </div>


                    <button class="btn btn-primary w-90 m-2 ms-auto me-auto ms-md-5 mt-4 mt-md-0" onclick="sendFastPay()">{{ __('send')}}</button>


                </div>

            </div>
            @endif

        </div>

        <div class="d-flex flex-wrap w-100 w-xl-75 w-sm-90 bg-white rounded-3 shadow-md p-4 mx-auto">

            <div id="nation-bank-account-moves" class="w-100">
            @foreach($my_payment_balance as $balance_item)
                @include("bank-account-moves")
            @endforeach
            </div>

            @if(Auth::check() && Auth::permition()->admin == "1")
                <div id="admin-bank-account-moves" class="w-100" hidden>
                    @foreach($admin_payment_balance as $balance_item)
                        @include("bank-account-moves")
                    @endforeach
                </div>
            @endif
        </div>

    </div>

    @include('button-panel')


</x-app-layout>
