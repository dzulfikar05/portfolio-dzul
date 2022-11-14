/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['index.html'],
  theme: {
    container:{
      center: true,
      padding: '16px',
       
    },
    extend: {
      colors:{
        primary : 'rgb(6 182 212)',
        dark : 'rgb(15 23 42)',
        secondary : '#64748b',
      },
      screens:{
        '2xl': '1320px',
      }

    },
  },
  plugins: [],
}
