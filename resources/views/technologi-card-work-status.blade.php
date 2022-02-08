<div class="d-grid text-center p-3 m-2 bg-light rounded-3 animate-05 hover-size-01 hover-shadow cursor-pointer z-0"
     data-toggle="tooltip" data-placement="bottom" title="Státy, které mají technologii rozpracovanou."
     onclick="showAndHideElement(this.parentNode.parentNode.parentNode,'nation-work-status')">
                    @if($technology->workStatus > 0)
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                        </svg>
                    @else
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                              <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg>
                        </span>
                    @endif
    <span class="technology-work-status fw-bold fs-5">
    {{--                    Počet států, které mají technologii nakoupenou--}}
        {{$technology->workStatus}}
                    </span>

</div>
