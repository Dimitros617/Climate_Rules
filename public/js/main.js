


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




// $(function(){
//     $('svg[onload]').trigger('onload');
//     $('input[onload]').trigger('onload');
// });


