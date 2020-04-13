module.exports = {
  devServer: {
    proxy: {
      '/api': {
            target: "http://localhost:8888/DaSilva_Teves_Gahlehpardaz_Carrera_Campbell_FIP/api",
            changeOrigin: true,
            pathRewrite: { '^/api' : '' }
      },
    }
  }
}