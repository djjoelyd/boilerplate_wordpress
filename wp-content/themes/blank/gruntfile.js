var fs = require('fs');
var opt;
if (fs.existsSync('assets/js/options.js')) {
  opt = require('./assets/js/options');
}
else{
   opt = require('./options');
}

module.exports = function(grunt) {

    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        jshint: {

            files: ['assets/javascripts/*.js, assets/javascripts/**/*.js', '!assets/javascripts/libs/*.js'],

            options: {

                globals: {

                    jQuery: true,

                    console:true

                }

            }

        },

        sass: {     
            dist: {                 
                options: {    
                    
                    style: 'expanded', //DEV
                    //style: 'compressed', // Production
                    
                },
                files: {  

                    'style.css': 'assets/stylesheets/sass/style.scss', // 'destination': 'source'
       
                }
            }
        },

        // Auto-prefixer
        autoprefixer: {

            options: {

                browsers: ['opera 12', 'ff 15', 'chrome 25', 'ie 8']

            },

            single_file: {

                src: 'assets/stylesheets/style.css',

                dest: 'assets/stylesheets/style.min.css'

            }

        },

        //watch 
        watch: {

            styles: {

                files: ['assets/stylesheets/sass/*.scss', 'assets/stylesheets/sass/**/*.scss', 'assets/sass/stylesheets/**/**/*.scss', 'assets/sass/stylesheets/**/**/**/*.scss'],
                
                tasks: ['sass']

            },

            scripts: {

                files: ['assets/javascripts/**/*.js', 'assets/javascripts/**/**/*.js'],

                tasks: ['jshint']

            },

            templates: {

                files: ['assets/templates/*.hbs', 'assets/templates/**/*.hbs'],

                tasks: ['handlebars']

            }

        },

        //concat
        concat: {

            options: {

                separator: ';'

            },

            dist: {

                src: ['assets/javascripts/libs/require.js', 'javascripts/dist/optimized.js'],

                dest: 'assets/javascripts/dist/dist.js'

            }

        },

        //uglify
        uglify: {

            my_target: {

                files: {

                    'assets/javascripts/dist/dist.js' : 'assets/javascripts/dist/dist.js'

                }

            }

        },

    

        // Require JS - see options.js for config
        // requirejs: {
        //   compile: {
        //     options: opt
        //   }
        // },


        requirejs: {
          compile: {
            options: opt
          }
        },
        

    });

  //load modules
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-requirejs');

  //default task 
  grunt.registerTask('default', ['jshint', 'sass']);

  //other tasks 
  grunt.registerTask('styles', 'sass');
  grunt.registerTask('test', 'jshint');
  grunt.registerTask('compile', ['requirejs']);
};