import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                //css
                'resources/css/404.css',
                'resources/css/admin_staff.css',
                'resources/css/animation.css',
                'resources/css/app.css',
                'resources/css/chatsv1.css',
                'resources/css/checkbox.css',
                'resources/css/footer.css',
                'resources/css/loader.css',
                'resources/css/menu.css',
                'resources/css/sweet.css',
                'resources/css/user.css',
                //js
                "resources/js/ad_appointment.js",
                'resources/js/ad_calendar.js',
                'resources/js/ad_cate.js',
                'resources/js/ad_staff.js',
                'resources/js/admin.js',
                'resources/js/admin_appointment.js',
                "resources/js/animation.js",
                "resources/js/app.js",
                "resources/js/appointment.js",
                'resources/js/area.js',
                'resources/js/chatsv1.js',
                'resources/js/citas.js',
                'resources/js/doc_appointment.js',
                'resources/js/doc_citas.js',
                'resources/js/doc_examenes.js',
                'resources/js/doctor.js',
                'resources/js/exams.js',
                'resources/js/expediente.js',
                'resources/js/lab.js',
                'resources/js/login.js',
                'resources/js/medicine.js',
                'resources/js/menu.js',
                'resources/js/noti.js',
                'resources/js/preloader.js',
                'resources/js/program_doc.js',
                'resources/js/qrcode.js',
                'resources/js/receta.js',
                'resources/js/recetas.js',
                'resources/js/register.js',
                'resources/js/scroll.js',
                'resources/js/searchcitas.js',
                'resources/js/user.js',
                'resources/js/videollamada.js',
                'resources/js/view.js'
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
