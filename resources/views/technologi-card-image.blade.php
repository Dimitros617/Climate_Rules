<div class="position-relative text-center rounded-3 overflow-hidden">

    <img class="w-100 mb-3 technology-card-image-{{$technology->technology_id}}" log="{{$technology->img_url}}" local_src="{{URL::asset('©')}}" src="{{URL::asset($technology->img_url)}}">


    @if($technology->technologies_description != "")
    <div class="position-absolute top-0 p-2 cursor-help text-white" style=" opacity: 0.8;" onclick="getTechnologyDescription({{$technology->technology_id}})">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>

    </div>
    @endif

    @if(Auth::check() && Auth::permition()->admin ==1)
        <div class="position-absolute p-2 cursor-pointer" style=" bottom: 15px; right: 0; opacity: 0.8;" onclick="this.parentNode.parentNode.parentNode.parentNode.getElementsByClassName('admin-setting-technology-visibility')[0].click()">
            @if($technology->visibility == 1)
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-eye text-white" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-eye-slash text-white" viewBox="0 0 16 16">
                    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                    <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                </svg>
            @endif
        </div>
    @endif

    <div class="technology-code fs-1 fw-bold text-white position-absolute w-50 d-flex flex-wrap justify-content-between" style="mix-blend-mode: difference; opacity: 0.9; bottom: 4px; left: 4px" >
        {{$technology->code}}
    </div>
    <div class="d-grid flex-column p-3 position-absolute" style="border-radius: 5px 0 0 5px; background-color: rgba(0,0,0,0.17); top: 5px; right: 0px">
        @foreach($technology->areas as $area)

            <span class="h-content text-white m-1 animate-02 hover-size-01" data-toggle="tooltip" data-placement="bottom" title="{{__($area->name)}}" style="transform: scale(1.5); opacity: 0.9;">
                                        @php echo htmlspecialchars_decode($area->icon) @endphp
                            </span>
        @endforeach
    </div>

</div>
