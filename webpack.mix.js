const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/custom.scss', 'public/css')

    .copy('node_modules/font-awesome/css/font-awesome.css', 'public/css')

    .copy('node_modules/owl.carousel/dist/owl.carousel.js', 'public/js')
    .copy('node_modules/owl.carousel/dist/assets/owl.carousel.css', 'public/css')
    .copy('node_modules/owl.carousel/dist/assets/owl.theme.default.css', 'public/css')

    .less('node_modules/jquery-range/jquery.range.less', 'public/css')
    .copy('node_modules/jquery-range/jquery.range.js', 'public/js')



;

