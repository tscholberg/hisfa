$(document).ready(function(){
	$('.filled-silo').each(function(){  
		var height = ($(this).parent().parent().find('.value').html().replace(/[^0-9]/g, ''));
		$(this).css({'height':parseInt(height)})
	});

	$('.detail-filled').each(function(){  
		var height = ($(this).parent().parent().find('.volume').html().replace(/[^0-9]/g, ''));
		var accurate = $(this).parent().height() * (parseInt(height)/100);
		$(this).css({'height':accurate});
	});
});