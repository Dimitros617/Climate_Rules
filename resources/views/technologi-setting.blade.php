


<div class="">

{{--    Technology id to tabulky technologies--}}
    <div id="technology-setting-id" technology_id="{{$technology->id}}"></div>
    <div class="fs-2 mb-4 mt-2 fw-bold pb-1 text-black d-grid" style="border-bottom: 2px solid black;">{{__('technology_settings')}} - {{$technology->code}}
    <span class="fs-5 mt-1 ">{{__($technology->name)}}</span>
    </div>

    <div id="technology-setting-image-gallery" class="images-gallery d-flex flex-wrap justify-center" style="min-height: 20rem" aria-placeholder="">

        @include('technologi-images-selector-gallery')

    </div>
    <div class="w-100 overflow-hidden">
        <div class="spinner-grow text-warning loading m-0" role="status" hidden></div>
        <div class="loading_request m-0 fw-bold text-su-orange " role="status" hidden></div>
    </div>
    <div class="images-add-bar w-100">
        <div class="input-group flex-wrap justify-center">
            <input id="technology-setting-new-img-url" type="url" class="form-control images-selector-url-input mb-2" style="min-width: 25rem;" placeholder="URL obrázku">
            <div class="input-group-append">
                <button class="btn  btn-primary m-0 ms-2" type="button" onclick="if(isUrlValidImage(document.getElementById('technology-setting-new-img-url').value)){setImage({{$technology->id}},document.getElementById('technology-setting-new-img-url').value)}">Vložit</button>
                <button class="btn  btn-success m-0 ms-2" type="button" onclick="this.parentNode.getElementsByClassName('images-selector-file-input')[0].click()" >Vybrat soubor</button>
                <form hidden>
                    @csrf
{{--                    Při změně nahrátí obrázku ho uploadnout--}}
                    <input type="file" name="img" class="images-selector-file-input" onchange="saveImage(this.parentNode)">
                </form>

            </div>
        </div>
    </div>
    <input type="text" id="image-selector-output" hidden>
</div>
