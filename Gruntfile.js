module.exports = function (grunt) {

	'use strict';
	var banner = '/**\n * <%= pkg.homepage %>\n * Copyright (c) <%= grunt.template.today("yyyy") %>\n * This file is generated automatically. Do not edit.\n */\n';
	// Project configuration
	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		addtextdomain: {
			options: {
				textdomain: 'wp-total-branding',
			},
			target : {
				files: {
					src: ['*.php', '**/*.php', '!node_modules/**', '!php-tests/**', '!includes/libs/**', '!bin/**']
				}
			}
		},

		wp_readme_to_markdown: {
			your_target: {
				files: {
					'README.md': 'readme.txt'
				}
			},
		},

		makepot: {
			target: {
				options: {
					domainPath     : '/languages',
					mainFile       : 'wp-total-branding.php',
					potFilename    : 'wp-total-branding.pot',
					exclude        : ['includes/libs/*'],
					potHeaders     : {
						poedit                 : true,
						'x-poedit-keywordslist': true
					},
					type           : 'wp-plugin',
					updateTimestamp: true
				}
			}
		},
	});

	grunt.loadNpmTasks('grunt-wp-i18n');
	grunt.loadNpmTasks('grunt-wp-readme-to-markdown');
	grunt.registerTask('i18n', ['addtextdomain', 'makepot']);
	grunt.registerTask('readme', ['wp_readme_to_markdown']);

	grunt.util.linefeed = '\n';

};
