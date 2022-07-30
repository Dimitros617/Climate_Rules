<div class="rounded-3 shadow-sm p-3 m-1 w-100 d-flex flex-wrap justify-content-between bg-light">

    <div class="d-flex flex-wrap">
        <span class="pt-3">@php echo explode(" ",$balance_item->created_at)[1] @endphp</span>
        <div class="d-grid ms-4">
            <div>
                {{--                        <span class=" text-muted">Typ platby: </span>--}}
                <span>
                            {{__($balance_item->transaction_type_name)}}
                            </span>
                <span data-toggle="tooltip" data-placement="bottom" title="{{__($balance_item->description)}}">
                                <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
                                </svg>
                            </span>
            </div>

            <div>

                <span class="fs-5 fw-bold ">{{$balance_item->nation_name_from}}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right-short mb-1" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                </svg>
                <span class="fs-5 fw-bold">{{$balance_item->nation_name_to}}</span>

                @if($balance_item->description != null)
                    <div class="ms-2">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-quote" viewBox="0 0 16 16">
                                      <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                                      <path d="M7.066 4.76A1.665 1.665 0 0 0 4 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112zm4 0A1.665 1.665 0 0 0 8 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112z"/>
                                    </svg>
                                </span>
                        {{__($balance_item->description)}}
                    </div>
                @endif

            </div>

        </div>
    </div>

    <div>
                    <span class="fw-bold fs-2 @if($balance_item->nation_id_from == $my_nation->id || $balance_item->money_change < 0) text-red @else text-green @endif ">
                        @if($balance_item->nation_id_from == $my_nation->id || $balance_item->money_change < 0)- @else + @endif
                        @php echo abs($balance_item->money_change) @endphp
                    </span>
        <span>
                        <img class="@if($balance_item->nation_id_from == $my_nation->id || $balance_item->money_change < 0) text-red @else text-green @endif" style="width: 1.3rem; margin-top: -0.5rem" src="{{URL::asset('Img/CR-coin.svg')}}">
                    </span>
    </div>
</div>
