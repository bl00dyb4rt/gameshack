let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
    'resources/assets/public/css/font-face.css',
    'resources/assets/public/vendor/bootstrap-4.1/bootstrap.min.css',
    'resources/assets/public/vendor/animsition/animsition.min.css',
    'resources/assets/public/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css',
    'resources/assets/public/vendor/wow/animate.css',
    'resources/assets/public/vendor/css-hamburgers/hamburgers.min.css',
    'resources/assets/public/vendor/slick/slick.css',
    'resources/assets/public/vendor/select2/select2.min.css',
    'resources/assets/public/vendor/perfect-scrollbar/perfect-scrollbar.css',
    'resources/assets/public/css/theme.css',
], 'public/css/public.css')
.scripts([
    'resources/assets/public/vendor/jquery-3.2.1.min.js',
    'resources/assets/public/vendor/bootstrap-4.1/popper.min.js',
    'resources/assets/public/vendor/bootstrap-4.1/bootstrap.min.js',
    'resources/assets/public/vendor/slick/slick.min.js',
    'resources/assets/public/vendor/wow/wow.min.js',
    'resources/assets/public/vendor/animsition/animsition.min.js',
    'resources/assets/public/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js',
    'resources/assets/public/vendor/counter-up/jquery.waypoints.min.js',
    'resources/assets/public/vendor/counter-up/jquery.counterup.min.js',
    'resources/assets/public/vendor/circle-progress/circle-progress.min.js',
    'resources/assets/public/vendor/perfect-scrollbar/perfect-scrollbar.js',
    'resources/assets/public/vendor/chartjs/Chart.bundle.min.js',
    'resources/assets/public/js/sweetalert2.all.js',
    'resources/assets/public/js/main.js',
], 'public/js/public.js')
.js(['resources/assets/js/app.js'],'public/js/app.js');
