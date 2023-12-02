import Vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default Vue({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
