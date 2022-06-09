
function IsJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

function allertError(text, code = undefined){

    if(code !== undefined){

        if(code == 401 && text === undefined){
            text = Lang.get('js_messages.you_are_not_logged_in_or_you_do_not_have_sufficient_permissions_for_this_action') + "."
        }

        if(code == 422){
            Swal.fire({
                icon: 'error',
                title: 'Hmm...',
                text: Lang.get('js_messages.this_file_is_not_an_image_in_the_supported_format') ,

            })
            return;
        }
    }

    Swal.fire({
        icon: 'error',
        title: Lang.get('js_messages.something_went_wrong') + '!',
        text: text ,
        customClass: {
            container: 'su-shake-horizontal',
        }
    })
}

function allertWarning(text){
    Swal.fire({
        icon: 'warning',
        title: Lang.get('js_messages.caution') + '!',
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
        title: Lang.get('js_messages.remove') + '?',
        text: Lang.get('js_messages.are_you_sure_you_want_to_delete_this') + '?',
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: true,
        showDenyButton: true,
        confirmButtonText: Lang.get('js_messages.remove'),
        denyButtonText: Lang.get('js_messages.cancel'),
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
                    let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
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
            let code = IsJsonString(response.responseText)? JSON.parse(response.status) : response.status;
            allertError(err, code);
            hideLoading();

        }
    });

}

function collapseElement(buttonDiv, button, elementsClassAll, elementIdShow){

    let collapseElements = document.getElementsByClassName(elementsClassAll);

    for(let ele of collapseElements){
        ele.style.display = 'none';
    }

    let buttons = buttonDiv.children;

    for(let btn of buttons){
        btn.classList.remove('cr-btn-active');
    }
    button.classList.add('cr-btn-active');

    let decollapseElement = document.getElementById(elementIdShow);
    decollapseElement.style.display = 'block';
}


function showAndHideElement(parent, classElement){

    let collapseElements = parent.getElementsByClassName(classElement)[0];
    if(collapseElements==undefined){
        collapseElements = parent.parentNode.getElementsByClassName(classElement)[0];
    }
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

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

