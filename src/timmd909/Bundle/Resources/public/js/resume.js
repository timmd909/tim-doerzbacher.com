$(function() {
	
//	return; 
	$('.skillsets .container').masonry({
		columnWidth: 300, 
		itemSelector: '.sub-section'
	});

	$('.contact-info .container').masonry({
		columnWidth: 300, 
		itemSelector: 'div'
	});
	
	
	$('.spam-prevention').remove();
	$('.email-address .domain').html('tim-doerzbacher.com');
});