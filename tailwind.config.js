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
            fontSize: {
                'xxs': '0.6rem'
            },
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

                'secondary': '#AB830F',

                // Shades of secondary color
                'secondary-dark-1': '#7e5f0c',
                'secondary-dark-2': '#523e08',

                // Tints of secondary color
                'secondary-light-1': '#d2b027',
                'secondary-light-2': '#e5ca56',

                // Tones of secondary color
                'secondary-muted': '#b8a179',
                'secondary-muted-2': '#cfc1a4',

                'table-header': '#6B7280',
            },
            width: {
                '1/7': '11.4285714rem', 
            },
            animation: {
                typewriter: 'typewriter 2s steps(11) forwards',
                caret: 'typewriter 2s steps(11) forwards, blink 1s steps(11) infinite 2s',
            },
            keyframes: {
                typewriter: {
                    to: {
                        left: '100%',
                    },
                },
                blink: {
                    '0%': {
                        opacity: '0',
                    },
                    '0.1%': {
                        opacity: '1',
                    },
                    '50%': {
                        opacity: '1',
                    },
                    '50.1%': {
                        opacity: '0',
                    },
                    '100%': {
                        opacity: '0',
                    },
                },
            },
        },
    },
    plugins: [forms],
};
