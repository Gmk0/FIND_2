function withOpacity(variableName) {
    return ({ opacityValue }) => {
        if (opacityValue !== undefined) {
            return `rgba(var(${variableName}), ${opacityValue})`
        }
        return `rgb(var(${variableName}))`
    }
}

const defaultTheme = require('tailwindcss/defaultTheme');
const plugin = require('tailwindcss/plugin');
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',

    presets: [

        require('./vendor/wireui/wireui/tailwind.config.js'),
        require('./vendor/filament/filament/tailwind.config.js')
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php',
        './vendor/filament/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['DM Sans', ...defaultTheme.fontFamily.sans],
            },
            textColor: {
                skin: {
                    base: withOpacity('--color-text-base'),
                    muted: withOpacity('--color-text-muted'),
                    inverted: withOpacity('--color-text-inverted'),
                }
            },
            animation: {
                "spin-slow": "spin 3s linear infinite",
                "extra-spin-slow": "spin 20s linear infinite",
            },
            backgroundColor: {
                skin: {
                    fill: withOpacity('--color-fill'),
                    'button-accent': withOpacity('--color-button-accent'),
                    'button-accent-hover': withOpacity('--color-button-accent-hover'),
                    'button-muted': withOpacity('--color-button-muted'),
                }
            },
            gradientColorStops: {
                skin: {
                    hue: withOpacity('--color-fill'),
                },
            },
            colors: {
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
            },
        },
    },

    plugins: [require('@tailwindcss/typography'),
    require('@tailwindcss/forms')({
        strategy: 'class',
    }),

    require('@tailwindcss/aspect-ratio'),

    plugin(function ({ addUtilities, theme }) {
        const newUtilities = {
            '.custom-scrollbar': {
                '.custom-scrollbar::-webkit-scrollbar': { width: '6px' },
                '.custom-scrollbar::-webkit-scrollbar-track': { background: theme('bg-secondary') },
                '.custom-scrollbar::-webkit-scrollbar-thumb': { background: '#888' },
                '.custom-scrollbar::-webkit-scrollbar-thumb:hover': { background: '#555' },
            }
        }

        addUtilities(newUtilities, ['responsive', 'hover'])
    })],


};