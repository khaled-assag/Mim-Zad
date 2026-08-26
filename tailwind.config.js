const brand = {
    navy: '#0C1C3D',
    petrol: '#0C1C3D',
    emerald: '#1AB59C',
    emeraldBorder: 'rgba(26, 181, 156, 0.42)',
    ivory: '#CECECE',
    surface: '#10264A',
    surfaceSoft: '#153052',
    muted: 'rgba(206, 206, 206, 0.72)',
    white: '#FFFFFF',
};

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './app/Livewire/**/*.php',
        './app/View/**/*.php',
    ],
    theme: {
        extend: {
            colors: {
                brand,
            },
            fontFamily: {
                huwiya: ['"itf Huwiya Arabic"', 'Arial', 'sans-serif'],
            },
            borderRadius: {
                card: '12px',
                btn: '12px',
                pill: '999px',
            },
            boxShadow: {
                card: '0 2px 14px rgba(12, 28, 61, 0.22)',
                'card-hover': '0 8px 26px rgba(12, 28, 61, 0.34)',
            },
            transitionDuration: {
                fast: '150ms',
                base: '250ms',
            },
            maxWidth: {
                site: '1200px',
            },
        },
    },
    plugins: [],
};
