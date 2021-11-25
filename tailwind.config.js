module.exports = {
  purge: [],
  darkMode: 'class', // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        gray: {
          '50':'#EDF2F7',
          '1000': '#c2c9d2'
        },
        blueGray:{
          '800': '#1E293B'
        },
        primarycolor: '#ea5455'
      },
      height: {
        '192': '48rem',
        '160': '40rem'
      },
      minHeight: {
        '8': '8rem'
      },
      rounded:{
        '4xl': '4rem'
      },
    },
  },
  variants: {
    extend: {
      backgroundColor: ['responsive', 'hover', 'focus', 'active','group-hover'],
      textColor:['group-hover'],
      translate: ['group-hover'],
      tableLayout: ['responsive', 'hover', 'focus'],
      margin: ['last']
    },
  },
  plugins: [],
}
