



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
            <div class="d-grid p-4" type="lobbyChild">
                <span type="lobbyChild" class="display-6 fw-bold">{{$lobby->id}}) {{$lobby->name}}</span>
                <span type="lobbyChild">@php echo explode(' ',$lobby->play_date)[0]; @endphp</span>
                <span type="lobbyChild">{{$lobby->description}}</span>
            </div>

            @if(Auth::check() && Auth::permition()->admin == "1")
                <div class="@if($lobby->visible == '1') cr-bg-green @else bg-gray @endif w-5rem d-flex ps-3 animate-05 hover-ps-3 cursor-pointer"
                onclick="enterLobby('{{$lobby->id}}')"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-chevron-right text-white align-self-center" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </div>
            @else
                <div class="@if($lobby->openForMe == '1') cr-bg-green @else bg-gray @endif w-5rem d-flex ps-3 animate-05 hover-ps-3 cursor-pointer"
                     onclick="enterLobby('{{$lobby->id}}')"
                >
                    @if($lobby->openForMe == '1')
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-chevron-right text-white align-self-center" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-lock-fill text-white align-self-center" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                        </svg>
                    @endif
                </div>
            @endif
        </div>

    @endforeach


