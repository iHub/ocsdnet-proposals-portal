<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <title>OCSDNET</title>

  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/new/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/new/css/bootstrap.min.css">

  <link href="<?php echo base_url(); ?>public/new/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/new/css/sticky-footer.css" rel="stylesheet">

  <!-- App CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/new/css/target-admin.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/new/css/custom.css">


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>

</head><body>
  <header class="navbar navbar-inverse navbar-static-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="../images/logo.png" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!--<li><a href="index.html">Item 1</a></li>
                    <li><a href="about-us.html">Item 2</a></li>
                     <li><a href="blog.html">Item 3</a></li> 
                    <li><a href="portfolio.html">Item 4</a></li>
                    <li><a href="services.html">Item 5</a></li>  
                    <li><a href="contact-us.html">Item 6</a></li>
                    <li><a href="#">Item 7</a></li>-->
                </ul>
            </div>
        </div>
    </header>
    
<!--<div class="demoHead">

<div style="margin-top:15px;">
<div style="float:left"><h3>Examples:</h3></div>
    <div style="float:left" class="demoExampleLinks">
      <a href="index.htm" class="btn selected">Basic Example</a>
      <a href="smartwizard2-vertical.htm" class="btn">Vertical Style</a>
      <a href="smartwizard2-multiple.htm" class="btn">Multiple Wizards</a>
      <a href="smartwizard2-ajax.htm" class="btn">Ajax Contents</a>
      <a href="smartwizard2-validation.htm" class="btn">Step Validation</a>
      <a href="smartwizard-autostep.htm" class="btn">Auto Step buttons</a>
    </div>
    <div style="clear:both;"></div>
  </div>

</div>-->
<div class="container-lg">
<div class="row">
<div class="col-md-12">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class='active' ><a href="#"> <i class="glyphicon glyphicon-list-alt"></i> Review Concept Notes</a></li>
                <li ><a href="#"> 
                    <i class="glyphicon glyphicon-user"></i> My Advisor Profile</a>
                </li>
                
                 <li ><a href="#"> 
                    <i class="glyphicon glyphicon-file"></i> Download review form</a>
                </li>
                 <li  >
                    <a href="#"> <i class="glyphicon glyphicon-ok-circle "></i> Shortlisted</a>
                </li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"> <i class="glyphicon glyphicon-lock"></i> Logout </a> </li>
            </ul>
        </div>

    </nav>
