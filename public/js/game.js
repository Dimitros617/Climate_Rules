

function setTemperatureBar(ele, step){

    if(step == 0){
        ele.getElementsByClassName("temperature_labels")[0].innerHTML = "Juuu... Nastala chyba při vytváření grafu, krok je nastaven na 0 (gass_step v lobbies)";
        return;
    }
    let temp = 0;
    let gas_step = 0;
    while (temp <= 8){

        let span_temp = document.createElement('span');
        span_temp.innerHTML = '+' + temp;
        span_temp.classList.add('flex-grow-1');
        span_temp.classList.add('temp-color-'+ (Math.ceil(temp/2)));
        ele.getElementsByClassName("temperature_labels")[0].appendChild(span_temp);

        let span_temp_bar = document.createElement('span');

        span_temp_bar.classList.add('flex-grow-1');
        span_temp_bar.classList.add('h-5px');
        span_temp_bar.classList.add('temp-bg-color-'+ (Math.ceil(temp/2)));
        ele.getElementsByClassName("temp-line")[0].appendChild(span_temp_bar);

        let span_gas = document.createElement('span');
        span_gas.innerHTML = gas_step;
        span_gas.classList.add('flex-grow-1');
        ele.getElementsByClassName("gasses_labels")[0].appendChild(span_gas);

        temp += 0.5;
        gas_step += step;

    }

}

function setTemperatureActualValue(gass_step, gasses = 0){

    let pointer = document.getElementById('temperature-bar-actual-pointer');
    let step = document.getElementById('temperature-bar-step-line').offsetWidth ;

    if(gasses == 0){
        gasses = 1;
        pointer.style.paddingLeft = step + '%';
    }

    pointer.style.paddingLeft = step + (gasses/gass_step) * step + 'px';


    document.getElementById('temperature-bar-actual-temp').innerHTML = '+' + (0.5 * (gasses/gass_step)).toFixed(1);
    document.getElementById('temperature-bar-actual-gas').innerHTML = gasses;


    document.getElementById('temperature-bar-actual-temp-icon').setAttribute('class','temp-color-'+ (Math.ceil((0.5 * (gasses/gass_step)/2))));


}


/**
 *
 * @param id = lobbyID
 */
function updateTemperatureActualValue(id){

    showLoading();
    $.ajax({
        url: '/updateTemperatureActualValue/'+id,
        type: 'get',

        success:function(response){
            hideLoading();
            let a = response;
            //TODO - převzít a zavolat metodu setTemperatureActualValue
            //setTemperatureActualValue(response->gass_step, response->gasses)
        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });


}

/**
 *
 * @param id = lobbyID
 */
function updateGlobalTable(id){

    showLoading();
    $.ajax({
        url: '/updateGlobalTable/'+id,
        type: 'get',

        success:function(response){
            hideLoading();
            document.getElementById('status-table-container').innerHTML = response;


        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });

}
