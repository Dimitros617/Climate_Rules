


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

function collapseElement(parent, clickedParent, collapseClass){

    let collapseElements = parent.getElementsByClassName(collapseClass);

    for(let ele of collapseElements){
        ele.style.height = '0px';
    }

    let decollapseElement = clickedParent.getElementsByClassName(collapseClass)[0];
    decollapseElement.style.height = 'auto';
}

function showAndHideElement(parent, classElement){

    let collapseElements = parent.getElementsByClassName(classElement)[0];
    let hidden = collapseElements.getAttribute('hidden');

    if(hidden == null){
        collapseElements.setAttribute('hidden','');
        parent.getElementsByClassName('show')[0].removeAttribute('hidden');
        parent.getElementsByClassName('hide')[0].setAttribute('hidden','');
    }else{
        collapseElements.removeAttribute('hidden');
        parent.getElementsByClassName('show')[0].setAttribute('hidden', '');
        parent.getElementsByClassName('hide')[0].removeAttribute('hidden');
    }


}

function changeSvgChildrenSize(ele, wsize, hsize){
    if(hsize == undefined){
        hsize = wsize;
    }

    let elements = ele.getElementsByTagName('svg')

    for(let e of elements){
        e.setAttribute('width', wsize);
        e.setAttribute('height', hsize);
    }

}



$(function(){
    $('div[onload]').trigger('onload');
    $('input[onload]').trigger('onload');
    $('span[onload]').trigger('onload');
});


