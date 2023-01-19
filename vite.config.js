import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    server: {
        host: 'photogallery.local',
        port: 5173,
        open: false,
        hmr: {
            host: 'photogallery.local',
            port: 5173,
        }
    },
    publicDir: 'resources/',
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~boostrap': path.resolve(__dirname, 'node_modules/bootstrap')
        }
    }
});
