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

    .copy('node_modules/bootstrap/dist/js/bootstrap.js', 'public/js')


    .copy('node_modules/jquery/dist/jquery.js', 'public/js')

    .copy('node_modules/font-awesome/css/font-awesome.css', 'public/css')

    .copy('node_modules/linearicons/dist/web-font/style.css', 'public/css/linearicons.css')
    .copy('node_modules/linearicons/dist/web-font/fonts', 'public/css/fonts')

    .copy('node_modules/simplelightbox/dist/simple-lightbox.js', 'public/js')
    .sass('node_modules/simplelightbox/dist/simplelightbox.scss', 'public/css')

    .copy('node_modules/jquery-nice-select/js/jquery.nice-select.js', 'public/js')
    .copy('node_modules/jquery-nice-select/css/nice-select.css', 'public/css')

    .copy('node_modules/animate.css/animate.css', 'public/css')

    .copy('node_modules/jquery-ui-dist/jquery-ui.css', 'public/css')
    .copy('node_modules/jquery-ui-dist/jquery-ui.js', 'public/js')

    .sass('resources/sass/style.scss', 'public/css')
    .sass('resources/sass/responsive.scss', 'public/css')

    .copy('node_modules/jquery.stellar/jquery.stellar.js', 'public/js')

    .copy('node_modules/imagesloaded/imagesloaded.pkgd.js', 'public/js')

    .copy('node_modules/isotope-layout/js/isotope.js', 'public/js')

    .copy('resources/js/theme.js', 'public/js')

    .copy('node_modules/font-awesome/fonts/FontAwesome.otf', 'public/fonts')
    .copy('node_modules/font-awesome/fonts/fontawesome-webfont.eot', 'public/fonts')
    .copy('node_modules/font-awesome/fonts/fontawesome-webfont.svg', 'public/fonts')
    .copy('node_modules/font-awesome/fonts/fontawesome-webfont.ttf', 'public/fonts')
    .copy('node_modules/font-awesome/fonts/fontawesome-webfont.woff', 'public/fonts')
    .copy('node_modules/font-awesome/fonts/fontawesome-webfont.woff2', 'public/fonts')

    .copy('node_modules/owl.carousel/dist/owl.carousel.js', 'public/js')
    .copy('node_modules/owl.carousel/dist/assets/owl.carousel.css', 'public/css')
    .copy('node_modules/owl.carousel/dist/assets/owl.theme.default.css', 'public/css')

    .less('node_modules/jquery-range/jquery.range.less', 'public/css')
    .copy('node_modules/jquery-range/jquery.range.js', 'public/js')



;

