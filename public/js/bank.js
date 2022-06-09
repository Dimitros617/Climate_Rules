

/**
 *
 * @param id = lobbyID
 */
function getOnePayForm(id){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');


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
                confirmButtonText: Lang.get('js_messages.send_payment'),
                denyButtonText: Lang.get('js_messages.cancel_payment'),
                focusConfirm: false,
                customClass: 'w-50',
                onBeforeOpen: function(ele) {
                    document.getElementsByClassName('swal2-confirm')[0].setAttribute('disabled','')
                }

            }).then((result) => {
                if (result.isConfirmed) {

                    showLoading();

                    let admin_pay = 0;
                    if(document.getElementById('admin-pay') != null && document.getElementById('admin-pay').checked){
                        admin_pay = 1;
                    }

                    let nation_id_from = document.getElementById('one-pay-nation-from').getAttribute('nation_id');
                    let nation_id_to = document.getElementById('one-pay-nation-to').value;
                    let amouth = document.getElementById('one-pay-amouth').value;
                    let description = document.getElementById('one-pay-description').value;

                    if(admin_pay == 1){
                        amouth = document.getElementById('one-pay-amouth-admin').value;
                    }


                    if(nation_id_to == '-'){
                        allertError(Lang.get('js_messages.the_payment_could_not_be_made_because_you_did_not_select_a_payee'), 500);
                        hideLoading();
                        return;
                    }

                    $.ajax({
                        url: '/lobby/'+id+'/bank/addOnePay',
                        type: 'post',
                        data: { _token: token, nation_id_from: nation_id_from, nation_id_to: nation_id_to, amouth: amouth, description: description, admin_pay: admin_pay},
                        success:function(response){
                            hideLoading();
                            location.reload();
                            Swal.fire({
                                icon: 'success',
                                title: Lang.get('js_messages.send'),
                                text: Lang.get('js_messages.your_payment_was_processed_successfully') + '.',
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
