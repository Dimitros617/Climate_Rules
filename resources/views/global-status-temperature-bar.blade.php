<div class="d-grid overflow-hidden" onload="setTemperatureBar(this, {{$lobby->gas_step}}); setTemperatureActualValue({{$lobby->gas_step}},'32')">
    <div class="temperature_labels d-flex flex-wrap justify-content-between text-center fw-bold">
        <span class="flex-grow-1 fw-bold fs-7 text-start"><span id="temperature-bar-actual-temp">5</span> °C</span>
    </div>
    <div class="temp-line d-flex flex-wrap justify-content-between text-center fw-bold">
        <span id="temperature-bar-step-line" class="flex-grow-1 h-5px temp-bg-color-0"></span>
        <span id="temperature-bar-actual-pointer" class="temperature-bar-actual-pointer position-absolute animate-05 " data-title="Aktuální hodnota SP"  style="margin-top: -10px; opacity: 0.9">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                <circle cx="8" cy="8" r="8"/>
            </svg>
        </span>
    </div>
    <div class="gasses_labels d-flex flex-wrap justify-content-between text-center text-black">
        <span class="flex-grow-1 fw-bold fs-7 text-start"><span id="temperature-bar-actual-gas">5</span> SP</span>
    </div>

</div>
