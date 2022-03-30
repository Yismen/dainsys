let mix = require('laravel-mix');

mix
    .sass('resources/sass/app.scss', 'public/css/app.css')
    .sass('resources/sass/site.scss', 'public/css/site.css')
    .js('resources/js/app.js/', 'public/js/app.js')
    .js('resources/js/site.js/', 'public/js/site.js')
    ;

if (mix.inProduction()) {
    mix.version();
}