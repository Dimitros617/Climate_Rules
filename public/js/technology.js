function changeNationToTechnologyStatus(ele_button, technology_id){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');

    $.ajax({
        url: '/changeNationToTechnologyStatus',
        type: 'post',
        data: { _token: token, technology_id: technology_id},
        success:function(response){
            hideLoading();
            ele_button.innerHTML = response['name'];
        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
            allertError(err);
            hideLoading();

        }
    });


}
