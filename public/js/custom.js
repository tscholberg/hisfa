$(document).ready(function(){

	$('.filled-silo').each(function(){  
		var height = ($(this).parent().parent().find('.value').html().replace(/[^0-9]/g, ''));

		if(height == 100){
			$(this).addClass('red-silo');
		}else if(height < 100 && height >= 90){
			$(this).addClass('orange-silo');
			$(this).parent().parent().parent().addClass('card-orange-light');
		}else if(height <= 90 && height >= 70){
			$(this).addClass('yellow-silo');
			$(this).parent().parent().parent().addClass('card-yellow-light');
		}else{
			$(this).addClass('green-silo');
			$(this).parent().parent().parent().addClass('card-green-light');
		}
		
		$(this).css({'height':parseInt(height)});
	});

	$('.detail-filled').each(function(){  
		var height = ($(this).parent().parent().find('.volume').html().replace(/[^0-9]/g, ''));
		var accurate = $(this).parent().height() * (parseInt(height)/100);

		if(height == 100){
			$(this).addClass('red-silo');
		}else if(height < 100 && height >= 90){
			$(this).addClass('orange-silo');
		}else if(height <= 90 && height >= 70){
			$(this).addClass('yellow-silo');
		}else{
			$(this).addClass('green-silo');
		}
		$(this).css({'height':accurate});
	});
});