document.onclick = hideMenu;
document.oncontextmenu = rightClick;

function highlight(ele){
    if(ele == undefined){
        return;
    }
    ele.style.border = "2px solid grey";
}

function nonhighlight(ele){
    if(ele == undefined){
        return;
    }
    ele.style.border = "none";
}

function hideMenu() {

    let menu = document.getElementById("contextMenu");
    if(menu == null){
        return;
    }
    menu.style.display = "none"
    nonhighlight(window.last_context_element);
}

function rightClick(e) {

    let menu = document.getElementById("contextMenu");
    if(menu == null){
        return;
    }

    e.preventDefault();
    nonhighlight(window.last_context_element);

    window.last_context_element = e.target;
    let atr = window.last_context_element.getAttribute('type');
    if(!atr == 'lobby' || atr == null){
        return;
    }
    highlight(window.last_context_element);

    if(window.last_context_element.getAttribute('visible')=='1'){
        document.getElementById('context-menu-show').innerHTML = "Skrýt";
        document.getElementById('context-menu-hide-icon').removeAttribute('hidden');
        document.getElementById('context-menu-show-icon').setAttribute('hidden','');
    }else{
        document.getElementById('context-menu-show').innerHTML = "Zobrazit";
        document.getElementById('context-menu-show-icon').removeAttribute('hidden');
        document.getElementById('context-menu-hide-icon').setAttribute('hidden','');
    }

    if (menu.style.display == "block"){
        hideMenu();
    }else{
        menu.style.display = 'block';
        menu.style.left = e.pageX + "px";
        menu.style.top = e.pageY + "px";
    }
}
