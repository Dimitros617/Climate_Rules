


    <div class="d-flex justify-content-between pb-2 mb-3" style="min-width: 890px">

        <div class="statistic_table w-100" >
            <div class="mb-1 pb-4 head w-100 d-flex flex-wrap " >
                <div class="text-uppercase display-6 mb-2 w-15rem " >
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-compass mb-2 animate-05 hover-size-01" viewBox="0 0 16 16">
                        <path d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                        <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z"/>
                    </svg>
                    {{__('overview')}}
                </div>


                @foreach($statistics_types as $statistic_type)
                    <div class="pb-4 text-center  p-3 " style="flex: 1 1 0px"    data-toggle="tooltip" data-placement="bottom" title="{{__($statistic_type->name)}}">
                        <div class="">
                            <div class="top-0 mb-3"  style="transform: scale(2)">@php echo htmlspecialchars_decode($statistic_type->icon) @endphp</div>
                            <span class="bottom-0 pt-3 fw-bold" style=" font-size: 10px">{{__($statistic_type->name)}}</span>
                        </div>
                    </div>
                @endforeach

                <div class="pb-4 text-center   p-3" style="flex: 1 1 0px" data-toggle="tooltip" data-placement="bottom" title="{{__('income_=_economy_x_taxes')}}">
                    <div class="top-0 mb-3"  style="transform: scale(2)"><img src="{{URL::asset('Img/CR-coin.svg')}}"></div>
                    <span class="bottom-0 pt-3 fw-bold" style=" font-size: 10px">{{__('income')}}</span>

                </div>


            </div>
            @foreach($nations as $nation)
            <div class="global-status-table-row rounded-4 overflow-hidden d-flex flex-wrap w-100 mb-2 justify-content-around bg-white shadow-sm">
                <div class="cr-gradient fs-5 mb-2 p-3 w-15rem d-flex justify-content-between fw-bold @if(Auth::check() && Auth::permition()->admin == "1") cursor-pointer animate-02 @endif">
                    <span
                        @if(Auth::check() && Auth::permition()->admin == "1")
                            onclick="getEditNationStatisticTypes({{$nation->id}})"
                         @endif
                    >{{$nation->name}}</span>

                    @if(Auth::check() && Auth::permition()->admin == "1")
                    <div class="advanceAdminTool multiple-edit-admin  form-check form-switch d-grid text-center justify-content-center p-0 pt-1" hidden>
                        <input onchange="changeMultipleStatisticTypes()" style="transform: scale(1.2)" class="multiple-edit-admin-checkbox form-check-input m-0 p-0 ms-1"  type="checkbox" role="switch" nationId="{{$nation->id}}" id="flexSwitchCheckDefault">
                    </div>
                    @endif
                </div>

                @foreach($statistics_types as $statistic_type)
{{--                        onmouseleave="thHoverOff(this)" --}}
                <div class=" fs-5 text-center hover-size-01 flex-1  p-3 fw-bold" style="flex: 1 1 0px; border-left: 3px solid #f4f5f7" nationId="{{$nation->id}}" staticticTypeCode="{{$statistic_type->code_name}}" @if(Auth::check() && Auth::permition()->admin == "1") onmouseenter="thHoverOn(this)" onmouseleave="thHoverOff(this)" @endif>

                    @if(Auth::check() && Auth::permition()->admin == "1")
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" hidden class="advanceAdminTool multiple-edit-admin bi bi-caret-left-fill @if(str_contains($statistic_type->code_name, 'level')) muted @endif " viewBox="0 0 16 16" display="none" onclick="changeSingleStatisticType(this, -1)">
                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                    </svg>
                    @endif

                    <span>
                    @php $name = $statistic_type->code_name;  print_r( $nation->stats[0]->$name); @endphp
                    </span>
                    <span class="multiple-edit-admin admin-add-value admin-add-value-{{$statistic_type->code_name}}" statisticTypeCode="{{$statistic_type->code_name}}" nationId="{{$nation->id}}"></span>

                    @if(Auth::check() && Auth::permition()->admin == "1")
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" hidden class="advanceAdminTool multiple-edit-admin bi bi-caret-right-fill" viewBox="0 0 16 16" display="none" onclick="changeSingleStatisticType(this, 1)">
                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                    </svg>
                    @endif

                </div>
                @endforeach

{{--                income count počítání příjmů--}}
                <div class="fs-5 text-center hover-size-01 flex-1 p-3 fw-bold" style="flex: 1 1 0px; border-left: 3px solid #f4f5f7">
                    @php  echo ($nation->stats[0]->economy * $nation->stats[0]->tax) @endphp
                </div>
            </div>
            @endforeach

{{--            Admin panel pro upravu multiple věcí--}}
            @if(Auth::check() && Auth::permition()->admin == "1")
            <div id="global-status-table-row-admin-panel" hidden class=" advanceAdminTool multiple-edit-admin rounded-4 overflow-hidden d-flex flex-wrap w-100 mb-2 justify-content-around cr-bg-blue text-white shadow-sm">
                <div class="text-white fs-5 mb-2 p-3 w-15rem fw-bold ">
                    {{__('mass_editing')}}
                </div>

                @foreach($statistics_types as $statistic_type)
                    {{--                        onmouseleave="thHoverOff(this)" --}}
                    <div class=" fs-5 text-center flex-1  p-0  fw-bold" style="border-left: 3px solid #f4f5f7; padding-top: 1.2rem" >

                        <input onchange="changeMultipleStatisticTypes()" class="multiple-edit-admin-input p-2 mt-2 rounded-2 w-4rem border-none"  type="number" value="0" statisticTypeCode="{{$statistic_type->code_name}}">
                    </div>
                @endforeach
                <div class=" fs-5 text-center flex-1  p-0  fw-bold" style="border-left: 3px solid #f4f5f7; padding-top: 1.2rem" >

                    <button onclick="setAllMultipleChangeStatisticTypes()" class="btn btn-primary ms-auto me-auto w-100" style="height: -webkit-fill-available;"> {{ __('send')}}</button>
                </div>

            </div>
            @endif
        </div>

    </div>





