
function filterAll(filterBox){
    console.time('FilterCounter: ');
    window.counterDebug = 0;

    filterBox = document.getElementById(filterBox);
    let allTechnologies = document.getElementsByClassName('technology-card');

    for (let technology of allTechnologies){
        technology.setAttribute('filter', '0');
        technology.setAttribute('hidden', '');
        window.counterDebug++;
    }


    filterText(filterBox.getElementsByClassName('filter-search')[0]);
    filterStatisticTypes(filterBox.getElementsByClassName('filter-statistic-type-box')[0]);
    filterBranch(filterBox.getElementsByClassName('filter-branch')[0]);
    filterAreas(filterBox.getElementsByClassName('filter-areas')[0]);
    filterPrice(filterBox.getElementsByClassName('filter-price')[0]);
    filterWork(filterBox.getElementsByClassName('filter-work')[0]);
    filterActive(filterBox.getElementsByClassName('filter-active')[0]);

    sortPrice(filterBox.getElementsByClassName('filter-price')[0]);

    for (let technology of allTechnologies){
        window.counterDebug++;
        if(parseInt(technology.getAttribute('filter')) == 0){
            technology.removeAttribute('hidden');
        }

    }

   // console.log('Počet průchodů:' + window.counterDebug);
    //console.timeEnd('FilterCounter: ')

}

function filterActiveTechnology(ele){


    let allTechnologies = document.getElementsByClassName('active-technology-nation');

    for (let technology of allTechnologies){



        if(ele.checked){
            technology.removeAttribute('hidden');
            hideOrShowTechnologyCard(technology, 1);
        }
        else{
            technology.setAttribute('hidden', '');
            hideOrShowTechnologyCard(technology, 0);
        }

    }
}

/**
 * Podpůrná funkce pro funkci filterActiveTechnology zobrazuje nebo skrývá karty na stránce technologie -> karta schválení technologií
 * zobrazuje a skrývá podle toho zda jsou u karty po skrytí aktivních technoligií ještě nejáké informace k zobrazení pokud ne skryje se celá karta technologie nebo zobrazí
 * @param technology - Instance NationTechnologie z funkce filterActiveTechnology
 * @param action [int] - 1 pokud zobrazit, 0 pokud skrýt kartu.
 */
function hideOrShowTechnologyCard(technology, action){
    let allNations = technology.parentNode.children;

    let countNation = allNations.length;
    let hiddenNation = action == 1 ? countNation : 0;
    if(action != 1) {

        for (let nation of allNations) {
            if (nation.hasAttribute('hidden')) {
                hiddenNation++;
            }
        }
    }

    let cardElement = technology;
    if(hiddenNation == countNation){
        do{
            cardElement = cardElement.parentNode;
        }while(!cardElement.classList.contains('technology-card'));

        if(action == 1){
            cardElement.removeAttribute('hidden');
        }else{
            cardElement.setAttribute('hidden','');
        }

    }
}

function filterText(ele){

    let searchValue = ele.value.trim().toLowerCase();

    let allTechnologies = document.getElementsByClassName('technology-card');

    for (let technology of allTechnologies){
        window.counterDebug++;
        let val = parseInt(technology.getAttribute('filter'));

        if(technology.getElementsByClassName('technology-name')[0].innerHTML.trim().toLowerCase().includes(searchValue)){}
        else if(technology.getElementsByClassName('technology-code')[0].innerHTML.trim().toLowerCase().includes(searchValue)){
        }else{
            technology.setAttribute('filter', val+1);
        }

    }
}


function filterStatisticTypes(ele){

    let searchStatisticsTypes = ele.getElementsByClassName('filter-statistic-type');

    let allTechnologies = document.getElementsByClassName('technology-card');

    for (let technology of allTechnologies){

        let val = parseInt(technology.getAttribute('filter'));

        let allTechnologyStatisticsTypes = technology.getElementsByClassName('technology-statistic-type')

        let hide = 0;
        for (let technologyStatisticType of allTechnologyStatisticsTypes){

            for (let filterStatisticType of searchStatisticsTypes){
                window.counterDebug++;
                if(technologyStatisticType.getAttribute('code') == filterStatisticType.getAttribute('code')){
                       if(!filterStatisticType.getElementsByClassName('form-check-input')[0].checked){
                           hide++;
                       }
                    break;
                }
            }
        }
        if(hide > 0){
            technology.setAttribute('filter', val+1);
        }



    }

}

