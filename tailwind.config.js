/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'primary-light': '#F6F1F1',
        "secondary-50": "#eff9fc",
        "secondary-100": "#c0e7f2",
        "secondary-200": "#86d1e5",
        "secondary-300": "#39b3d5",
        "secondary-400": "#18a1c6",
        "secondary-500": "#1488a7",
        "secondary-600": "#11728d",
        "secondary-700": "#0e5c72",
        "secondary-800": "#0c4e60",
        "secondary-900": "#083845",
        'third-light': '#146C94'
      },
      fontFamily: {
        'pjs-light': ['PlusJakartaSans-Light', 'sans-serif'],
        'pjs-extralight': ['PlusJakartaSans-ExtraLight', 'sans-serif'],
        'pjs-regular': ['PlusJakartaSans-Regular', 'sans-serif'],
        'pjs-medium': ['PlusJakartaSans-Medium', 'sans-serif'],
        'pjs-semibold': ['PlusJakartaSans-SemiBold', 'sans-serif'],
        'pjs-bold': ['PlusJakartaSans-Bold', 'sans-serif'],
        'pjs-extrabold': ['PlusJakartaSans-ExtraBold', 'sans-serif'],
      },
      backgroundImage: {
        'mesh-gradient': "url('/images/meshgradient.jpeg')",
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
