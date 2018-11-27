var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')

    .setPublicPath('/build')
    
    .addEntry('app', './assets/js/app.js')
    
    .enableSingleRuntimeChunk()

    .cleanupOutputBeforeBuild()
    //.enableSourceMaps(!Encore.isProduction())
    
    //.enableVersioning(Encore.isProduction())
    enableVueLoader()
    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment if you use Sass/SCSS files
    //.enableSassLoader()

    // uncomment if you're having problems with a jQuery plugin
    //.autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();