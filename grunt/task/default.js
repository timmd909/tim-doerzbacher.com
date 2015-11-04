'use strict';

module.exports = function (grunt) {
	grunt.registerTask('default', [
		'copy',
		'css'
	]);

	grunt.registerTask('css', [
		'less:dev'
	]);
};
