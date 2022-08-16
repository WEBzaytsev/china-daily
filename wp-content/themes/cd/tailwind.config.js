module.exports = {
    content: [
        "*.php",
        "./vector-images/**/*.php",
        "./pages/**/*.php",
        "./inc/**/*.php",
        "./template-parts/**/*.php",
        "./app/js/**/*.js",
    ],
    theme: {
        extend: {
            spacing: {
                '0.75': '0.1875rem',
                '2.75': '0.6875rem',
                '3.25': '0.8125rem',
                '4.25': '1.0625rem',
                '4.5': '1.125rem',
                '5.5': '1.375rem',
                '6.25': '1.5625rem',
                '6.5': '1.625rem',
                '7.5': '1.875rem',
                '8.5': '2.125rem',
                '9.5': '2.375rem',
                '10.5': '2.625rem',
                '11.5': '2.875rem',
                '12.5': '3.125rem',
                '13': '3.25rem',
                '13.5': '3.375rem',
                '15': '3.75rem',
                '16.5': '4.125rem',
                '17.5': '4.375rem',
                '18': '4.5rem',
                '18.5': '4.625rem',
                '19': '4.75rem',
                '19.5': '4.875rem',
                '20.5': '5.125rem',
                '21.5': '5.375rem',
                '22': '5.5rem',
                '22.5': '5.625rem',
                '23': '5.75rem',
                '23.5': '5.875rem',
                '25': '6.25rem',
                '26.5': '6.625rem',
                '27': '6.75rem',
                '33': '8.25rem',
                '33.75': '8.4375rem',
                '34': '8.5rem',
                '35': '8.75rem',
                '35.5': '8.875rem',
                '45': '11.25rem',
                '47': '11.75rem',
                '51': '12.75rem',
                '66': '16.5rem',
                '75': '18.75rem',
                '87.5': '21.875rem',
                '98': '24.5rem',
            },
            colors: {
                'common-bg': '#F0F4FD',
                grey: {
                    300: '#E5E5E5',
                    400: '#D5D5D5',
                    600: '#A0A0A0',
                    900: '#333'
                },
                blue: '#557AFF',
                ochre: '#E2954D',
                red: '#D80027',
                green: {
                    600: '#49B85A',
                    700: '#209833',
                },
                orange: '#FF8B1F'
            },
            transitionDuration: {},
            fontFamily: {
                inter: [
                    'Inter',
                    'Roboto',
                    'Helvetica',
                    'Arial',
                    'sans-serif'
                ],
            },
            borderRadius: {
                10: '10px',
                13: '13px',
                30: '30px'
            },
            boxShadow: {
                btn: '0px 4px 4px rgba(0, 0, 0, 0.25), inset 0px 4px 4px rgba(0, 0, 0, 0.3)',
                icon: 'inset 0px 4px 4px rgba(0, 0, 0, 0.25)',
                block: '0px 0px 15px rgba(0, 0, 0, 0.05)',
            },
            dropShadow: {
                icon: '0px 4px 4px rgba(0, 0, 0, 0.3)'
            },
            gridTemplateColumns: {
                footer: 'auto minmax(0, 100%) auto'
            },
            fontSize: {
                '3.3xl': '32px',
                'huge': ['80px', '103.5%']
            },
            letterSpacing: {
                mini: '-0.045em',
                tight: '-0.03em',
                small: '-0.02em',
                normal: '-0.01em',
            },
            lineHeight: {
                huge: '38px'
            },
            gridTemplateRows: {
                'services-list': 'repeat(2, 420px)'
            }
        }
    },
    plugins: [],
}