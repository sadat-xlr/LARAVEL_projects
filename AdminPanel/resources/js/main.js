const main = () => {
    let prevScroll = 50;
    const navbar = document.querySelector('#mainNav');
    
    const navScroller = () => {
        if(!navbar)return;
        window.onscroll = () => {
            const current = window.scrollY;
            if(current>prevScroll){
                navbar.style.top = window.innerWidth>991 ? '-200px' : '-500px';
            }else{
                navbar.style.top = 0;
            }
            prevScroll = current;
        }
    }

    navScroller();
}
main();