$(document).ready(function() {
	
	typingHandler();
	//autoSave();
	textArea();

});
	function typingHandler(){
	 
		$('inputi').keyup(function(e){
		   
			var url=$(this).closest("form").attr('action');
			var $form = $(this).closest("form").serialize();

			setTimeout(function () {
               autoSave(url,$form);
               }, 2000);
		})
	}
	function autoSave(url,$form){

        $.post(url, $form, function(result) {
                //data = JSON.parse(result);
                console.log(result);
            }, 'json');
	}
	function textArea(){
		$('.ckeditor').keydown(function(e){
		  console.log('hi');
		});
	}

	  