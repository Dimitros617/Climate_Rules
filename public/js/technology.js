

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
                showCancelButton: true,
                showConfirmButton: true,
                showDenyButton: true,
                confirmButtonText: `Potvrdit`,
                cancelButtonText: `Zrušit`,
                denyButtonText: `Zamítnout`,
                focusConfirm: false,
                customClass: 'w-75',
                onBeforeOpen: function(ele) {
                    document.getElementsByClassName('swal2-confirm')[0].setAttribute('disabled','')
                    let check = document.getElementById('technology-certificate-verification')
                    if(check == undefined || check.getAttribute('admin') == 0 || check.getAttribute('first_try') == 0){
                        document.getElementsByClassName('swal2-deny')[0].setAttribute('hidden','')
                    }else{
                        document.getElementsByClassName('swal2-deny')[0].setAttribute('disabled','')

                    }
                }

            }).then((result) => {
                if (result.isConfirmed) {

                    showLoading();
                    let adminPay = 0;
                    if(document.getElementById('admin-pay') != undefined) {
                        adminPay = document.getElementById('admin-pay').checked ? 1 : 0;
                    }
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
                                text: 'Požadavek jsme úspěšně zpracovali.',
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
                    setNationToTechnologyStatus('investment', technology_id, nation_id, 0);
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

function setNationToTechnologyStatus(nation_technology_status_code, technology_id, nation_id = null, first_try = null){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');

    $.ajax({
        url: '/setNationToTechnologyStatus',
        type: 'post',
        data: { _token: token, technology_id: technology_id, nation_id: nation_id, code: nation_technology_status_code, response: 0, first_try: first_try},
        success:function(response){
            hideLoading();

            if(response == 0){

                Swal.fire({
                    icon: 'question',
                    title: 'Hmmm...',
                    text: 'Tento stát má již patent, chcete ho zachovat nebo odebrat?' ,
                    showCloseButton: false,
                    showCancelButton: false,
                    showConfirmButton: true,
                    showDenyButton: true,
                    confirmButtonText: `Odebrat`,
                    denyButtonText: `Zachovat`,
                    focusConfirm: false,
                    customClass: 'w-75'

                }).then((result) => {
                    if (result.isConfirmed) {

                        showLoading();
                        $.ajax({
                            url: '/setNationToTechnologyStatus',
                            type: 'post',
                            data: { _token: token, technology_id: technology_id, nation_id: nation_id, code: nation_technology_status_code, response: 1},
                            success:function(response){
                                hideLoading();
                                refreshTechnologies(response)


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

            }
            refreshTechnologies(response)


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

function showTechnologyCertificateForm(technology_id, nation_id = null){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');

    $.ajax({
        url: '/getTechnologyCertificateForm',
        type: 'post',
        data: { _token: token, technology_id: technology_id, nation_id: nation_id,},
        success:function(response){
            hideLoading();

            Swal.fire({
                html: response,
                showCloseButton: false,
                showCancelButton: true,
                showConfirmButton: true,
                showDenyButton: true,
                confirmButtonText: `Potvrdit`,
                cancelButtonText: `Zrušit`,
                denyButtonText: `Zamítnout`,
                focusConfirm: false,
                customClass: 'w-75',
                onBeforeOpen: function(ele) {
                    document.getElementsByClassName('swal2-confirm')[0].setAttribute('disabled','')
                    let check = document.getElementById('technology-certificate-verification')
                    if(check == undefined || check.getAttribute('admin') == 0 || check.getAttribute('first_try') == 0){
                        document.getElementsByClassName('swal2-deny')[0].setAttribute('hidden','')
                    }else{
                        document.getElementsByClassName('swal2-deny')[0].setAttribute('disabled','')

                    }
                }

            }).then((result) => {
                if (result.isConfirmed) {

                    showLoading();
                    let data;

                    if(document.getElementById('technology-certificate-verification') != undefined){

                        let description = document.getElementById('technology-certificate-description').value;
                        let benefits = document.getElementById('technology-certificate-benefits').value;
                        let disadvantages = document.getElementById('technology-certificate-disadvantages').value;
                        let business = document.getElementById('technology-certificate-business').value;
                        let people = document.getElementById('technology-certificate-people').value;

                        data = { _token: token,
                            technology_id: technology_id,
                            nation_id: nation_id,
                            response: 1,
                            admin_pay: 0,
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
                                text: 'Požadavek jsme úspěšně zpracovali.',
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
                    setNationToTechnologyStatus('investment', technology_id, nation_id);
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

/**
 *
 * @param technology_id -> table tchnologies
 */
function getTechnologyDescription(technology_id){


    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');

    $.ajax({
        url: '/getTechnologyDescription/' + technology_id,
        type: 'get',
        data: { _token: token, technology_id: technology_id},
        success:function(response){
            hideLoading();
            Swal.fire({
                html: response,
                showCloseButton: false,
                showCancelButton: true,
                showConfirmButton: false,
                showDenyButton: false,
                confirmButtonText: `Potvrdit`,
                cancelButtonText: `Zavřít`,
                denyButtonText: `Zamítnout`,
                focusConfirm: false,
                customClass: 'w-75',

            }).then((result) => {
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

function getTechnologySetting(technology_id){


    $.ajax({
        url: '/getTechnologySetting/' + technology_id,
        type: 'get',
        success:function(response){
            hideLoading();


                Swal.fire({
                    html: response,
                    showCloseButton: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                    showDenyButton: false,
                    focusConfirm: false,
                    customClass: 'w-75',

                }).then((result) => {
                    if (result.isConfirmed) {



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

function saveImage(form){

    $.ajax({
        url: '/saveImage',
        method: 'post',
        data: new FormData(form),
        processData: false,
        contentType: false,
        datatype : "application/json",
        success:function(response){

            refreshTechnologySettingGallery(response);


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

function removeImage(technology_id, url){

    let token = document.getElementById('csrf_token').getAttribute('content');

    $.ajax({
        url: '/removeImage',
        type: 'delete',
        data: { _token: token, technology_id: technology_id, url: url},
        success:function(response){

            refreshTechnologySettingGallery(response);

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

function setImage(technology_id, url, final_url = null){

    let token = document.getElementById('csrf_token').getAttribute('content');

    $.ajax({
        url: '/setImage',
        type: 'post',
        data: { _token: token, technology_id: technology_id, url: url},
        success:function(response){

            let images = document.getElementsByClassName('technology-card-image-' + technology_id);
            for(let img of images){
                let refresh = '?random=' + new Date().getTime();
                img.src = final_url == null ? url + refresh : final_url + refresh;
            }
            refreshTechnologySettingGallery(response);

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

function isUrlValidImage(url){


    let regex = /^https?:\/\/.*\/.*\.(png|gif|webp|jpeg|jpg)\??.*$/gmi
    let result;
    if (url.match(regex)){
        result = {
            match: url.match(regex)
        }
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Ajajaj!',
            text: 'Dle našeho regexu není tento odkaz na obrázek, vložte odkaz přímo na obrázek.' ,
            customClass: {
                container: 'su-shake-horizontal',
            }
        })
    }
    console.log(result);
    return result;

}


function refreshTechnologySettingGallery(HTML){
    document.getElementById('technology-setting-image-gallery').innerHTML = HTML;
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
