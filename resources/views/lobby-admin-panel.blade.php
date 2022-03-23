
@if(Auth::permition()->admin ==1)
<div id="admin-panel-box" class="bg-light d-flex position-fixed justify-content-between shadow-lg overflow-hidden"
     style="border-radius: 0 0.5rem 0.5rem 0 ; z-index: 800;"
onload="dragElement(this)">

    <div  class="admin-panel-box-setting w-90 d-flex  justify-content-between p-2 ms-4 me-3" hidden>
        {{--    users--}}
        <div class="d-grid m-2 text-center bg-white rounded-3 p-4">
            <span class="fs-7 fw-bold mb-2">Uživatel</span>
            <span onload="getLobbyUsers(this)">
                <select onchange="setUserClone(this.value)" class="admin-box-user-select">
                </select>
            </span>
        </div>

        {{--    Fáze hry--}}

        <div class="d-grid m-2 text-center bg-white rounded-3 p-4">
            <span class="fs-7 fw-bold mb-2">Fáze hry</span>
            <span >
                <select class="admin-box-phase-select">

                </select>
            </span>
        </div>

        {{--    Kolo--}}
        <div class="d-grid m-2 text-center bg-white rounded-3 p-4">
            <span class="fs-7 fw-bold mb-2">Kolo: <span onload="getCountRounds(this)"></span></span>
            <span>
                <button type="button" class="btn btn-primary" onclick="addRound(document.getElementById('lobby-id').getAttribute('lobbyId'))">Další kolo</button>
            </span>

        </div>

        {{--    Teplota--}}
        <div class="d-grid m-2 text-center bg-white rounded-3 p-4">
            <span class="fs-7 fw-bold mb-2"> Skleníkové plyny a Teplota</span>

            <div class="d-inline-flex">
                <input hidden disabled id="temperature_step" onload="loadActualGasStep(this)" type="number" class="border-0 bg-white px-2  pe-1 rounded-4 text-black w-70" default_value="0"  value="0">

                <div class="border-0 bg-light p-2  shadow-sm rounded-4 text-black d-inline-flex w-100">
                    <input id="temperature_start_gasses" onfocusout="editAdminLobbyStartTemperature(this)" onload="loadActualGass(this)" type="number" class="border-0 bg-light px-2  pe-1 rounded-4 text-black w-4rem" default_value="0"  value="0">
                    <span class="w-30 pt-1 pe-1">SP</span>
                </div>
                <div class="mx-2 text-black fw-bold fs-3">=</div>
                <div class="border-0 bg-light p-2 shadow-sm rounded-4 text-black d-inline-flex w-100">
                    <input id="temperature_start_temperature" onfocusout="editAdminLobbyStartTemperature(this)" onload="loadActualTemperature(this)"  type="number" class="border-0 bg-light px-2  pe-1 rounded-4 text-black w-4rem" default_value="0"  value="0">
                    <span class="w-30 pt-0 pe-1">°C</span>
                </div>
            </div>

        </div>

    </div>

    <div  id="admin-panel-box-header" class="bg-red w-3rem p-2 justify-content-center fw-bold text-white d-flex animate-05 hover-size-01 cursor-pointer min-h-5rem"
    onclick=" showAndHideElement(this.parentNode, 'admin-panel-box-setting')" >


            <svg hidden="" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="hide bi bi-chevron-compact-left align-self-center animate-05 hover-size-01" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M9.224 1.553a.5.5 0 0 1 .223.67L6.56 8l2.888 5.776a.5.5 0 1 1-.894.448l-3-6a.5.5 0 0 1 0-.448l3-6a.5.5 0 0 1 .67-.223z"/>
            </svg>


            <svg  xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="show bi bi-chevron-compact-right align-self-center animate-05 hover-size-01" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z"/>
            </svg>


    </div>
</div>
@endif
