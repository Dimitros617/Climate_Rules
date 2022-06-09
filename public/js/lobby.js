



function removeLobby(id){

    var locale = Lang.get('js_messages.remove');

    let b = 1;

    Swal.fire({
        icon: 'question',
        title: Lang.get('js_messages.remove') +'?',
        text: Lang.get('js_messages.are_you_sure_you_want_to_delete_this_lobby') + '?',
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: true,
        showDenyButton: true,
        confirmButtonText: Lang.get('js_messages.remove'),
        denyButtonText: Lang.get('js_messages.cancel'),
        focusConfirm: false,
    }).then((result) => {
        if (result.isConfirmed) {

            showLoading();
            let token = document.getElementById('csrf_token').getAttribute('content');

            $.ajax({
                url: '/removeLobby',
                type: 'delete',
                data: { _token: token, id: id},
                success:function(response){
                    hideLoading();
                    refreshLobbyList();
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

    })
}

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
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
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
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });


}

function editLobby(id){

    showLoading();

    $.ajax({
        url: '/editLobby/'+ id,
        type: 'get',

        success:function(response){
            hideLoading();

            Swal.fire({
                html: response,
                showCloseButton: false,
                showCancelButton: false,
                showConfirmButton: true,
                showDenyButton: true,
                confirmButtonText: Lang.get('js_messages.save'),
                denyButtonText: Lang.get('js_messages.cancel'),
                focusConfirm: false,
                customClass: 'w-75',

            }).then((result) => {
                if (result.isConfirmed) {

                    showLoading();


                    let data =  $( "#edit-lobby-form" ).serialize();

                    $.ajax({
                        url: '/saveLobby',
                        type: 'post',
                        data: data,
                        success:function(response){
                            hideLoading();
                            refreshLobbyList();
                            Swal.fire({
                                icon: 'success',
                                title: Lang.get('js_messages.saved'),
                                text: Lang.get('js_messages.everything_set') + '!',
                            })

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
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });



}

function editLobbyNations(id){

    showLoading();

    $.ajax({
        url: '/editLobbyNations/'+ id,
        type: 'get',

        success:function(response){
            hideLoading();

            Swal.fire({
                html: response,
                showCloseButton: false,
                showCancelButton: true,
                showConfirmButton: false,
                showDenyButton: false,
                confirmButtonText: Lang.get('js_messages.save'),
                cancelButtonText: Lang.get('js_messages.cancel'),
                focusConfirm: false,
                customClass: 'w-75',

            }).then((result) => {
                if (result.isConfirmed) {

                    showLoading();


                    let data =  $( "#edit-lobby-form" ).serialize();

                    $.ajax({
                        url: '/saveLobby',
                        type: 'post',
                        data: data,
                        success:function(response){
                            hideLoading();
                            refreshLobbyList();
                            Swal.fire({
                                icon: 'success',
                                title: Lang.get('js_messages.saved'),
                                text: Lang.get('js_messages.everything_set') + '!',
                            })

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
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });



}

function editLobbyStartTemperature(ele){

    if(ele.value == ele.getAttribute('default_value')){
        return;
    }

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');
    let lobby_id = document.getElementById('nations_lobby_table').getAttribute('lobby_id');

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

