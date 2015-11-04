'use strict';

var FILES = {
	'web/css/bootstrap.css': 'app/Resources/less/bootstrap.less',
	'web/css/font-awesome.css': 'app/Resources/less/font-awesome.less',
	'web/css/home.css': 'app/Resources/less/home.less',
	'web/css/links.css': 'app/Resources/less/links.less',
	'web/css/resume.css': 'app/Resources/less/resume.less',
	'web/css/style.css': 'app/Resources/less/style.less'
};

module.exports = {
	options: {
		compress: false
	},
	dev: {
		files: FILES
	},
	prod: {
		options: {
			compress: true
		},
		files: FILES
	}
};
