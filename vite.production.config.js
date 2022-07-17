import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import livewire from '@defstudio/vite-livewire-plugin';
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
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
        cors: true, https: {
            maxVersion: 'TLSv1.2',
        },
    }, resolve: {
        alias: {
            '@': 'resources/js', 'ziggy': path.resolve(__dirname, 'vendor/tightenco/ziggy/src/js')
        }
    },
});
