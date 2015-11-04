$(function() {

	function deobfuscate(input) {
		return input.replace(/OBFUSCATED/g, '');
	}

	$('.spam-prevention').each(function (index, el) {
		var $element = $(el);

		var originalText = $element.html(),
				originalHref = $element.attr('href');

		$element.html(deobfuscate(originalText));

		if (originalHref) {
			$element.attr('href', deobfuscate(originalHref));
		}
	});
});
