const path = require('path');
const mix = require('laravel-mix');

mix.js("resources/js/app.js", "public/js")
.vue()
.postCss("resources/css/app.css", "public/css", [
    require("tailwindcss"),
]);


mix.webpackConfig({
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js')
        }
    }
});
