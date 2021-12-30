<div class="setting p-3 mt-2" hidden>
    <div class="d-inline-flex w-100 mb-1">
        <span class="fw-bold me-4 w-25">
            Viditelné:
        </span>
        <span class="form-check form-switch w-75">
            <input  role="switch" class="form-check-input fs-3 m-0" onchange="changeTechnologyParameter({{$technology->id}},'visibility',this)" type="checkbox"  @if($technology->visibility == 1) checked @endif>
        </span>
    </div>
    <div class="d-inline-flex w-100 mb-1">
        <span class="fw-bold me-4 w-25">
            Certifikace:
        </span>
        <span class="form-check form-switch w-75">
            <input role="switch" class="form-check-input fs-3 m-0" onchange="changeTechnologyParameter({{$technology->id}},'certificate',this)" type="checkbox"  @if($technology->certificate == 1) checked @endif>
        </span>
    </div>
    <div class="d-inline-flex w-100 mb-1">
        <span class="fw-bold me-4 w-25">
            Kolo:
        </span>
        <span class="w-75">
            <input onchange="changeTechnologyParameter({{$technology->id}},'round_show',this)" type="number" min="0" value="{{$technology->round_show}}" required>
        </span>
    </div>
</div>
