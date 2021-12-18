
    <div class="d-flex justify-content-between pb-2 mb-3" >

        <table class="statistic_table w-100" style=" border-collapse: separate; ">
            <tr class="mb-2 pb-4 head">
                <th class="text-uppercase display-6 pb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-compass mb-2 animate-05 hover-size-01" viewBox="0 0 16 16">
                        <path d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                        <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z"/>
                    </svg>
                    Přehled
                </th>

                <div class="d-flex">
                    @foreach($statistics_types as $statistic_type)
                        <th class="pb-4 text-center flex-1"   data-title="{{$statistic_type->name}}">
                            <div class="">
                                <div class="top-0 mb-3"  style="transform: scale(2)">@php echo htmlspecialchars_decode($statistic_type->icon) @endphp</div>
                                <span class="bottom-0 pt-3" style=" font-size: 10px">{{$statistic_type->name}}</span>
                            </div>
                        </th>
                    @endforeach
                </div>
                <th class="pb-4 text-center" style="text-orientation: mixed;" data-title="Příjem">
                    <div class="top-0 mb-3"  style="transform: scale(2)"><img src="{{URL::asset('img/CR-coin.svg')}}"></div>
                    <span class="bottom-0 pt-3" style=" font-size: 10px">Příjem</span>

                    </th>


            </tr>
            @foreach($nations as $nation)
            <tr class="rounded-4 overflow-hidden">
                <th class="cr-gradient fs-7 mb-2 p-3">{{$nation->name}}</th>

                @foreach($statistics_types as $statistic_type)
{{--                        onmouseleave="thHoverOff(this)" --}}
                <th class=" fs-7 text-center hover-size-01" nationId="{{$nation->id}}" staticticTypeCode="{{$statistic_type->code_name}}" @if(Auth::check() && Auth::permition()->admin == "1") onmouseenter="thHoverOn(this)" onmouseleave="thHoverOff(this)" @endif>

                    @if(Auth::check() && Auth::permition()->admin == "1")
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16" display="none" onclick="decreaseValue(this.parentNode.getAttribute('nationId'), this.parentNode.getAttribute('staticticTypeCode'))">
                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                    </svg>
                    @endif

                    @php $name = $statistic_type->code_name;  print_r( $nation->stats[0]->$name); @endphp

                    @if(Auth::check() && Auth::permition()->admin == "1")
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16" display="none" onclick="increaseValue(this.parentNode.getAttribute('nationId'), this.parentNode.getAttribute('staticticTypeCode'))">
                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                    </svg>
                    @endif

                </th>
                @endforeach

{{--                income count počítání příjmů--}}
                <th class="fs-7 text-center hover-size-01">@php  echo ($nation->stats[0]->economy * $nation->stats[0]->tax) @endphp <span class="fs-6">M</span></th>
            </tr>
            @endforeach

        </table>

    </div>





