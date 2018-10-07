'use strict';

var WEBSITE_ROOT = 'http://www.tim-doerzbacher.com/';

module.exports = {
	'resume-css': {
		src: [
			WEBSITE_ROOT + 'css/bootstrap.css',
			WEBSITE_ROOT + 'css/font-awesome.css',
			WEBSITE_ROOT + 'css/style.css',
			WEBSITE_ROOT + 'css/resume.css',
			WEBSITE_ROOT + 'css/print.css',
		],
		dest: 'app/cache/resume/css/'
	},
	'resume-js': {
		src: [
			WEBSITE_ROOT + 'js/resume.js',
		],
		dest: 'app/cache/resume/js/'
	},
	'resume-fonts': {
		src: [
			WEBSITE_ROOT + 'fonts/fontawesome-webfont.eot',
			WEBSITE_ROOT + 'fonts/fontawesome-webfont.svg',
			WEBSITE_ROOT + 'fonts/fontawesome-webfont.ttf',
			WEBSITE_ROOT + 'fonts/fontawesome-webfont.woff',
			WEBSITE_ROOT + 'fonts/fontawesome-webfont.woff2',
			WEBSITE_ROOT + 'fonts/FontAwesome.otf'
		],
		dest: 'app/cache/resume/fonts/'
	}
};
