<div class="setting p-2" hidden>
    <div>
        <span class="fw-bold me-4">
            Viditelné:
        </span>
        <span>
            <input onchange="changeTechnologyParameter({{$technology->id}},'visibility',this)" type="checkbox" class="fs-3" @if($technology->visibility == 1) checked @endif>
        </span>
    </div>
        <div>
            <span class="fw-bold me-4">
                Certifikace:
            </span>
            <span>
                <input onchange="changeTechnologyParameter({{$technology->id}},'certificate',this)" type="checkbox" class="fs-3" @if($technology->certificate == 1) checked @endif>
            </span>
        </div>
    <div>
        <span class="fw-bold me-4">
            Kolo:
        </span>
        <span>
            <input onchange="changeTechnologyParameter({{$technology->id}},'round_show',this)" type="number" min="0" value="{{$technology->round_show}}" required>
        </span>
    </div>
</div>
