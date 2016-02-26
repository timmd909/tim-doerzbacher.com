'use strict';

var WKHTMLTOPDF_OPTIONS = [
	'--print-media-type',
	'--no-background',
	'--page-width 8.5in',
	'--page-height 11in'
].join(' ');

module.exports = {
	'resume': {
		'command': 'wkhtmltopdf ' + WKHTMLTOPDF_OPTIONS + ' app/cache/resume/index.html web/resume.pdf || true'
	}
};

