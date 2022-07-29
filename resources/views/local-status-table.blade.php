
    <div class=" pb-2 mb-3 w-100 mx-auto" >

        <input type="number" id="change-statistic-types-nation-id" value="{{$my_nation->id}}" hidden>
        <div class="text-uppercase display-6 pb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-compass mb-2 animate-05 hover-size-01" viewBox="0 0 16 16">
                <path d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z"/>
            </svg>
            {{__('overview')}}
        </div>

        <div class="table-box">

            @foreach($my_table as $table_row)
                <div class="my_row d-flex flex-wrap flex-md-row d-md-inline-flex w-100 bg-white m-1 m-md-2 p-1 p-md-2 rounded-3 animate-05 mb-4 justify-content-between"
                statistic_type_code = "{{$table_row[0]->code_name}}">

                    <div class="head_statistic_type fw-bold w-content d-inline-flex p-3 mx-auto mx-md-0 mt-2 text-center fs-4 fs-md-5">
                        <div class="d-inline-flex">
                            <div class="w-content h-content" style="transform: scale(2)">@php echo htmlspecialchars_decode($table_row[0]->icon) @endphp</div>
                            <div class="ms-4">{{__($table_row[0]->name)}}</div>
                        </div>
                        <div>
                        @if($edit_tax == 0 && $table_row[0]->code_name == 'tax')
                            <div class="ms-5 hover-size-01 cursor-pointer animate-02" style="transform: scale(1.3)" onclick="changeNationTax()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </div>
                        @endif
                        </div>
                    </div>

                    <div class="w-100 w-xl-85    d-flex flex-wrap justify-content-center justify-content-md-between d-sm-inline-flex">
                        @php
                            $active_index = -1;
                        @endphp
                        @for($i = 1; $i< count($table_row); $i++)
                            @php
                            if($table_row[$i]->active == 1){
                                $active_index = $table_row[$i]->index;
                            }
                            @endphp
                            <div class=" rounded-3 p-2 m-1 fw-bold fs-4 text-center flex-lg-grow-1 flex-1 @if(Auth::check() && Auth::permition()->admin == "1") cursor-pointer animate-02 hover-size-01 @endif  @if($table_row[$i]->active == 1) cr-bg-blue @else bg-light @endif"
                            style="@if($table_row[$i]->first == 1)     border: 3px solid #659933 !important; @endif width: 3.5rem;"
                            onclick="
                                this.parentNode.getElementsByClassName('statisic-type-admin-change')[0].value = {{$table_row[$i]->index}};
                                this.parentNode.parentNode.parentNode.getElementsByClassName('statisic-type-admin-change-button')[0].removeAttribute('hidden');
                                changeNationTaxButton(this)">
                                {{$table_row[$i]->value}}
                            </div>
                        @endfor
                        <input hidden type="number" class="statisic-type-admin-change"  statistic-type-code="{{$table_row[0]->code_name}}" last-value="{{$active_index}}" value="{{$active_index}}">
                    </div>

                </div>
            @endforeach
            @if(Auth::check() && Auth::permition()->admin == "1")
                <div class="d-flex justify-content-center mt-2 statisic-type-admin-change-button" hidden>
                    <button class="btn btn-primary p-3 px-5" onclick="changeNationStatisticTypes(this.parentNode.parentNode, {{$my_nation->id}})">{{__('save_changes')}}</button>
                </div>
            @endif
        </div>

    </div>





