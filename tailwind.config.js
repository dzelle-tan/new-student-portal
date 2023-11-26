import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                inter: ['Inter', 'sans-serif'],
            },
            // fontFamily: {
            //     sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            // },
            backgroundImage: {
                'login': "url('/images/login-bg.svg')",
            },
            colors: {
                'primary': '#2D349A',

                // Shades of primary color
                'primary-dark-1': '#1f2472',
                'primary-dark-2': '#0f1450',

                // Tints of primary color
                'primary-light-1': '#4860c7',
                'primary-light-2': '#6e7abd',

                // Tones of primary color
                'primary-muted': '#5e6181',
                'primary-muted-2': '#8487a6',

                'blue-hover': '#4F74BB',
                'blue-pressed': '#2D6B9A',
                'secondary': '#AB830F',
                'gold-surface': '#FFF0E0',
                'gold-hover': '#D2CB65',
                'gold-pressed': '#D2CB65',
                'grey-main': '#434343',
                'grey-body': '#676c72',
                'grey-bg': '#F0F0F0',
                'white-main': '#FFFFFF',
            },
        },
    },

    plugins: [forms],
};
