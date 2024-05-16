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
                "vh-green-medium": "#1D9328",
                "vh-green-light": "#4BC357",
                "vh-gray-light": "#EEEEEE",
                "white-not-white": "#f9f9f9",
            },
        },
    },
    plugins: [],
};
