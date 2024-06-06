/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "vh-green": "#166534",
                "vh-green-medium-2": "#155D1C",
                "vh-green-medium": "#1D9328",
                "vh-green-light": "#4BC357",
                "vh-gray": "#E4E1E1",
                "vh-gray-light": "#EEEEEE",
                "white-not-white": "#f9f9f9",
                "vh-alice-blue": "#EDF4FC",
            },
            width: {
                100: "28rem",
                104: "32rem",
                108: "36rem",
                112: "40rem",
                116: "44rem",
                118: "46rem",
                120: "48rem",
                124: "52rem",
                128: "56rem",
                132: "60rem",
            },
            height: {
                100: "28rem",
                104: "32rem",
                108: "36rem",
                112: "40rem",
                116: "44rem",
                118: "46rem",
                120: "48rem",
                124: "52rem",
                128: "56rem",
                132: "60rem",
            },
        },
    },
    plugins: [],
};