function filterBranch(ele){

    let searchValue = ele.value.trim().toLowerCase();

    if(searchValue == "-"){
        return;
    }

    let allTechnologies = document.getElementsByClassName('technology-card');

    for (let technology of allTechnologies){
        window.counterDebug++;
        let val = parseInt(technology.getAttribute('filter'));

        if(!technology.getElementsByClassName('technology-branch')[0].innerHTML.trim().toLowerCase().includes(searchValue)){
            technology.setAttribute('filter', val+1);
        }
    }

}

function filterAreas(ele){
    let searchValue = ele.value.trim().toLowerCase();

    if(searchValue == "-"){
        return;
    }

    let allTechnologies = document.getElementsByClassName('technology-card');

    for (let technology of allTechnologies){
        window.counterDebug++;
        let val = parseInt(technology.getAttribute('filter'));

        if(!technology.getElementsByClassName('technology-area')[0].innerHTML.trim().toLowerCase().includes(searchValue)){
            technology.setAttribute('filter', val+1);
        }
    }
}

function filterPrice(ele){
    let searchValue = ele.getElementsByClassName('filter-price-border')[0].value;

    let allTechnologies = document.getElementsByClassName('technology-card');

    for (let technology of allTechnologies){
        window.counterDebug++;
        let val = parseInt(technology.getAttribute('filter'));
        let a = parseInt(technology.getElementsByClassName('technology-price')[0].innerHTML.trim());
        if(parseInt(technology.getElementsByClassName('technology-price')[0].innerHTML.trim()) > parseInt(searchValue)){
            technology.setAttribute('filter', val+1);
        }
    }

}

function sortPrice(ele){

    let sortValue = ele.getElementsByClassName('filter-price-sort')[0].value;

    let roundSeparators = document.getElementsByClassName('round-separator');
    for (let roundSep of roundSeparators ){
        roundSep.setAttribute('hidden', '');
    }

    let allCardBoxes = document.getElementsByClassName('cards-technology-container');

    for (let cardBox of allCardBoxes){
        let allTechnologiesOfCardBox = cardBox.getElementsByClassName('technology-card');
        let sortedTechnologies = [];
        for (let technology of allTechnologiesOfCardBox){
            sortedTechnologies.push(technology.cloneNode(true));
        }

        let change = true;
        do{
            change = false;
            for (let i = 0; i < sortedTechnologies.length-1 ; i++){
                window.counterDebug++;
                let a = parseInt(sortedTechnologies[i].getElementsByClassName('technology-price')[0].innerHTML);
                let b = parseInt(sortedTechnologies[i+1].getElementsByClassName('technology-price')[0].innerHTML);
                if(sortValue == -1){
                    if(a < b){
                        let temp = sortedTechnologies[i];
                        sortedTechnologies[i] = sortedTechnologies[i+1];
                        sortedTechnologies[i+1] = temp;
                        change = true;
                    }
                }else if (sortValue == 1){
                    if(a > b){
                        let temp = sortedTechnologies[i];
                        sortedTechnologies[i] = sortedTechnologies[i+1];
                        sortedTechnologies[i+1] = temp;
                        change = true;
                    }
                }
            }
            let n = "";

        }while(change);


        cardBox.innerHTML = "";
        for (let technology of sortedTechnologies){
            cardBox.appendChild(technology);
        }

    }
}

function filterWork(ele){


    let allTechnologies = document.getElementsByClassName('technology-card');

    for (let technology of allTechnologies){
        window.counterDebug++;
        let val = parseInt(technology.getAttribute('filter'));
        if(parseInt(technology.getElementsByClassName('technology-work-status')[0].innerHTML.trim()) > 0 && !ele.checked){
            technology.setAttribute('filter', val+1);
        }

    }
}

function filterActive(ele){

    let allTechnologies = document.getElementsByClassName('technology-card');

    for (let technology of allTechnologies){
        window.counterDebug++;
        let val = parseInt(technology.getAttribute('filter'));
        if(parseInt(technology.getElementsByClassName('technology-active-status')[0].innerHTML.trim()) > 0 && !ele.checked){
            technology.setAttribute('filter', val+1);
        }

    }
}
