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
var mixPathSrc='resources/assets/admin';
var mixPathOut='public/admins';

mix
    .copy(mixPathSrc+'/vendor/fontawesome-free/webfonts',mixPathOut+'/webfonts')
    .copy(mixPathSrc+'/vendor/datatables',mixPathOut+'/js/datatables')
    .copy(mixPathSrc+'/vendor/chart.js/Chart.min.js',mixPathOut+'/js/chart/Chart.js')
    .copy(mixPathSrc+'/vendor/chart.js/Chart.bundle.js',mixPathOut+'/js/chart/Chart.bundle.js')
    .copy(mixPathSrc+'/js/demo/chart-area-demo.js',mixPathOut+'/js/demo/chart-area-demo.js')
    .copy(mixPathSrc+'/js/demo/chart-pie-demo.js',mixPathOut+'/js/demo/chart-pie-demo.js')
    .copy(mixPathSrc+'/js/demo/datatables-demo.js',mixPathOut+'/js/demo/datatables-demo.js')
    .copy(mixPathSrc+'/img',mixPathOut+'/img')
    .copy(mixPathSrc+'/vendor/bootstrap/js/bootstrap.bundle.min.js.map',mixPathOut+'/js')
    .copy(mixPathSrc+'/vendor/datatables/dataTables.bootstrap4.min.css',mixPathOut+'/css')
    .js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .combine([
        mixPathSrc+'/vendor/jquery/jquery.min.js',
        mixPathSrc+'/vendor/bootstrap/js/bootstrap.bundle.min.js',
        mixPathSrc+'/vendor/jquery-easing/jquery.easing.min.js',
        mixPathSrc+'/js/sb-admin-2.min.js'
    ],mixPathOut+'/js/sb-admin.js')
    .styles([
        mixPathSrc+'/vendor/fontawesome-free/css/all.min.css',
        mixPathSrc+'/css/sb-admin-2.min.css',
    ],mixPathOut+'/css/sb-admin.css')
    .sourceMaps()
    .browserSync('dingo.test');

/*if (mix.inProduction()) {
    mix.version();
}*/
