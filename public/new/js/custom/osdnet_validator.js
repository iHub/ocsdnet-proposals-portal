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
                        message: 'The roject countries is required and cannot be empty'
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
        $('.inner').show();
	     for ( instance in CKEDITOR.instances )
          CKEDITOR.instances[instance].updateElement();
        // Get the form instance
        var $form = $(e.target);
	    var data= {};
        // Get the BootstrapValidator instance
        var bv = $form.data('bootstrapValidator');
        
		var regions_array = new Array();
		$("input[name='regions']:checked").each(function(i) {
			regions_array.push($(this).val());
		});
		//console.log(regions_array);
		
		var themes_array = new Array();
		$("input[name='themes']:checked").each(function(i) {
			themes_array.push($(this).val());
		});
		
		
		data['themes']=themes_array;
		data['regions']=regions_array;
		data['title']= $('#title').val();
		data['proposal_id']= $('#proposal_id').val();
		data['countries']=$('#countries').val();
		data['budget']=$('#budget').val();
		data['duration']=$('#duration').val();
		data['justifythemes']=$('#budget').val();
		data['otherthemes']=$('#otherthemes').val();
		
        // Use Ajax to submit form data
        $.post($form.attr('action'), data, function(result) {
            data_is = JSON.parse(result);
            
            $('#proposal_id').text(data_is);
            $('#budget_proposal').text(data_is);
            $('#budget_parrallel_proposal').text(data_is);
            $('#step_3_proposal').text(data_is);
            $('#step_4_proposal').text(data_is);
            $('.inner').hide();
            alert('data saved');
        }, 'json');
    });
    
    
    $('.researcher-info').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            researchername: {
                message: 'The name is required',
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    },
                }
            },
            researcheremail: {
                validators: {
                    notEmpty: {
                        message: 'Email is required and cannot be empty'
                    }

                }
            },
            researcherphone: {
                validators: {
                    notEmpty: {
                        message: 'Telephone is required and cannot be empty'
                    }

                }
            },
            researcherdesignation: {
                validators: {
                    notEmpty: {
                        message: 'Designation is required and cannot be empty'
                    }

                }
            },
            researcherorganization: {
                validators: {
                    notEmpty: {
                        message: 'Institution is required and cannot be empty'
                    }

                }
            },
            researchercountrycitizenship: {
                validators: {
                    notEmpty: {
                        message: 'Country is required and cannot be empty'
                    }

                }
            },
            researcheraddress: {
                validators: {
                    notEmpty: {
                        message: 'The address  is required and cannot be empty'
                    }

                }
            },
            researcheraffliation: {
                validators: {
                    notEmpty: {
                        message: 'The affliation  is required and cannot be empty'
                    }

                }
            },
            researcherwebsite: {
                validators: {
                    notEmpty: {
                        message: 'The affliation  is required and cannot be empty'
                    }

                }
            },
            researchercountryincorporation: {
                validators: {
                    notEmpty: {
                        message: 'The Country incorporation  is required and cannot be empty'
                    }

                }
            },
            researchercountryresidence: {
                validators: {
                    notEmpty: {
                        message: 'The Country residence  is required and cannot be empty'
                    }

                }
            },
            researchergender: {
                validators: {
                    notEmpty: {
                        message: 'The gender  is required and cannot be empty'
                    }

                }
            },
            researcherexpertise: {
                validators: {
                    notEmpty: {
                        message: 'The expertise  is required and cannot be empty'
                    }

                }
            },
            researcherpublications: {
                validators: {
                    notEmpty: {
                        message: 'The publications  is required and cannot be empty'
                    }

                }
            },
            researchercv: {
                validators: {
                    notEmpty: {
                        message: 'File must be selected'
                    }

                }
            }
        }
    }).on('success.form.bv', function(e) {
         e.preventDefault();
         $('.inner').show();
         for ( instance in CKEDITOR.instances )
          CKEDITOR.instances[instance].updateElement();
          
        var $form = $(e.target);
        var bv = $form.data('bootstrapValidator');
        var formData = new FormData($(this)[0]);
        // Use Ajax to submit form data
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: formData,
            async: false,
            success: function(result) {
              data = JSON.parse(result);
              
              $('#researcher_id').val(data);
              $('.inner').hide();
              alert('data saved');
            },
            cache: false,
            contentType: false,
            processData: false
        });
         
        
    });
   

    $('.collaborator-info').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                message: 'The name is required',
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    },
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email is required and cannot be empty'
                    }

                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Phone is required and cannot be empty'
                    }

                }
            },
            designation: {
                validators: {
                    notEmpty: {
                        message: 'Designation is required and cannot be empty'
                    }

                }
            },
            organization: {
                validators: {
                    notEmpty: {
                        message: 'Institution is required and cannot be empty'
                    }

                }
            },
            citizenship: {
                validators: {
                    notEmpty: {
                        message: 'Country is required and cannot be empty'
                    }

                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'The address  is required and cannot be empty'
                    }

                }
            },
            affliation: {
                validators: {
                    notEmpty: {
                        message: 'The affliation  is required and cannot be empty'
                    }

                }
            },
            website: {
                validators: {
                    notEmpty: {
                        message: 'The affliation  is required and cannot be empty'
                    }

                }
            },
            countryincorporation: {
                validators: {
                    notEmpty: {
                        message: 'The Country incorporation  is required and cannot be empty'
                    }

                }
            },
            countryresidence: {
                validators: {
                    notEmpty: {
                        message: 'The Country residence  is required and cannot be empty'
                    }

                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender  is required and cannot be empty'
                    }

                }
            },
            expertise: {
                validators: {
                    notEmpty: {
                        message: 'The expertise  is required and cannot be empty'
                    }

                }
            },
            publications: {
                validators: {
                    notEmpty: {
                        message: 'The publications  is required and cannot be empty'
                    }

                }
            },
            qualification: {
                validators: {
                    notEmpty: {
                        message: 'Please choose a file'
                    }

                }
            },
            role: {
                validators: {
                    notEmpty: {
                        message: 'Please choose a file'
                    }

                }
            },
             qualification: {
                validators: {
                    notEmpty: {
                        message: 'File must be selected'
                    }

                }
            }
        }
    }).on('success.form.bv', function(e) {
        // Prevent form submission
        for ( instance in CKEDITOR.instances )
          CKEDITOR.instances[instance].updateElement();
        e.preventDefault();
        $('.inner').show();
        var $form = $(e.target);
        var bv = $form.data('bootstrapValidator');
        var formData = new FormData($(this)[0]);
        // Use Ajax to submit form data
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: formData,
            async: false,
            success: function(result) {
              data = JSON.parse(result);
              
              $('#researcher_id').val(data);
             $('.collaborator-info').trigger("reset");
              $('.inner').hide();
              alert('data saved.');
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
    
    //institution info
    $('.institution-info').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                message: 'The name is required',
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    },
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email is required and cannot be empty'
                    }

                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Phone is required and cannot be empty'
                    }

                }
            },
            mailaddress: {
                validators: {
                    notEmpty: {
                        message: 'Mailing address is required and cannot be empty'
                    }

                }
            },
            financename: {
                validators: {
                    notEmpty: {
                        message: 'Finance person name is required and cannot be empty'
                    }

                }
            },
            financephone: {
                validators: {
                    notEmpty: {
                        message: 'Finance phone name is required and cannot be empty'
                    }

                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'The address  is required and cannot be empty'
                    }

                }
            },
            financeemail: {
                validators: {
                    notEmpty: {
                        message: 'The finance person email  is required and cannot be empty'
                    }

                }
            }

        }
    }).on('success.form.bv', function(e) {
        // Prevent form submission
         e.preventDefault();
          $('.inner').show();
//     e.preventDefault();
		for ( instance in CKEDITOR.instances )
          CKEDITOR.instances[instance].updateElement();
        var $form = $(e.target);
        var bv = $form.data('bootstrapValidator');
        var formData = new FormData($(this)[0]);
        
        // Use Ajax to submit form data
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: formData,
            async: false,
            success: function(result) {
              data = JSON.parse(result);
               $('.inner').hide();
              alert('data saved');
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
    //supporting
    $('.institution-supporting-info').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                message: 'The name is required',
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    },
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email is required and cannot be empty'
                    }

                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Phone is required and cannot be empty'
                    }

                }
            },
            mailaddress: {
                validators: {
                    notEmpty: {
                        message: 'Mailing address is required and cannot be empty'
                    }

                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'The address  is required and cannot be empty'
                    }

                }
            },
            role: {
                validators: {
                    notEmpty: {
                        message: 'The Role in project  is required and cannot be empty'
                    }

                }
            }



        }
    }).on('success.form.bv', function(e) {
        // Prevent form submission
        
        e.preventDefault();
        $('.inner').show();
//     e.preventDefault();
		for ( instance in CKEDITOR.instances )
          CKEDITOR.instances[instance].updateElement();
        var $form = $(e.target);
        var bv = $form.data('bootstrapValidator');
        var formData = new FormData($(this)[0]);
        
        // Use Ajax to submit form data
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: formData,
            async: false,
            success: function(result) {
              data = JSON.parse(result);
              $('.inner').hide();
              alert('data saved');
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });



    $('.proposed-study-info').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            researchproject: {
                message: 'Research Project Abstract  is required',
                validators: {
                    notEmpty: {
                        message: 'Research Project Abstract and cannot be empty'
                    }
                }
            },
            researchproblem: {
                validators: {
                    notEmpty: {
                        message: 'Research Problem, Significance and Justification is required and cannot be empty'
                    }
                }
            },
            researchquestions: {
                validators: {
                    notEmpty: {
                        message: 'Research Questions and Objectives'
                    }
                }
            },
            designmethods: {
                validators: {
                    notEmpty: {
                        message: 'Research Design and Methods is required and cannot be empty'
                    }
                }
            },
            analysissynthesis: {
                validators: {
                    notEmpty: {
                        message: 'Analysis and Synthesis is required and cannot be empty'
                    }    
                }
            },
            outcomesoutputs: {
                validators: {
                    notEmpty: {
                        message: 'Output and outcomes is required and cannot be empty'
                    }
                }
            },
            translationdissemination: {
                validators: {
                    notEmpty: {
                        translationdissemination: 'Knowledge Translation and Dissemination is required and cannot be empty'
                    }

                }
            },
            networkconnetions: {
                validators: {
                    notEmpty: {
                        message: 'The Network Connections and Interactions is required and cannot be empty'
                    }
                }
            },
            bibliography: {
                validators: {
                    notEmpty: {
                        message: 'The Bibliography  is required and cannot be empty'
                    }
                }
            },
            stakeholders: {
                validators: {
                    notEmpty: {
                        message: 'Stakeholders field  is required and cannot be empty'
                    }
                }
            }

        }
    }).on('success.form.bv', function(e) {
    	
        // Prevent form submission
        e.preventDefault();
        $('.inner').show();
//     e.preventDefault();
		for ( instance in CKEDITOR.instances )
          CKEDITOR.instances[instance].updateElement();
        var $form = $(e.target);
        var bv = $form.data('bootstrapValidator');
        var formData = new FormData($(this)[0]);
        
        // Use Ajax to submit form data
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: formData,
            async: false,
            success: function(result) {
              data = JSON.parse(result);
              $('.inner').hide();
              alert('data saved');
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    // Research admnistration form
    $('.research-administration').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            projecttimeline: {
                message: 'Project Timeline  is required',
                validators: {
                    notEmpty: {
                        message: 'Research Project Abstract and cannot be empty'
                    }
                }
            },
            researchethics: {
                validators: {
                    notEmpty: {
                        message: 'Research Ethics is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 500,
                        message: 'Words cannot exceed 250'
                    }

                }
            },
            internalproject: {
                validators: {
                    notEmpty: {
                        message: 'Internal Project Communication and Management'
                    },
                    stringLength: {
                        min: 6,
                        max: 500,
                        message: 'Words cannot exceed 500'
                    }

                }
            },
            challengesandrisks: {
                validators: {
                    notEmpty: {
                        message: 'Challenges and Risks is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 1000,
                        message: 'Words cannot exceed 500'
                    }

                }
            },
            monitoringevaluation: {
                validators: {
                    notEmpty: {
                        message: 'Monitoring and Evaluation Plan is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 1000,
                        message: 'Words cannot exceed 1000'
                    }

                }
            }


        }
    }).on('success.form.bv', function(e) {
        // Prevent form submission
         e.preventDefault();
         $('.inner').show();
         for ( instance in CKEDITOR.instances )
          CKEDITOR.instances[instance].updateElement();
        var $form = $(e.target);
        var bv = $form.data('bootstrapValidator');
        var formData = new FormData($(this)[0]);
        // Use Ajax to submit form data
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: formData,
            async: false,
            success: function(data) {
            	$('.inner').hide();
                alert('form saved');
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
  
    $('.budget-info').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            budget: {
                validators: {
                    notEmpty: {
                        message: 'select file'
                    }
                }
            }
        }
    }).on('success.form.bv', function(e) {

        e.preventDefault();
        $('.inner').show();
        var $form = $(e.target);
        var bv = $form.data('bootstrapValidator');
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: formData,
            async: false,
            success: function(result) {
                data = JSON.parse(result);
                console.log(data);
                $('.inner').hide();
                alert('data saved ');
            },
            cache: false,
            contentType: false,
            processData: false
        });

        
    });
    $('.funding-info').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            donor: {
                validators: {
                    notEmpty: {
                        message: 'Donor field required'
                    }
                }
            },
            amount: {
                validators: {
                    notEmpty: {
                        message: 'Amount is required'
                    }
                }
            },
            currency: {
                validators: {
                    notEmpty: {
                        message: 'Currency is required'
                    }
                }
            },
            timeframe: {
                validators: {
                    notEmpty: {
                        message: 'Time frame field is required'
                    }
                }
            }
        }
    }).on('success.form.bv', function(e) {

        e.preventDefault();
        $('.inner').show();
        // Get the form instance
        var $form = $(e.target);
        // Get the BootstrapValidator instance
        var bv = $form.data('bootstrapValidator');
        // Use Ajax to submit form data
        $.post($form.attr('action'), $form.serialize(), function(result) {
            data = JSON.parse(result);
            console.log(data);
            $('.inner').hide();
            alert('data saved ');

        }, 'json');
        
    });
    
    
});
