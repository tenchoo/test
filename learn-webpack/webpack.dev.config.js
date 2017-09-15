const htmlpack = require('html-webpack-plugin');
// const textpack = require('extract-text-webpack-plugin');
// var path = require('path');

module.exports = {
  entry : './src/app.js',
  output: {
    path: __dirname+'/dist',
    filename: 'js/[name].js',
    // publicPath: 'http://cdn/'
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        // exclude: /(node_modules|bower_components)/,
        include: __dirname+'src',
        use: [
          {
            // enforce: "pre",
            loader: 'babel-loader',
            options: {
              presets:['es2015']
            }
          }
        ]
      },
      {
        test: /\.css$/,
        use: [
          'style-loader',
          {
            loader: 'css-loader',
            options: {
              importLoaders: 1,
              sourceMap: true
            }
          },
          {
            loader: 'postcss-loader',
            options: {
              plugins: function () {
                return [
                  require('postcss-import'),
                  require('autoprefixer')({
                    browsers: ["last 5 versions"]
                  })
                ];
              },
              sourceMap: true
            }
          }
        ]
      },
      {
        test: /\.less$/,
        use: [
          'style-loader',
          {
            loader: 'css-loader',
            options: {
              sourceMap: true
            }
          },
          // {
          //   loader: 'postcss-loader',
          //   options: {
          //     plugins: function () {
          //       return [
          //         require('autoprefixer')({
          //           browsers: ["last 5 versions"]
          //         })
          //       ];
          //     }
          //   }
          // },
          {
            loader:'less-loader',
            options: {
              sourceMap: true,
              // includePaths: [
              //   path.resolve("./node_modules/bootstrap-sass/assets/stylesheets")
              // ]
            }
          }
        ]
      },
      // {
      //   test: /\.woff2?$|\.ttf$|\.eot$|\.svg$/,
      //   use: [{
      //     loader: "file-loader"
      //   }]
      // },
      {
        test: /\.html$/,
        use: {loader: 'html-loader'}
      }
    ]
  },
  plugins: [
    new htmlpack({
      filename: 'index.html',
      template: 'index.html',
      inject: 'body',
      // chunks:['main','a'],
      // excludeChunks:[],
      // minify:{
      //   collapseWhitespace:true,
      //   minifyCSS:true,
      //   html:true,
      //   // minifyJS:true,
      //   removeComments:true
      // },
      title:'config title',
      date: new Date()
    }),
    // new textpack('[name].css')
  ],
  node: {
    fs: "empty"
  }
}