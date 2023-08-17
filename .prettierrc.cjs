module.exports = {
    tailwindConfig: './tailwind.config.js',
    plugins: [require('@shufo/prettier-plugin-blade'), require('prettier-plugin-tailwindcss')],
    overrides: [
        {
            files: '*.blade.php',
            options: {
                parser: 'html',
                tabWidth: 4,
            },
        },
    ],
};
