$(document).ready(function() {
	
});
$('#addi-funding').on('click',function(){
    	var $template = $('#optionTemplate'),
          $clone    = $template
                         .clone()
                         .removeClass('hide')
                         .removeAttr('id')
                         .insertBefore('#add-funding'),
          
          $option1   = $clone.find('[name="donor"]');
          $option2   = $clone.find('[name="amount"]');
          $option3   = $clone.find('[name="currency"]');
          $option4   = $clone.find('[name="timeframe"]');
          
    });