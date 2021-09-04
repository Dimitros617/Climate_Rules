

function refreshLobbyList(){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');

    $.ajax({
        url: '/getLobbies',
        type: 'get',
        data: { _token: token},
        success:function(response){
            let a = document.getElementById('lobby-list-div');
            document.getElementById('lobby-list-div').innerHTML = response;
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

function addLobby(){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');

    $.ajax({
        url: '/addLobby',
        type: 'put',
        data: { _token: token},
        success:function(response){
            hideLoading();
            refreshLobbyList();
        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
            allertError(err);
            hideLoading();

        }
    });


}
