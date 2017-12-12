module.exports = function (grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            css: {
				files: 'assets/scss/**/*.scss',
				tasks: ['sass','cssmin']
			},
			files: ['assets/vendor/*'],
			tasks: ['wiredep']
        },
		sass: {
			dist: {
				options: {
					sourcemap: false
				},
				files: {
					'style.css' : 'assets/scss/main.scss'
				}
			}
		},
		cssmin: {
			target: {
				files: [{
					expand: true,
					cwd: '',
					src: ['*.css', '!*.min.css'],
					dest: '',
					ext: '.min.css'
				}]
			}
		}
    });
    
    
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    grunt.registerTask('default', ['sass','cssmin']);

};