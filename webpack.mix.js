const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");

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
  .js("resources/js/app.js", "public/js")
  .less("resources/less/new.less", "public/css")
  .options({
    postCss: [tailwindcss("./tailwind.js")]
  })
  .webpackConfig({
    output: {
      publicPath: '/',
      chunkFilename: 'js/chunks/[name].js?[chunkhash]',
    }
  });

if (mix.inProduction()) {
  mix.version();
}
