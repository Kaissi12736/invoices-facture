import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
            '@': path.resolve(__dirname, 'resources/js'),
        },
    },
    server: {
        proxy: {
            '/api': {
                target: 'http://your-local-dev-url.test',
                changeOrigin: true,
                secure: false,
            },
        },
    },
});

// Laravel Mix configuration
// const mix = require('laravel-mix');

// mix.js('resources/js/app.js', 'public/js').vue()
//    .sass('resources/sass/app.scss', 'public/css')
//    .sourceMaps()
//    .version()
//    .options({
//        processCssUrls: false
//    });

// mix.browserSync('your-local-dev-url.test');
// mix.webpackConfig({
//     resolve: {
//         alias: {
//             '@': path.resolve('resources/js'),
//         },
//     },
// });