const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .vue() // Ajoutez cette ligne si vous utilisez Vue.js
   .postCss('resources/css/app.css', 'public/css', [
      require('tailwindcss'),
   ]);

mix.webpackConfig({
   module: {
      rules: [
         {
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
               loader: 'babel-loader',
               options: {
                  presets: ['@babel/preset-env'],
               },
            },
         },
      ],
   },
});
