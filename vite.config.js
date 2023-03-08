import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import eslint from 'vite-plugin-eslint';
import stylelint from 'vite-plugin-stylelint';
import glob from 'glob';

export default defineConfig({
    server: {
        host: '0.0.0.0',
    },
    plugins: [
        laravel({
            input: glob.sync('resources/{scss,js,ts}/**/*.{scss,js,ts}', {
                ignore: '**/*.test.ts',
            }),
            refresh: true,
        }),
        eslint({
            failOnError: true,
            exclude: [
                '**/node_modules/**',
                '**/vendor/**/*.js',
                'vite.config.js',
                'vitest.config.js',
            ],
        }),
        stylelint({
            fix: true,
            emitWarningAsError: true,
            include: ['resources/**/*.scss'],
            exclude: ['resources/scss/third-party/**/*.scss'],
        }),
    ],
    resolve: {
        extensions: ['.mjs', '.js', '.ts', '.jsx', '.tsx', '.json'],
    },
});
