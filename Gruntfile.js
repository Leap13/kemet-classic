module.exports = function(grunt) {
  grunt.loadNpmTasks("grunt-text-replace");
  grunt.initConfig({
    replace: {
      example: {
        src: ["*.*"],
        overwrite: true,
        replacements: [
          {
            from: "wiz", // string replacement
            to: "wiz"
          }
        ]
      }
    }
  });
  grunt.registerTask("default", "replace");
};
