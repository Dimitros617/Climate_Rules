



    @foreach($lobbies as $lobby)

        @if($lobby->visible == 0 && (Auth::check() && Auth::permition()->admin != "1"))
            @continue
        @endif


        <div class=" m-3 rounded-4 bg-white w-40rem d-flex  justify-content-between overflow-hidden shadow-sm "
             type="lobby"
             table="lobbies"
             id="lobby_{{$lobby->id}}"
             element_id="{{$lobby->id}}"
             visible="{{$lobby->visible}}"
             style="min-width: 30rem"
        >
            <div class="d-grid p-4">
                <span class="display-6 fw-bold">{{$lobby->name}}</span>
                <span>@php echo explode(' ',$lobby->play_date)[0]; @endphp</span>
                <span>{{$lobby->description}}</span>
            </div>

            <div class="@if($lobby->visible == '1') cr-bg-green @else bg-gray @endif w-5rem d-flex ps-3 animate-05 hover-ps-3 cursor-pointer"
            onclick="enterLobby('{{$lobby->id}}')"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-chevron-right text-white align-self-center" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </div>
        </div>

    @endforeach


