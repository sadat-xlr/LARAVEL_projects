// For Edit Button
const editBtnList = document.getElementsByClassName("edit-btn");
const saveBtn = selector('#save');

const inputEditMode = input => {
    const isNumber = input.type==='number';
    input.disabled = false;
    input.focus();
    input.style.background = '#11104D';
    input.classList.add(isNumber ? 'ps-4' : 'px-2');

    if(isNumber)input.previousElementSibling.style.left = '13px';
}

for (editBtn of editBtnList) {
    editBtn.addEventListener("click", e => {
        let target = e.target;
        if(target.classList.contains('fas'))target = target.closest('button');

        if(target.classList.contains('mulAmount')){
            let inputs = selector('.withNum', true);
            for(let input of inputs)inputEditMode(input);
        }else if(target.classList.contains('hasRange')){
            let rangeVal = target.previousElementSibling;
            const prefix = rangeVal.classList.contains('benPercentage') ? '%' : '';
            let range = rangeVal.previousElementSibling;
            range.classList.remove('d-none');
            let rangeProgress = range.previousElementSibling;
            rangeProgress.classList.remove('d-none')
            range.value = rangeVal.textContent;
            const rangeWidth = range.offsetWidth;
            rangeProgress.style.width = rangeWidth * (range.value/100)+'px';
            range.addEventListener('input', ()=>{
                const val = range.value;
                rangeVal.textContent = val+prefix;
                rangeProgress.style.width = rangeWidth * (val/100) - 5+'px';
            });
            inputEditMode(rangeVal);
        }else{
            inputEditMode(target.previousElementSibling);
        }
        target.classList.add('d-none');
        saveBtn.classList.remove('d-none');
    });
}

// For Beneficary Percentage
const beneficaryInput = document.getElementById("benificary-percentage");
const beneficaryValue = document.getElementById("benificary-percentage-value");
if(beneficaryInput)beneficaryInput.addEventListener("change", () => beneficaryValue.value = beneficaryInput.value);

const viewInit = () => {
    saveBtn.classList.add('d-none');
    for (editBtn of editBtnList) {
        editBtn.classList.remove('d-none');
        if(editBtn.classList.contains('hasRange')){
            let editPrev = editBtn.previousElementSibling.previousElementSibling;
            editPrev.classList.add('d-none');
            editPrev.previousElementSibling.classList.add('d-none');
        }
        let inputElement = editBtn.previousElementSibling;
        if(inputElement.classList.contains('withNum')){
            inputElement = selector('.withNum', true);
            for(let input of inputElement){
                input.disabled = true;
                input.style.background = 'transparent';
                input.classList.remove('ps-4');
                input.previousElementSibling.style.left = 0;
            }

        }else{
            inputElement.disabled = true;
            inputElement.style.background = 'transparent';
            inputElement.classList.remove('px-2');
        }
    }
}
selector('#save button').addEventListener('click', viewInit);