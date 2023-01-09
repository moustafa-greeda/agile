let icon = document.querySelector('.icon_bar');
let nav = document.querySelector('.parent_links');

icon.onclick = () => {
    nav.classList.toggle("clip");
}
/************** button scroll to top ***************/
let ss = document.querySelector('.btn');

window.onscroll = function(){
    if(window.scrollY >= 500){
        ss.style.display = "block";
    }else{
        ss.style.display = "none";
    }
}

ss.onclick = ()=>{
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth'
    })
}