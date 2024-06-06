import jQuery from "jquery";
window.$ = jQuery;
import Chart from "chart.js/auto";

$(document).ready(function () {
    (async function () {
        const data = [
            { day: "Lunes", amount: 3 },
            { day: "Martes", amount: 7 },
            { day: "Miércoles", amount: 16 },
            { day: "jueves", amount: 30 },
            { day: "Viernes", amount: 22 },
            { day: "Sábado", amount: 10 },
            { day: "Domingo", amount: 10 },
        ];

        new Chart($("#users_chart"), {
            type: "bar",
            data: {
                labels: data.map((row) => row.day),
                datasets: [
                    {
                        label: "Usuarios nuevos",
                        data: data.map((row) => row.amount),
                        borderWidth: 1,
                        indexAxis: "x",
                        backgroundColor: [
                        'rgba(75,195,87,02)',
                        'rgba(21,93,28,02)',
                        'rgba(75,195,87,02)',
                        'rgba(21,93,28,02)',
                        'rgba(75,195,87,02)',
                        'rgba(21,93,28,02)',
                        'rgba(75,195,87,02)',
                        ],
                        borderRadius: 30,
                        // barThickness: 15,
                    },
                ],
            },
        });
    })();
});
