'use strict';

module.exports = {
	bootstrap: {
		files: [
			{
				expand: true,
				flatten: true,
				src: 'vendor/twbs/bootstrap/dist/js/bootstrap**.js',
				dest: 'web/js'
			}
		]
	}, // bootstrap

	jquery: {
		files: [
			{
				expand: true,
				flatten: true,
				src: 'vendor/frameworks/jquery/jquery.**',
				dest: 'web/js/'
			}
		]
	} // jquery

};
