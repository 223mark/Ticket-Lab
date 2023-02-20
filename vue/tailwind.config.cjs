/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        "./index.html",
        "./src/**/*.{vue,js,ts,jsx,tsx}",

    ],
    theme: {

        screens: {
            sm: '480px',
            md: '768px',
            lg: '976px',
            xl: '1440px'
        },
        extend: {
            height: {
                smHeroImage: '52vh',
                mdHeroImage: '62vh'
            },
            colors: {
                theme: '#028527',
                dark: '#1F1B24',
                darkTheme: '#27e8a7',
                darkIndigo: '#168FFF',
                darkWhite: '#91FFFF'
            }
        },
    },
    plugins: [
        // require('@tailwindcss/forms')

    ],
}