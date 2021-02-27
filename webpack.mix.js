const mix = require('laravel-mix');

mix.autoload({
    axios: ['axios'],
    jquery: ['$', 'jQuery', 'window.jQuery'],
});

mix
    .js('resources/js/app.js', 'public/js/all.min.js')
    .sass('resources/sass/app.scss', 'public/css/styles.min.css')
    .options({
        processCssUrls: false
    })
    .version();
