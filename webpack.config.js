require('dotenv-flow').config();
const path = require('path');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserJSPlugin = require('terser-webpack-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');

let pluginTest = [
    new UglifyJsPlugin({
        uglifyOptions: {
            ecma: 8,
            warnings: false,
            compress: true,
        }})
];

if (process.env.DEV_URL){
    const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
    pluginTest.push(
        new BrowserSyncPlugin({
            host: process.env.DEV_URL,
            port: 3000,
            proxy: process.env.DEV_URL
        })
    );
}

module.exports = [{
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
                use: ['style-loader', 'css-loader', 'postcss-loader']
            },
            {
                test: /\.scss$/,
                use: ['style-loader', 'css-loader', 'postcss-loader', 'sass-loader']
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
    plugins: pluginTest
},{
    mode: 'production',
    entry: {
        'gutenberg': './src/css/gutenberg.scss'
    },
    optimization: {
        minimizer: [new TerserJSPlugin({}), new OptimizeCSSAssetsPlugin({})],
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "[name].css",
            chunkFilename: "[name].css"
        })
    ],
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                        options: {
                            publicPath: (resourcePath, context) => {
                                return path.relative(path.dirname(resourcePath), context) + '/';
                            },
                        },
                    },
                    'css-loader',
                    'sass-loader'
                ],
            },
        ]
    },
}];