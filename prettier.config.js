module.exports = {
  semi: false,
  singleQuote: true,
  trailingComma: 'none',
  arrowParens: 'avoid',
  plugins: [
    '@prettier/plugin-php',
    '@wordpress/prettier-config',
    'prettier-plugin-pkg'
  ],
  overrides: [
    {
      files: '*.svg',
      options: {
        parser: 'html'
      }
    }
  ]
}
