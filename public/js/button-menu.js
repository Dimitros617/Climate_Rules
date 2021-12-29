
function enterLobby(id){

    showLoading();
    $.ajax({
        url: '/lobby/' + id,
        type: 'get',
        success:function(response){
            window.location.assign('/lobby/'+id);
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

function enterLobbyNation(id){

    showLoading();
    $.ajax({
        url: '/lobby/' + id + '/nation',
        type: 'get',
        success:function(response){
            window.location.assign('/lobby/'+ id + '/nation');
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
