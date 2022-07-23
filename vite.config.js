import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from "path";
import basicSsl from '@vitejs/plugin-basic-ssl'

const certificates = {
    key: 'C:\\laragon\\etc\\ssl\\laragon.key', crt: 'C:\\laragon\\etc\\ssl\\laragon.crt',
}
export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            ssr: 'resources/js/ssr.js',
            refresh: true,
        }), vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        basicSsl(),
    ],
    resolve: {
        alias: {
            '@': 'resources/js',
            'ziggy': path.resolve(__dirname, 'vendor/tightenco/ziggy/src/js')
        }
    },
    ssr: {
        noExternal: ['@inertiajs/server'],
    },
});
