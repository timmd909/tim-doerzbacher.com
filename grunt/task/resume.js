'use strict';

module.exports = function (grunt) {
	grunt.registerTask('resume', [
		'curl:resume-index',
		'curl:resume-img-icons',
		'curl-dir:resume-css',
		'curl-dir:resume-fonts',
		'resume:patch',
		'shell:resume',
		'clean:resume'
	]);

	grunt.registerTask('resume:patch', function () {
		var indexHtmlFilename = 'app/cache/resume/index.html',
			indexHtml = grunt.file.read(indexHtmlFilename, 'utf8');

		indexHtml = indexHtml
			.replace(/OBFUSCATED/g, '')
			.replace(/"\/(css|img)\//g, '"$1/');

		grunt.file.write(indexHtmlFilename, indexHtml);

	});

};
