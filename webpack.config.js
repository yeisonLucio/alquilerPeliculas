var Encore = require('@symfony/webpack-encore');
const { VueLoaderPlugin } = require('vue-loader');

Encore
    .setOutputPath('public/build')

    .setPublicPath('/build')
    
    .addEntry('app', './web/vue/app.js')
    
    .enableSingleRuntimeChunk()

    .cleanupOutputBeforeBuild()

    .addPlugin(new VueLoaderPlugin())

    .enableVueLoader()

    
;

module.exports = Encore.getWebpackConfig();