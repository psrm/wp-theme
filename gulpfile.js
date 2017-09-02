var elixir = require('laravel-elixir');

elixir(function (mix) {
    mix
        .styles([
            'smartmenus/dist/css/sm-core-css.css',
            'smartmenus/dist/css/sm-simple/sm-simple.css'
        ], 'public/css/1-dependencies.css', 'node_modules')
        .sass([
            'base.scss'
        ], 'public/css/2-main.css')
        .stylesIn('public/css')
        .scripts([
            'bootstrap-sass/assets/javascripts/bootstrap.js',
            'smartmenus/dist/jquery.smartmenus.js'
        ], 'public/js/1-dependencies.js', 'node_modules')
        .scripts([
            'main.js'
        ], 'public/js/2-main.js')
        .scriptsIn('public/js');
});
