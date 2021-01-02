module.exports = {
  purge: [
    '../**/*.php',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    fontFamily: {
      sans: ['Nunito', 'sans-serif'],
      serif: ['Merriweather', 'serif'],
    },
    extend: {
      typography: (theme) => ({
        DEFAULT: {
          css: {
            a: {
              textDecoration: 'none',
              boxShadow: `inset 0 -10px 0 0 ${theme('colors.green.200')}`,
              transition: 'all 0.2s ease',
              '&:hover': {
                boxShadow: `inset 0 -25px 0 0 ${theme('colors.green.300')}`,
              }
            }
          }
        }
      })
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
