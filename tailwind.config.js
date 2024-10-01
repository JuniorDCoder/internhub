import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: '#2888ad',
                    // #cc14fc
                    // #2888ad
                    dark: '#280d3d'
                },
                secondary: {
                    light: '#F5F5F5',
                    DEFAULT: '#FFFFFF',
                    dark: '#E0E0E0',
                },
            },
        },
    },

    plugins: [forms],
};
