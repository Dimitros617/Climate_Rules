
<div class="column d-flex flex-wrap w-100 justify-content-around">

    <div class="rounded-4 bg-light shadow-sm w-15rem h-17rem  text-center p-4 d-grid cursor-pointer animate-05 hover-size-01 m-2">

        <label for="gas_count" class="text-start mt-4 mb-1 cr-green fw-bold">Celkem SP</label>
        <input name="gas_count" class="border-0 bg-white p-2 ps-4 pe-4 shadow-sm rounded-4 text-black w-100" disabled value="{{$count_gas}}">

        <label for="temperature_step" class="text-start mt-4 cr-green mb-1 fw-bold">Posun o 0,5 C</label>
        <input name="temperature_step" class="border-0 bg-white p-2 ps-4 pe-4 shadow-sm rounded-4 text-black w-100" disabled value="{{$temp_step}}">
    </div>

@foreach($nations as $nation)

    <div class="rounded-4 bg-light shadow-sm w-15rem h-17rem  text-center p-4 d-grid cursor-pointer animate-05 hover-size-01 m-2"
        table="nations"
        element_id="{{$nation->id}}"
    >
        <div class="d-flex flex-wrap justify-content-between mb-2" >
            <span class="fw-bold text-black">Hráč</span>
            <span class="cursor-pointer animate-05 hover-size-01 text-black" onclick="removeNation({{$nation->id}})">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                </svg>
            </span>
        </div>

        <div>
            <select class="border-0 bg-white p-2 ps-4 pe-4 shadow-sm rounded-4" onchange="saveNationFromTemplate('{{$nation->id}}', this.value)">
                <option selected value="-1">{{$nation->name}}</option>
                @foreach($nations_template as $nat_temp)
                    <option value="{{$nat_temp->id}}">
                        {{$nat_temp->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="text-end mt-3 ">
            <span>{{$nation->gasses}} SP</span>
        </div>

        <hr class="mt-1">

        <div class="text-start mb-2">
            <span class="text-start text-black fw-bold mb-2">Uživatel</span>
        </div>

        <div>
            <select class="border-0 bg-white p-2 ps-4 pe-4 shadow-sm rounded-4" onchange="saveNationsUser('{{$nation->id}}', this.value ,'refreshNationsEditList')">
                <option  value="-1">-----</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}" @if($user->id == $nation->user_id) selected @endif>
                        {{$user->id}}:  {{$user->nick}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>


@endforeach

    <div class="rounded-4 bg-light shadow-sm w-15rem h-17rem  text-center p-4 d-grid cursor-pointer animate-05 hover-size-01 m-2" onclick="addNation('{{$lobby->id}}')">
        <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi bi-plus-circle-fill cr-green ms-auto me-auto d-block mt-4" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
        </svg>
        <span class="cr-green fw-bold text-center mt-4">Nový stát / hráč</span>
    </div>
</div>



