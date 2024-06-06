import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $("#trigger, #burger").click(function (event) {
        var scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;
        var body = document.body;
        if (body.style.position == 'fixed') {
            body.style.position = '';
            body.style.top = '';
            body.style.overflow = '';
            window.scrollTo(0, scrollPosition); // Restaurar la posición original del scroll
        } else {
            body.style.position = 'fixed';
            body.style.top = `-${scrollPosition}px`;
            body.style.overflow = 'hidden';
        }
    });
});

