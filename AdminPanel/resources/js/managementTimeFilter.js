const mngmtTimeFilter = (target, data, callback, dataHead, key='date') => {
    var input = $('#' + target);
    input.daterangepicker({
        autoUpdateInput: false,
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1990,
        maxYear: new Date().getFullYear()
    });

    input.on('apply.daterangepicker', function(ev, picker) {
        let locat = selector('#locationFilter');
        if(locat)locat.value='';
        $(this).val(picker[target].format('M-DD-YY'));
        var pickedDate = Date.parse(input.val());
        if(target==='startDate')dateStart=pickedDate;
        else dateEnd=pickedDate;
        if(target==='endDate' && dateStart===0){
            $(this).val('');
            alert('Please Select Start Date First!');
        }else if(target==='endDate' && pickedDate<dateStart){
            $(this).val('');
            alert('Please Choose A Date Greater Than Start Date!');
            return;
        }
        var newData = [];
        if(target==='startDate'){
            for(let row in data){
                let _row = data[row];
                if(dateEnd>0){
                    if(_row[key]>=pickedDate && _row[key]<=dateEnd)newData.push(_row);
                }else{
                    if(_row[key]>=pickedDate)newData.push(_row);
                }
            }
        }else{
            for(let row in data){
                let _row = data[row];
                if(_row[key]>=dateStart && _row[key]<=pickedDate)newData.push(_row);
            }
        }
        dataLoader(newData, '.transHisTable', '.pagination', 0, callback, dataHead);
        filteredData=[...newData];
    });

    input.on('cancel.daterangepicker', function(ev, picker) {
        if(target==='startDate'){
            newData=[];
            filteredData=null;
            dataLoader(data, '.transHisTable', '.pagination', 0, callback, dataHead);
            $(this).val('');
            $('#endDate').val('');
            selector('#locationFilter').value='';
        }else{
            newData=[];
            $('#endDate').val('');
            for(let row in data){
                let _row = data[row];
                if(_row[key]>=dateStart)newData.push(_row);
            }
            dataLoader(newData, '.transHisTable', '.pagination', 0, callback, dataHead);
            filteredData=[...newData];
            selector('#locationFilter').value='';
        }
        prevData = null;
    });
}