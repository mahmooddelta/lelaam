const mix = require('laravel-mix');
const webpackNodeExternals = require('webpack-node-externals');

mix.js('resources/js/ssr.js', 'public/js')
    .extract()
    .vue({
        version: 3,
        useVueStyleLoader: true,
        options: {optimizeSSR: true},
    })
    .alias({
        '@': 'resources/js',
        ziggy: 'vendor/tightenco/ziggy/dist/index',
    })
    .webpackConfig({
        target: 'node',
        externals: [webpackNodeExternals()],
    })
    .browserSync({
        proxy: 'leelam.test',
        https: {
            key: "C:/laragon/etc/ssl/laragon.key",
            cert: "C:/laragon/etc/ssl/laragon.crt"
        }
    });
