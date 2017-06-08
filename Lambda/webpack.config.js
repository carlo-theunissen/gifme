/**
 * Created by carlo on 7-6-2017.
 */
var fs = require('fs');
var WrapperPlugin = require('wrapper-webpack-plugin');

var footer = fs.readFileSync('./footer.js', 'utf8');
module.exports = {
    entry:  './bootstrap.js',
    target: "node",
    output : {
        filename: 'index.js',
        libraryTarget: 'var',
        library: 'file'
    },
    resolve: {
        extensions: ['.ts','.js','.json']
    },
    plugins: [
        new WrapperPlugin({
            footer: footer
        })
    ],

    module: {
        loaders: [
            {
                test: /.ts$/,
                loader: 'awesome-typescript-loader'
            },
            {
                test: /\.json$/,
                loaders: ['json-loader']
            }
        ]
    }
};