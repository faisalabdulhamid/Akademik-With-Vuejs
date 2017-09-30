let mix = require('laravel-mix');

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

mix
    //.js('resources/assets/js/akademik.js', 'public/js')

    //.js('resources/assets/js/tahun-ajaran/tahun-ajaran.js', 'public/js')

    .js('resources/assets/js/siswa/siswa.js', 'public/js')
    //.js('resources/assets/js/kelas/kelas.js', 'public/js')

    .sass('resources/assets/sass/akademik.scss', 'public/css')
    //
    //.js('resources/assets/js/login/login.js', 'public/js')
    //.sass('resources/assets/sass/login.scss', 'public/css')

    //.copy('node_modules/pace-js/pace.min.js', 'public/js')
    //.copy('node_modules/pace-js/themes/blue/pace-theme-flash.css', 'public/css')
    //.copy('node_modules/select2/dist/css/select2.min.css', 'public/css')
    //.copy('node_modules/select2/dist/js/select2.min.js', 'public/js');
