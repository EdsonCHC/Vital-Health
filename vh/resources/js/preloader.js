const preloader = document.querySelector(".preloader");

window.addEventListener("load", ()=>{
    preloader.style.opacity = "0";
    setTimeout(() => {
        preloader.style.display = "none";
    }, 1000);
})