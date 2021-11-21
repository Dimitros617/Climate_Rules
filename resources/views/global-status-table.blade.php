<div class="light-transparent justify-content-between rounded-5 w-70 p-5 pt-4 m-2 shadow-sm">

    <div class="d-flex justify-content-between pb-2 mb-3" >

        <table class="statistic_table w-100" style=" border-collapse: separate; ">
            <tr class="mb-2 pb-4 head">
                <th class="text-uppercase display-6 pb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-compass mb-2 animate-05 hover-size-01" viewBox="0 0 16 16">
                        <path d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                        <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z"/>
                    </svg>
                    Přehled
                </th>

                @foreach($statistics_types as $statistic_type)
                    <th class="pb-4 table-head-title text-center" style="writing-mode: vertical-rl; text-orientation: mixed;">{{$statistic_type->name}}</th>
                @endforeach
                <th class="pb-4 table-head-title text-center" style="writing-mode: vertical-rl; text-orientation: mixed;">Příjem</th>


            </tr>
            @foreach($nations as $nation)
            <tr class="rounded-4 overflow-hidden">
                <th class="cr-gradient fs-7 mb-2 p-3">{{$nation->name}}</th>

                @foreach($statistics_types as $statistic_type)
{{--                    $statistic_type->code_name--}}
                <th class="fs-7 text-center hover-size-01">@php $name = $statistic_type->code_name;  print_r( $nation->stats[0]->$name); @endphp</php><span class="fs-6"> </span></th>
                @endforeach

{{--                income count počítání příjmů--}}
                <th class="fs-7 text-center hover-size-01">@php echo ($nation->economy * $nation->tax) @endphp <span class="fs-6">M</span></th>
            </tr>
            @endforeach

        </table>

    </div>

</div>



