

function changeNationToTechnologyStatus(ele_button, technology_id, nation_id = null){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');

    $.ajax({
        url: '/changeNationToTechnologyStatus',
        type: 'post',
        data: { _token: token, technology_id: technology_id, nation_id: nation_id, response: 0, admin_pay: 0},
        success:function(response){
            hideLoading();

            Swal.fire({
                html: response,
                showCloseButton: false,
                showCancelButton: false,
                showConfirmButton: true,
                showDenyButton: true,
                confirmButtonText: `Potvrdit`,
                denyButtonText: `Zrušit`,
                focusConfirm: false,
                customClass: 'w-75',
                onBeforeOpen: function(ele) {
                    document.getElementsByClassName('swal2-confirm')[0].setAttribute('disabled','')
                }

            }).then((result) => {
                if (result.isConfirmed) {

                    showLoading();
                    let adminPay = document.getElementById('admin-pay').checked ? 1 : 0;
                    let data;

                    if(document.getElementById('technology-certificate-verification') != undefined){

                        let description = document.getElementById('technology-certificate-description').value;
                        let benefits = document.getElementById('technology-certificate-benefits').value;
                        let disadvantages = document.getElementById('technology-certificate-disadvantages').value;
                        let business = document.getElementById('technology-certificate-business').value;
                        let people = document.getElementById('technology-certificate-people').value;

                        data = { _token: token,
                            technology_id: technology_id,
                            nation_id: nation_id, response: 1,
                            admin_pay: adminPay,
                            description: description,
                            benefits: benefits,
                            disadvantages: disadvantages,
                            business: business,
                            people: people
                        };
                    }else{
                        data = { _token: token, technology_id: technology_id, nation_id: nation_id, response: 1, admin_pay: adminPay};

                    }

                    $.ajax({
                        url: '/changeNationToTechnologyStatus',
                        type: 'post',
                        data: data,
                        success:function(response){
                            hideLoading();
                            refreshTechnologies(response)
                            Swal.fire({
                                icon: 'success',
                                title: 'Odesláno',
                                text: 'Požadavek jsme úspěšně zpracovaly.',
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


function swapCardAndRow(showClass, hideClass, ele){

    let showClasses = document.getElementsByClassName(showClass);
    let hideClasses = document.getElementsByClassName(hideClass);

    for(let show of showClasses){
        show.removeAttribute('hidden');
    }

    for(let hide of hideClasses){
        hide.setAttribute('hidden', '');
    }

    let buttons = document.getElementsByClassName('card-row-swap');

    for (let btn of buttons){
            btn.setAttribute('active', 0);
    }

    ele.setAttribute('active', 1);

}

function changeTechnologyParameter(technology_id, parameter, ele){

    let value = ele.value;
    if(value == "on"){
        if(ele.checked){
            value = 1;
        }else{
            value = 0;
        }
    }

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');

    $.ajax({
        url: '/changeTechnologyParameter',
        type: 'post',
        data: { _token: token, technology_id: technology_id, parameter: parameter, value: value},
        success:function(response){
            hideLoading();
            refreshTechnologies(response);

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

function searchTechnology(formId){


    let id = "#" + formId;
    let a = $("#" + formId).serialize()
    let b = a;

}


function refreshTechnologies(HTML){

    document.getElementById('technologyBox').innerHTML = HTML;

    let buttons = document.getElementById('technologyButtonPanel').children;
    for(let btn of buttons){
        if(btn.classList.contains('cr-btn-active')){
            btn.click();
        }

    }

    buttons = document.getElementsByClassName('card-row-swap');
    for(let btn of buttons){
        if(btn.getAttribute('active') == 1){
            btn.click();
        }

    }


}
