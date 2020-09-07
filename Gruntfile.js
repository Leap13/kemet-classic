module.exports = function(grunt) {
  grunt.loadNpmTasks("grunt-text-replace");
  grunt.initConfig({
    replace: {
      example: {
        src: [
          "inc/*.*",
          "inc/**/*.*",
          "inc/**/**/*.*",
          "inc/**/**/**/*.*",
          "inc/**/**/**/**/*.*",
          "inc/**/**/**/**/**/*.*"
        ],
        overwrite: true,
        replacements: [
          {
            from: "KEMET", // string replacement
            to: "WIZ"
          }
        ]
      }
    }
  });
  grunt.registerTask("default", "replace");
};
