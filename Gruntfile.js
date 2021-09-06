module.exports = function (grunt) {
  "use strict";
  // Project configuration
  var autoprefixer = require("autoprefixer");
  var flexibility = require("postcss-flexibility");

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
            cwd: "inc/customizer/custom-controls/assets/css/unminified/",
            src: ["*.css", "!*-rtl.css"],
            dest: "inc/customizer/custom-controls/assets/css/unminified/",
            ext: "-rtl.css",
          },
        ],
      },
    },

    sass: {
      options: {
        sourcemap: "none",
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
            "assets/css/unminified/editor-style.css": "sass/editor-style.scss",
            "inc/customizer/custom-controls/responsive/responsive.css":
              "inc/customizer/custom-controls/responsive/responsive.scss",
            "inc/customizer/custom-controls/divider/divider.css":
              "inc/customizer/custom-controls/divider/divider.scss",
            "inc/customizer/custom-controls/description/description.css":
              "inc/customizer/custom-controls/description/description.scss",
            "inc/customizer/custom-controls/slider/slider.css":
              "inc/customizer/custom-controls/slider/slider.scss",
            "inc/customizer/custom-controls/sortable/sortable.css":
              "inc/customizer/custom-controls/sortable/sortable.scss",
            "inc/customizer/custom-controls/spacing/spacing.css":
              "inc/customizer/custom-controls/spacing/spacing.scss",
            "inc/customizer/custom-controls/responsive-spacing/responsive-spacing.css":
              "inc/customizer/custom-controls/responsive-spacing/responsive-spacing.scss",
            "inc/customizer/custom-controls/background/background.css":
              "inc/customizer/custom-controls/background/background.scss",
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
              "Android >= 2.1",
              "Chrome >= 21",
              "Edge >= 12",
              "Explorer >= 7",
              "Firefox >= 17",
              "Opera >= 12.1",
              "Safari >= 6.0",
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
            src: "inc/customizer/custom-controls/assets/css/unminified/custom-controls.css",
            dest: "inc/customizer/custom-controls/assets/css/minified/custom-controls.min.css",
          },
          {
            src: "inc/customizer/custom-controls/assets/css/unminified/custom-controls-rtl.css",
            dest: "inc/customizer/custom-controls/assets/css/minified/custom-controls-rtl.min.css",
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
    concat: {
      css: {
        src: [
          "inc/customizer/custom-controls/react/src/kmt-controls/css/color-palette.css",
          "inc/customizer/custom-controls/react/src/kmt-controls/css/customizer.css",
          "inc/customizer/custom-controls/react/src/kmt-controls/css/root.css",
          "inc/customizer/custom-controls/react/src/kmt-controls/css/select.css",
          "inc/customizer/custom-controls/react/src/kmt-controls/css/background.css",
          "inc/customizer/custom-controls/react/src/kmt-controls/css/tabs.css",
          "inc/customizer/custom-controls/react/src/kmt-controls/css/builder-control.css",
          "inc/customizer/custom-controls/react/src/kmt-controls/css/slider.css",
          "inc/customizer/custom-controls/react/src/kmt-controls/css/color.css",
          "inc/customizer/custom-controls/react/src/kmt-controls/css/icon-select.css",
          "inc/customizer/custom-controls/react/src/kmt-controls/css/sortable.css",
          "inc/customizer/custom-controls/react/src/kmt-controls/css/spacing.css",
          "inc/customizer/custom-controls/react/src/kmt-controls/css/title.css",
          "inc/customizer/custom-controls/react/src/kmt-controls/css/toggle.css",
          "inc/customizer/custom-controls/react/src/kmt-controls/css/radio-image.css",
          "inc/customizer/custom-controls/react/src/kmt-controls/css/typography.css",
          "inc/customizer/custom-controls/react/src/kmt-controls/css/extra-style.css",
          "inc/customizer/custom-controls/react/src/kmt-controls/css/number.css",
        ],
        dest: "inc/customizer/custom-controls/assets/css/unminified/custom-controls.css",
      },

      js: {
        src: [
          // "inc/customizer/custom-controls/sortable/sortable.js",
          // "inc/customizer/custom-controls/slider/slider.js",
          // "inc/customizer/custom-controls/color/color.js",
          // "inc/customizer/custom-controls/icon-select/icon-select.js",
          // "inc/customizer/custom-controls/responsive/responsive.js",
          // "inc/customizer/custom-controls/responsive-select/responsive-select.js",
          // "inc/customizer/custom-controls/responsive-slider/responsive-slider.js",
          // "inc/customizer/custom-controls/responsive-spacing/responsive-spacing.js",
          // "inc/customizer/custom-controls/title/title.js",
          // "inc/customizer/custom-controls/responsive-icon-select/responsive-icon-select.js",
          // "inc/customizer/custom-controls/responsive-color/responsive-color.js",
          // "inc/customizer/custom-controls/group/group.js",
        ],
        dest: "inc/customizer/custom-controls/assets/js/unminified/custom-controls.js",
      },
    },
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
          "inc/customizer/custom-controls/assets/css/unminified/custom-controls.css":
            "inc/customizer/custom-controls/assets/css/unminified/custom-controls.css",
          "inc/customizer/custom-controls/assets/css/unminified/custom-controls-rtl.css":
            "inc/customizer/custom-controls/assets/css/unminified/custom-controls-rtl.css",
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
