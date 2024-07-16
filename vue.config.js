const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
    outputDir: 'public/build',
    publicPath: '/build',
  transpileDependencies: true
})
