$(document).ready(function() {
	typingHandler();
	//autoSave();

});
	function typingHandler(){
		
		$('textarea').keyup(function(e){
			
			var name=$(this).attr('name');
			var value=$(this).val();
			var url=$(this).closest("form").attr('action');
			var $form = $(this).closest("form").serialize();

			setTimeout(function () {
               autoSave(url,$form);
               }, 2000);
		})
	}
	function autoSave(url,$form){
		console.log($form);
        $.post(url, $form, function(result) {
                //data = JSON.parse(result);
                console.log(result);
            }, 'json');
	}