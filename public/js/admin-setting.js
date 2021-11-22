
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
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
            allertError(err);
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
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
            allertError(err);
            hideLoading();

        }
    });
}
