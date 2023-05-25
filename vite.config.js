import { viteStaticCopy } from 'vite-plugin-static-copy'
import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'

export default defineConfig({

    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: 'resources/assets/src/assets/',
                    dest: 'assets/src',

                }
            ],
        })
    ],

    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },

});
