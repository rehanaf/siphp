/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/**/*.{html,php}"
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter var', 'Poppins', 'Sans Serif']
      },
    },
  },
  plugins: [require('@tailwindcss/forms')],
}

