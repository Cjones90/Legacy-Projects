

module.exports = function (grunt) {

  grunt.initConfig({

    jade: {
      compile: {
        options: {
          client: false,
          pretty: true
        }
      },
      files: [{
        cwd: "src/views",
        src: "**/*.jade",
        dest: "build/views",
        expand: true,
        ext: ".html"
      }]

    },

    less: {
       development: {
         options: {
           paths: ["src/styles/"]
         },
         files: {
           "build/styles/index.css": "src/styles.index.less"
         }
       }
    },

    browserify: {
      options: {
        transform: [ require("grunt-react").browserify ]
      },
      app: {
        src: "src/client/index.jsx",
        dest: "build/js/index.js"
      }
    },

    uglify: {
      my_target: {
        files: {
          "build/js/index.min.js": ["build/js/index.js"]
        }
      }
    },

    watch: {
      scripts: {
        files: [ "**/*.jade", "**/*.less", "**/*.jsx", "src/**/*.js" ],
        tasks: [ "*jade", "less", "browserify", "uglify"],
        options: {
          spawn: false
        }
      }
    }


  });

  grunt.loadNpmTasks("grunt-contrib-jade");
  grunt.loadNpmTasks("grunt-contrib-less");
  grunt.loadNpmTasks("grunt-browserify");
  grunt.loadNpmTasks("grunt-contrib-uglify");
  grunt.loadNpmTasks("grunt-contrib-watch");

  grunt.registerTask("default", ["jade", "less", "browserify", "uglify", "watch"]);



}
