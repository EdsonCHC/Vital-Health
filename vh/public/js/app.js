$(document).ready(function() {
    
    $("#login").click((e)=>{
        e.preventDefault();
        Swal.fire({
            title: 'Genero',
            text: 'Por favor selecciona tu genero, servirá mas adelante',
            icon: 'info',
            customClass: {
                popup: 'genere_custom_popup',
                confirmButton: 'genere_custom_button'
            },
            input: "select",
            inputOptions: {
                'Masculino': "Masculino",
                'Femenino': "Femenino"
            },
            showCancelButton: true,
            confirmButtonText: 'Seleccionar',
            cancelButtonText: 'Cancelar'
        }).then((result)=>{
            if(result.isConfirmed){
                let selectOption = result.value;
                console.log(selectOption);
            }
        })
    })

});
