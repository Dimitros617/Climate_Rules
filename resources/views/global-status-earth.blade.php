<div class="light-transparent  rounded-5 w-25  p-2 m-2 d-grid text-center shadow-sm">
    <span class="display-4 fw-bold text-center  mt-2 mb-1">@php $year = (date("Y"))+((count($rounds)-1)*20); echo $year; @endphp</span>
    <span class="text-center mt--1  mb--1 text-uppercase">aktuální rok</span>

        @include('earth')

    <div class="d-flex flex-wrap justify-content-between p-2 ps-4">
                    <span data-toggle="tooltip" data-placement="bottom" title="Fáze hry: {{$lobby_phase->name}}" class="scale-200 p-2">
                        @php echo htmlspecialchars_decode($lobby_phase->icon) @endphp
                    </span>
        <span class="fs-5">
                       <b> @php echo count($rounds); @endphp.</b> kolo
                    </span>
    </div>

</div>
