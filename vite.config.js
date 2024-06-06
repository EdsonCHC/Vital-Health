import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/loader.css",
                "resources/js/preloader.js",
                "resources/css/app.css",
                "resources/js/animation.js",
                "resources/css/animation.css",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            $: "jQuery",
        },
    },
});
