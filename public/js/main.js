


function IsJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

function allertError(text){
    Swal.fire({
        icon: 'error',
        title: 'Hmm... CHYBA!',
        text: text ,
        customClass: {
            container: 'su-shake-horizontal',
        }
    })
}

function allertWarning(text){
    Swal.fire({
        icon: 'warning',
        title: 'Pozor!',
        text: text ,
    })
}

function showLoading(){
    let url = document.getElementById('head_logo').children[0].getAttribute('src');
    document.getElementById('head_logo').children[0].setAttribute('src',(url.replace('logo_big.svg','loading.svg')))
}

function hideLoading(){
    let url = document.getElementById('head_logo').children[0].getAttribute('src');
    document.getElementById('head_logo').children[0].setAttribute('src',(url.replace('loading.svg','logo_big.svg')))
}


function removeElement(table, id, fce){

    Swal.fire({
        icon: 'question',
        title:'Smazat?',
        text: 'Opravdu chcete tuto položku smazat?',
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: true,
        showDenyButton: true,
        confirmButtonText: `Smazat`,
        denyButtonText: `Zrušit`,
        focusConfirm: false,
    }).then((result) => {
        if (result.isConfirmed) {

            showLoading();
            let token = document.getElementById('csrf_token').getAttribute('content');

            $.ajax({
                url: '/removeElement',
                type: 'delete',
                data: { _token: token, table: table, id: id},
                success:function(response){
                    hideLoading();
                    window[fce](arguments);
                },
                error: function (response){
                    console.log(response);
                    let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
                    allertError(err);
                    hideLoading();

                }
            });

        }

    })

}

function changeElement(table, column, id, value, fce){

    showLoading();
    let token = document.getElementById('csrf_token').getAttribute('content');

    $.ajax({
        url: '/changeElement',
        type: 'post',
        data: { _token: token, table: table, column: column, id: id, value: value},
        success:function(response){
            hideLoading();
            window[fce](arguments);
        },
        error: function (response){
            console.log(response);
            let err = IsJsonString(response.responseText)? JSON.parse(response.responseText).messages : response.responseText
            allertError(err);
            hideLoading();

        }
    });

}



// $(function(){
//     $('svg[onload]').trigger('onload');
//     $('input[onload]').trigger('onload');
// });


