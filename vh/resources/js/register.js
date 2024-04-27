import Swal from 'sweetalert2';
import jQuery from 'jquery';
window.$ = jQuery;
$(document).ready(function () {
    
    $("#register").click((e) => {
        e.preventDefault();

        secuencia();
    });

    //funciones
    async function genere_input() {
        const result = await Swal.fire({
            title: "Género",
            text: "Por favor selecciona tu género, servirá más adelante",
            icon: "info",
            customClass: {
                popup: "genere_custom_popup",
                confirmButton: "genere_custom_button",
            },
            input: "select",
            inputOptions: {
                Masculino: "Masculino",
                Femenino: "Femenino",
            },
            showCancelButton: true,
            confirmButtonText: "Seleccionar",
            cancelButtonText: "Cancelar",
        });

        if (result.isConfirmed) {
            const selectOption = result.value;
            console.log(selectOption);
            return true; 
        }else{
            return false;
        }
    }

    async function date_input() {
        const result = await Swal.fire({
            title: "Fecha de nacimiento",
            text: "Por favor ingresa tu fecha de nacimiento, servirá más adelante",
            icon: "info",
            customClass: {
                popup: "genere_custom_popup",
                confirmButton: "genere_custom_button",
            },
            input: "date",
            showCancelButton: true,
            confirmButtonText: "Seleccionar",
            cancelButtonText: "Cancelar",
        });

        if (result.isConfirmed) {
            const selectDate = result.value;
            console.log(selectDate);
            return true;
        }else{
            return false;
        }
    }

    async function blood_type(){
        const result = await Swal.fire({
            title: "Tipo de sangre",
            text: "Por favor ingresa tu tipo de sangre, servirá más adelante",
            icon: "info",
            customClass: {
                popup: "genere_custom_popup",
                confirmButton: "genere_custom_button",
            },
            input: "select",
            inputOptions: {
                'A+' : 'A+',
                'O+': 'O+',
                'B+': 'B+',
                'AB+': 'AB+',
                'A-': 'A-',
                'O-': 'O-',
                'B-': 'B-',
                'AB-': 'AB-'
            },
            showCancelButton: true,
            confirmButtonText: "Seleccionar",
            cancelButtonText: "Cancelar",
        });

        if (result.isConfirmed) {
            const selectBlood = result.value;
            console.log(selectBlood);
            return true;
        }else{
            return false;
        }
    }

    async function secuencia() {
        const genereSelected = await genere_input();
        if (genereSelected) {
            const dateSelected = await date_input();
            if(dateSelected){
                await blood_type();
            }
        }
    }
});
