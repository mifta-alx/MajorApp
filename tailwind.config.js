/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors:{
        'primary-light':'#F6F1F1',
        'secondary-500':'#19A7CE',
        'secondary-600':'#1698BC',
        'secondary-700':'#158CAD',
        'secondary-800':'#137F9D',
        'third-light':'#146C94'
      },
      fontFamily:{
        'pjs-light' : ['PlusJakartaSans-Light', 'sans-serif'],
        'pjs-extralight' : ['PlusJakartaSans-ExtraLight', 'sans-serif'],
        'pjs-regular' : ['PlusJakartaSans-Regular', 'sans-serif'],
        'pjs-medium' : ['PlusJakartaSans-Medium', 'sans-serif'],
        'pjs-semibold' : ['PlusJakartaSans-SemiBold', 'sans-serif'],
        'pjs-bold' : ['PlusJakartaSans-Bold', 'sans-serif'],
        'pjs-extrabold' : ['PlusJakartaSans-ExtraBold', 'sans-serif'],
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
