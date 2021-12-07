let mix = require('laravel-mix');
mix
    .copy('node_modules/select2', 'storage/app/public/vendor/select2')
    .sass('resources/assets/sass/app.scss', 'public/css/app.css')
    .sass('resources/assets/sass/site.scss', 'public/css/site.css')
    .js('resources/assets/js/app.js/', 'public/js/app.js')
    .js('resources/assets/js/site.js/', 'public/js/site.js')
;

if (mix.inProduction()) {
    mix.version();
}