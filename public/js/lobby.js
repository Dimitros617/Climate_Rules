

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

                    // $.ajax({
                    //     url: '/save_setting/' + element_type + "/" + id,
                    //     type: 'post',
                    //     data: { _token: token,
                    //         table_name: element_type,
                    //         name: element.getAttribute('name'),
                    //         description: element.getAttribute('description'),
                    //         style: element.getAttribute('style'),
                    //         src: element.getAttribute('src'),
                    //         data: element.getAttribute('data'),
                    //         data1: element.getAttribute('data1'),
                    //         data2: element.getAttribute('data2'),
                    //         results: element.getAttribute('results'),
                    //     },
                    //     success:function(response){
                    //         spinner.setAttribute("hidden", "");
                    //         Swal.fire({
                    //             icon: 'success',
                    //             title: 'Uloženo',
                    //             text: 'Všechno jsme nastavily!',
                    //         })
                    //
                    //     },
                    //     error: function (response){
                    //         console.log(response);
                    //         let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
                    //         allertError(err);
                    //
                    //
                    //     }
                    // });

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
