const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js").postCss(
    "resources/css/app.css",
    "public/css",
    [require("tailwindcss")]
);
mix.copy(
    "node_modules/toastify-js/src/toastify.js",
    "public/toastify/js"
).postCss("node_modules/toastify-js/src/toastify.css", "public/toastify/css");
