/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/css/app.css",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          50:  '#f0fdf4',
          100: '#dcfce7',
          200: '#bbf7d0',
          300: '#86efac',
          400: '#4ade80',
          500: '#22c55e',
          600: '#16a34a',
          700: '#15803d',
          800: '#166534',
          900: '#14532d',
          950: '#052e16',
        },
        islamic: {
          gold:   '#c8a84b',
          cream:  '#fdf6e3',
          dark:   '#1a3a1a',
          green:  '#1a7a1a',
          light:  '#a8e6a3',
        }
      },
      fontFamily: {
        sans: ['Poppins', 'sans-serif'],
        arabic: ['Amiri', 'serif'],
      },
      backgroundImage: {
        'green-gradient': 'linear-gradient(135deg, #1a7a1a 0%, #2d9e2d 30%, #4CAF50 60%, #a8e6a3 100%)',
        'green-gradient-dark': 'linear-gradient(135deg, #052e16 0%, #14532d 50%, #166534 100%)',
        'hero-pattern': "url('/images/pattern-islamic.svg')",
      },
      animation: {
        'fade-in-up': 'fadeInUp 0.6s ease-out forwards',
        'float': 'float 3s ease-in-out infinite',
        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
      },
      keyframes: {
        fadeInUp: {
          '0%': { opacity: '0', transform: 'translateY(30px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        float: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-10px)' },
        }
      },
      boxShadow: {
        'green': '0 4px 15px rgba(34, 197, 94, 0.3)',
        'green-lg': '0 10px 40px rgba(34, 197, 94, 0.4)',
        'card': '0 4px 20px rgba(0, 0, 0, 0.08)',
        'card-hover': '0 8px 40px rgba(0, 0, 0, 0.15)',
      }
    },
  },
  safelist: [
    // Custom component classes used in @layer components
    'btn-primary', 'btn-outline', 'btn-white',
    'card', 'card-islamic',
    'section-title', 'section-subtitle', 'section-badge',
    'ornament-divider',
    'form-input', 'form-label', 'form-error',
    'hero-gradient', 'hero-pattern',
    'nav-link', 'nav-link-active',
    'badge-pending', 'badge-proses', 'badge-diterima', 'badge-ditolak',
    'sidebar-link', 'sidebar-link-active',
    'admin-card',
    'text-shadow', 'text-shadow-sm',
    // Dynamic badge classes
    { pattern: /badge-(pending|proses|diterima|ditolak)/ },
    // Color utilities that might be purged
    { pattern: /bg-(green|teal|blue|purple|yellow|orange|red|gray|white)-(50|100|200|500|600|700|800|900)/ },
    { pattern: /text-(green|teal|blue|purple|yellow|orange|red|gray|white)-(50|100|200|300|400|500|600|700|800|900)/ },
    { pattern: /border-(green|gray|white)-(100|200|300|400|500)/ },
    { pattern: /from-(green|teal|blue|purple|yellow|orange|red)-(500|600|700|800|900)/ },
    { pattern: /to-(green|teal|blue|purple|yellow|orange|red)-(500|600|700|800|900)/ },
  ],
  plugins: [],
}
