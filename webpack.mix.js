const mix = require('laravel-mix');



mix
    .sass('resources/views/scss/style.scss', 'public/pages/style.css')


    .scripts ('node_modules/jquery/dist/jquery.js', 'public/pages/jquery.js')
    .scripts ('node_modules/bootstrap/dist/js/bootstrap.bundle.js','public/pages/bootstrap.js')

    .styles (['resources/views/pages/css/style.css'], 'public/pages/css/style.css')
    .styles (['resources/views/pages/css/login.css'], 'public/pages/css/login.css')
    .scripts (['resources/views/pages/js/script.js'], 'public/pages/js/script.js')

    .version();
