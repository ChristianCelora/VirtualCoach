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

/*
    .copy('node_modules/font-awesome/fonts/', 'public/fonts')
    .sass('node_modules/font-awesome/scss/font-awesome.scss', 'public/css')
*/

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/form_buttons.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css');