<div class="col-md-6 pull-left">          
<div class="bs-example bs-example-tabs" role="tabpanel">
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#relevance_and_fit" id="relevance_and_fit-tab" role="tab" data-toggle="tab" aria-controls="relevance_and_fit" aria-expanded="true">Relevance and Fit</a></li>
      <li role="presentation"><a href="#merit" role="tab" id="merit-tab" data-toggle="tab" aria-controls="merit">Merit</a></li>
      <li role="presentation"><a href="#application_of_knowledge" role="tab" id="application_of_knowledge-tab" data-toggle="tab" aria-controls="application_of_knowledge">Application of knowledge</a></li>
      <li role="presentation"><a href="#feasibility" role="tab" id="feasibility-tab" data-toggle="tab" aria-controls="feasibility">Feasibility</a></li>
      <!--<li role="presentation"><a href="#submit_review" role="tab" id="submit_review-tab" data-toggle="tab" aria-controls="submit_review">Submit review</a></li>-->
    </ul>
    <div id="myTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="relevance_and_fit" aria-labelledBy="relevance_and_fit-tab">
        <div class="form-fields">
		 	<div  class="form-group">
				  <label>Does this research project fit with at least one of OCSD thematic areas? (see Appendix Section 2 for more details of the themes and potential research areas). </label>
				  <span class="help-block">Select all that apply</span>
				  <div class="checkbox">
				      <label> 	
					     <input type="checkbox" name="c1"  value="1" >
					     Option 1 Motivations (Incentives and Ideologies);
					  </label>
				  </div>					  				  	
		          <div class="checkbox">
				      <label> 	
					     <input type="checkbox" name="c2"  value="2" >Option 2 Enabling Infrastructures & Technologies;
					  </label>
				  </div>					  				  	
		          <div class="checkbox">
				      <label> 	
					     <input type="checkbox" name="c3"  value="3" >
					     Option 3 Communities of practice in OCS in the Global South Context;					  </label>
				 </div>					  				  	
		         <div class="checkbox">
				      <label> 	
					     <input type="checkbox" name="c4"  value="4" >
					     Option 4 Potential Impacts (Positive and Negative) of OCS</label>
				 </div>
				 <textarea class="form-control" rows="3"></textarea>			  
			</div>
      </div>
      <div  class="form-group">
		<label>Does the applicant clearly demonstrate how the research or activity will add value to existing knowledge and/or practice? </label>
		<span class="help-block"></span>
		<div class="radio">
		<label> 	
		<input type="radio" name="r2"  value="5"   >
		5 Excellent. The research/activity very clearly adds value to existing knowledge/practice.					  </label>
		</div>
		<div class="radio">
		<label> 	
		<input type="radio" name="r2"  value="6"   >
		4 Good. The research/activity clearly adds some value to existing knowledge/practice.					  </label>
		</div>
		<div class="radio">
		<label> 	
		<input type="radio" name="r2"  value="7"   >
		3. Fair. The research/activity appears to adds some value to existing knowledge, but there are areas that are unclear.					  </label>
		</div>
		<div class="radio">
		<label> 	
		<input type="radio" name="r2"  value="8"   >
		2. Poor. The research/activity adds little value to existing knowledge.					  </label>
		</div>
		<div class="radio">
		<label> 	
		<input type="radio" name="r2"  value="9"   >
		1. Very Poor. The research/activity clearly does not add any value to existing knowledge.					  </label>
		</div>
		<textarea class="form-control" rows="3"></textarea>	<br/>
		
		<a class="btn btn-default" href="javascript:;" >Save&Continue</a>
		</div>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="merit" aria-labelledBy="merit-tab">
        <p>MERIT DATA FROM THE DB</p>
        <a class="btn btn-default" href="javascript:;" >Save&Continue</a>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="application_of_knowledge" aria-labelledBy="application_of_knowledge-tab">
        <p>APPLICATION OF KNOWLEDGE DATA FROM THE DB</p>
        <a class="btn btn-default" href="javascript:;" >Save&Continue</a>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="feasibility" aria-labelledBy="feasibility-tab">
        <p>FEASIBILITY DATA FROM THE DB</p>
        <a class="btn btn-default" href="javascript:;" >Save&Submit</a>
      </div>
      </div>
    </div> <!-- /example -->
  </div><!--/.col-md-6 -->      
  <div class="col-md-6 pull-right">
    <div class="review-box">    
      <h3 align="center " class="project-title">The assessment of the pollution of the Kafue River: Implications for Fish Health and Reproduction</h3>
      <!--<h4>Primary Researcher Proposal</h4>-->
      <table class="table table-striped table-bordered table-condensed">
          <tbody>
            <h4>General Project Information</h4>
            <tr>
                <th>Duration of the project</th><td><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p></td>
            </tr>
            <tr>
                <th>Countries included in this project</th> <td><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p></td>
            </tr>
            <tr>
                <th>Region(s) included in this project</th> <td><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p></td>
            </tr>
            <tr>
                <th>Research Themes *</th> <td><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p></td>
            </tr>
            
            <tr>
                <th colspan="2">Justification of Research Themes</th>
            </tr>
            <tr>
                <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</td>
            </tr>
            <tr>
                <th>Total Budget Cost (CAD)</th> <td><p></p></td>
            </tr>        
          
          </tbody>
      </table>

    <div class="clr clearfix"></div>

    <!-- Collaborators -->

          
    <table class="table table-striped table-bordered table-condensed">
        <tbody>
            <h4>Research Team and Institutional Information</h4>
        	<h5>Primary Researcher Information</h5>        	
        <tr>
            <th>Name</th><td><p></p></td>
        </tr>
        <tr>
            <th>Email</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Phone Number</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Designation</th> <td><p></p></td>
        </tr>        
        <tr>
            <th>Institution or organization name</th> <td><p></p></td>
        </tr>
        
        <tr>
            <th>Country of Citizenship</th> <td><p></p></td>
        </tr>        
        <tr>
            <th colspan="2">Office Address</th><p></p></td>
        </tr>
        <tr>
            <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</td>
        </tr>
        <tr>
            <th>IDRC Affiliation (if any)</th> <td><p></p></td>
        </tr>

        <tr>
            <th>Country of Citizenship</th> <td><p></p></td>
        </tr>
        <tr>
            <th> Website</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Country of incorporation</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Country of Residence</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Gender</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Areas of Expertise and Interest</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Relevant Publications or Research Outputs</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Qualifications and Experience</th> <td><a href="javascript:;">Download</a></td>
        </tr>
        <tr>
        	<th><h5>Collaborators</h5></th>
        <tr>
            <th>Name</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Email</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Phone Number</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Designation</th> <td><p></p></td>
        </tr>        
        <tr>
            <th>Institution or organization name</th> <td><p></p></td>
        </tr>        
        <tr>
            <th>Country of Citizenship</th> <td><p></p></td>
        </tr>        
        <tr>
            <th colspan="2">Office Address</th><p></p></td>
        </tr>
        <tr>
            <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</td>
        </tr>
        <tr>
            <th>IDRC Affiliation (if any)</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Country of Citizenship</th><td><p></p></td>
        </tr>
        <tr>
            <th> Website</th><td><p></p></td>
        </tr>
        <tr>
            <th>Country of incorporation</th><td><p></p></td>
        </tr>
        <tr>
            <th>Country of Residence</th><td><p></p></td>
        </tr>
        <tr>
            <th>Gender</th><td><p></p></td>
        </tr>
        <tr>
            <th>Areas of Expertise and Interest</th><td><p></p></td>
        </tr>
        <tr>
            <th>Relevant Publications or Research Outputs</th><td><p></p></td>
        </tr>
        <tr>
            <th>Qualifications and Experience</th><td><p></p></td>
        </tr>
        <tr>
            <th colspan="2"><p>Role in Proposed Project</p> </th>
        </tr>
        <tr>
            <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</td>
        </tr>
        <tr>
            <th><h5>Proposed Institution</h5></th>
        </tr>
        <tr>
            <th>Institution/ Organization name</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Telephone Number</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Email</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Mailing Address</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Finance Officer’s name</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Finance Officer phone number</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Finance Officer Email</th> <td><p></p></td>
        </tr>
        <tr>
        	<th><h5>Participating Institutions</h6></th>
        </tr>
        <tr>
            <th>Institution name</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Telephone Number</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Email</th> <td><p></p></td>
        </tr>
        <tr>
            <th colspan="2" >Mailing Address</th> <td><p></p></td>
        </tr>
        <tr>
            <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</td>
        </tr>
        <tr>
            <th>Role in the project</th> <td><p></p></td>
        </tr>
        </tbody>
        </table>
        <table class="table table-striped table-bordered table-condensed">
        <tbody>
        <h5>Proposed Study Information</h5>
        <tr>
            <th colspan="2">Research Project Abstract </th>
        </tr>
        <tr>
            <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</td>
        </tr>
        <tr>
            <th colspan="2">Research Problem, Significance and Justification</th>
        </tr>
        <tr>
           <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.               
           </td> 
        </tr>
        <tr>
            <th colspan="2">Research Questions and Objectives</th>
        </tr>
        <tr>
            <td colspan="2" >Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</td>
        </tr>
        <tr>
            <th colspan="2">Research Design and Methods</th>
        </tr>
        <tr>
            <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</td>
        </tr>
        <tr>
            <th colspan="2">Analysis and Synthesis </th>
        </tr>
        <tr>
            <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</td>
        </tr>
        <tr>
            <th>Outcomes and Outputs</th>
        </tr>
        <tr>
            <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</td>
        </tr>
        <tr>
            <th>Knowledge Translation and Dissemination</th>
        </tr>
        <tr>
            <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</td>
        </tr>
        <tr>
            <th>Network Connections and Interactions</th>
        </tr>
        <tr>
            <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</td>
        </tr>
        <tr>
            <th colspan="2">Bibliography</th>
        </tr>
        <tr>
            <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</td>
        </tr>
        </tbody>
        </table>
        <table class="table table-striped table-bordered table-condensed">
        <tbody>
        <h5>Research Administration</h5>
        <tr>
            <th>Project Timeline</th><td><a href="javascript:;">Download</a></td>
        </tr>
        <tr>
            <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</td>
        </tr>
        <tr>
            <th>Research Ethics</th>
        </tr>
        <tr>
            <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</td>
        </tr>
        <tr>
            <th colspan="2">Internal Project Communication and Management</th>
        </tr>
        <tr>
            <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</td>
        </tr>
        <tr>
            <th colspan="2">Challenges and Risks</th>
        </tr>
        <tr>
            <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</td>
        </tr>
        <tr>
            <th colspan="2">Monitoring and Evaluation Plan</th>
        </tr>
        <tr colspan="2">
            <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</td>
        </tr>
        </tbody>
        </table>
        <table class="table table-striped table-bordered table-condensed">
        <tbody>
        <h5>Budgets</h5>
        <h6>Budget and Timetable</h6>
        </tr>
        <tr>
            <th>Parallel funds</th> <td><a href="javascript:;">Download</a></td>
        </tr>
        <tr>
            <th>Donor</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Amount</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Time frame</th> <td><p></p></td>
        </tr>
        </tbody>
    </table>
    </div>
  </div><!--/.col-md-6 --> 
</div> <!-- /.col -->
</div>

</div> <!-- /.container -->
<div class="footer">
      <div class="container">
        <p class="text-muted">ocsdnet</p>
      </div>
    </div>


  <script src="../js/jquery-2.0.0.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  


  
</body>
</html>
