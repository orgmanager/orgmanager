let mix = require("laravel-mix");
var tailwindcss = require("tailwindcss");

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
  .js("resources/assets/js/app.js", "public/js")
  .js("resources/assets/js/landing.js", "public/js")
  .sass("resources/assets/sass/app.scss", "public/css")
  .less("resources/assets/less/new.less", "public/css")
  .options({
    postCss: [tailwindcss("./tailwind.js")]
  });

if (mix.inProduction()) {
  mix.version();
}
