/**
 * Webpack config.
 *
 * @package   Theme_Package
 * @author    Theme_Author <Theme_Author_Email>
 * @copyright Copyright (c) 2018, Theme_Author
 * @license   GNU General Public License v2 or later
 * @version   1.0.0
 */
module.exports = {
    entry: __dirname + '/' + paths.scripts + '/script.js',
    output: {
        filename: 'script.min.js',
        path: __dirname + '/' + paths.scripts + '/',
    },
    devtool: 'eval-source-map',
    module: {
      rules: [
        {
          test: /\.(js|jsx)$/,
          exclude: /(node_modules|bower_components)/,
          loader: 'babel-loader',
          query: {
            presets: [
              [ 'latest', { modules: false } ],
            ],
          },
        },
      ],
    },
    plugins: [
        new UglifyJsPlugin()
    ],
  };