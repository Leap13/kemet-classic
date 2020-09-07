module.exports = function(grunt) {
  grunt.loadNpmTasks("grunt-text-replace");
  grunt.initConfig({
    replace: {
      example: {
        src: [
          "languages/*.*",
          "languages/**/*.*",
          "languages/**/**/*.*",
          "languages/**/**/**/*.*",
          "languages/**/**/**/**/*.*",
          "languages/**/**/**/**/**/*.*"
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
