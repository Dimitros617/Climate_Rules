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
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
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
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
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
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
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
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
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
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });

}

function changeNationTax(){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');
    let lobby_id = document.getElementById('lobby-id').getAttribute('lobbyId');

    $.ajax({
        url: '/changeNationTax',
        type: 'post',
        data: { _token: token, lobby_id: lobby_id, response: 0},
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
                customClass: 'w-50',
                onBeforeOpen: function(ele) {
                    document.getElementsByClassName('swal2-confirm')[0].setAttribute('disabled','')
                }

            }).then((result) => {
                if (result.isConfirmed) {

                    showLoading();

                    let tax_increase = document.getElementById('nation-tax-increse').value;

                    if(tax_increase == 0){
                        Swal.fire({
                            icon: 'success',
                            title: 'Nastaveno',
                            text: 'Vše jsme nastavily..',
                        })
                        hideLoading();
                        return;
                    }

                    $.ajax({
                        url: '/changeNationTax',
                        type: 'post',
                        data: { _token: token, lobby_id: lobby_id, response: 1, tax_increase: tax_increase},
                        success:function(response){
                            hideLoading();
                            location.reload();

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
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText;
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });

}

function changeNationTaxButton(ele){

    let par = ele.parentNode.children;

    for (let el of par){
        el.classList.remove('cr-bg-blue');
        el.classList.add('bg-light');
    }

    ele.classList.add('cr-bg-blue')
    ele.classList.remove('bg-light');
    document.getElementById('nation-tax-increse').value = ele.getAttribute('value');
    document.getElementsByClassName('swal2-confirm')[0].setAttribute('disabled','')
    document.getElementById('change-tax-verify').checked = false;
}
