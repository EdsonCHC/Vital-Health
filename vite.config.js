import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                //css
                "resources/css/app.css",
                "resources/css/loader.css",
                "resources/css/menu.css",
                "resources/css/sweet.css",
                "resources/css/checkbox.css",
                "resources/css/colorsChat.css",
                "resources/css/chatsv1.css",
                "resources/css/animation.css",
                "resources/css/admin_staff.css",
                //js
                "resources/js/admin_appointment.js",
                "resources/js/admin_edit_staff.js",
                "resources/js/admin_history_staff.js",
                "resources/js/admin_new_staff.js",
                "resources/js/animation.js",
                "resources/js/app.js",
                "resources/js/appointment.js",
                "resources/js/chatsv1.js",
                "resources/js/citas.js",
                "resources/js/login.js",
                "resources/js/preloader.js",
                "resources/js/register.js",
                "resources/js/scroll.js",
                "resources/js/stats_chart.js",
                "resources/js/view.js",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            $: "jQuery",
        },
    }
});
