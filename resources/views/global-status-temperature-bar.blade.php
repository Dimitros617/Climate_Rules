<div class="d-flex flex-wrap justify-content-between">
    <div class="animate-05 hover-size-01">
        <svg id="temperature-bar-actual-temp-icon" xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="" viewBox="0 0 16 16">
            <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V6.5a.5.5 0 0 1 1 0v4.585a1.5 1.5 0 0 1 1 1.415z"/>
            <path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1z"/>
        </svg>
    </div>

    <div class="d-grid w-95" onload="setTemperatureBar(this, {{$lobby->gas_step}}); setTemperatureActualValue({{$lobby->gas_step}}, @if(count($rounds) != 0){{$last_round->gases}}@endif )">
        <div class="temperature_labels d-flex flex-wrap justify-content-between text-center fw-bold">
            <span class="flex-grow-1 fw-bold fs-7 text-start" data-toggle="tooltip" data-placement="bottom" title="Auktuální teplota"><span id="temperature-bar-actual-temp">Počítám...</span> °C</span>
        </div>
        <div class="temp-line d-flex flex-wrap justify-content-between text-center fw-bold">
            <span id="temperature-bar-step-line" class="flex-grow-1 h-5px temp-bg-color-0"></span>
            <span id="temperature-bar-actual-pointer" class="temperature-bar-actual-pointer position-absolute animate-05 " data-toggle="tooltip" data-placement="bottom" title="Aktuální hodnota"  style="margin-top: -10px; opacity: 0.9" onclick="updateTemperatureActualValue({{$lobby->id}})">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>
            </span>
        </div>
        <div class="gasses_labels d-flex flex-wrap justify-content-between text-center text-black">
            <span class="flex-grow-1 fw-bold fs-7 text-start" data-toggle="tooltip" data-placement="bottom" title="Auktuální skleníkové plyny"><span id="temperature-bar-actual-gas">...</span> SP</span>
        </div>

    </div>
</div>
