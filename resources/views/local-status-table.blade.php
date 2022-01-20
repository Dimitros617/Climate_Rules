
    <div class=" pb-2 mb-3 w-100 mx-auto" >

        <div class="text-uppercase display-6 pb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-compass mb-2 animate-05 hover-size-01" viewBox="0 0 16 16">
                <path d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z"/>
            </svg>
            Přehled
        </div>

        <div class="table-box">

            @foreach($my_table as $table_row)
                <div class="my_row d-flex flex-wrap flex-md-row d-md-inline-flex w-100 bg-white m-1 m-md-2 p-0 p-md-2 rounded-3 animate-05  justify-content-between">

                    <div class="head_statistic_type fw-bold w-content d-inline-flex p-3 mx-auto mx-md-0 mt-2 text-center">
                        <div class="w-content h-content" style="transform: scale(2)">@php echo htmlspecialchars_decode($table_row[0]->icon) @endphp</div>
                        <div class="ms-4">{{$table_row[0]->name}}</div>
                    </div>

                    <div class="w-100 w-lg-85    d-flex flex-wrap justify-content-center justify-content-md-between d-sm-inline-flex">
                        @for($i = 1; $i< count($table_row); $i++)
                            <div class=" rounded-3 p-2 m-1 fw-bold fs-4 text-center flex-lg-grow-1  @if($table_row[$i]->active == 1) cr-bg-blue @else bg-light @endif"
                            style="@if($table_row[$i]->first == 1)     border: 3px solid #659933 !important; @endif width: 3.5rem;">
                                {{$table_row[$i]->value}}
                            </div>
                        @endfor
                    </div>

                </div>
            @endforeach

        </div>

    </div>





