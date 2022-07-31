


function thHoverOn(ele){

    let svg = ele.getElementsByClassName('bi');

    for(let s of svg){
        s.setAttribute('display','');
    }

}


function thHoverOff(ele){

    let svg = ele.getElementsByClassName('bi');

    for(let s of svg){
        s.setAttribute('display','none');
    }

}


function increaseValue(nationId, statisticTypeCode){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');


    $.ajax({
        url: '/increaseValue',
        type: 'post',
        data: { _token: token, nationId: nationId, statisticTypeCode: statisticTypeCode, step: 1},
        success:function(response){
            hideLoading();

            let table = document.getElementById('status-table-container');
            if(table != undefined){
                updateGlobalTable(table.getAttribute('lobbyId'));
            }
        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText;
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });
}

function decreaseValue(nationId, statisticTypeCode){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');


    $.ajax({
        url: '/decreaseValue',
        type: 'post',
        data: { _token: token, nationId: nationId, statisticTypeCode: statisticTypeCode, step: 1},
        success:function(response){
            hideLoading();

            let table = document.getElementById('status-table-container');
            if(table != undefined){
                updateGlobalTable(table.getAttribute('lobbyId'));
            }

        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText;
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });
}



function addRound(lobby_id){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');


    $.ajax({
        url: '/addRound',
        type: 'post',
        data: { _token: token, lobby_id: lobby_id, response: 0},
        success:function(response){
            hideLoading();

            Swal.fire({
                html: response,
                showCloseButton: false,
                showCancelButton: false,
                showConfirmButton: true,
                showDenyButton: true,
                confirmButtonText: Lang.get('js_messages.confirm'),
                denyButtonText: Lang.get('js_messages.cancel'),
                focusConfirm: false,
                customClass: 'w-50',

            }).then((result) => {
                if (result.isConfirmed) {

                    showLoading();

                    let add_income = document.getElementsByClassName('next-round-add-income')[0].checked ? 1 : 0;

                    $.ajax({
                        url: '/addRound',
                        type: 'post',
                        data: { _token: token, lobby_id: lobby_id, response: 1, add_income: add_income},
                        success:function(response){
                            hideLoading();
                            location.reload();
                            // Swal.fire({
                            //     icon: 'success',
                            //     title: 'Odesláno',
                            //     text: 'Vaše platba byla úspěšně zpracována.',
                            // })
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
                else if(result.isDenied){

                }
                else{

                }

            })


        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText;
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });

}

function getCountRounds(ele, lobbyID = document.getElementById('lobby-id').getAttribute('lobbyID')){

    $.ajax({
        url: '/getCountRounds/' + lobbyID,
        type: 'get',
        success:function(response){
            ele.innerHTML = response;

        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText;
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });

}

function getLobbyUsers(ele, lobbyID = document.getElementById('lobby-id').getAttribute('lobbyID')){

    $.ajax({
        url: '/getLobbyUsers/' + lobbyID,
        type: 'get',
        success:function(response){

            for(let user of response){
                let nick = user['nick'];
                let id = user['id'];

                let option = document.createElement('option');
                option.setAttribute('value', id);
                option.innerHTML = nick;
                if(user['checked'] == 1){
                    option.setAttribute('selected','')
                }
                ele.getElementsByClassName('admin-box-user-select')[0].appendChild(option);
            }



        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText;
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });

}


/**
 *
 * @param userID - id uživatele kterého chceme klonovat
 * @param lobbyID - id lobby kterého se to týká
 */
function setUserClone(userId,  lobbyId = document.getElementById('lobby-id').getAttribute('lobbyID')){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');


    $.ajax({
        url: '/setUserClone',
        type: 'post',
        data: { _token: token, lobbyId: lobbyId, userID: userId},
        success:function(response){

            document.location.reload(true);

        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText;
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });

}


function getPhases(ele, lobbyID = document.getElementById('lobby-id').getAttribute('lobbyID')){

    $.ajax({
        url: '/getPhases/' + lobbyID,
        type: 'get',
        success:function(response){

            for(let phases of response){
                let name = phases['name'];
                let id = phases['id'];

                let option = document.createElement('option');
                option.setAttribute('value', id);
                option.innerHTML = name;
                if(phases['checked'] == 1){
                    option.setAttribute('selected','')
                }
                ele.getElementsByClassName('admin-box-phases-select')[0].appendChild(option);
            }



        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText;
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });

}

function setPhases(phaseId, lobbyId = document.getElementById('lobby-id').getAttribute('lobbyID')){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');


    $.ajax({
        url: '/setPhases',
        type: 'post',
        data: { _token: token, lobbyId: lobbyId, phaseId: phaseId},
        success:function(response){

            document.location.reload(true);

        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText;
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });

}

function getEditNationStatisticTypes(nation_id){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');
    let lobby_id = document.getElementById('lobby-id').getAttribute('lobbyId');

    $.ajax({
        url: '/getEditNationStatisticTypes/'+ nation_id,
        type: 'get',
        success:function(response){
            hideLoading();

            Swal.fire({
                html: response,
                showCloseButton: false,
                showCancelButton: false,
                showConfirmButton: false,
                showDenyButton: false,
                focusConfirm: false,
                customClass: 'w-90',

            }).then((result) => {
                if (result.isConfirmed) {


                }
                else if(result.isDenied){

                }
                else{

                }

            })


        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText;
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });

}

function changeNationStatisticTypes(table_box, nation_id){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');


    statistic_types = [];

    for (let i = 0; i < table_box.children.length-1; i++){
        let move_value = table_box.children[i].getElementsByClassName('statisic-type-admin-change')[0];
        let code_name = move_value.getAttribute('statistic-type-code');
        move_value = move_value.value - move_value.getAttribute('last-value');
        statistic_types.push({statistic_type_code_name: code_name, move: move_value, nation_id: null })
    }


    $.ajax({
        url: '/changeNationStatisticTypes',
        type: 'post',
        data: { _token: token, statistic_types: statistic_types, nation_id: nation_id},
        success:function(response){
            Swal.fire({
                icon: 'success',
                title: Lang.get('js_messages.set'),
                text: Lang.get('js_messages.we_set_everything_up_and_saved_it_correctly') + '.',
            })
            document.location.reload(true);

        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText;
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });
}

function loadActualGass(ele){

    let lobby_id = document.getElementById('lobby-id').getAttribute('lobbyId');
    $.ajax({
        url: '/getLobbyGasses/'+ lobby_id,
        type: 'get',

        success:function(response){
            ele.value = response;
            ele.setAttribute('default_value', response);
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

function loadActualGasStep(ele){

    let lobby_id = document.getElementById('lobby-id').getAttribute('lobbyId');
    $.ajax({
        url: '/getLobbyGasStep/'+ lobby_id,
        type: 'get',

        success:function(response){
            ele.value = response;
            ele.setAttribute('default_value', response);
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

function loadActualTemperature(ele){

    let lobby_id = document.getElementById('lobby-id').getAttribute('lobbyId');
    $.ajax({
        url: '/getLobbyTemperature/'+ lobby_id,
        type: 'get',

        success:function(response){
            ele.value = response;
            ele.setAttribute('default_value', response);
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

function editAdminLobbyStartTemperature(ele){

    if(ele.value == ele.getAttribute('default_value')){
        return;
    }

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');
    let lobby_id = document.getElementById('lobby-id').getAttribute('lobbyId');

    let gass_step = document.getElementById('temperature_step').value;

    let gasses;
    let temperature;

    if(ele.getAttribute('id')=="temperature_start_gasses"){
        gasses = ele.value;
        temperature = (ele.value / gass_step)* 0.5;
    }else{
        gasses = (ele.value / 0.5) * gass_step;
        temperature = ele.value;
    }

    $.ajax({
        url: '/changeLobbyStartTemperature',
        type: 'post',
        data: { _token: token, lobby_id: lobby_id, gasses: gasses, temperature: temperature},
        success:function(response){
            hideLoading();
            document.getElementById('temperature_start_temperature').value = temperature;
            document.getElementById('temperature_start_gasses').value = gasses;

            document.getElementById('temperature_start_temperature').setAttribute('default_value',temperature );
            document.getElementById('temperature_start_gasses').setAttribute('default_value',gasses );

            updateTemperatureActualValue(lobby_id);
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

function changeMultipleStatisticTypes(){

    let allNations = document.getElementsByClassName('global-status-table-row');
    let allMultipleStatisticTypeChange = document.getElementsByClassName('multiple-edit-admin-input');

    for(let statType of allMultipleStatisticTypeChange){

        let statTypeCode = statType.getAttribute('statisticTypeCode');
        let value = statType.value;

        for (let nation of allNations){

            let addElement = nation.getElementsByClassName('admin-add-value-' + statTypeCode)[0];
            let checked = nation.getElementsByClassName('multiple-edit-admin-checkbox')[0].checked;

            if(addElement == undefined){
                continue;
            }

            if(checked){
                if(value > 0){
                    addElement.innerHTML = "+" + value;
                    if(addElement.classList.contains('text-red')) {
                        addElement.classList.remove('text-red');
                    }
                    addElement.classList.add('text-green');
                }
                else if(value <0){
                    addElement.innerHTML = value;
                    if(addElement.classList.contains('text-green')) {
                        addElement.classList.remove('text-green');
                    }
                    addElement.classList.add('text-red');
                }else{
                    addElement.innerHTML = "";
                    addElement.classList.remove('text-green');
                    addElement.classList.remove('text-red');
                }

            }else{
                addElement.innerHTML = "";
                addElement.classList.remove('text-green');
                addElement.classList.remove('text-red');
            }



        }


    }

}

function advancedAdminTool(ele){

    let allAdminTool = document.getElementsByClassName('advanceAdminTool')
    if(ele.checked){
        for(let tool of allAdminTool){
            tool.removeAttribute('hidden');
        }
    }else{
        for(let tool of allAdminTool){
            tool.setAttribute('hidden', '');
        }
    }

}

function changeSingleStatisticType(ele, move){

    let addElement = ele.parentNode.getElementsByClassName('admin-add-value')[0];
    if(addElement.innerHTML == ""){
        addElement.innerHTML = 0;
    }

    let value = parseInt(addElement.innerHTML);

    if(move > 0){
        value++;
    }else{
        value--;
    }

    if(value > 0){

        addElement.innerHTML = "+" + value;
        if(addElement.classList.contains('text-red')) {
            addElement.classList.remove('text-red');
        }
        addElement.classList.add('text-green');
    }
    else if(value <0){
        addElement.innerHTML = value;
        if(addElement.classList.contains('text-green')) {
            addElement.classList.remove('text-green');
        }
        addElement.classList.add('text-red');
    }else{
        addElement.innerHTML = "";
        addElement.classList.remove('text-green');
        addElement.classList.remove('text-red');
    }


}

function setAllMultipleChangeStatisticTypes(){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');

    let allEditValue = document.getElementsByClassName('admin-add-value');

    statistic_types = [];

    for (let addValue of allEditValue){
        if(addValue.innerHTML == ""){
            continue;
        }

        let move_value = parseInt(addValue.innerHTML);
        let code_name = addValue.getAttribute('statisticTypeCode');
        let nation_id = addValue.getAttribute('nationId');
        statistic_types.push({statistic_type_code_name: code_name, move: move_value, nation_id: nation_id })
    }


    $.ajax({
        url: '/changeNationStatisticTypes',
        type: 'post',
        data: { _token: token, statistic_types: statistic_types, nation_id: null},
        success:function(response){
            Swal.fire({
                icon: 'success',
                title: Lang.get('js_messages.set'),
                text: Lang.get('js_messages.we_set_everything_up_and_saved_it_correctly') + '.',
            })
            document.location.reload(true);

        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText;
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });
}


