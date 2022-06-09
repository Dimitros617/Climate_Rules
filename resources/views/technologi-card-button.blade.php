


    @php
        $ret = "" . __('buy');
        $ret_code = 'new';
        if(count($technology->nations_status) != 0){

            foreach ($technology->nations_status as $nation_stat){
                if($nation_stat->nation_id == $my_nation->id){
                    $ret = $nation_stat->name;
                    $ret_code = $nation_stat->code;
                }
            }
        }
    @endphp



    @if($ret_code == 'certificate')


            <button type="button" class="btn btn-primary w-100 h-100 text-uppercase" onclick="changeNationToTechnologyStatus(this,{{$technology->id}})">{{$ret}}</button>

            <button type="button" class="btn btn-secondary w-100 h-100 text-uppercase mt-1 text-small" onclick="showTechnologyCertificateForm({{$technology->id}}, {{$my_nation->id}})">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
                {{__('view_the_form')}}
            </button>


    @elseif($ret_code == 'active')
{{--        Nevykreslovat nic, žádné tlačítko--}}
    @else

        <button type="button" class="btn btn-primary w-100 h-100 text-uppercase" onclick="changeNationToTechnologyStatus(this,{{$technology->id}})">{{$ret}}</button>

    @endif
