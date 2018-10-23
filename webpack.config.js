const path = require("path");

module.exports = {
    entry: {
        bundle: "./resources/src/index.js",
        statsCharts: "./resources/src/stats-charts.js"
    },
    output: {
        filename: "[name].js",
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