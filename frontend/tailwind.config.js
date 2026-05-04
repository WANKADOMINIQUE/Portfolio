/** @type {import('tailwindcss').Config} */
export default {
  content: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        brand: {
          50:  '#eef4ff',
          100: '#dbe7ff',
          200: '#bfd4ff',
          300: '#93b6ff',
          400: '#608dff',
          500: '#3a66ff',
          600: '#2447f5',
          700: '#1c36d8',
          800: '#1c30ad',
          900: '#1d2f88',
          950: '#141c4f',
        },
        accent: {
          400: '#22d3ee',
          500: '#06b6d4',
          600: '#0891b2',
        },
        ink: {
          50:  '#f7f8fb',
          100: '#eceff5',
          200: '#d6dbe7',
          300: '#b1bacd',
          400: '#7e8aa6',
          500: '#5b6685',
          600: '#404a66',
          700: '#2f3650',
          800: '#1f2438',
          900: '#141828',
          950: '#0a0d18',
        },
      },
      fontFamily: {
        sans: ['Inter', 'system-ui', '-apple-system', 'Segoe UI', 'sans-serif'],
        display: ['Sora', 'Inter', 'sans-serif'],
        mono: ['JetBrains Mono', 'Fira Code', 'monospace'],
      },
      boxShadow: {
        glass: '0 8px 32px 0 rgba(31, 38, 135, 0.18)',
        glow: '0 0 40px -10px rgba(58, 102, 255, 0.55)',
      },
      backgroundImage: {
        'grid-light': "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 40 40'%3E%3Cpath fill='none' stroke='%23e5e7eb' d='M0 0h40v40H0z'/%3E%3C/svg%3E\")",
      },
      keyframes: {
        'fade-up': {
          '0%': { opacity: '0', transform: 'translateY(16px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        'float': {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-8px)' },
        },
        'shimmer': {
          '0%': { backgroundPosition: '-200% 0' },
          '100%': { backgroundPosition: '200% 0' },
        },
        'blink': {
          '0%, 100%': { opacity: '1' },
          '50%': { opacity: '0' },
        },
      },
      animation: {
        'fade-up': 'fade-up 0.6s ease-out both',
        'float': 'float 4s ease-in-out infinite',
        'shimmer': 'shimmer 1.6s linear infinite',
        'blink': 'blink 1s steps(1) infinite',
      },
    },
  },
  plugins: [],
}
