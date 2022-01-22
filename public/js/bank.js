

/**
 *
 * @param id = lobbyID
 */
function getOnePayForm(id){

    showLoading();
    $.ajax({
        url: '/lobby/'+id+'/bank/getOnePayForm',
        type: 'get',

        success:function(response){
            hideLoading();
            Swal.fire({
                html: response,
                showCloseButton: false,
                showCancelButton: false,
                showConfirmButton: true,
                showDenyButton: true,
                confirmButtonText: `Odeslat platbu`,
                denyButtonText: `Zrušit platbu`,
                focusConfirm: false,
                customClass: 'w-50',
                onBeforeOpen: function(ele) {
                    document.getElementsByClassName('swal2-confirm')[0].setAttribute('disabled','')
                }

            }).then((result) => {
                if (result.isConfirmed) {

                    showLoading();

                    let data =  $( "#edit-lobby-form" ).serialize();

                    $.ajax({
                        url: '/addOnePay',
                        type: 'post',
                        data: data,
                        success:function(response){
                            hideLoading();
                            refreshLobbyList();
                            Swal.fire({
                                icon: 'success',
                                title: 'Odesláno',
                                text: 'Vaše platba byla úspěšně zpracována.',
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


function disabledPayButton() {
    document.getElementsByClassName('swal2-confirm')[0].setAttribute('disabled','')
}
