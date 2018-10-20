const path = require("path");

module.exports = {
    entry: "./resources/src/index.js",
    output: {
        filename: "bundle.js",
        path: path.resolve(__dirname, "resources/dependencies/dist")
    },
    module: {
        rules: [
            {
                test: [/\.js$/],
                use: 'babel-loader',
                exclude: /node_modules/
            },
            {
                test: [/\.css$/],
                use: [
                    'style-loader',
                    'css-loader'
                ]
            }
        ]
    }
}