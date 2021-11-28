module.exports = function (grunt) {
  "use strict";
  // Project configuration
  var autoprefixer = require("autoprefixer");
  var flexibility = require("postcss-flexibility");
  var sass = require('node-sass');
  var pkgInfo = grunt.file.readJSON("package.json");

  grunt.initConfig({
    pkg: grunt.file.readJSON("package.json"),

    rtlcss: {
      options: {
        // rtlcss options
        config: {
          preserveComments: true,
          greedy: true,
        },
        // generate source maps
        map: false,
      },
      dist: {
        files: [
          {
            expand: true,
            cwd: "assets/css/unminified/",
            src: [
              "*.css",
              "!*-rtl.css",
              "!font-awesome.css",
              "!kemet-fonts.css",
            ],
            dest: "assets/css/unminified",
            ext: "-rtl.css",
          },
          {
            expand: true,
            cwd: "assets/css/unminified/compatibility",
            src: [
              "*.css",
              "!*-rtl.css",
              "!font-awesome.css",
              "!kemet-fonts.css",
            ],
            dest: "assets/css/unminified/compatibility",
            ext: "-rtl.css",
          },
          {
            expand: true,
            cwd: "assets/css/unminified/compatibility/woocommerce",
            src: [
              "*.css",
              "!*-rtl.css",
              "!font-awesome.css",
              "!kemet-fonts.css",
            ],
            dest: "assets/css/unminified/compatibility/woocommerce",
            ext: "-rtl.css",
          },
          {
            expand: true,
            cwd: "inc/react-options/css/unminified/",
            src: ["*.css", "!*-rtl.css"],
            dest: "inc/react-options/css/unminified/",
            ext: "-rtl.css",
          },
          {
            expand: true,
            cwd: "inc/kemet-panel/assets/css/unminified/",
            src: ["*.css", "!*-rtl.css"],
            dest: "inc/kemet-panel/assets/css/unminified/",
            ext: "-rtl.css",
          },
        ],
      },
    },

    sass: {
      options: {
        sourcemap: "none",
        implementation: sass,
        outputStyle: "expanded",
        linefeed: "lf",
      },
      dist: {
        files: [
          /*{
                        'style.css': 'sass/style.scss'
                        },*/

          /* Editor Style */
          {
            "inc/react-options/css/unminified/style.css":
              "inc/react-options/sass/style.scss",
          },
          {
            "inc/kemet-panel/assets/css/unminified/kemet-panel.css":
              "inc/kemet-panel/scss/kemet-panel.scss",
          },
          /* Common Style */
          {
            expand: true,
            cwd: "sass/",
            src: ["style.scss"],
            dest: "assets/css/unminified",
            ext: ".css",
          },
          /* Compatibility */
          {
            expand: true,
            cwd: "sass/site/compatibility/",
            src: ["**.scss"],
            dest: "assets/css/unminified/compatibility",
            ext: ".css",
          },
          {
            expand: true,
            cwd: "sass/site/compatibility/woocommerce",
            src: ["**.scss"],
            dest: "assets/css/unminified/compatibility/woocommerce",
            ext: ".css",
          },
        ],
      },
    },

    postcss: {
      options: {
        map: false,
        processors: [
          flexibility,
          autoprefixer({
            browsers: [
              '> 1%',
              'ie >= 11',
              'last 1 Android versions',
              'last 1 ChromeAndroid versions',
              'last 2 Chrome versions',
              'last 2 Firefox versions',
              'last 2 Safari versions',
              'last 2 iOS versions',
              'last 2 Edge versions',
              'last 2 Opera versions'
            ],
            cascade: false,
          }),
        ],
      },
      style: {
        expand: true,
        src: [
          "assets/css/unminified/style.css",
          "assets/css/unminified/*.css",
          "assets/css/unminified/compatibility/*.css",
        ],
      },
    },

    uglify: {
      js: {
        files: [
          {
            // all .js to min.js
            expand: true,
            src: ["**.js"],
            dest: "assets/js/minified",
            cwd: "assets/js/unminified",
            ext: ".min.js",
          },
        ],
      },
    },
    cssmin: {
      options: {
        keepSpecialComments: 0,
      },
      css: {
        files: [
          // Generated '.min.css' files from '.css' files.
          // NOTE: Avoided '-rtl.css' files.
          {
            expand: true,
            src: ["**/*.css", "!**/*-rtl.css"],
            dest: "assets/css/minified",
            cwd: "assets/css/unminified",
            ext: ".min.css",
          },
          {
            src: "inc/react-options/css/unminified/style.css",
            dest: "inc/react-options/css/minified/style.min.css",
          },
          {
            src: "inc/react-options/css/unminified/style-rtl.css",
            dest: "inc/react-options/css/minified/style-rtl.min.css",
          },
          {
            src: "inc/kemet-panel/assets/css/unminified/kemet-panel.css",
            dest: "inc/kemet-panel/assets/css/minified/kemet-panel.min.css",
          },
          {
            src: "inc/kemet-panel/assets/css/unminified/kemet-panel-rtl.css",
            dest: "inc/kemet-panel/assets/css/minified/kemet-panel-rtl.min.css",
          },
          // Generating RTL files from '/unminified/' into '/minified/'
          // NOTE: Not possible to generate bulk .min-rtl.css files from '.min.css'
          {
            src: "assets/css/unminified/editor-style-rtl.css",
            dest: "assets/css/minified/editor-style.min-rtl.css",
          },
          {
            src: "assets/css/unminified/style-rtl.css",
            dest: "assets/css/minified/style.min-rtl.css",
          },
          {
            src: "assets/css/unminified/extend-customizer-rtl.css",
            dest: "assets/css/minified/extend-customizer-rtl.min.css",
          },
          {
            src: "assets/css/unminified/customizer-controls-rtl.css",
            dest: "assets/css/minified/customizer-controls-rtl.min.css",
          },
          // Generating RTL files from '/unminified/compatibility/' into '/minified/compatibility/'
          // NOTE: Not possible to generate bulk .min-rtl.css files from '.min.css'
          {
            src: "assets/css/unminified/compatibility/contact-form-7-rtl.css",
            dest: "assets/css/minified/compatibility/contact-form-7.min-rtl.css",
          },
          {
            src: "assets/css/unminified/compatibility/bbpress-rtl.css",
            dest: "assets/css/minified/compatibility/bbpress.min-rtl.css",
          },
          {
            src: "assets/css/unminified/compatibility/woocommerce/woocommerce.css",
            dest: "assets/css/minified/compatibility/woocommerce/woocommerce.min.css",
          },
          {
            src: "assets/css/unminified/compatibility/woocommerce/woocommerce-rtl.css",
            dest: "assets/css/minified/compatibility/woocommerce/woocommerce.min-rtl.css",
          },
          {
            src: "assets/css/unminified/compatibility/woocommerce/woocommerce-layout-rtl.css",
            dest: "assets/css/minified/compatibility/woocommerce/woocommerce-layout.min-rtl.css",
          },
          {
            src: "assets/css/unminified/compatibility/woocommerce/woocommerce-smallscreen-rtl.css",
            dest: "assets/css/minified/compatibility/woocommerce/woocommerce-smallscreen.min-rtl.css",
          },
        ],
      },
    },

    copy: {
      main: {
        options: {
          mode: true,
        },
        src: [
          "**",
          "!vendor/**",
          "!node_modules/**",
          "!nbproject/**",
          "!private/**",
          "!.git/**",
          "!*.sh",
          "!*.ds_store",
          "!*.map",
          "!Gruntfile.js",
          "!package.json",
          "!.gitignore",
          "!sass/**",
          "!composer.json",
          "!composer.lock",
          "!package-lock.json",
          "!phpcs.xml.dist",
          "!phpcs.xml",
          "!inc/customizer/custom-controls/react/node_modules/**",
          "!inc/customizer/custom-controls/react/src/**",
          "!inc/customizer/custom-controls/react/package.json",
          "!inc/customizer/custom-controls/react/package-lock.json",
          "!inc/customizer/custom-controls/react/build/index.asset.php",
          "!inc/customizer/custom-controls/react/build/index.js.map",
          "!inc/react-options/node_modules/**",
          "!inc/react-options/src/**",
          "!inc/react-options/package.json",
          "!inc/react-options/package-lock.json",
          "!inc/react-options/build/index.asset.php",
          "!inc/react-options/build/index.js.map",
          "!inc/kemet-panel/assets/js/node_modules/**",
          "!inc/kemet-panel/assets/js/src/**",
          "!inc/kemet-panel/assets/js/package.json",
          "!inc/kemet-panel/assets/js/package-lock.json",
          "!inc/kemet-panel/assets/js/build/index.asset.php",
          "!inc/kemet-panel/assets/js/build/index.js.map",
          "!inc/meta/assets/js/node_modules/**",
          "!inc/meta/assets/js/src/**",
          "!inc/meta/assets/js/package.json",
          "!inc/meta/assets/js/package-lock.json",
          "!inc/meta/assets/js/build/index.asset.php",
          "!inc/meta/assets/js/build/index.js.map",
        ],
        dest: "kemet/",
      },
    },

    compress: {
      main: {
        options: {
          archive: "kemet-" + pkgInfo.version + ".zip",
          mode: "zip",
        },
        files: [
          {
            src: ["./kemet/**"],
          },
        ],
      },
    },

    clean: {
      main: ["kemet"],
      zip: ["*.zip"],
    },

    makepot: {
      target: {
        options: {
          domainPath: "/",
          potFilename: "languages/kemet.pot",
          potHeaders: {
            poedit: true,
            "x-poedit-keywordslist": true,
          },
          type: "wp-theme",
          updateTimestamp: true,
        },
      },
    },

    addtextdomain: {
      options: {
        textdomain: "kemet",
      },
      target: {
        files: {
          src: ["*.php", "**/*.php", "!node_modules/**"],
        },
      },
    },

    bumpup: {
      options: {
        updateProps: {
          pkg: "package.json",
        },
      },
      file: "package.json",
    },

    replace: {
      theme_main: {
        src: ["style.css"],
        overwrite: true,
        replacements: [
          {
            from: /Version: \bv?(?:0|[1-9]\d*)\.(?:0|[1-9]\d*)\.(?:0|[1-9]\d*)(?:-[\da-z-A-Z-]+(?:\.[\da-z-A-Z-]+)*)?(?:\+[\da-z-A-Z-]+(?:\.[\da-z-A-Z-]+)*)?\b/g,
            to: "Version: <%= pkg.version %>",
          },
        ],
      },
      theme_main: {
        src: ["readme.txt"],
        overwrite: true,
        replacements: [
          {
            from: /Stable tag: \bv?(?:0|[1-9]\d*)\.(?:0|[1-9]\d*)\.(?:0|[1-9]\d*)(?:-[\da-z-A-Z-]+(?:\.[\da-z-A-Z-]+)*)?(?:\+[\da-z-A-Z-]+(?:\.[\da-z-A-Z-]+)*)?\b/g,
            to: "Stable tag: <%= pkg.version %>",
          },
        ],
      },

      theme_const: {
        src: ["functions.php"],
        overwrite: true,
        replacements: [
          {
            from: /KEMET_THEME_VERSION', '.*?'/g,
            to: "KEMET_THEME_VERSION', '<%= pkg.version %>'",
          },
        ],
      },
    },
    // concat: {
    //   css: {
    //     src: "inc/customizer/sass/style.css",
    //     dest: "inc/customizer/custom-controls/assets/css/unminified/custom-controls.css",
    //   },

    //   js: {
    //     src: [],
    //     dest: '',
    //   },
    // },
    charset: {
      dist: {
        options: {
          from: "UTF-8",
          to: "Shift_JIS",
          fileTypes: {
            // Code replacement config (Optional)
            css: {
              ext: [".css"],
              detect: /^@charset\s+(".+?"|'.+?')/,
              replace: '@charset "{{charset}}"',
            },
          },
        },
        files: [
          {
            expand: true,
            cwd: "src",
            dest: "dist",
            src: ["**/*.{css}"],
          },
        ],
      },
    },
    wpcss: {
      target: {
        options: {
          commentSpacing: true, // Whether to clean up newlines around comments between CSS rules.
        },
        files: {
          "assets/css/unminified/compatibility/woocommerce/woocommerce.css":
            "assets/css/unminified/compatibility/woocommerce/woocommerce.css",
          "assets/css/unminified/compatibility/woocommerce/woocommerce-rtl.css":
            "assets/css/unminified/compatibility/woocommerce/woocommerce-rtl.css",
          "assets/css/unminified/compatibility/woocommerce/woocommerce-smallscreen.css":
            "assets/css/unminified/compatibility/woocommerce/woocommerce-smallscreen.css",
          "assets/css/unminified/compatibility/woocommerce/woocommerce-smallscreen-rtl.css":
            "assets/css/unminified/compatibility/woocommerce/woocommerce-smallscreen-rtl.css",
          "assets/css/unminified/compatibility/woocommerce/woocommerce-layout.css":
            "assets/css/unminified/compatibility/woocommerce/woocommerce-layout.css",
          "assets/css/unminified/compatibility/woocommerce/woocommerce-layout-rtl.css":
            "assets/css/unminified/compatibility/woocommerce/woocommerce-layout-rtl.css",
          "assets/css/unminified/compatibility/contact-form-7.css":
            "assets/css/unminified/compatibility/contact-form-7.css",
          "assets/css/unminified/compatibility/contact-form-7-rtl.css":
            "assets/css/unminified/compatibility/contact-form-7-rtl.css",
          "assets/css/unminified/compatibility/bbpress.css":
            "assets/css/unminified/compatibility/bbpress.css",
          "assets/css/unminified/compatibility/bbpress-rtl.css":
            "assets/css/unminified/compatibility/bbpress-rtl.css",
          "assets/css/unminified/style.css": "assets/css/unminified/style.css",
          "assets/css/unminified/style-rtl.css":
            "assets/css/unminified/style-rtl.css",
          "assets/css/unminified/extend-customizer-rtl.css":
            "assets/css/unminified/extend-customizer-rtl.css",
          "assets/css/unminified/customizer-controls-rtl.css":
            "assets/css/unminified/customizer-controls-rtl.css",
          "assets/css/unminified/editor-style.css":
            "assets/css/unminified/editor-style.css",
          "assets/css/unminified/editor-style-rtl.css":
            "assets/css/unminified/editor-style-rtl.css",
          "inc/react-options/css/unminified/style.css":
            "inc/react-options/css/unminified/style.css",
          "inc/react-options/css/unminified/style-rtl.css":
            "inc/react-options/css/unminified/style-rtl.css",
        },
      },
    },
  });

  // Load grunt tasks
  grunt.loadNpmTasks("grunt-rtlcss");
  grunt.loadNpmTasks("grunt-sass");
  grunt.loadNpmTasks("grunt-postcss");
  grunt.loadNpmTasks("grunt-contrib-cssmin");
  grunt.loadNpmTasks("grunt-contrib-uglify");
  grunt.loadNpmTasks("grunt-contrib-concat");
  grunt.loadNpmTasks("grunt-contrib-copy");
  grunt.loadNpmTasks("grunt-contrib-compress");
  grunt.loadNpmTasks("grunt-contrib-clean");
  grunt.loadNpmTasks("grunt-wp-i18n");
  grunt.loadNpmTasks("grunt-bumpup");
  grunt.loadNpmTasks("grunt-text-replace");
  grunt.loadNpmTasks("grunt-charset");
  grunt.loadNpmTasks("grunt-wp-css");

  // rtlcss, you will still need to install ruby and sass on your system manually to run this
  grunt.registerTask("rtl", ["rtlcss"]);

  // SASS compile
  grunt.registerTask("scss", ["sass"]);

  // Style
  grunt.registerTask("style", ["scss", "postcss:style", "rtl"]);

  // min all
  grunt.registerTask("minify", ["style", "wpcss", "uglify:js", "cssmin:css"]);

  // Update google Fonts
  grunt.registerTask("google-fonts", function () {
    var done = this.async();
    var request = require("request");
    var fs = require("fs");

    request(
      "https://www.googleapis.com/webfonts/v1/AIzaSyDzjH9arBe4Tjwq4JR2ehqX-MKE10MePkk",
      function (error, response, body) {
        if (response && response.statusCode == 200) {
          var fonts = JSON.parse(body).items.map(function (font) {
            return {
              [font.family]: {
                variants: font.variants,
                category: font.category,
              },
            };
          });

          fs.writeFile(
            "assets/fonts/google-fonts.json",
            JSON.stringify(fonts, undefined, 4),
            function (err) {
              if (!err) {
                console.log("Google Fonts Updated!");
              }
            }
          );
        }
      }
    );
  });

  // Grunt release - Create installable package of the local files
  grunt.registerTask("release", [
    "clean:zip",
    "copy:main",
    "compress:main",
    "clean:main",
  ]);

  // Bump Version - `grunt version-bump --ver=<version-number>`
  grunt.registerTask("version-bump", function (ver) {
    var newVersion = grunt.option("ver");

    if (newVersion) {
      newVersion = newVersion ? newVersion : "patch";

      grunt.task.run("bumpup:" + newVersion);
      grunt.task.run("replace");
    }
  });

  // i18n
  grunt.registerTask("i18n", ["addtextdomain", "makepot"]);

  grunt.util.linefeed = "\n";
};