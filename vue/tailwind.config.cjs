/** @type {import('tailwindcss').Config} */
module.exports = {
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
                smHeroImage: '43vh',
                mdHeroImage: '60vh'
            }
        },
    },
    plugins: [
        // require('@tailwindcss/forms')

    ],
}