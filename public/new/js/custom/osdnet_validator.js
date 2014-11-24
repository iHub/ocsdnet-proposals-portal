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
              institution: {
                validators: {
                    notEmpty: {
                        message: 'Institution is required and cannot be empty'
                    }
                    
                }
            },
             country: {
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
            }
        }
    }).on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');
            alert( $form.serialize());
            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                data = JSON.parse(result);
                $('#proposal_id').text(data);
            }, 'json');
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
                    },
                    stringLength: {
                        min: 6,
                        max: 250,
                        message: 'Words cannot exceed 250'
                    },
                   
                    
                }
            },
            researchproblem: {
                validators: {
                    notEmpty: {
                        message: 'Research Problem, Significance and Justification is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 1000,
                        message: 'Words cannot exceed 250'
                    }
                    
                }
            },
             researchquestions: {
                validators: {
                    notEmpty: {
                        message: 'Research Questions and Objectives'
                    },
                    stringLength: {
                        min: 6,
                        max: 500,
                        message: 'Words cannot exceed 500'
                    }
                    
                }
            },
            researchdesign: {
                validators: {
                    notEmpty: {
                        message: 'Research Design and Methods is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 1000,
                        message: 'Words cannot exceed 500'
                    }
                    
                }
            },
              analysissynthesis: {
                validators: {
                    notEmpty: {
                        message: 'Analysis and Synthesis is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 1000,
                        message: 'Words cannot exceed 1000'
                    }
                    
                }
            },
             outcomesoutputs: {
                validators: {
                    notEmpty: {
                        message: 'Output and outcomes is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 700,
                        message: 'Words cannot exceed 1000'
                    }
                    
                }
            },
            translationdissemination: {
                validators: {
                    notEmpty: {
                        translationdissemination: 'Knowledge Translation and Dissemination is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 700,
                        message: 'Words cannot exceed 700'
                    }
                    
                }
            },
            networkconnetions: {
                validators: {
                    notEmpty: {
                        message: 'The Network Connections and Interactions is required and cannot be empty'
                    },
                     stringLength: {
                        min: 6,
                        max: 500,
                        message: 'Words cannot exceed 700'
                    }
                    
                }
            },
            bibliography: {
                validators: {
                    notEmpty: {
                        message: 'The Bibliography  is required and cannot be empty'
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
            alert( $form.serialize());
            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                data = JSON.parse(result);
                $('#proposal_id').text(data);
            }, 'json');
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

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');
            alert( $form.serialize());
            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
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
                message: 'Name  is required',
                validators: {
                    notEmpty: {
                        message: 'Name is required and cannot be empty'
                    }
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
                        message: 'Phone number is required and cannot be empty'
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
                        message: 'Organization is required and cannot be empty'
                    }
                    
                }
            },
            researchercountrycitizenship: {
                validators: {
                    notEmpty: {
                        message: 'Country of citenship is required and cannot be empty'
                    }
                    
                }
            },
            researchercountrycitizenship: {
                validators: {
                    notEmpty: {
                        message: 'Country of citenship is required and cannot be empty'
                    }
                    
                }
            },
            researcheraddress: {
                validators: {
                    notEmpty: {
                        message: 'Address is required and cannot be empty'
                    }
                    
                }
            },
             researcheraffliation: {
                validators: {
                    notEmpty: {
                        message: 'Affliation is required and cannot be empty'
                    }
                    
                }
            },
             researcherwebsite: {
                validators: {
                    notEmpty: {
                        message: 'Website is required and cannot be empty'
                    }
                    
                }
            },
             researchercountryincorporation: {
                validators: {
                    notEmpty: {
                        message: 'Country of incorporation is required and cannot be empty'
                    }
                    
                }
            },
            researchergender: {
                validators: {
                    notEmpty: {
                        message: 'Gender is required and cannot be empty'
                    }
                    
                }
            },
            researcherexpertise: {
                validators: {
                    notEmpty: {
                        message: 'Expertise is required and cannot be empty'
                    }
                    
                }
            },
            researcherpublications: {
                validators: {
                    notEmpty: {
                        message: 'Research publications is required and cannot be empty'
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
            //var bv = $form.data('bootstrapValidator');
            alert( $form.serialize());
            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});
