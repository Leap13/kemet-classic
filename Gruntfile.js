module.exports = function(grunt) {
  grunt.loadNpmTasks("grunt-text-replace");
  grunt.initConfig({
    replace: {
      example: {
        src: [
          "functions/*.*",
          "functions/**/*.*",
          "functions/**/**/*.*",
          "functions/**/**/**/*.*",
          "functions/**/**/**/**/*.*",
          "functions/**/**/**/**/**/*.*"
        ],
        overwrite: true,
        replacements: [
          {
            from: "kmt", // string replacement
            to: "wiz"
          }
        ]
      }
    }
  });
  grunt.registerTask("default", "replace");
};
