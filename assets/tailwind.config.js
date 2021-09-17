module.exports = {
  important: true,
  purge: {
    content: [
      '../**/*.php',
    ],
    safelist: [
      'hidden',
      'p-6',
      'p-4',
      'space-x-4',
      'h-96',
      'hover:bg-gray-500',
      'overflow-auto',
      'flex-no-wrap',
      'transition-all',
      'rounded'

    ]
  } ,
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
    require('@tailwindcss/forms'),
  ],
}
