const mix = require('laravel-mix');

// Compiler le fichier CSS depuis resources vers public/css
mix.css('resources/css/retrait.css', 'public/css');
