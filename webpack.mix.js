const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.combine([
    "resources/admin/vendor/fontawesome-free/css/all.min.css",
    "resources/admin/css/sb-admin-2.min.css"
], "public/css/admin.css");

mix.combine([
    "resources/admin/vendor/jquery/jquery.min.js",
    "resources/admin/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "resources/admin/vendor/jquery-easing/jquery.easing.min.js",
    "resources/admin/js/sb-admin-2.min.js",
    "resources/admin/vendor/chart.js/Chart.min.js",
    "resources/admin/js/demo/chart-area-demo.js",
    "resources/admin/js/demo/chart-pie-demo.js",
], "public/js/admin.js");
