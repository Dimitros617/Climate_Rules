

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
                    let transactionType = "common_pay";

                    if(admin_pay == 1){
                        amouth = document.getElementById('one-pay-amouth-admin').value;
                        transactionType = document.getElementById('one-pay-transaction-type').value;
                    }


                    if(nation_id_to == '-'){
                        allertError(Lang.get('js_messages.the_payment_could_not_be_made_because_you_did_not_select_a_payee'), 500);
                        hideLoading();
                        return;
                    }

                    $.ajax({
                        url: '/lobby/'+id+'/bank/addOnePay',
                        type: 'post',
                        data: { _token: token, nation_id_from: nation_id_from, nation_id_to: nation_id_to, amouth: amouth, description: description, admin_pay: admin_pay, transactionType: transactionType},
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

function changeFastPay(){
    let value = document.getElementById('fast-pay-amouth-admin').value;
    let nations = document.getElementsByClassName('fast-pay-nation-row')

    for(let nation of nations){

        let checked = nation.getElementsByClassName('form-check-input')[0].checked
        let valueElement = nation.getElementsByClassName('nation-money-add')[0];

        if(checked){

            valueElement.innerHTML = value >= 0 ? "+" + value : value;
            if(value >= 0){
                if(valueElement.classList.contains('text-red')) {
                    valueElement.classList.remove('text-red');
                }
                    valueElement.classList.add('text-green');
            }else{
                if(valueElement.classList.contains('text-green')) {
                    valueElement.classList.remove('text-green');
                }
                valueElement.classList.add('text-red');
            }
        }else{
            valueElement.innerHTML = "";
        }
    }
}

function sendFastPay(){
    showLoading();

    let token = document.getElementById('csrf_token').getAttribute('content');
    let id = document.getElementById('lobby-id').getAttribute('lobbyId');

    let admin_pay = 1;

    let nations = document.getElementsByClassName('fast-pay-nation-row')
    let nations_id_to = "";
    for(let nation of nations){
        if(nation.getElementsByClassName('form-check-input')[0].checked){
            nations_id_to += nation.getAttribute('nationId') + ","
        }
    }

    let nation_id_from = null;
    let amouth = document.getElementById('fast-pay-amouth-admin').value;
    let description = document.getElementById('fast-pay-description').value;
    let transactionType = document.getElementById('one-pay-transaction-type').value;


    if(nations_id_to == ""){
        allertError(Lang.get('js_messages.the_payment_could_not_be_made_because_you_did_not_select_a_payee'), 500);
        hideLoading();
        return;
    }

    $.ajax({
        url: '/lobby/'+id+'/bank/addMultiplePay',
        type: 'post',
        data: { _token: token, nation_id_from: nation_id_from, nations_id_to: nations_id_to, amouth: amouth, description: description, admin_pay: admin_pay, transactionType: transactionType},
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

function advanceCentralBankTools(ele){

    let toolPanel = document.getElementsByClassName('central-bank-tools')[0];
    let nationMoves = document.getElementById('nation-bank-account-moves');
    let adminMoves = document.getElementById('admin-bank-account-moves');

    if(ele.checked){
        toolPanel.removeAttribute('hidden');
        nationMoves.setAttribute('hidden', "");
        adminMoves.removeAttribute('hidden');
    }else{
        toolPanel.setAttribute('hidden', "");
        nationMoves.removeAttribute('hidden');
        adminMoves.setAttribute('hidden', "");
    }



}
