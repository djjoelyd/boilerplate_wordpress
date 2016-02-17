//Require js options export.
module.exports = {
  findNestedDependencies: true,
  baseUrl: './assets/javascripts',
  mainConfigFile: './assets/javascripts/common.js',
  dir: './assets/javascripts/dist',
  modules: [
  	 {
        name: "common",
    },
  ]
};
