
@if($nation_status->code == 'certificate')

    <div>
        <button type="button" class="btn btn-primary w-100 text-uppercase" onclick="changeNationToTechnologyStatus(this,{{$technology->id}},{{$nation_status->nation_id}})"> {{$nation_status->name}}</button>
        <button type="button" class="btn btn-secondary w-100 text-uppercase mt-1 text-small" onclick="showTechnologyCertificateForm({{$technology->id}}, {{$nation_status->nation_id}})">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
            Zobrazit formulář
        </button>
    </div>

@else

    <button type="button" class="btn btn-primary w-100 h-100 text-uppercase" onclick="changeNationToTechnologyStatus(this,{{$technology->id}},{{$nation_status->nation_id}})"> {{$nation_status->name}}</button>

@endif
