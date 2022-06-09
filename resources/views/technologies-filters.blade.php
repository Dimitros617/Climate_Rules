<form id="search-form" onsubmit="return false;">
    <div class="w-100 justify-content-end d-flex">

        <div class="card-body row no-gutters align-items-center h-4rem">

            <div class="col">
                <input name="search" class="filter-search form-control-borderless p-3 fs-4 z-50  rounded-3 overflow-hidden fs-5 shadow-sm" id="search" type="search" placeholder="{{__('enter_a_search_term')}}">

            </div>


            <div class="col-auto searchButtonDiv">


                        <span data-toggle="tooltip" data-placement="bottom" title="{{__('search')}}" onclick="filterAll('search-form')">
                            <svg class=" cr-blue animate-02 hover-size-01 cursor-pointer me-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="3rem" width="3rem" viewBox="0 0 24 24"  ><path d="M0 0h24v24H0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                        </span>
                <span onclick="swapCardAndRow('card-row-container','card-box-container', this)" active="0" class="card-row-swap">
                            <svg  class=" text-muted animate-02 hover-size-01 cursor-pointer" height="2rem" width="2rem" fill="currentColor" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"  viewBox="0 0 24 24" >
                                <rect fill="none" height="24" width="24"/>
                                <path
                                    d="M3,17v-2c0-1.1,0.9-2,2-2h14c1.1,0,2,0.9,2,2v2c0,1.1-0.9,2-2,2H5C3.9,19,3,18.1,3,17z M3,7v2c0,1.1,0.9,2,2,2h14 c1.1,0,2-0.9,2-2V7c0-1.1-0.9-2-2-2H5C3.9,5,3,5.9,3,7z"/>
                            </svg>
                        </span>
                {{--        Karty--}}
                <span onclick="swapCardAndRow('card-box-container', 'card-row-container', this)" active="1" class="card-row-swap">
                            <svg  class=" text-muted animate-02 hover-size-01 cursor-pointer" height="2rem" width="2rem" fill="currentColor" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <rect fill="none" height="24" width="24"/>
                            <g>
                                <path
                                    d="M14.67,6v4.5c0,0.55-0.45,1-1,1h-3.33c-0.55,0-1-0.45-1-1V6c0-0.55,0.45-1,1-1h3.33C14.22,5,14.67,5.45,14.67,6z M16.67,11.5H20c0.55,0,1-0.45,1-1V6c0-0.55-0.45-1-1-1h-3.33c-0.55,0-1,0.45-1,1v4.5C15.67,11.05,16.11,11.5,16.67,11.5z M14.67,18v-4.5c0-0.55-0.45-1-1-1h-3.33c-0.55,0-1,0.45-1,1V18c0,0.55,0.45,1,1,1h3.33C14.22,19,14.67,18.55,14.67,18z M15.67,13.5V18c0,0.55,0.45,1,1,1H20c0.55,0,1-0.45,1-1v-4.5c0-0.55-0.45-1-1-1h-3.33C16.11,12.5,15.67,12.95,15.67,13.5z M7.33,12.5H4c-0.55,0-1,0.45-1,1V18c0,0.55,0.45,1,1,1h3.33c0.55,0,1-0.45,1-1v-4.5C8.33,12.95,7.89,12.5,7.33,12.5z M8.33,10.5V6 c0-0.55-0.45-1-1-1H4C3.45,5,3,5.45,3,6v4.5c0,0.55,0.45,1,1,1h3.33C7.89,11.5,8.33,11.05,8.33,10.5z"/>
                            </g>
                            </svg>
                       </span>
            </div>

        </div>
        {{--        Řádky--}}


    </div>

    <div class="filter-statistic-type-box w-100 p-2 mt-3 d-flex flex-wrap justify-content-center justify-content-md-between">

        @foreach($statistics_types as $stat)
            <div class="filter-statistic-type d-inline-flex bg-white rounded-3 m-2 p-3 flex-lg-grow-1 shadow-sm" code="{{$stat->code_name}}">
                <div class="w-25 me-3 hover-size-01 animate-05" data-toggle="tooltip" data-placement="bottom" title="{{__($stat->name)}}">
                    <div class="w-content mt-3 ms-3 z-0" style="transform: scale(2.5)">@php echo htmlspecialchars_decode($stat->icon) @endphp</div>
                </div>
                <div class=" w-75 form-check form-switch d-grid text-center justify-content-center p-0 pt-2">
                    <input onchange="filterAll('search-form')" style="transform: scale(1.2)" class="form-check-input m-0 p-0 ms-1" checked type="checkbox" role="switch" name="{{$stat->code_name}}" id="flexSwitchCheckDefault">
                    <label class="form-check-label mt-1 fw-bold" style=" font-size: 10px" for="flexSwitchCheckDefault">{{__($stat->name)}}</label>
                </div>
            </div>
        @endforeach
    </div>

    <div>
        <div class="w-100 z-50 d-flex justify-content-end">
                    <span class="cursor-pointer text-end p-2 me-3 fw-bold text-muted" onclick="showAndHideElement(this.parentNode.parentNode,'advance-filter')">
                        <span>{{__('advanced_filters')}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-down animate-05 hover-size-01 show" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-up hide" viewBox="0 0 16 16" hidden="">
                            <path fill-rule="evenodd" d="M7.776 5.553a.5.5 0 0 1 .448 0l6 3a.5.5 0 1 1-.448.894L8 6.56 2.224 9.447a.5.5 0 1 1-.448-.894l6-3z"/>
                        </svg>
                    </span>
        </div>
        <div class="advance-filter" hidden>
            <div class="w-100 p-2 mt-3 d-flex flex-wrap justify-content-center justify-content-md-between">

                <div class="d-inline-flex bg-white rounded-3 m-2 p-3 flex-lg-grow-1 shadow-sm">
                    <div class=" text-center justify-content-center w-100">
                        <label class="fs-4 fw-bold w-100 text-center">{{__('focus')}}</label>
                        <select onchange="filterAll('search-form')" class="filter-branch form-select w-100" aria-label="Default select example">
                            <option selected value="-">{{__('not_selected')}}</option>
                            @foreach($branches as $branch)
                                <option value="{{__($branch->name)}}">{{__($branch->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-inline-flex bg-white rounded-3 m-2 p-3 flex-lg-grow-1 shadow-sm">
                    <div class=" text-center justify-content-center w-100">
                        <label class="fs-4 fw-bold w-100 text-center">{{__('area')}}</label>
                        <select onchange="filterAll('search-form')" class="filter-areas form-select w-100" aria-label="Default select example">
                            <option selected value="-">{{__('not_selected')}}</option>
                            @foreach($areas as $area)
                                <option value="{{__($area->name)}}">{{__($area->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="filter-price d-inline-flex bg-white rounded-3 m-2 p-3 flex-lg-grow-1 shadow-sm">
                    <div class=" text-center justify-content-center w-25">
                        <label class="fs-4 fw-bold w-100 text-center">{{__('price')}}</label>
                        <select onchange="filterAll('search-form')" class="filter-price-sort form-select w-100" aria-label="Default select example">
                            <option selected value="-" disabled>{{__('unsorted')}}</option>
                            <option  value="-1">{{__('descending')}}</option>
                            <option  value="1">{{__('ascending')}}</option>

                        </select>
                    </div>
                    <div class="inline-flex w-75 p-4 ">
                        @php
                            $max_price = -1;
                            foreach ($allTechnologies as $technology){
                                if($technology->price > $max_price){
                                    $max_price = $technology->price;
                                }
                            }
                        @endphp
                        <span class="fs-3 fw-bold">0</span>
                        <input onchange="filterAll('search-form')" class="range w-70 animate-05" type="range" min="0" max="{{$max_price}}" value="{{$max_price}}" oninput="this.parentNode.getElementsByClassName('number')[0].value = this.value">
                        <input onchange="filterAll('search-form')" type="number" min="0" max="{{$max_price}}" class="filter-price-border number fs-3 fw-bold bg-transparent border-none" style="width: 3.3rem" value="{{$max_price}}" onchange="this.parentNode.getElementsByClassName('range')[0].value = this.value">
                    </div>
                </div>

            </div>
            <div class="w-100 p-2 mt-1 d-flex flex-wrap justify-content-center justify-content-md-between">

                <div class="d-inline-flex bg-white rounded-3 m-2 p-4 flex-lg-grow-1 shadow-sm">
                    <div class="w-25 me-3 hover-size-01 animate-05" data-toggle="tooltip" data-placement="bottom" title="{{__('show_also_technologies')}}">
                        <div class="w-content mt-4 ms-4 z-0" style="transform: scale(2.5)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg>
                        </div>
                    </div>
                    <div class=" d-grid w-75 form-check form-switch  text-center justify-content-center p-0 ">
                        <input onchange="filterAll('search-form')" style="transform: scale(1.2)" class="filter-work form-check-input m-0 p-0 ms-1" checked type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label mt-1 fw-bold fs-5"  for="">{{__('someone_is_working_on_this')}}</label>
                    </div>
                </div>

                <div class="d-inline-flex bg-white rounded-3 m-2 p-4 flex-lg-grow-1 shadow-sm">
                    <div class="w-25 me-3 hover-size-01 animate-05" data-toggle="tooltip" data-placement="bottom" title="{{__('already_patented')}}">
                        <div class="w-content mt-4 ms-4 z-0" style="transform: scale(2.5)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="d-grid w-75 form-check form-switch  text-center justify-content-center p-0 ">
                        <input onchange="filterAll('search-form')" style="transform: scale(1.2)" class="filter-active form-check-input m-0 p-0 ms-1" checked type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label mt-1 fw-bold fs-5"  for="">{{__('patented_by_someone')}}</label>
                    </div>
                </div>

                <div class="d-inline-flex bg-white rounded-3 m-2 p-4 flex-lg-grow-1 shadow-sm">
                    <div class="d-grid w-75 form-check form-switch  text-center justify-content-center p-0">
                        <input onchange="filterAll('search-form')" style="transform: scale(1.2)" class="filter-round form-check-input m-0 p-0 ms-1" checked type="checkbox" role="switch" id="flexSwitchCheckDefault" disabled>
                        <label class="form-check-label mt-1 fw-bold fs-5" for="">{{__('divide_by_rounds')}}</label>
                    </div>
                </div>

            </div>
        </div>

    </div>
</form>
