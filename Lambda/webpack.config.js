/**
 * Created by carlo on 7-6-2017.
 */
module.exports = {
    entry:  './main.ts',
    output : {
        filename: 'index.js'
    },
    resolve: {
        extensions: ['.ts']
    },
    module: {
        loaders: [
            { test: /.ts$/, loader: 'awesome-typescript-loader'}
        ]
    }
};