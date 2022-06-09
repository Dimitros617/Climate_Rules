<div class="bg-light rounded-3 p-3 m-1 ms-5 me-5  d-flex flex-wrap justify-content-around text-center ">

    @foreach($statistics_types as $stat)
        <div class="technology-statistic-type d-grid" code="{{$stat->code_name}}">


            @php
                $stat_num = 0;
                foreach($technology->statistics_types as $tech_stat){
                    if($tech_stat->code_name == $stat->code_name){
                        $stat_num = $tech_stat->index_move;
                    }
                }

            $color = 'lightgray';

            if(($stat_num > 0 && $stat->positive_value == 1 ) || ($stat_num < 0 && $stat->positive_value == 0 )){
                $color = 'green';
            }
            elseif(($stat_num < 0 && $stat->positive_value == 1 ) || ($stat_num > 0 && $stat->positive_value == 0 )){
                $color = 'red';
            }

            @endphp

            <span data-toggle="tooltip" data-placement="bottom" title="{{__($stat->name)}} " code="{{$stat->code_name}}">

                <div class="pt-1 text-center justify-content-center d-flex"
                     style="transform: scale(2); color: {{$color}}" >
                    @php echo htmlspecialchars_decode($stat->icon) @endphp
                </div>
            </span>
            <span class=" fw-bold mt-2" style="color: {{$color}}">

                @if($stat_num >= 0)+@endif {{$stat_num}}
            </span>
        </div>
    @endforeach

        <div class=" d-flex flex-wrap justify-content-around text-center">
            @foreach($technology->special_events as $event)
                <div class="d-grid" data-toggle="tooltip" data-placement="bottom" title="{{__($event->name)}} ">
                    <span class=" m-1 mt-2 fs-5 fw-bold">{{$event->code}}</span>
                    <span class=" fs-6 ">{{$event->coefficient}}%</span>
                </div>
            @endforeach
        </div>
</div>
