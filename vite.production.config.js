import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            ssr: 'resources/js/ssr.js',
            refresh: true,
        }), vue({
            template: {
                transformAssetUrls: {
                    base: null, includeAbsolute: false,
                },
            },
        }),],
    server: {
        cors: true, https: {
            maxVersion: 'TLSv1.2',
        },
    }, resolve: {
        alias: {
            '@': 'resources/js', 'ziggy': path.resolve(__dirname, 'vendor/tightenco/ziggy/src/js')
        }
    },
});
