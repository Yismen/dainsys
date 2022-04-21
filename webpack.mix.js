let mix = require('laravel-mix');
require('laravel-mix-purgecss');
// let glob = require("glob");

mix
    // .options({
    //     purifyCss: {
    //         paths: glob.sync(
    //             path.join(__dirname, 'resources/**/*.blade.php'),
    //             path.join(__dirname, 'resources/**/*.vue')
    //         )
    //     }
    // })
    .sass('resources/sass/app.scss', 'public/css/app.css')
    .sass('resources/sass/site.scss', 'public/css/site.css')
    .js('resources/js/app.js/', 'public/js/app.js')
    .js('resources/js/site.js/', 'public/js/site.js')
    .purgeCss({
        rejected: true,
        // enabled: true,
        content: [
            path.join(__dirname, 'resources/**/*.blade.php'),
            path.join(__dirname, 'resources/**/*.vue')
        ],
        whitelistPatterns: [
            /dataTable/,
            /dt/,
            /select2/,
            /thead/,
            /sorting/,
            /even/,
            /dz-/,
            /dropzone/,
        ],
    })
    ;

if (mix.inProduction()) {
    mix.version();
}