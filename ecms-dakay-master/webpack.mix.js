const { mix } = require('laravel-mix');

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
   /**
    * @tasking CSS for web
    * convert sass to css save directly to public/csss
    **/
   .sass('./resources/assets/sass/default.scss', 'public/css')
   .sass('./resources/assets/sass/print/print.scss', 'public/css')
   .sass('./resources/assets/sass/print/print-page.scss', 'public/css')


   /**
    * @tasking ES6 for web
    * convert modern JS to Native JS respectively, save directly to public/css
    **/
   .webpackConfig({
       entry: {
           default: './resources/assets/js/default.js',
           chartjs: './resources/assets/js/chartjs.js',
           uploads: './resources/assets/js/uploads.js',
           gallery: './resources/assets/js/gallery.js',
       },
       output: {
           filename: 'js/[name].js'
       }
   });
