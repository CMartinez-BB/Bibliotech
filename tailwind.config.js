const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: ['class', '[data-mode="light"]'],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                indigo: {
                  '50':  '#f9fafb',
                  '100': '#f0f1f9',
                  '200': '#dedaf3',
                  '300': '#bdb5e1',
                  '400': '#9e8aca',//botones
                  '500': '#8266b3',
                  '600': '#694a97',
                  '700': '#4e3773',
                  '800': '#35254e',
                  '900': '#1e172d',
                },
                olive: {
                    '50':  '#f6f8f6',
                    '100': '#eaf0eb',
                    '200': '#cfe2d3',
                    '300': '#a0c2a8',
                    '400': '#639e7a',
                    '500': '#487f52',
                    '600': '#3b663b',
                    '700': '#304d2f',
                    '800': '#213423',
                    '900': '#162019',
                  },
                  navy: {
                    '50':  '#f5f8f8',
                    '100': '#e2f0f7',
                    '200': '#bee1ee',
                    '300': '#8cc2d6',
                    '400': '#539db8',
                    '500': '#3d7d9a',
                    '600': '#33637e',
                    '700': '#2a4a61',
                    '800': '#1e3245',
                    '900': '#121f2d',
                  },
                  sea: {
                    '50':  '#f5f9fa',
                    '100': '#e1f1fb',
                    '200': '#bedef6',
                    '300': '#8fbee8',
                    '400': '#5d98d6',
                    '500': '#4775c5',
                    '600': '#3b5aae',
                    '700': '#2f438b',
                    '800': '#212d62',
                    '900': '#131c3e',
                  },
                  blue: {
                    '50':  '#f7f9fb',
                    '100': '#e4f1fc',
                    '200': '#c6dbf8',
                    '300': '#9bb9ee',
                    '400': '#7192e1',
                    '500': '#596ed5',
                    '600': '#4952c2',
                    '700': '#383d9e',
                    '800': '#272972',
                    '900': '#161947',
                  },
                  blue: {
                    '50':  '#f8fafb',
                    '100': '#e8f0fc',
                    '200': '#cfd9f9',
                    '300': '#a8b5ef',
                    '400': '#868ce3',
                    '500': '#6d68d8',
                    '600': '#594bc6',
                    '700': '#4338a3',
                    '800': '#2e2675',
                    '900': '#1a1847',
                  },
                  purple: {
                    '50':  '#fafbfb',
                    '100': '#f3f0f9',
                    '200': '#e7d4f4',
                    '300': '#ceade4',
                    '400': '#bd81d0',
                    '500': '#a55cbe',
                    '600': '#8940a3',
                    '700': '#67307e',
                    '800': '#462155',
                    '900': '#281530',
                  },
                  cerise: {
                    '50':  '#fcfcfb',
                    '100': '#faf0f2',
                    '200': '#f5d0e5',
                    '300': '#e8a4c8',
                    '400': '#e375a5',
                    '500': '#d45087',
                    '600': '#ba3666',
                    '700': '#92294a',
                    '800': '#681c30',
                    '900': '#3d121a',
                  },
                  cerise: {
                    '50':  '#fdfcfa',
                    '100': '#fbf0ea',
                    '200': '#f6d2d4',
                    '300': '#eaa7ab',
                    '400': '#e4777f',
                    '500': '#d4535c',
                    '600': '#ba3940',
                    '700': '#922b2f',
                    '800': '#671d20',
                    '900': '#3f1212',
                  },
                  cocoa: {
                    '50':  '#fcfbf8',
                    '100': '#faf0dd',
                    '200': '#f4d8b9',
                    '300': '#e3b086',
                    '400': '#d48257',
                    '500': '#bc6036',
                    '600': '#9f4523',
                    '700': '#79341c',
                    '800': '#532315',
                    '900': '#34160d',
                  },
                  gold: {
                    '50':  '#fbfaf6',
                    '100': '#f8f0d5',
                    '200': '#f0dca9',
                    '300': '#dab674',
                    '400': '#be8b46',
                    '500': '#a06a28',
                    '600': '#83501a',
                    '700': '#633c16',
                    '800': '#432911',
                    '900': '#2b190c',
                  },
                  gold: {
                    '50':  '#fbfaf6',
                    '100': '#f8f0d5',
                    '200': '#f0dca9',
                    '300': '#dab674',
                    '400': '#be8b46',
                    '500': '#a06a28',
                    '600': '#83501a',
                    '700': '#633c16',
                    '800': '#432911',
                    '900': '#2b190c',
                  },//
                  spacing: {
                    'chart-width': '420px',
                  },
                  colors: {
                    'grid-color': '#aaa',
                    'bar-color': '#F16335',
                  },
                  borderRadius: {
                    'bar-rounded': '3px',
                  },
                  height: {
                    'bar-thickness': '40px',
                    'bar-spacing': '10px',
                  },//
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [require('@tailwindcss/forms')],
};
