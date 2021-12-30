<div id="newTechnologies" class="collapse-ele overflow-hidden animate-05 p-3">

    <div id="" class="card-box-container card-box d-flex flex-wrap justify-content-around">
        @php $last_round_show = 1 @endphp
        @foreach($allTechnologies as $technology)
            @if($technology->round_show > $last_round_show)
            <div class="w-100 mb-4 mt-7 p-3 fw-bold fs-2 text-center d-inline-flex justify-content-around">
                <span class="bg-dark w-25 h-5px rounded-2 mt-3"></span>
                {{$technology->round_show}}. KOLO
                <span class="bg-dark w-25 h-5px rounded-2 mt-3"></span>
            </div>
            @endif
            @if(Auth::permition()->admin !=1 && ($technology->visibility == 0 || $technology->round_show > $roundNumber) ||  count($technology->my_status) != 0)
                @continue
            @endif
            @include('technologi-card')
            @php $last_round_show = $technology->round_show @endphp
        @endforeach
    </div>

    <div  id="" class="card-row card-row-container" hidden>
        @php $last_round_show = 1 @endphp
        @foreach($allTechnologies as $technology)
            @if($technology->round_show > $last_round_show)
                <div class="w-100 mb-4 mt-7 p-3 fw-bold fs-2 text-center d-inline-flex justify-content-around">
                    <span class="bg-dark w-25 h-5px rounded-2 mt-3"></span>
                    {{$technology->round_show}}. KOLO
                    <span class="bg-dark w-25 h-5px rounded-2 mt-3"></span>
                </div>
            @endif
            @if(Auth::permition()->admin !=1 && ($technology->visibility == 0 || $technology->round_show > $roundNumber) ||  count($technology->my_status) != 0)
                @continue
            @endif
            @include('technologi-card-row')
            @php $last_round_show = $technology->round_show @endphp
        @endforeach
    </div>
</div>

<div id="workTechnologies" class="collapse-ele overflow-hidden animate-05 p-3" style="display: none">
    <div id="" class="card-box-container card-box d-flex flex-wrap justify-content-around">
        @foreach($allTechnologies as $technology)
            @if(count($technology->my_status) == 0 || $technology->my_status[0]->code == 'active')
                @continue
            @endif
            @include('technologi-card')
        @endforeach
    </div>

    <div  id="" class="card-row card-row-container" hidden>
        @foreach($allTechnologies as $technology)
            @if(count($technology->my_status) == 0 || $technology->my_status[0]->code == 'active')
                @continue
            @endif
            @include('technologi-card-row')
        @endforeach
    </div>
</div>

<div id="activeTechnologies" class="collapse-ele overflow-hidden animate-05 p-3" style="display: none">
    <div id="" class="card-box-container card-box d-flex flex-wrap justify-content-around">
        @foreach($allTechnologies as $technology)
            @if(count($technology->my_status) == 0 || $technology->my_status[0]->code != 'active')
                @continue
            @endif
            @include('technologi-card')
        @endforeach
    </div>

    <div  id="" class="card-row card-row-container" hidden>
        @foreach($allTechnologies as $technology)
            @if(count($technology->my_status) == 0 || $technology->my_status[0]->code != 'active')
                @continue
            @endif
            @include('technologi-card-row')
        @endforeach
    </div>
</div>

@if(Auth::permition()->admin ==1)
    <div id="adminTechnologies"  class="collapse-ele overflow-hidden animate-05 p-3 " style="display: none">


        <div id="" class="card-box-container card-box d-flex flex-wrap justify-content-around cr-empty-element">
            @foreach($allTechnologies as $technology)
                @if(count($technology->nations_status)==0)
                    @continue
                @endif
                @include('technologi-card-verified')
            @endforeach
        </div>

        <div  id="" class="card-row-container card-row" hidden>
            @foreach($allTechnologies as $technology)
                @if(count($technology->nations_status)==0)
                    @continue
                @endif
                @include('technologi-card-row-verified')
            @endforeach
        </div>
    </div>
@endif
