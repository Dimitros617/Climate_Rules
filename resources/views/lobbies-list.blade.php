

<div class="lobbies-container light-transparent rounded-5 w-75 ms-auto me-auto d-block p-5">

    <div class="d-flex justify-content-between pb-2" style="    border-bottom: 2px solid black;">
    <span class="display-5 "> Všechna lobby</span>
        @if(Auth::permition()->admin == "1")
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#659933" class="bi bi-plus-circle-fill cr-green cursor-pointer mt-2 animate-05 hover-size-01" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
            </svg>
        </div>
        @endif
    </div>

</div>
