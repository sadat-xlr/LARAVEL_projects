const selectFilter = (field, key='amount') => {
    const input = selector('#'+field);
    if(!input)return;
    input.addEventListener('change', ()=>{
        const inputVal = input.value;
        let startDate = selector('#startDate');
        if(startDate){
            selector('#startDate').value='';
            selector('#endDate').value='';
        }
        let _data = [...data];
        if(inputVal==='asc' && !asc){
            asc = _data.sort((a, b)=>removeCommas(a[key]) - removeCommas(b[key]));

        }else if(inputVal==='desc' && !desc){
            desc = _data.sort((a, b)=>removeCommas(b[key]) - removeCommas(a[key]));

        }

        switch(inputVal){
            case 'asc':
                dataLoader(asc, '.transHisTable', '.pagination', 0, rowCallback, dataHead);
                break;
            case 'desc':
                dataLoader(desc, '.transHisTable', '.pagination', 0, rowCallback, dataHead);
                break;
            default:
                dataLoader(_data, '.transHisTable', '.pagination', 0, rowCallback, dataHead);
        }
    })
}

const removeCommas = str => {
    for(let char in str){
        let _char = str[char];
        if(_char!==',')continue;
        str = str.replace(',', '');
    }

    return parseFloat(str);
}