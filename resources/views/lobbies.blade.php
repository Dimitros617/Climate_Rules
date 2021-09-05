@section('title','Climate rules')
@section('title_name',"Lobby")

<script src="/js/main.js"></script>
<script src="/js/lobby.js"></script>
<script src="/js/nations.js"></script>

<x-app-layout>
    <x-slot name="header">

    </x-slot>

{{--Context menu--}}

    @if(Auth::check() && Auth::permition()->admin == "1")
    <div id="contextMenu" class="context-menu" style="display: none">
        <ul class="menu">
            <li class="edit cursor-pointer"><a onclick="editLobby(window.last_context_element.getAttribute('element_id'))">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill me-2" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                    </svg>

                    Editovat
                </a>
            </li>

            <li class="nations cursor-pointer"><a onclick="editLobbyNations(window.last_context_element.getAttribute('element_id'))">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag-fill me-2" viewBox="0 0 16 16">
                        <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                    </svg>

                    Národnosti
                </a>
            </li>

            <li class="show cursor-pointer"><a onclick="changeElement(window.last_context_element.getAttribute('table'), 'visible', window.last_context_element.getAttribute('element_id'), ((parseInt(window.last_context_element.getAttribute('visible')) + 1) % 2), 'refreshLobbyList')">
                    <svg id="context-menu-show-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill me-2" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                    </svg>
                    <svg hidden id="context-menu-hide-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill me-2" viewBox="0 0 16 16">
                        <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                        <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                    </svg>
                    <span id="context-menu-show">Skrýt</span>
                </a>
            </li>

            <li class="trash cursor-pointer">
                <a onclick="removeElement(window.last_context_element.getAttribute('table'), window.last_context_element.getAttribute('element_id'), 'refreshLobbyList')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill me-2" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg>
                    Smazat
                </a>
            </li>
        </ul>
    </div>
    @endif

    <div class="lobbies-container light-transparent justify-content-between rounded-5 w-85 ms-auto me-auto d-block p-5">

        <div class="d-flex justify-content-between pb-2 mb-3" style="    border-bottom: 2px solid black;">
            <span class="display-5 "> Všechna lobby</span>
            @if(Auth::check() && Auth::permition()->admin == "1")
                <div onclick="addLobby()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#659933" class="bi bi-plus-circle-fill cr-green cursor-pointer mt-2 animate-05 hover-size-01" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg>
                </div>
            @endif
        </div>

        {{--TODO style--}}

        <div id="lobby-list-div" class="justify-content-center" style=" display: flex; flex-wrap: wrap">
            @include('lobbies-list')
        </div>
    </div>



</x-app-layout>
