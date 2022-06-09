<div class="align-content-center text-center d-inline-flex w-100">

    <div class="w-30 p-3">
        <img class=" w-100" src="{{URL::asset($technology->img_url)}}">
    </div>

    <div class="w-70 p-3">
        <div class="fw-bold text-black text-center w-100 fs-2 mb-3 pb-1 mt-2" style="border-bottom: 2px solid black">{{$technology->code}} - {{__($technology->name)}}</div>

        <div>
            {{__($technology->description)}}
        </div>
    </div>
</div>
