<div class="bg-light rounded-3 p-3 w-100 d-flex flex-wrap justify-content-around text-center ">

    <div class="w-100 d-flex flex-wrap justify-content-around text-center ">
        @foreach($statistics_types as $stat)
                @if(str_contains($stat->code_name, 'level'))
                     @continue
                @endif
                <div class="technology-statistic-type d-grid" code="{{$stat->code_name}}">
                    <span data-title="{{$stat->name}} " >

                        <div class="pt-1 text-center justify-content-center d-flex text-black" style="transform: scale(2)" >
                            @php echo htmlspecialchars_decode($stat->icon) @endphp
                        </div>
                    </span>
                    {{--                style="color: @if($stat->index_move >= 0) green @else red @endif"--}}
                    <span class=" fw-bold mt-2" >
                        @php
                            $stat_num = 0;
                            foreach($technology->statistics_types as $tech_stat){
                                if($tech_stat->code_name == $stat->code_name){
                                    $stat_num = $tech_stat->index_move;
                                }
                            }
                        @endphp

                        @if($stat_num >= 0)+@endif {{$stat_num}}
                    </span>
                </div>
        @endforeach
    </div>
    <div class="w-100 d-flex flex-wrap justify-content-around text-center">
        @foreach($technology->special_events as $event)
            <div class="d-grid">
                <span class=" m-1 mt-2 fs-5 fw-bold">{{$event->code}}</span>
                <span class=" fs-6 ">{{$event->coefficient}}%</span>
            </div>
        @endforeach
    </div>
</div>
