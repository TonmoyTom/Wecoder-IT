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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'public/frontend/css/fontawesome.min.css',
    'public/frontend/css/slick.css',
    'public/frontend/css/bootstrap.min.css',
    'public/frontend/css/style.css',
    'public/frontend/css/responsive.css'
], 'public/css/all.css');


mix.scripts([
    'public/frontend/js/jquery.min.js',
    'public/frontend/js/popper.min.js',
    'public/frontend/js/bootstrap.min.js',
    'public/frontend/js/slick.min.js',
    'public/frontend/js/script.js',
], 'public/js/all.js');

if (mix.inProduction()) {
    mix.version();
}
