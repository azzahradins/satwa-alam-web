module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    screens: {
        sm: '350px',
        md: '740px',
        lg: '1280px',
        xl: '1440px',
    },
    backgroundColor: theme => ({
        ...theme('colors'),
        'base' : '#F3E9D2',
        'primary' : '#028090',
        'secondary' : '#05668D',
        'accent' : '#02C39A',
        'darker' : '#00A896'
    }),
    extend: {
        backgroundColor: ['active'],
        zIndex: ['responsive', 'hover'],
    }
  },
  variants: {
    display: ['responsive', 'dropdown']
  },
  plugins: [
    require('@tailwindcss/ui'),
    require('tailwindcss-dropdown'),
  ]
}
