$(document).ready(function () {

    $("#login").click((e) => {
        e.preventDefault();

        secuencia();
         
    });


    //funciones 
    async function genere_input() {
        const result = await Swal.fire({
            title: 'Género',
            text: 'Por favor selecciona tu género, servirá más adelante',
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
        });

        if (result.isConfirmed) {
            const selectOption = result.value;
            console.log(selectOption);
        }
    }

    async function date_input() {
        const result = await Swal.fire({
            title: 'Fecha de nacimiento',
            text: "Por favor ingresa tu fecha de nacimiento, servirá más adelante",
            icon: 'info',
            customClass: {
                popup: 'genere_custom_popup',
                confirmButton: 'genere_custom_button'
            },
            input: 'date',
            showCancelButton: true,
            confirmButtonText: 'Seleccionar',
            cancelButtonText: 'Cancelar'
        });

        if (result.isConfirmed) {
            const selectDate = result.value;
            console.log(selectDate);
        }
    }

    async function secuencia() {
        await genere_input();
        await date_input();
    }
});
