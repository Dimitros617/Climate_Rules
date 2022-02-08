

<div class="w-100 d-flex flex justify-content-between animate-05 card-technology-color-bar bg-white " style="border-radius: 5px 5px 0px 0px;">

    <div class="w-100 d-flex flex-wrap">
        @foreach($technology->branches as $branch)
        <div class="flex-grow-1 technology-card-header-color-branch" data-toggle="tooltip" data-placement="bottom" title="{{$branch->name}}" style="height: 10px; background-color: #{{$branch->color}}; @if(count($technology->branches)==1) border-radius: 5px 5px 0px 0px !important; @endif"></div>
        @endforeach
    </div>


</div>
