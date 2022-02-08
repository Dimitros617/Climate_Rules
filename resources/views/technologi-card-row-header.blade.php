

<div class="w-50 d-flex flex between animate-05 card-technology-color-bar bg-white " style="border-radius: 5px 5px 0px 0px;">

    <div class="d-grid h-content">
        <div class="technology-code fs-2 fw-bold w-100 ">
            {{$technology->code}}
        </div>
        <div class="d-flex flex-wrap">
            @foreach($technology->areas as $area)

                <span class="h-content m-1 animate-02 hover-size-01" data-toggle="tooltip" data-placement="bottom" title="{{$area->name}}" style="transform: scale(1.4); opacity: 0.9;">
                        @php echo htmlspecialchars_decode($area->icon) @endphp
                </span>

            @endforeach
        </div>
    </div>

</div>
