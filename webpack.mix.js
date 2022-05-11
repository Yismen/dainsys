let mix = require('laravel-mix');
require('laravel-mix-purgecss');
// let glob = require("glob");

const fs = require("fs");
const path = require("path");

if (mix.inProduction()) {
    mix.version();

    fs.rmdir(path.join(__dirname, "./public/vendors~js"), { recursive: true, force: true }, function () {
        return true;
    });

    fs.rmdir(path.join(__dirname, "./public/js/chunks"), { recursive: true, force: true }, function () {
        return true;
    });
}

mix
    .sass('resources/sass/app.scss', 'public/css/app.css')
    .sass('resources/sass/site.scss', 'public/css/site.css')
    .js('resources/js/app.js/', 'public/js/app.js')
    .js('resources/js/site.js/', 'public/js/site.js')
    .purgeCss({
        rejected: true,
        // enabled: true, // If enabled, will purge css on development
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
            /swal2-/,
        ],
    });
