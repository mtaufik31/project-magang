/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
    extend: {
        backgroundPosition: {
                'pos-0': '0% 0%',
                'pos-100': '100% 100%',
            },

            backgroundSize: {
                'size-200': '200% 200%',
            },
    },
  },
    plugins: [],
  }
