const path = require("path")
const UglifyJsPlugin = require('uglifyjs-webpack-plugin')

module.exports = {
    mode: 'production',
    entry: "./src/index.js",
    output: {
        filename: "index.js",
        path: path.join(__dirname, "dist")
    },
    module: {
        rules: [
            {
                test: /.js$/,
                exclude: /(node_modules)/,
                use: {
                    loader: "babel-loader",
                    options: {
                        presets: ["env"]
                    }
                }
            },
            {
                test: /\.css$/,
                use:
                    [
                        {loader: "style-loader"},
                        {loader: "css-loader"}
                    ]

            },
            {
                test: /\.scss$/,
                use:
                    [
                        {loader: "style-loader"},
                        {loader: "css-loader"},
                        {loader: "sass-loader"}
                    ]

            },
            {
                test: /\.(png|jp(e*)g|svg)$/,
                use: [{
                    loader: 'url-loader',
                    options: {
                        limit: 8000, // Convert images < 8kb to base64 strings
                        name: 'images/[hash]-[name].[ext]'
                    }
                }]
            }
          ]
    },
    plugins: [
      new UglifyJsPlugin({
        uglifyOptions: {
              ecma: 8,
              warnings: false,
              compress: true,
              }
       })
    ]
}
