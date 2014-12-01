
<?php error_reporting(E_ALL); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>OCSDNET</title>
        <link rel="icon" href="images/favicon.png">
        <link href="<?php echo base_url(); ?>public/new/css/demo_style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>public/new/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>public/new/css/smart_wizard.css" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url(); ?>public/new/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/new/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/new/css/prettyPhoto.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/new/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/new/css/main.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/new/css/sticky-footer.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/new/css/form.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>public/new/css/custom.css" rel="stylesheet" type="text/css">
       </head><body>
  <header class="navbar navbar-inverse navbar-static-top wet-asphalt" role="banner">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="<?php echo base_url();?>public/new/images/logo.png" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!--<li><a href="javascript:;">Item 1</a></li>
                    <li><a href="javascript:;">Item 2</a></li>
                     <li><a href="javascript:;">Item 3</a></li>
                    <li><a href="javascript:;">Item 4</a></li>
                    <li><a href="javascript:;">Item 5</a></li>
                    <li><a href="javascript:;">Item 6</a></li>-->
                    <li><a href="<?php echo base_url()?>index.php/auth/logout">Logout</a></li>
                </ul>
            </div>
          </div>
        </div>
    </header>
<div class="container">
	<div class="">
<div class="col-md-12">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class='active' ><a href="#"> <i class="glyphicon glyphicon-list-alt"></i> Review Concept Notes</a></li>
                <!--<li ><a href="#"> 
                    <i class="glyphicon glyphicon-user"></i> My Advisor Profile</a>
                </li>
                
                 <li ><a href="#"> 
                    <i class="glyphicon glyphicon-file"></i> Download review form</a>
                </li>
                 <li  >
                    <a href="#"> <i class="glyphicon glyphicon-ok-circle "></i> Shortlisted</a>
                </li>-->
            </ul>            
            <!--<ul class="nav navbar-nav navbar-right">
                <li><a href="#"> <i class="glyphicon glyphicon-lock"></i> Logout </a> </li>
            </ul>-->
        </div>

    </nav>
    </div>
