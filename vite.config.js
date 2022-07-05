import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import livewire from '@defstudio/vite-livewire-plugin';
import path from "path";

const certificates = {
    key: 'C:\\laragon\\etc\\ssl\\laragon.key', crt: 'C:\\laragon\\etc\\ssl\\laragon.crt',
}
export default defineConfig({
    plugins: [laravel({
        input: 'resources/js/app.js', ssr: 'resources/js/ssr.js',
    }), vue({
        template: {
            transformAssetUrls: {
                base: null, includeAbsolute: false,
            },
        },
    }), livewire({
        refresh: ['resources/css/app.css'],
        watch: ['./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php', './vendor/laravel/jetstream/**/*.blade.php', './storage/framework/views/*.php', '**/app/**/Livewire/**/*.php', './vendor/filament/**/*.blade.php',],
    })], server: {
        host: 'localhost', port: 3000, hmr: {
            host: 'localhost', port: 3000,
        }, cors: true, https: {
            maxVersion: 'TLSv1.2', ...certificates,
        },
    },
    resolve: {
        alias: {
            '@': 'resources/js',
            'ziggy': path.resolve(__dirname, 'vendor/tightenco/ziggy/src/js')
        }
    },
});
