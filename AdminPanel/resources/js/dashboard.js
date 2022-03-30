const querySelector = selector => document.querySelector(selector);
const classList = selector => querySelector(selector).classList;

let prev = 0;
//Header menu disappearing on scroll on mobile device
const menuEffectOnScroll = () => {
    let next = window.scrollY;
    if(next>prev){
        querySelector('header').style.top = '-500px';
        classList('#mainNav').remove('opened');
    }else{
        querySelector('header').style.top = '0';
    }
    prev=next;
}

//Defining navigation height based on device height
const menuDesign = () => {
    querySelector('#mainNav').style.height = window.innerHeight - 65 +'px';
    if(window.innerWidth<576){
        classList('.menuList').add('d-none');

        window.addEventListener('scroll', menuEffectOnScroll);

    }else{
        classList('.menuList').remove('d-none');
        window.removeEventListener('scroll', menuEffectOnScroll, false);
        querySelector('header').style.top = '0';
    }
}

//Dark mode toggler
const toggleDark = () => {
    const bodyClass = classList('body');
    querySelector('.switchChk').addEventListener('click', ()=>{
        bodyClass.toggle('dark');

        querySelector('.logoImg').src = bodyClass.contains('dark') ? 'img/headLogoWhite.png' : 'img/headLogo.png';
    })
}
toggleDark();

const toggleOnClick = (clickOn, selector, toggleClass, shouldCngBtnDesign=false) => querySelector(clickOn).addEventListener('click', ()=>{
    classList(selector).toggle(toggleClass);

    if(shouldCngBtnDesign){
        if(classList(selector).contains('d-none')){
            querySelector(clickOn).textContent = '+';
        }else{
            querySelector(clickOn).textContent = 'x';
        }
    }
});


toggleOnClick('#navToggler', '#mainNav', 'opened');
toggleOnClick('#headerMenuToggler', '.menuList', 'd-none', true);
menuDesign();

window.onresize = menuDesign;

