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
   .sass('resources/sass/app.scss', 'public/css');

mix.styles([
      'resources/assets/css/libs/bootstrap.css',
      'resources/assets/css/libs/blog-post.css',
      'resources/assets/css/libs/font-awesome.css',
      'resources/assets/css/libs/metisMenu.css',
      'resources/assets/css/libs/sb-admin-2.css',
  ], './public/css/libs.css');

mix.scripts([
   'resources/assets/js/libs/jquery-3.4.1.min.js',
   'resources/assets/js/libs/popper.min.js',
   'resources/assets/js/libs/bootstrap.min.js',
   // 'resources/assets/js/libs/bootstrap.bundle.min.js',
   'resources/assets/js/libs/metisMenus.js',
   'resources/assets/js/libs/sb-admin-2.js',
   'resources/assets/js/libs/scripts.js',
], './public/js/libs.js');