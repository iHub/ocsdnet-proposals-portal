$(document).ready(function() {
	alert('hi there');
	$('.project-info').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            project-title: {
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
            project-duration: {
                validators: {
                    notEmpty: {
                        message: 'The project duration is required and cannot be empty'
                    }
                    
                }
            },
             project-countries: {
                validators: {
                    notEmpty: {
                        message: 'The project duration is required and cannot be empty'
                    }
                    
                }
            },
              project_budget: {
                validators: {
                    notEmpty: {
                        message: 'The project duration is required and cannot be empty'
                    }
                    
                }
            }
        }
    });
});
