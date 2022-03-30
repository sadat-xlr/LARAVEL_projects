function dateRange(selector){
    var input = $('#' + selector);
    input.daterangepicker({
        autoUpdateInput: false,
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1990,
        maxYear: new Date().getFullYear()
    });

    input.on('apply.daterangepicker', function(ev, picker) {
        var isEmpty = true;
        $(this).val(picker[selector].format('M-DD-YY'));

        var startDate = Date.parse($('#startDate').val());
        var endDate = Date.parse($('#endDate').val());

        if(!isNaN(startDate) && !isNaN(endDate)){
            $('.singleDHistory').each(function(i, el){
                var elDate = Date.parse(el.children[1].textContent);
                el.classList.add('d-none');

                if(elDate>=startDate && elDate<=endDate){
                    el.classList.remove('d-none');
                    isEmpty = false;
                }

            });
            if(isEmpty){
                $('.historyEmptyMsg').removeClass('d-none');
            }else{
                $('.historyEmptyMsg').addClass('d-none');
            }
        }
    });

    input.on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        $('.historyEmptyMsg').addClass('d-none');
        $('.singleDHistory').each(function(i, el){
            el.classList.remove('d-none');
        })
    });
}

$('#fundUSD').on('input', function(){
    var usd = parseInt($('#fundUSD').val());

    var btc = '';
    if(!isNaN(usd)){
        $('#fundBTC').val(usd/2);
    }else{
        $('#fundBTC').val('');
    }
});


function submitFunds(form){
    $('#'+form).submit(function(e){
        e.preventDefault();
        $('.popupWrap').removeClass('d-none');
    });
}