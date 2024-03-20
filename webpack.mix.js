const mix = require('laravel-mix');

/*
|--------------------------------------------------------------------------
| Mix Asset Management
|--------------------------------------------------------------------------
|
| Mix provides a clean, fluent API for defining some Webpack build steps
| for your Laravel applications. By default, we are compiling the CSS
| file for the application as well as bundling up all the JS files.
|
*/

mix
  // .setResourceRoot("oao/public/")
  .js('resources/js/app.js', 'public/js')
  .vue()
  .postCss('resources/css/app.css', 'public/css', [
      //
  ])
  .webpackConfig({
    resolve:{
      extensions:['.js','.vue'],
      alias:{
        //設定絕對路徑
        '@':__dirname+'/resources/js'
      }
    }
  })
