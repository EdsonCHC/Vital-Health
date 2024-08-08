// import Swal from "sweetalert2";
import jQuery, { post } from "jquery";
window.$ = jQuery;

$(document).ready(function(){
    $("#login_btn").click((e)=>{
        e.preventDefault();

        const _token = $("#_token").val();
        const mail = $("#mail").val();
        const password = $("#password").val();

        $.ajax({
            url: '/login',
            type: 'POST',
            data:{
                _token: _token,
                mail: mail,
                password: password
            },
            success(response){
               if(response.success){
                window.location.href = response.redirect_url;
               }
            },
            error(response){
                console.log(response);
            }
        });
    });
});
