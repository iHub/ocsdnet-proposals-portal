$(document).ready(function() {
	
	$('.project-info').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            title: {
                message: 'The project title is not valid',
                validators: {
                    notEmpty: {
                        message: 'The project title is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The project title must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The project title can only consist of alphabetical, number and underscore'
                    }
                }
            },
            duration: {
                validators: {
                    notEmpty: {
                        message: 'The project duration is required and cannot be empty'
                    }
                    
                }
            },
             countries: {
                validators: {
                    notEmpty: {
                        message: 'The project countries is required and cannot be empty'
                    }
                    
                }
            },
            themes: {
                validators: {
                    notEmpty: {
                        message: 'Atleast one research theme has to be selected'
                    }
                    
                }
            },
              budget: {
                validators: {
                    notEmpty: {
                        message: 'The project budget is required and cannot be empty'
                    }
                    
                }
            },
             regions: {
                validators: {
                    notEmpty: {
                        message: 'The project regions is required and cannot be empty'
                    }
                    
                }
            },
            justifythemes: {
                validators: {
                    notEmpty: {
                        message: 'The project regions is required and cannot be empty'
                    }
                    
                }
            }
        }
    }).on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');
			
            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                data = JSON.parse(result);
               	$('#proposal_id').text(data);
            }, 'json');
        });
});
