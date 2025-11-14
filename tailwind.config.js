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
        './components/**/*.{html,js}'
    ],
    theme: {
        extend: {
            fontFamily: {
                yodnam: ['Yodnam', ...defaultTheme.fontFamily.sans],
                rakkas: ['Rakkas', ...defaultTheme.fontFamily.sans]
            }
        }
    },
    plugins: [forms]
}
