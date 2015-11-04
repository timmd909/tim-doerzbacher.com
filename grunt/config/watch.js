'use strict';

module.exports = {
	css: {
		files: 'app/Resources/less/*.less',
		tasks: [
			'less:dev'
		],
		options: {
			spawn: false
		}
	}

};
