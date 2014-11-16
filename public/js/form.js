/**
 * @author Kigen
 */

$(document).ready(function(e) {	
 	$(".text_limit").keyup(function()
    {
    	$word_limit = $(this).attr('data-wordlimit');
    	
    	//str.split(" ");
    	$string_array = $(this).val().split(" ");
    	
    	
    	/*
        if ($(this).val().length > $word_limit) {
            $(this).val($(this).val().substr(0, $word_limit));
        }*/
        
        var $remaining_words = $word_limit - $string_array.length;
        
        $remaining_words = $remaining_words + 1;
        
        $(this).parent().find('.limit-label').html('Remaining words: '+$remaining_words);
        console.log('remaining words: '+$remaining_words);
    });
    $(".text_limit").keyup();
    
    if($('#aft textarea').val() == ''){
    	$('#aft').slideUp(0);
    }
    
    $('.aft-toggle').change(function(){
    	if($(this).val() == '1'){
    		$('#aft').slideDown(100);
    	} else{
    		$('#aft').slideUp(100);
    		$('#aft textarea').val('');
    	}
    });
});

