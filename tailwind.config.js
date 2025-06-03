import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
        fontFamily: {
            sans: ['Poppins', 'sans-serif'],
        },
        },
    },
    // pastikan semua path ke Blade/JS sudah sesuai
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    plugins: [],
};

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {

    fontFamily: {
        poppins: ['Poppins', 'sans-serif'],
      },

    colors: {
        turquoise: {
          400: '#40E0D0',
        },
    },

    blur: {
        '100': '100px',
        '120': '120px',
    },

      backgroundImage: {
        'radial-pink': 'radial-gradient(circle at center, #f472b6, #fff)',
      },
      animation: {
        'bounce-slow': 'bounce 3s infinite',
        'spin-slow': 'spin 10s linear infinite',
        'fade-in': 'fadeIn 0.5s ease-out forwards',
        'slide-in-from-bottom': 'slideInFromBottom 0.5s ease-out forwards',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        slideInFromBottom: {
          '0%': { transform: 'translateY(20px)', opacity: '0' },
          '100%': { transform: 'translateY(0)', opacity: '1' },
        },
      },
    },
  },
  plugins: [],
}

