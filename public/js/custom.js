$(document).ready(function(){
    $('.filled-silo').each(function(){  
    	var height = ($(this).parent().parent().find('.value').html().replace(/[^0-9]/g, ''));
    	$(this).css({'height':height})
    }); 
});