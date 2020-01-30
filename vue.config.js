module.exports = {
  css: {
    loaderOptions: {
      sass: {
        prependData: `@import "@/sass/main.scss";`
      }
    }
  }
};