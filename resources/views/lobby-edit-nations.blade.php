
    <div class="p-4">
        <span class="display-5 border-0 bg-transparent fw-bold rounded-4 text-black">Národnosti - {{$lobby->name}}</span>

        <div id="nations_lobby_table" class="nations_table d-flex flex-wrap justify-content-between" lobby_id="{{$lobby->id}}">
            @include('lobby-edit-nations-table')
        </div>

    </div>




