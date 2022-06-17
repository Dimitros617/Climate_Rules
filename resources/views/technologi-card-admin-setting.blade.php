<div class="setting p-3 mt-2" hidden>
    <div class="d-inline-flex w-100 mb-1">
        <span class="fw-bold me-4 w-25">
            {{__('visible')}}:
        </span>
        <span class="form-check form-switch w-75">
            <input  role="switch" class="form-check-input admin-setting-technology-visibility fs-3 m-0" onchange="changeTechnologyParameter({{$technology->id}},'visibility',this)" type="checkbox"  @if($technology->visibility == 1) checked @endif>
        </span>
    </div>
    <div class="d-inline-flex w-100 mb-1">
        <span class="fw-bold me-4 w-25">
            {{__('certifikacion')}}:
        </span>
        <span class="form-check form-switch w-75">
            <input role="switch" class="form-check-input fs-3 m-0" onchange="changeTechnologyParameter({{$technology->id}},'certificate',this)" type="checkbox"  @if($technology->certificate == 1) checked @endif>
        </span>
    </div>
    <div class="d-inline-flex w-100 mb-1">
        <span class="fw-bold me-4 w-25">
            {{__('round')}}:
        </span>
        <span class="w-75">
            <input class="w-100 rounded-2 shadow-sm p-2" onchange="changeTechnologyParameter({{$technology->id}},'round_show',this)" type="number" min="0" value="{{$technology->round_show}}" required>
        </span>
    </div>
    <div class="d-inline-flex w-100 mb-1">
        <span class="fw-bold me-4 w-25" data-title="Změna nevrátí ani neupraví statistiky nebo peníze.">
            {{__('situation')}}:
        </span>
        <span class="w-75">
            <select class="w-100 rounded-2 shadow-sm p-2" onchange="setNationToTechnologyStatus(this.value,{{$technology->id}})">
                    @php
                        $ret_code = 'new';
                        if(count($technology->nations_status) != 0){

                            foreach ($technology->nations_status as $nation_stat){
                                if($nation_stat->nation_id == $my_nation->id){
                                    $ret_code = $nation_stat->code;
                                }
                            }
                        }
                    @endphp
                @foreach($technology_statuses as $tech_status)
                <option value="{{$tech_status->code}}" @if($tech_status->code == $ret_code) selected  @endif>{{__($tech_status->name)}}</option>
                @endforeach
            </select>
        </span>
    </div>
</div>
