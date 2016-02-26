'use strict';

module.exports = function (grunt) {
	grunt.registerTask('resume', [
		'clean:resume',
		'clean:resume-cache',
		'curl:resume-index',
		'curl:resume-img-icons',
		'curl-dir:resume-css',
		'curl-dir:resume-fonts',
		'resume:patch',
		'shell:resume',
		'clean:resume-cache'
	]);

	grunt.registerTask('resume:patch', function () {
		var indexHtmlFilename = 'app/cache/resume/index.html',
			indexHtml = grunt.file.read(indexHtmlFilename, 'utf8');

		indexHtml = indexHtml
			.replace(/OBFUSCATED/g, '')
			.replace(/"\/.*(css|js|img)\//g, '"$1/');

		grunt.file.write(indexHtmlFilename, indexHtml);

	});

};
