let mix = require('laravel-mix');
mix
    .sass('resources/assets/sass/app.scss', 'public/css/app.css')
    .sass('resources/assets/sass/site.scss', 'public/css/site.css')
    .js('resources/assets/js/app.js/', 'public/js/app.js')
    .js('resources/assets/js/site.js/', 'public/js/site.js')
;

if (mix.inProduction()) {
    mix.version();
}