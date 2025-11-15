/** @type {import('tailwindcss').Config} */
import forms from '@tailwindcss/forms'
import defaultTheme from 'tailwindcss/defaultTheme'

export default {
    darkMode: 'class',
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './pages/**/*.{html,js}',
        './components/**/*.{html,js}',
    ],
    theme: {
        extend: {
            // --- KUSTOMISASI PKL 65 ---
            colors: {
                'pkl-base': {
                    'orange': '#F58220',
                    'cream': '#FDF8E1',
                },
                'pkl-compliment': {
                    'yellow': '#FBE18B',
                    'blue': '#3A539B',
                    'green': '#668A4B',
                    'purple': '#6E498B',
                },
            },
            fontFamily: {
                sans: ['"TT Bells"', 'sans-serif'], 
                headline: ['Rakkas', 'serif'],
                sub: ['Yodnam', 'sans-serif'],
            },
        },
    },
    plugins: [forms],
};