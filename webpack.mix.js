// webpack.mix.js

let mix = require('laravel-mix');
//src folderyje randam app.js ir idedam i folderi public
mix.js('src/js/app.js', 'public')
    //randam app.scss ir idedam i public konvertuota app.css
    .sass('src/css/app.scss', 'public');