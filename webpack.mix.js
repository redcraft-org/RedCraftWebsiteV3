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


//  TODO : Use dynamic path if possible
mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/last.js', 'public/js')
    .js('resources/js/pages/home.js', 'public/js/pages')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/pages/home.scss', 'public/css')
    .options({
        postCss: [
            require('postcss-import'),
            require('tailwindcss'),
        ]
    });

if (mix.inProduction()) {
    mix.version();
}
