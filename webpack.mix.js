const mix = require('laravel-mix');
/**
 * Admin Panel
 * @type {string}
 */
const mixPathSrc = 'resources/assets/admin';
const mixPathOut = 'public/admins';
mix
    .copy(mixPathSrc + '/vendor/fontawesome-free/webfonts', mixPathOut + '/webfonts')
    .copy(mixPathSrc + '/vendor/datatables', mixPathOut + '/js/datatables')
    .copy(mixPathSrc + '/vendor/chart.js/Chart.min.js', mixPathOut + '/js/chart/Chart.js')
    .copy(mixPathSrc + '/vendor/chart.js/Chart.bundle.js', mixPathOut + '/js/chart/Chart.bundle.js')
    .copy(mixPathSrc + '/js/demo/chart-area-demo.js', mixPathOut + '/js/demo/chart-area-demo.js')
    .copy(mixPathSrc + '/js/demo/chart-pie-demo.js', mixPathOut + '/js/demo/chart-pie-demo.js')
    .copy(mixPathSrc + '/js/demo/datatables-demo.js', mixPathOut + '/js/demo/datatables-demo.js')
    .copy(mixPathSrc + '/img', mixPathOut + '/img')
    .copy(mixPathSrc + '/vendor/bootstrap/js/bootstrap.bundle.min.js.map', mixPathOut + '/js')
    .copy(mixPathSrc + '/vendor/datatables/dataTables.bootstrap4.min.css', mixPathOut + '/css')
    .js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .combine([
        mixPathSrc + '/vendor/jquery/jquery.min.js',
        mixPathSrc + '/vendor/bootstrap/js/bootstrap.bundle.min.js',
        mixPathSrc + '/vendor/jquery-easing/jquery.easing.min.js',
        mixPathSrc + '/js/sb-admin-2.min.js'
    ], mixPathOut + '/js/sb-admin.js')
    .styles([
        mixPathSrc + '/vendor/fontawesome-free/css/all.min.css',
        mixPathSrc + '/css/sb-admin-2.min.css',
    ], mixPathOut + '/css/sb-admin.css')
    .sourceMaps()
    .browserSync('dingo.test');
/**
 * Dingo Frontend
 * @type {string}
 */
const dingoPathSrc = 'resources/assets/frontend';
const dingoPathOut = 'public/frontends/dingo';
mix
    .copy(dingoPathSrc + '/fonts', dingoPathOut + '/fonts')
    .copy(dingoPathSrc + '/img', dingoPathOut + '/img')
    .copy(dingoPathSrc + '/webfonts', dingoPathOut + '/webfonts')
    .copy(dingoPathSrc + '/sass', dingoPathOut + '/sass')
    .copy(dingoPathSrc + '/js/swiper.min.js.map', dingoPathOut + '/js')
    .copy(dingoPathSrc + '/js/contact.js', dingoPathOut + '/js')
    .copy(dingoPathSrc + '/js/jquery.ajaxchimp.min.js', dingoPathOut + '/js')
    .copy(dingoPathSrc + '/js/jquery.validate.min.js', dingoPathOut + '/js')
    .copy(dingoPathSrc + '/js/jquery.form.js', dingoPathOut + '/js')
    .copy(dingoPathSrc + '/css/style.css.map', dingoPathOut + '/css')
    .js('resources/js/app.js', dingoPathOut+'/js')
    .combine([
        dingoPathSrc+'/js/jquery-1.12.1.min.js',
        dingoPathSrc+'/js/popper.min.js',
        dingoPathSrc+'/js/bootstrap.min.js',
        dingoPathSrc+'/js/jquery.magnific-popup.js',
        dingoPathSrc+'/js/swiper.min.js',
        dingoPathSrc+'/js/jmasonry.pkgd.js',
        dingoPathSrc+'/js/owl.carousel.min.js',
        dingoPathSrc+'/js/slick.min.js',
        dingoPathSrc+'/js/gijgo.min.js',
        dingoPathSrc+'/js/jquery.nice-select.min.js',
        dingoPathSrc+'/js/custom.js',
    ],dingoPathOut+'/js/dingo.js')
    .styles([
        dingoPathSrc+'/css/bootstrap.min.css',
        dingoPathSrc+'/css/animate.css',
        dingoPathSrc+'/css/owl.carousel.min.css',
        dingoPathSrc+'/css/themify-icons.css',
        dingoPathSrc+'/css/flaticon.css',
        dingoPathSrc+'/css/magnific-popup.css',
        dingoPathSrc+'/css/slick.css',
        dingoPathSrc+'/css/gijgo.min.css',
        dingoPathSrc+'/css/all.css',
        dingoPathSrc+'/css/style.css',
    ],dingoPathOut+'/css/dingo.css')
    .sourceMaps()
mix.version()