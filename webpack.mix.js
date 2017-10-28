let mix = require('laravel-mix');

mix.options( { processCssUrls: false } );

mix.js('src/js/app.js', 'dist/js/')
   .sass('src/scss/app.scss', 'dist/css/');