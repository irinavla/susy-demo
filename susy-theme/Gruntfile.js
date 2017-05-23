module.exports = function(grunt) {
  grunt.initConfig({
      sass: {
            dist: {
                options: {
                  style: 'expanded',
                  require: 'susy'
                },
                files: {
                    'css/styles.css': 'sass/styles.scss'
                }
              },
          app: {
            files: [{
              expand: true,
              cwd: 'sass',
              src: ['**/*.scss'],
              dest: 'css',
              ext: '.css'
            }]
        }
      },
    watch: {
      sass: {
            // Watches all Sass or Scss files within the scss folder and one level down.
            // If you want to watch all scss files instead, use the "**/*" globbing pattern
            files: ['sass/{,*/}*.{scss,sass}'],
            tasks: ['sass']
        }
    }
  });
  
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.registerTask('default', ['sass','watch']);
};
