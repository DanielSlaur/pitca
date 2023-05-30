/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
  theme: {
    fontFamily :{
        mono: [
            'ui-monospace',
            // 'SFMono-Regular',
            // 'Menlo',
            // 'Monaco',
            // 'Consolas',
            // '"Liberation Mono"',
            // '"Courier New"',
            'monospace',
        ],
    },
    extend: {},
  },
  plugins: [],
}

