'use strict';

var WKHTMLTOPDF_OPTIONS = [
	'--print-media-type',
	'--viewport-size 1280x1024'
].join(' ');

module.exports = {
	'resume': {
		'command': 'wkhtmltopdf ' + WKHTMLTOPDF_OPTIONS + ' app/cache/resume/index.html web/resume.pdf || true'
	}
};

