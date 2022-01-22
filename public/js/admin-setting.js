
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

function addRound(lobbyId){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');


    $.ajax({
        url: '/addRound',
        type: 'post',
        data: { _token: token, lobbyId: lobbyId},
        success:function(response){
            hideLoading();
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