</div> 
<div class="review-box">  
  <div class="">
    <div class="col-md-12">
      <div class="proposal-section">   
      <h3 align="center " class="project-title"><?php if($present){ echo $title; } ?></h3>
      <!--<h4>Primary Researcher Proposal</h4>-->
      </div>
      </div>
  </div>
  <div class="">
    <div class="col-md-12">
    <div class="proposal-section"> 
      <table class="table table-striped table-bordered table-condensed">
          <tbody>
            <h4>General Project Information <a href="<?php echo base_url(); ?>index.php/proposal" class="edit-text pull-right">Edit</a> </h4>
            <tr>
                <th>Duration of the project</th><td><p><?php if($present){ echo $duration; } ?></p></td>
            </tr>
            <tr>
                <th>Countries included in this project</th> <td><p><?php if($present){ echo $countries_covered; } ?></p></td>
            </tr>
            <tr>
                <th>Region(s) included in this project</th> <td><p><?php if($present){ echo $regions; } ?>.</p></td>
            </tr>
            <tr>
                <th>Research Themes *</th> <td><p><?php if($present){ echo $research_themes; } ?></p></td>
            </tr>
            
            <tr>
                <th>Total Budget Cost (CAD)</th> <td><p><?php if($present){ echo $total_budget_cost; } ?></p></td>
            </tr>        
          
          </tbody>
      </table>
    </div>
      </div>
  </div>
    <div class="clr clearfix"></div>

    <!-- Collaborators -->
  <div class="">
    <div class="col-md-12">
    	<div class="proposal-section"> 
    		<table class="table table-striped table-bordered table-condensed table-hover">
        <tbody>
            <h4>Research Team and Institutional Information </h4>
            <h5>Primary Researcher Information<a href="<?php echo base_url(); ?>index.php/user/edit/<?php echo $user['id']; ?>" class="edit-text pull-right">Edit</a></h5>  
            <!--<a href="/user/edit" >Edit</a> -->
        <tr>
            <th>Name</th><td><p><?php echo $user['first_name'] ?></p></td>
        </tr>
        <tr>
            <th>Email</th> <td><p><?php echo $user['email'] ?></p></td>
        </tr>
        <tr>
            <th>Phone Number</th> <td><p><?php echo $user['telephone'] ?></p></td>
        </tr>
        <tr>
            <th>Designation</th> <td><p><?php echo $user['designation'] ?></p></td>
        </tr>        
        <tr>
            <th>Institution or organization name</th> <td><p><?php echo $user['organization'] ?></p></td>
        </tr>        
        <tr>
            <th>Country of Citizenship</th> <td><p><?php echo $user['country_of_citizenship'] ?></p></td>
        </tr>        
       
        <tr>
            <th>IDRC Affiliation (if any)</th> <td><p><?php echo $user['idrc_affiliation'] ?></p></td>
        </tr>

        <tr>
            <th>Country of Citizenship</th> <td><p><?php echo $user['first_name'] ?></p></td>
        </tr>
        <tr>
            <th> Website</th> <td><p><?php echo $user['website'] ?></p></td>
        </tr>
        <tr>
            <th>Country of incorporation</th> <td><p><?php echo $user['country_of_incorporation'] ?></p></td>
        </tr>
        <tr>
            <th>Country of Residence</th> <td><p><?php echo $user['country_of_residence'] ?></p></td>
        </tr>
        <tr>
            <th>Gender</th> <td><p><?php echo $user['gender'] ?></p></td>
        </tr>
        <tr>
            <th>Areas of Expertise and Interest</th> <td><p><?php echo $user['expertise'] ?></p></td>
        </tr>
        <tr>
            <th>Relevant Publications or Research Outputs</th> <td><p><?php echo $user['publications'] ?></p></td>
        </tr>
        <tr>
            <th>Qualifications and Experience</th> <td><a href="<?php echo $user['qualifications_and_experience'] ?>">Download</a></td>
        </tr>
        </tbody>
        </table>
        <h5>Collaborators</h5>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php $i=1; ?>
            <?php foreach($collaborators as $user){?>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?php echo $i ?>">
              <h4 class="panel-title">
                  <?php if($i==1){?>
                 <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i ?>" <?php if($i==1){?> aria-expanded="true" <?php }else{?>aria-expanded="false" <?php } ?> aria-controls="collapse<?php echo $i ?>">
                  Collaborator <?php echo $i; ?>
                </a>
                <?php } else{ ?>
                   <a class="collapsed"  data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i ?>" <?php if($i==1){?> aria-expanded="true" <?php }else{?>aria-expanded="false" <?php } ?> aria-controls="collapse<?php echo $i ?>">
                  Collaborator <?php echo $i; ?>
                </a> 
                 <?php } ?>
                <a class="pull-right" href="<?php echo base_url(); ?>index.php/user/edit/<?php echo $user['id']; ?>">Edit</a>
              </h4>
            </div>
            <div id="collapse<?php echo $i; ?>" class="<?php if($i==1){ ?>panel-collapse collapse in<?php }else{ ?>panel-collapse collapse<?php } ?>" role="tabpanel" aria-labelledby="heading<?php echo $i ?>">
              <div class="panel-body">
              <table class="table  table-bordered table-condensed table-hover">
              <tbody>
                  <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>"/>
               <tr>
                        <th>Name</th><td><p><?php echo $user['first_name'] ?></p></td>
                    </tr>
                    <tr>
                        <th>Email</th> <td><p><?php echo $user['email'] ?></p></td>
                    </tr>
                    <tr>
                        <th>Phone Number</th> <td><p><?php echo $user['telephone'] ?></p></td>
                    </tr>
                    <tr>
                        <th>Designation</th> <td><p><?php echo $user['designation'] ?></p></td>
                    </tr>        
                    <tr>
                        <th>Institution or organization name</th> <td><p><?php echo $user['organization'] ?></p></td>
                    </tr>
                    
                    <tr>
                        <th>Country of Citizenship</th> <td><p><?php echo $user['country_of_citizenship'] ?></p></td>
                    </tr>       
                    <tr>
                        <th colspan="2">Office Address</th><p><?php echo $user['office_address'] ?></p></td>
                    </tr>
                    <tr>
                        <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</td>
                    </tr>
                    <tr>
                        <th>IDRC Affiliation (if any)</th> <td><p><?php echo $user['idrc_affiliation'] ?></p></td>
                    </tr>
                     <tr>
                        <th>Country of Citizenship</th> <td><p><?php echo $user['first_name'] ?></p></td>
                    </tr>
                    <tr>
                        <th> Website</th> <td><p><?php echo $user['website'] ?></p></td>
                    </tr>
                    <tr>
                        <th>Country of incorporation</th> <td><p><?php echo $user['country_of_incorporation'] ?></p></td>
                    </tr>
                    <tr>
                        <th>Country of Residence</th> <td><p><?php echo $user['country_of_residence'] ?></p></td>
                    </tr>
                    <tr>
                        <th>Gender</th> <td><p><?php echo $user['gender'] ?></p></td>
                    </tr>
                    <tr>
                        <th>Areas of Expertise and Interest</th> <td><p><?php echo $user['expertise'] ?></p></td>
                    </tr>
                    <tr>
                        <th>Relevant Publications or Research Outputs</th><td><p><?php echo $user['publications'] ?></p></td>
                    </tr>
                    <tr>
                        <th>Qualifications and Experience</th> <td><a href="<?php echo $user['qualifications_and_experience'] ?>">Download</a></td>
                    </tr>
                    <tr>
                        <th colspan="2"><p>Role in Proposed Project</p> <?php echo $user['role_in_project'] ?></th>
                    </tr>
                    <tr>
                        <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</td>
                    </tr>
                <tr>
                </tbody>
                </table>
              </div>
            </div>
            </div>
            <?php $i++; } ?>
          
          </div>
        <table  class="table table-striped table-bordered table-condensed table-hover">
        <tbody>
        <tr>
            <th colspan="2"><h5>Proposing Institution <a href="<?php echo base_url(); ?>index.php/user/edit/<?php echo $proposing_institution['id']; ?>" class="edit-text pull-right">Edit</a></h5></th>
        </tr>
        <tr>
            <th>Institution/ Organization name</th> <td><p><?php echo $proposing_institution['first_name'] ?></p></td>
        </tr>
        <tr>
            <th>Telephone Number</th> <td><p><?php echo $proposing_institution['telephone'] ?></p></td>
        </tr>
        <tr>
            <th>Email</th> <td><p><?php echo $proposing_institution['email'] ?></p></td>
        </tr>
        <tr>
            <th>Mailing Address</th> <td><p><?php echo $proposing_institution['mailing_address'] ?></p></td>
        </tr>
        <tr>
            <th>Finance Officer’s name</th> <td><p><?php echo $proposing_institution['finance_name'] ?></p></td>
        </tr>
        <tr>
            <th>Finance Officer phone number</th> <td><p><?php echo $proposing_institution['finance_phone'] ?></p></td>
        </tr>
        <tr>
            <th>Finance Officer Email</th> <td><p><?php echo $proposing_institution['finance_email'] ?></p></td>
        </tr>
        </tbody>
        </table>
        <h5>Participating Institutions</h5>
        <div class="panel-group" id="PIaccordion" role="tablist" aria-multiselectable="true">
            <?php $j=1;?>
            <?php foreach($participating_institution as $user){?>
                <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="PIheading<?php echo $j ?>">
              <h4 class="panel-title">
                  <?php if($j==1){?>
                 <a data-toggle="collapse" data-parent="#PIaccordion" href="#PIcollapse<?php echo $j ?>" <?php if($j==1){?> aria-expanded="true" <?php }else{?>aria-expanded="false" <?php } ?> aria-controls="collapse<?php echo $j ?>">
                  Institution <?php echo $j; ?>
                </a>
                <?php } else{ ?>
                   <a class="collapsed"  data-toggle="collapse" data-parent="#PIaccordion" href="#PIcollapse<?php echo $j ?>" <?php if($j==1){?> aria-expanded="true" <?php }else{?>aria-expanded="false" <?php } ?> aria-controls="collapse<?php echo $j ?>">
                  Institution <?php echo $j; ?>
                </a> 
                 <?php } ?>
                <a class="pull-right" href="<?php echo base_url(); ?>index.php/user/edit/<?php echo $user['id']; ?>">Edit</a>
              </h4>
            </div>
            <div id="PIcollapse<?php echo $j; ?>" class="<?php if($j==1){ ?>panel-collapse collapse in<?php }else{ ?>panel-collapse collapse<?php } ?>" role="tabpanel" aria-labelledby="heading<?php echo $j ?>">
              <div class="panel-body">
                <table class="table  table-bordered table-condensed table-hover">
               <tbody>
                <tr>
                        <th>Institution name</th> <td><p><?php echo $user['first_name'] ?></p></td>
                    </tr>
                    <tr>
                        <th>Telephone Number</th> <td><p><?php echo $user['telephone'] ?></p></td>
                    </tr>
                    <tr>
                        <th>Email</th> <td><p></p><?php echo $user['email'] ?></td>
                    </tr>
                     <tr>
                        <th>Office Address</th> <td><p></p><?php echo $user['office_address'] ?></td>
                    </tr>
                    <tr>
                        <th >Mailing Address</th> <td><p><?php echo $user['mailing_address'] ?></p></td>
                    </tr>
                    <tr>
                        <td colspan="2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</td>
                    </tr>
                    <tr>
                        <th>Role in the project</th> <td><p><?php echo $user['role_in_project'] ?></p></td>
                    </tr>
                   </tbody>
                </table>
              </div>
            </div>
            </div>
          <?php $j++; }?>
            
        </div>
        <!-- 
        </tbody>
        </table> -->
        </div>
  </div>
  </div>
  <div class="">
  	<div class="col-md-12">
            <div class="proposal-section"> 
                <table class="table table-striped table-bordered table-condensed">
            <tbody>
            <tr>
            <th colspan="2">
            	<h4>Proposed Study Information <a href="<?php echo base_url(); ?>index.php/proposal" class="edit-text pull-right">Edit</a></h4>
            </th>
            </tr>
            <tr>
                <th colspan="2">Research Project Abstract </th>
            </tr>
            <tr>
                <td colspan="2"><?php if($present){ echo $total_budget_cost; } ?> </td>
            </tr>
            <tr>
                <th colspan="2">Research Problem, Significance and Justification</th>
            </tr>
            <tr>
               <td colspan="2">
                        <?php if($present){ echo $research_problem_significance_and_justification; } ?>  
               </td> 
            </tr>
            <tr>
                <th colspan="2">Research Questions and Objectives</th>
            </tr>
            <tr>
                <td colspan="2" ><?php if($present){ echo $research_questions_and_objectives; } ?></td>
            </tr>
            <tr>
                <th colspan="2">Research Design and Methods</th>
            </tr>
            <tr>
                <td colspan="2"> <?php if($present){ echo $research_design_and_methods; } ?></td>
            </tr>
            <tr>
                <th colspan="2">Analysis and Synthesis </th>
            </tr>
            <tr>
                <td colspan="2"><?php if($present){ echo $analysis_and_synthesis; } ?></td>
            </tr>
            <tr>
                <th>Outcomes and Outputs</th>
            </tr>
            <tr>
                <td colspan="2"><?php if($present){ echo $outcomes_and_outputs; } ?></td>
            </tr>
            <tr>
                <th>Knowledge Translation and Dissemination</th>
            </tr>
            <tr>
                <td colspan="2"><?php if($present){ echo $knowledge_translation_and_dissemination; } ?></td>
            </tr>
            <tr>
                <th>Network Connections and Interactions</th>
            </tr>
            <tr>
                <td colspan="2"><?php if($present){ echo $network_connections_and_interactions; } ?></td>
            </tr>
            <tr>
                <th colspan="2">Bibliography</th>
            </tr>
            <tr>
                <td colspan="2"><?php if($present){ echo $bibliography; } ?></td>
            </tr>
            </tbody>
            </table>
            </div>
        </div>
  </div>
  <div class="">
    <div class="col-md-12">
    	<div class="proposal-section"> 
            <table class="table table-striped table-bordered table-condensed">
            <tbody>
            <h4>Research Administration <a href="<?php echo base_url(); ?>index.php/proposal" class="edit-text pull-right">Edit</a></h4>
            <tr>
                <th>Project Timeline</th><td><a href="<?php if($present){ echo $project_timelines; } ?>" download>Download</a></td>
            </tr>
            
            <tr>
                <th>Research Ethics</th>
            </tr>
            <tr>
                <td colspan="2"><?php if($present){ echo $research_ethics; } ?></td>
            </tr>
            <tr>
                <th colspan="2">Internal Project Communication and Management</th>
            </tr>
            <tr>
                <td colspan="2"><?php if($present){ echo $internal_project_communication_and_management; } ?></td>
            </tr>
            <tr>
                <th colspan="2">Challenges and Risks</th>
            </tr>
            <tr>
                <td colspan="2"><?php if($present){ echo $challenges_and_risks; } ?></td>
            </tr>
            <tr>
                <th colspan="2">Monitoring and Evaluation Plan</th>
            </tr>
            <tr colspan="2">
                <td colspan="2"><?php if($present){ echo $monitoring_and_evaluation; } ?></td>
            </tr>
            </tbody>
            </table>
        </div>
     </div>
  </div>
  <div class="">
    <div class="col-md-12">
        <div class="proposal-section"> 
            <table class="table table-striped table-bordered table-condensed">
            <tbody>
            <h4>Budgets</h4>
            <tr></tr>
            <h6>Budget and Timetable</h6>
            </tr>
            <tr>
                <th>Budget</th> <td><a href="<?php if($present){ echo $budget_url; } ?>">Download</a></td>
            </tr>
           </tbody>
           </table>
            
                <h4>Parallel funds</h4>
            <?php $i=1; ?>
            <?php foreach($budgets as $budget){ ?>
                <table class="table table-striped table-bordered table-condensed">
            <tbody>
            <tr>
                <th><?php echo $i; ?> .Donor</th> <td><p><?php echo $budget['donor'] ?> </p></td><td><a href="<?php echo base_url(); ?>index.php/budget/edit/<?php echo $budget['id'] ?>">Edit</a></td>
            </tr>
            <tr>
                <th>Amount</th> <td><p><?php echo $budget['amount'] ?></p></td>
            </tr>
            <tr>
                <th>Currency</th> <td><p><?php echo $budget['currency'] ?></p></td>
            </tr>
            <tr>
                <th>Time frame</th> <td><p><?php echo $budget['timeframe'] ?></p></td>
            </tr>
              </tbody>
               </table>
            <?php $i++; } ?>
            <tr  colspan="2"></tr>
          
         <button type="submit" id="submit_proposal" href="<?php echo base_url();?>index.php/proposal/submit/<?php echo $id; ?>" class="btn btn-default">Submit proposal</button>
        </div>
    </div>
  </div>
  </div><!--/.review-box --> 
</div><!-- /.container -->
<div class="footer">
      <div class="container">
        <p class="text-muted">Ocsdnet</p>
      </div>
</div>


  <script src="<?php echo base_url(); ?>public/new/js/jquery-2.0.0.min.js"></script>
  <script src="<?php echo base_url(); ?>public/new/js/bootstrap.min.js"></script>

  <script type="text/javascript">
      $(document).ready(function(){
          $('#submit_proposal').on('click',function(){
              if(confirm('Your proposal will be submitted and will not be editable thereafter.Thank you ')){
                  
                  window.location.href=$(this).attr('href');
              }
              return false;
              
          });
      })
  </script>


  
</body>
</html>