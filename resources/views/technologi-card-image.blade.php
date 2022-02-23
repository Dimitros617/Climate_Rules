<div class="position-relative text-center rounded-3 overflow-hidden">

    <img class="w-100 mb-3 technology-card-image-{{$technology->technology_id}}" log="{{$technology->img_url}}" local_src="{{URL::asset('©')}}" src="{{URL::asset($technology->img_url)}}">


    @if($technology->technologies_description != "")
    <div class="position-absolute top-0 p-2 cursor-help" style="mix-blend-mode: difference; opacity: 0.9;" onclick="getTechnologyDescription({{$technology->technology_id}})">
            <svg style="mix-blend-mode: difference;" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
    </div>
    @endif

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
