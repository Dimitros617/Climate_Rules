<div class="light-transparent justify-content-between rounded-5 w-70 p-5 pt-4 m-2 shadow-sm">

    <div class="d-flex justify-content-between pb-2 mb-3" >

        <table class="statistic_table w-100" style=" border-collapse: separate; ">
            <tr class="mb-2 pb-4 head">
                <th class="text-uppercase display-6 pb-4"> Přehled </th>
                <th class="pb-4 table-head-title text-center" style="writing-mode: vertical-rl; text-orientation: mixed;">Ekonomie</th>
                <th class="pb-4 table-head-title text-center" style="writing-mode: vertical-rl; text-orientation: mixed;">Daň</th>
                <th class="pb-4 table-head-title text-center" style="writing-mode: vertical-rl; text-orientation: mixed;">Nálada</th>
                <th class="pb-4 table-head-title text-center" style="writing-mode: vertical-rl; text-orientation: mixed;">Věk</th>
                <th class="pb-4 table-head-title text-center" style="writing-mode: vertical-rl; text-orientation: mixed;">Skl. Plyny</th>
                <th class="pb-4 table-head-title text-center" style="writing-mode: vertical-rl; text-orientation: mixed;">Příjem</th>

            </tr>
            @foreach($nations as $nation)
            <tr class="rounded-4 overflow-hidden">
                <th class="cr-gradient fs-7 mb-2 p-3">{{$nation->name}}</th>
                <th class="fs-7 text-center hover-size-01" data-title="Level ekonomie: @php echo floor($nation->economy / 20)+1 @endphp">{{$nation->economy}}<span class="fs-6"> %</span></th>
                <th class="fs-7 text-center hover-size-01">{{$nation->tax}}<span class="fs-6"> %</span></th>
                <th class="fs-7 text-center hover-size-01">{{$nation->happiness}}<span class="fs-6"> %</span></th>
                <th class="fs-7 text-center hover-size-01">{{$nation->health}} <span class="fs-6">let</span></th>
                <th class="fs-7 text-center hover-size-01">{{$nation->gasses}} <span class="fs-6">CO<sub>2</sub></span></th>
                <th class="fs-7 text-center hover-size-01">@php echo ($nation->economy * $nation->tax) @endphp <span class="fs-6">M</span></th>
            </tr>
            @endforeach

        </table>

    </div>

</div>



