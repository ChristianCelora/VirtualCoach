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
    .js('resources/js/account.js', 'public/js')
    .js('resources/js/home.js', 'public/js')
    .js('resources/js/training.js', 'public/js')
    .js('resources/js/exercise.js', 'public/js')
    .js('resources/js/workout.js', 'public/js')
    .sass('resources/sass/form_buttons.scss', 'public/css')
    .sass('resources/sass/header.scss', 'public/css')
    .sass('resources/sass/main_content.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css');
