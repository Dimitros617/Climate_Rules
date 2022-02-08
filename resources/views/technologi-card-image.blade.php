<div class="position-relative text-center rounded-3 overflow-hidden">

    <img class="w-100 mb-3 technology-card-image-{{$technology->technology_id}}" log="{{$technology->img_url}}" local_src="{{URL::asset('©')}}" src="{{URL::asset($technology->img_url)}}">
    <div class="technology-code fs-1 fw-bold text-white position-absolute w-100 d-flex flex-wrap justify-content-between" style="mix-blend-mode: difference; opacity: 0.9; bottom: 4px; left: 4px" >
        {{$technology->code}}
    </div>
    <div class="d-grid flex-column p-3 position-absolute" style="border-radius: 5px 0 0 5px; background-color: rgba(0,0,0,0.17); top: 5px; right: 0px">
        @foreach($technology->areas as $area)

            <span class="h-content text-white m-1 animate-02 hover-size-01" data-toggle="tooltip" data-placement="bottom" title="{{$area->name}}" style="transform: scale(1.5); opacity: 0.9;">
                                        @php echo htmlspecialchars_decode($area->icon) @endphp
                            </span>
        @endforeach
    </div>

</div>
