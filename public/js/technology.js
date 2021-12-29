

function changeNationToTechnologyStatus(ele_button, technology_id, nation_id = null){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');

    $.ajax({
        url: '/changeNationToTechnologyStatus',
        type: 'post',
        data: { _token: token, technology_id: technology_id, nation_id: nation_id},
        success:function(response){
            hideLoading();
            ele_button.innerHTML = response['name'];
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


function swapCardAndRow(showClass, hideClass){

    let showClasses = document.getElementsByClassName(showClass);
    let hideClasses = document.getElementsByClassName(hideClass);

    for(let show of showClasses){
        show.removeAttribute('hidden');
    }

    for(let hide of hideClasses){
        hide.setAttribute('hidden', '');
    }

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
