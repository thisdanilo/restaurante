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
    "node_modules/ladda/dist/ladda.min.css",
    "node_modules/ladda/dist/ladda-themeless.min.css",
    "resources/admin/css/sb-admin-2.min.css",
    "resources/admin/vendor/datatables/dataTables.bootstrap4.min.css",
], "public/css/admin.css");

mix.combine([
    "resources/admin/vendor/jquery/jquery.min.js",
    "resources/admin/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "resources/admin/vendor/jquery-easing/jquery.easing.min.js",
    "resources/admin/js/sb-admin-2.min.js",
    "resources/admin/vendor/datatables/jquery.dataTables.min.js",
    "resources/admin/vendor/datatables/dataTables.bootstrap4.min.js",
    "node_modules/ladda/dist/spin.min.js",
    "node_modules/ladda/dist/ladda.min.js",
    "resources/admin/js/form.js",
    "node_modules/jquery-mask-plugin/dist/jquery.mask.min.js",
    "resources/admin/js/validate-cnpj.js",
], "public/js/admin.js");

mix.scripts("resources/admin/js/tenant.js", "public/js/tenant.js");

mix.scripts("resources/admin/js/role.js", "public/js/role.js");
