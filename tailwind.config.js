/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/**/*.{html,php}"
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter var',]
      },
    },
  },
  plugins: [require('@tailwindcss/forms')],
}

