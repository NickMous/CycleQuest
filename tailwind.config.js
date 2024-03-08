import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: ['./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php', './vendor/laravel/jetstream/**/*.blade.php', './storage/framework/views/*.php', './resources/views/**/*.blade.php',],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            }, colors: {
                'text': {
                    DEFAULT: '#121002',
                    100: '#040300',
                    200: '#070701',
                    300: '#0b0a01',
                    400: '#0f0d02',
                    500: '#121002',
                    600: '#6a5f0c',
                    700: '#c3ae16',
                    800: '#ebd94f',
                    900: '#f5eca7'
                }, 'bg': {
                    DEFAULT: '#fefefb',
                    100: '#515114',
                    200: '#a2a228',
                    300: '#d6d659',
                    400: '#eaeaaa',
                    500: '#fefefb',
                    600: '#fefefc',
                    700: '#fefefd',
                    800: '#fffffd',
                    900: '#fffffe'
                }, 'pr': {
                    DEFAULT: '#e8cf2c',
                    100: '#322c06',
                    200: '#63570b',
                    300: '#958311',
                    400: '#c6af16',
                    500: '#e8cf2c',
                    600: '#ecd856',
                    700: '#f1e280',
                    800: '#f6ecab',
                    900: '#faf5d5'
                }, 'se': {
                    DEFAULT: '#8cf2ba',
                    100: '#084523',
                    200: '#0f8a46',
                    300: '#17cf6a',
                    400: '#47eb91',
                    500: '#8cf2ba',
                    600: '#a3f5c8',
                    700: '#baf7d6',
                    800: '#d1fae3',
                    900: '#e8fcf1'
                }, 'ac': {
                    DEFAULT: '#47e8eb',
                    100: '#063637',
                    200: '#0c6d6e',
                    300: '#12a3a5',
                    400: '#18d9dc',
                    500: '#47e8eb',
                    600: '#6cedef',
                    700: '#91f1f3',
                    800: '#b6f6f7',
                    900: '#dafafb',
                }, 'dm-text': {
                    DEFAULT: '#fdfbed',
                    100: '#584e0a',
                    200: '#b09b14',
                    300: '#e9d23c',
                    400: '#f3e795',
                    500: '#fdfbed',
                    600: '#fdfcf0',
                    700: '#fefcf4',
                    800: '#fefdf8',
                    900: '#fffefb'
                }, 'dm-bg': {
                    DEFAULT: '#040401',
                    100: '#010100',
                    200: '#020200',
                    300: '#020201',
                    400: '#030301',
                    500: '#040401',
                    600: '#555515',
                    700: '#a6a629',
                    800: '#d7d75d',
                    900: '#ebebae'
                }, 'dm-pr': {
                    DEFAULT: '#d3ba17',
                    100: '#2a2505',
                    200: '#544a09',
                    300: '#7f700e',
                    400: '#a99513',
                    500: '#d3ba17',
                    600: '#e9d139',
                    700: '#eedd6a',
                    800: '#f4e89c',
                    900: '#f9f4cd'
                }, 'dm-se': {
                    DEFAULT: '#0d733b',
                    100: '#03170c',
                    200: '#052e17',
                    300: '#084523',
                    400: '#0a5c2f',
                    500: '#0d733b',
                    600: '#14b85e',
                    700: '#30e883',
                    800: '#75f0ac',
                    900: '#baf7d6'
                }, 'dm-ac': {
                    DEFAULT: '#14b5b8',
                    100: '#042425',
                    200: '#084849',
                    300: '#0c6d6e',
                    400: '#109193',
                    500: '#14b5b8',
                    600: '#23e3e7',
                    700: '#5aeaed',
                    800: '#91f1f3',
                    900: '#c8f8f9'
                }

            }
        },
    },

    plugins: [forms, typography], darkMode: 'selector',
};
