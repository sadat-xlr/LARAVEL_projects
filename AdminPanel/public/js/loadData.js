//Helper
const create = el => document.createElement(el);
const selector = (el, all=false) => document['querySelector'+(all ? 'All': '')](el);

let nextPageIn=0;
const dataLoader = (data, dataContainer, paginateCont, startIndex=0, callback, dataHead) => {
    dataContainer = selector(dataContainer);
    dataContainer.innerHTML = dataHead;
    selector(paginateCont).innerHTML = '';
    if(Object.keys(data).length<1 || !dataContainer || startIndex<0){
        let emptyMsg = create('p');
        emptyMsg.className = 'text-danger text-center fs-4';
        emptyMsg.textContent = 'No User Available!'
        dataContainer.appendChild(emptyMsg);
        return;
    }
    let className = 'd-flex my-2 p-3 pe-5 singleDHistory position-relative singleUm';
    
    let i=startIndex;
    let inc=0;
    while(data[i]){
        if(inc===7){
            break;
        }
        let li = create('li');
        li.className = className;
        let _row = data[i];
        callback(_row, li, dataContainer);
        i++;
        inc++;
    }

    paginate(data, paginateCont, startIndex, callback, dataHead);
}

const paginate = (data, paginateCont, startIndex, callback, dataHead) => {
    const totalRows = Object.keys(data);
    if(totalRows.length<8)return;

    let btnClasses = 'text-white px-2 py-1 border-0 rounded';
    paginateCont = selector(paginateCont);

    let prev = create('button');
    prev.id = 'prev';
    prev.className = btnClasses;
    prev.innerHTML = '<img src="img/prev.png"> Prev';
    if(startIndex<1)prev.setAttribute('disabled', 'true');
    paginateCont.appendChild(prev);

    btnClasses+=' ms-2';
    let next = create('button');
    next.id = 'next';
    next.className=btnClasses;
    next.innerHTML = 'Next <img src="img/next.png">';
    paginateCont.appendChild(next);

    let last = create('button');
    last.id = 'last';
    last.className=btnClasses;
    last.innerHTML = 'Last <img src="img/last.png">';
    paginateCont.appendChild(last);

    prev.addEventListener('click', ()=>{
        nextPageIn-=7;
        if(nextPageIn<1){setTimeout(()=>selector('#prev').setAttribute('disabled', 'true'), 100);}
        dataLoader(data, '.transHisTable', '.pagination', nextPageIn, callback, dataHead);
    })

    next.addEventListener('click', e=>{
        if(!data[nextPageIn+7])return;
        nextPageIn+=7;
        if(!data[nextPageIn+7]){
            setTimeout(()=>selector('#next').setAttribute('disabled', 'true'), 100);
            setTimeout(()=>selector('#last').setAttribute('disabled', 'true'), 100);
        }
        dataLoader(data, '.transHisTable', '.pagination', nextPageIn, callback, dataHead);
        setTimeout(()=>selector('#prev').removeAttribute('disabled'), 100);
    });

    last.addEventListener('click', ()=>{
        let totalRows = Object.keys(data).length;
        let _totalRows = totalRows;
        while(_totalRows>=0){
            if(_totalRows%7===0 && _totalRows===totalRows){
                nextPageIn=totalRows-7;
                dataLoader(data, '.transHisTable', '.pagination', nextPageIn, callback, dataHead);
                selector('#next').setAttribute('disabled', 'true');
                setTimeout(()=>selector('#last').setAttribute('disabled', 'true'), 100);
                break;
            }else if(_totalRows%7===0 && _totalRows!==totalRows){
                nextPageIn=totalRows-(totalRows-_totalRows);
                dataLoader(data, '.transHisTable', '.pagination', nextPageIn, callback, dataHead);
                selector('#next').setAttribute('disabled', 'true');
                setTimeout(()=>selector('#last').setAttribute('disabled', 'true'), 100);
                break;
            }
            _totalRows--;
        }
    })
}