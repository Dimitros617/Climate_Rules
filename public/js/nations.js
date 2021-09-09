/**
 *
 * @param id - Id lobby do kterého chceme přidat národ
 */
function addNation(id){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');

    $.ajax({
        url: '/addNation',
        type: 'put',
        data: { _token: token, id: id},
        success:function(response){
            hideLoading();
            refreshNationsEditList();
        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
            allertError(err);
            hideLoading();

        }
    });


}

function removeNation(id){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');

    $.ajax({
        url: '/removeNation',
        type: 'delete',
        data: { _token: token, id: id},
        success:function(response){
            hideLoading();
            refreshNationsEditList();
        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
            allertError(err);
            hideLoading();

        }
    });

}

function saveNationsUser(id, value, fce){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');

    $.ajax({
        url: '/saveNationsUser',
        type: 'post',
        data: { _token: token, id: id, value: value},
        success:function(response){
            hideLoading();
            window[fce](arguments);
        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
            allertError(err);
            hideLoading();

        }
    });

}

function saveNationFromTemplate(id_nation, id_template){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');

    if(id_template == "-1"){
        return;
    }

    $.ajax({
        url: '/saveNationFromTemplate',
        type: 'post',
        data: { _token: token, id_nation: id_nation, id_template: id_template },
        success:function(response){
            hideLoading();
            refreshNationsEditList();
        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
            allertError(err);
            hideLoading();

        }
    });


}

function refreshNationsEditList(){


    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');
    let id = document.getElementById('nations_lobby_table').getAttribute('lobby_id');

    $.ajax({
        url: '/getEditNations',
        type: 'get',
        data: { _token: token, id: id},
        success:function(response){

            document.getElementById('nations_lobby_table').innerHTML = response;
            hideLoading();
        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
            allertError(err);
            hideLoading();

        }
    });

}
