

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
                confirmButtonText: `Uložit`,
                denyButtonText: `Zrušit`,
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
                                title: 'Uloženo',
                                text: 'Všechno nastaveno!',
                            })

                        },
                        error: function (response){
                            console.log(response);
                            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
                            allertError(err);
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
            allertError(err);
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
                showCancelButton: false,
                showConfirmButton: true,
                showDenyButton: true,
                confirmButtonText: `Uložit`,
                denyButtonText: `Zrušit`,
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
                                title: 'Uloženo',
                                text: 'Všechno nastaveno!',
                            })

                        },
                        error: function (response){
                            console.log(response);
                            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
                            allertError(err);
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
            allertError(err);
            hideLoading();

        }
    });



}
