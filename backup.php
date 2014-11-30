<?php

class Proposal extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//$user_data = $this -> session -> userdata("user_data");

		$this->load->model("proposal/proposal_model");
		$this->load->model("users/user_model");
		$this->load->model("proposal/budget_model");
	}

	public function index() {

		$user_data = $this->session->userdata("user_data");

		$id = $user_data['id'];
		$this->data['active_menu'] = 1;
		$this->data['form'] = $this->proposal_model->get_researchers($id);
		$proposal = $this->proposal_model->get_proposals($id);

		$data = array();
		if ($proposal) {
			$data = $proposal[0];
			$data['present'] = 1;
		} else {
			$data['present'] = 0;
		}

		$data['researcher_id'] = $id;

		$this->load->view("new-proposal/proposal_form", $data);
	}

	public function projectinfo() {
		$user_data = $this->session->userdata("user_data");
		$id = $user_data['id'];
		$data['id'] = $_POST['proposal_id'];
		$data['researcher_id'] = $id;
		$data['title'] = $_POST['title'];
		$data['duration'] = $_POST['duration'];
		$data['countries_covered'] = $_POST['countries'];
		$data['regions'] = $_POST['regions'];
		$data['research_themes'] = $_POST['themes'];
		$data['justification_of_research_themes'] = $_POST['justifythemes'];
		$data['budget'] = $_POST['budget'];

		$proposal_id = $this->proposal_model->save_study_info($data);
		echo json_encode($proposal_id);
	}

	public function stepthree() {
		$data['id'] = $_POST['proposal_id'];
		$data['research_project_abstract'] = $_POST['researchproject'];
		$data['research_problem_significance_and_justification'] = $_POST['researchproblem'];
		$data['research_questions_and_objectives'] = $_POST['researchquestions'];
		$data['research_design_and_methods'] = $_POST['researchdesign'];
		$data['analysis_and_synthesis'] = $_POST['analysissynthesis'];
		$data['stakeholders'] = $_POST['stakeholders'];
		$data['outcomes_and_outputs'] = $_POST['outcomesoutputs'];
		$data['knowledge_translation_and_dissemination'] = $_POST['translationdissemination'];
		$data['network_connections_and_interactions'] = $_POST['networkconnetions'];
		$data['bibliography'] = $_POST['bibliography'];

		$proposal_id = $this->proposal_model->save_study_info($data);
		echo json_encode($proposal_id);
	}

	public function stepfour() {

		$data['id'] = $_POST['proposal_id'];
		$uploaddir = realpath(dirname(__DIR__));
		$upload_array = explode("/application", $uploaddir);
		$uploaddir = $upload_array[0] . "/uploads";
		$upload_path = base_url() . "uploads";
		$tmp_name = $_FILES["projecttimeline"]["tmp_name"];

		$name = $_FILES["projecttimeline"]["name"];
		$name_array = explode('.', $name);

		$name_path = $name_array[0] . time();
		$file_name = $name_path . "." . $name_array[1];

		$path = $upload_path . '/' . $file_name;
		$data["project_timelines"] = "";

		if (move_uploaded_file($tmp_name, "$uploaddir/$file_name")) {
			$data["project_timelines"] = $path;
		}
		$data['research_ethics'] = $_POST['researchethics'];
		$data['internal_project_communication_and_management'] = $_POST['internalproject'];
		$data['challenges_and_risks'] = $_POST['challengesandrisks'];
		$data['monitoring_and_evaluation'] = $_POST['monitoringevaluation'];
		$proposal_id = $this->proposal_model->save_study_info($data);
		echo json_encode($proposal_id);
	}

	public function researchinfo() {
		$data['first_name'] = $_POST['researchername'];
		$data['gender'] = $_POST['researchergender'];
		$data['email'] = $_POST['researcheremail'];
		$data['telephone'] = $_POST['researcherphone'];
		$data['designation'] = $_POST['researcherdesignation'];
		$data['organization'] = $_POST['researcherorganization'];
		$data['country_of_incorporation'] = $_POST['researchercountryincorporation'];
		$data['office_address'] = $_POST['researcheraddress'];
		$data['idrc_affiliation'] = $_POST['researcheraffliation'];
		$data['country_of_citizenship'] = $_POST['researchercountrycitizenship'];
		$data['website'] = $_POST['researcherwebsite'];
		$data['idrc_affiliation'] = $_POST['researcheraffliation'];
		$data['country_of_residence'] = $_POST['researchercountryresidence'];
		$data['expertise'] = $_POST['researcherexpertise'];
		$data['relevant_publications'] = $_POST['researcherpublications'];
		$data['user_role_id'] = 1;
		$uploaddir = realpath(dirname(__DIR__));
		$upload_array = explode("/application", $uploaddir);
		$uploaddir = $upload_array[0] . "/uploads";
		$upload_path = base_url() . "uploads";
		$tmp_name = $_FILES["researchercv"]["tmp_name"];

		$name = $_FILES["researchercv"]["name"];
		$name_array = explode('.', $name);

		$name_path = $name_array[0] . time();
		$file_name = $name_path . "." . $name_array[1];

		$path = $upload_path . '/' . $file_name;
		$data["qualifications_and_experience"] = "";

		if (move_uploaded_file($tmp_name, "$uploaddir/$file_name")) {
			$data["qualifications_and_experience"] = $path;
		}

		$user_data = $this->session->userdata("user_data");
		$id = $user_data['id'];

		$researcher_id = $this->user_model->save($data, $id);
		echo json_encode($researcher_id);
	}

	public function collaboratorinfo() {
		$data['first_name'] = $_POST['name'];
		$data['gender'] = $_POST['gender'];
		$data['email'] = $_POST['email'];
		$data['telephone'] = $_POST['phone'];
		$data['designation'] = $_POST['designation'];
		$data['organization'] = $_POST['organization'];
		$data['country_of_incorporation'] = $_POST['countryincorporation'];
		$data['office_address'] = $_POST['address'];
		$data['country_of_citizenship'] = $_POST['citizenship'];
		$data['website'] = $_POST['website'];
		$data['idrc_affiliation'] = $_POST['affliation'];
		$data['country_of_residence'] = $_POST['residence'];
		$data['expertise'] = $_POST['expertise'];
		$data['relevant_publications'] = $_POST['publications'];
		$data['researcher_id'] = $_POST['researcher_id'];
		$data['role_in_project'] = $_POST['role'];
		$data['user_role_id'] = 5;
		$uploaddir = realpath(dirname(__DIR__));
		$upload_array = explode("/application", $uploaddir);
		$uploaddir = $upload_array[0] . "/uploads";
		$upload_path = base_url() . "uploads";
		$tmp_name = $_FILES["qualification"]["tmp_name"];

		$name = $_FILES["qualification"]["name"];
		$name_array = explode('.', $name);

		$name_path = $name_array[0] . time();
		$file_name = $name_path . "." . $name_array[1];

		$path = $upload_path . '/' . $file_name;
		$data["qualifications_and_experience"] = "";

		if (move_uploaded_file($tmp_name, "$uploaddir/$file_name")) {
			$data["qualifications_and_experience"] = $path;
		}
		$collaborator_id = $this->user_model->save($data);
		echo json_encode($collaborator_id);
	}

	public function institutioninfo() {
		$data['first_name'] = $_POST['name'];
		$data['email'] = $_POST['email'];
		$data['telephone'] = $_POST['phone'];
		$data['mailing_address'] = $_POST['mailaddress'];
		$data['finance_name'] = $_POST['financename'];
		$data['office_address'] = $_POST['addresses'];
		$data['finance_email'] = $_POST['financeemail'];
		$data['finance_phone'] = $_POST['financephone'];
		$data['researcher_id'] = $_POST['researcher_id'];
		$data['user_role_id'] = 6;
		$institution_id = $this->user_model->save($data);
		echo json_encode($institution_id);
	}

	public function institutionparticipatinginfo() {
		$data['first_name'] = $_POST['name'];
		$data['email'] = $_POST['email'];
		$data['telephone'] = $_POST['phone'];
		$data['mailing_address'] = $_POST['mailingaddress'];
		$data['office_address'] = $_POST['address'];
		$data['role_in_project'] = $_POST['role'];
		$data['researcher_id'] = $_POST['researcher_id'];
		$data['user_role_id'] = 7;
		$institution_id = $this->user_model->save($data);

		echo json_encode($institution_id);
	}

	public function budget() {

		$uploaddir = realpath(dirname(__DIR__));
		$upload_array = explode("/application", $uploaddir);
		$uploaddir = $upload_array[0] . "/uploads";
		$upload_path = base_url() . "uploads";
		$tmp_name = $_FILES["budget"]["tmp_name"];
		$name = $_FILES["budget"]["name"];
		$name_array = explode('.', $name);
		$name_path = $name_array[0] . time();
		$file_name = $name_path . "." . $name_array[1];
		$path = $upload_path . '/' . $file_name;
		$data["budget_url"] = "";
		$data['id'] = $_POST['proposal_id'];

		if (move_uploaded_file($tmp_name, "$uploaddir/$file_name")) {
			$data["budget_url"] = $path;

		}
		$proposal_id = $this->proposal_model->save_study_info($data);
		echo json_encode($proposal_id);

	}
	public function funding() {
		$data['donor'] = $_POST['donor'];
		$data['amount'] = $_POST['amount'];
		$data['currency'] = $_POST['currency'];
		$data['timeframe'] = $_POST['timeframe'];
		$data['proposal_id'] = $_POST['proposal_id'];
		$id = $this->budget_model->save($data);
		echo json_encode($id);
	}

}

//// proposal




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
</div>
        

<section id="proposal-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table align="center" border="0" cellpadding="0" cellspacing="0">
                    <tr><td>
                    <!-- Smart Wizard -->
                            <h2>Proposal Application form</h2>
                            <div id="wizardmain" class="swMain">
                                <ul>
                                    <li><a href="#step-1">
                                    <label class="stepNumber">1</label>
                                    <span class="stepDesc">
                                       Step 1<br />
                                       <small>General Project Info</small>
                                    </span>
                                </a></li>
                                    <li><a href="#step-2">
                                    <label class="stepNumber">2</label>
                                    <span class="stepDesc">
                                       Step 2<br />
                                       <small>Team & Institution Info</small>
                                    </span>
                                </a></li>
                                    <li><a href="#step-3">
                                    <label class="stepNumber">3</label>
                                    <span class="stepDesc">
                                       Step 3<br />
                                       <small>Proposed Study Info</small>
                                    </span>
                                 </a></li>
                                    <li><a href="#step-4">
                                    <label class="stepNumber">4</label>
                                    <span class="stepDesc">
                                       Step 4<br />
                                       <small>Research Administration</small>
                                    </span>
                                </a></li>
                                <li><a href="#step-5">
                                    <label class="stepNumber">5</label>
                                    <span class="stepDesc">
                                       Step 5<br />
                                       <small>Budget</small>
                                    </span>
                                </a></li>
                                </ul>
                                <div id="step-1">
                                <!--<h2 class="StepTitle">Step 1 Content</h2>-->
                                <section>
                               <form role="form" class="project-info" action="<?php echo base_url();?>index.php/proposal/projectinfo">
                              <input type="hidden" name="proposal_id" class="form-control"  value="<?php if ($present) {echo $id;}?>" />
                              <div class="form-group">
                                <label for="projectTitle">Project Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php if ($present) {echo $title;}?>" id="title" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="projectTitle">Duration of the project</label><br/>
                                <p class="lable-description">The duration of your project should be stated in the number of months that require funding.</p>
                                <input type="text" class="form-control" name="duration" value="<?php if ($present) {echo $duration;}?>" id="duration" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="projectTitle">Countries included in this project</label><br/>
                                <p class="lable-description">This includes the countries in which the research will take place as well as the countries in which project collaborators currently reside.</p>
                                <input type="text" class="form-control" value="<?php if ($present) {echo $countries_covered;}?>" name="countries" id="countries" placeholder="">
                              </div>
                              <div class="form-group">
                                  <label>Region(s) included in this project</label>
                                  <div class="checkbox">
                                      <label>
                                        <input type="checkbox"  name="regions" value="asia">
                                        Asia
                                      </label>
                                  </div>
                                 <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  name="regions" value="sub saharan africa">
                                        Sub-Saharan Africa
                                    </label>
                                 </div>
                                 <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="regions" value="latin america">
                                        Latin America
                                    </label>
                                 </div>
                                 <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="regions" value="middle east">
                                        Middle East
                                    </label>
                                 </div>
                                 <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="regions" value="caribbean">
                                        Caribbean
                                    </label>
                                 </div>
                                  <input type="hidden" name="regions" class="form-control" id="other" placeholder="">
                              </div>
                              <div class="form-group">
                                  <label>Research Themes *</label>
                                  <div class="checkbox">
                                      <label>
                                        <input type="checkbox"  name="themes" value="Them 1:Motivations (Incentives and Ideologies) ">
                                        Theme 1: Motivations (Incentives and Ideologies)
                                      </label>
                                  </div>
                                 <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  name="themes" value="Theme 2: Infrastructures and Technologies">
                                         Theme 2: Infrastructures and Technologies
                                    </label>
                                 </div>
                                 <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  name="themes" value="">
                                        Theme 3: Communities of Practice in Open and Collaborative Science
                                    </label>
                                 </div>
                                 <div class="checkbox no-margin">
                                    <label>
                                        <input type="checkbox" name="themes" value="Theme 4: Potential Impacts (Positive and Negative) of Open and Collaborative Science">
                                         Theme 4: Potential Impacts (Positive and Negative) of Open and Collaborative Science
                                    </label>
                                 </div>
                                 <input type="hidden" name="themes" class="form-control" id="other" placeholder="">
                                 <div class="checkbox no-margin">
                                    <label>
                                        Other:&nbsp; <span>(Enter Each in a new line)</span>
                                    </label> 
                                     <textarea name="themes" class="form-control ckeditor" id="other" placeholder="" rows="3"></textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                <label for="projectTitle">Justification of Research Themes</label><br/>
                                <p class="lable-description">Justify how your project ties into the selected OCSDNet theme(s).</p>
                                <textarea class="form-control ckeditor" name="justifythemes" rows="3"><?php if ($present) {echo $justification_of_research_themes;}?></textarea>
                              </div>
                              <div class="form-group">
                                <label for="projectTitle">Total Budget Cost (CAD)</label>
                                <input type="text" name="budget" value="<?php if ($present) {echo $budget;}?>" class="form-control" id="project-title" placeholder="">
                              </div>
                              <button type="submit" class="btn btn-default">Save</button>
                            </form>
                                            </section>
                            </div>
                                <div id="step-2">
                                 <h2 class="StepTitle">Step 2 Content</h2>
                                  <div id="wizard"  class="wizard clearfix">
                                  <h3>Primary Researcher Info</h3>
                                  <section>
                                      <form class="researcher-info" action="<?php echo base_url();?>index.php/proposal/researchinfo" enctype="multipart/form-data">
                                        <fieldset>
                                          <h2 class="fs-title">Research Team and Institutional Information</h2>
                                          <h3  class="fs-subtitle">Primary Researcher Information</h3>
                                          <div class="col-md-6">
                                               <input type="hidden" id="researcher_id" name="researcher_id" value="<?php if ($present) {echo $researcher_id;}?>"/>
                                            <div class="form-group">
                                              <label for="pdName">Name</label><br/>
                                              <input type="text" name="researchername" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdEmail">Email</label><br/>
                                              <input type="email" name="researcheremail" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                             <div class="form-group">
                                              <label for="pdD">Designation</label><br/>
                                              <input type="text" name="researcherdesignation" placeholder="" class="form-control"/>
                                            </div>
                                              <label for="pdPhoneNumber">Telephone Number</label><br/>
                                              <input type="text" name="researcherphone" placeholder="" class="form-control"/>
                                            </div>                                           
                                            <div class="form-group">
                                              <label for="pdIoRn">Institution or organization name</label><br/>
                                              <input type="text" name="researcherorganization" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdOa">Office Address</label><br/>
                                              <textarea name="researcheraddress" class="form-control ckeditor" placeholder="" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdCoI">Country of incorporation</label><br/>
                                              <input type="text" name="researchercountryincorporation" placeholder="" class="form-control"/>
                                            </div>
                                             <div class="form-group">
                                              <label for="pd">IDRC Affiliation (if any)</label><br/>
                                              <input type="text" name="researcheraffliation" placeholder="" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                              <label for="pdCoR">Country of Residence</label><br/>
                                              <input type="text" name="researchercountryresidence" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdCoCi">Country of Citizenship</label><br/>
                                              <input type="text" name="researchercountrycitizenship" placeholder="" class="form-control"/>
                                            </div>
                                            
                                          </div>
                                          <div class="col-md-6">
                                         
                                            <div class="form-group">
                                              <label for="pdGender">Gender</label><br/>
                                              <label class="radio-inline">
                                                <input type="radio" name="researchergender" id="pdMale" value="male"> Male
                                              </label>
                                              <label class="radio-inline">
                                                <input type="radio" name="researchergender" id="pdFemale" value="female"> Female
                                              </label><br/>
                                            </div>

                                           <div class="form-group">
                                              <label for="pdAoEaI">Areas of Expertise and Interest</label><br/>
                                              <textarea type="text" name="researcherexpertise" placeholder="" class="form-control ckeditor" rows="3"></textarea>
                                            </div> 
                                            <div class="form-group">
                                            <label for="pdRPoRO">Relevant Publications or Research Outputs</label><br/>
                                             <textarea type="text" name="researcherpublications" placeholder="" class="form-control ckeditor" rows="3"></textarea>
                                          </div>
                                          <div class="form-group">
                                            <label for="pd">Website</label><br/>
                                            <input type="text" name="researcherwebsite" placeholder="" class="form-control"/>
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                        <p>Qualifications and Experience</p>
                                        <p>Please upload an up-to-date curriculum vitae (CV). Your CV should include a chronological list of your work experience, qualifications,
    credentials, funded research projects (including those supported by the IDRC), language skills (spoken and written) and relevant publications.</p>
                                        <a href="<?php echo base_url(); ?>public/templates/CVTemplate.docx" class="btn btn-default " download>Download CV Template</a><br/><br/>    
                                     <input type="file" name="researchercv"/><br/>
                                                                             
                                    <button type="submit" class="btn btn-default">Save</button>
                                    </div>
                                </fieldset>

                                      </form>
                                  </section>
                                  <h3>Research Team Info</h3>
                                  <section>
                                       <form  class="collaborator-info" action="<?php echo base_url();?>index.php/proposal/collaboratorinfo">
                                        <fieldset>
                                          <h2 class="fs-title">Research Team and Institutional Information</h2>
                                          <h3 class="fs-subtitle">Add Collaborators</h3>
                                          <div class="col-md-6">
                                            <input type="hidden" id="researcher_id" name="researcher_id" value="<?php if ($present) {echo $researcher_id;}?>"/>
                                            <div class="form-group">
                                              <label for="pdName">Name</label><br/>
                                              <input type="text" name="name" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdEmail">Email address</label><br/>
                                              <input type="email" name="email" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdD">Designation</label><br/>
                                              <input type="text" name="designation" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdPhoneNumber">Telephone Number</label><br/>
                                              <input type="text" name="phone" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdCoCi">Country of incorporation</label><br/>
                                              <input type="text" name="countryincorporation" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pd">IDRC Affiliation (if any)</label><br/>
                                              <input type="text" name="affliation" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdCoR">Country of Residence</label>
                                              <br/>
                                              <input type="text" name="residence" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdCoc">Country of Citizenship</label><br/>
                                              <input type="text" name="citizenship" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdGender">Gender</label>
                                              <br/>
                                              <label class="radio-inline">
                                                <input type="radio" name="gender" id="pdMale" value="male">
                                                Male </label>
                                              <label class="radio-inline">
                                                <input type="radio" name="gender" id="pdFemale" value="female">
                                                Female </label>
                                              <br/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdIoRn">Institution or organization name</label><br/>
                                              <input type="text" name="organization" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdOa">Office Address</label><br/>
                                              <textarea name="address" placeholder="" rows="3" class="form-control ckeditor"></textarea>
                                            </div>
                                          </div>
                                          <div class="col-md-6">                                     
                                            <div class="form-group">
                                              <label for="pdAoEaI">Areas of Expertise and Interest</label>
                                              <br/>
                                              <textarea type="text" name="expertise" placeholder="" class="form-control ckeditor" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdRPoRO">Relevant Publications or Research Outputs</label>
                                              <br/>
                                              <textarea type="text" name="publications" placeholder="" class="form-control ckeditor" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="pd">Website</label>
                                              <br/>
                                              <input type="text" name="website" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdCoI">Country of incorporation</label>
                                              <br/>
                                              <input type="text" name="countryincorporation" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdCoI">Role in Proposed Projec</label>
                                              <br/>
                                              <input type="text" name="role" placeholder="" class="form-control"/>
                                            </div>
                                          </div>
                                          <div class="col-md-12">
                                          <p>
                                            Qualifications and Experience
                                          </p>
                                          <p>
                                            Please upload an up-to-date curriculum vitae (CV). Your CV should include a chronological list of your work experience, qualifications,
                                            credentials, funded research projects (including those supported by the IDRC), language skills (spoken and written) and relevant publications.
                                          </p>
                                           <a href="<?php echo base_url(); ?>public/templates/CVTemplate.docx" class="btn btn-default " download>Download CV Template</a><br/><br/>
                                                                      <input type="file" name="qualification" /><br/>
                                          
                                           <button type="submit" class="btn btn-default">Save and Add New</button>                                           
                                          </div>
                                          
                                        </fieldset>
                                      </form>
                                    </section>
                      
                                  <h3>Proposing Institution</h3>
                                  <section>
                                       <form class="institution-info" action="<?php echo base_url();?>index.php/proposal/institutioninfo">
                                        <fieldset>
                                          <h2 class="fs-title">Research Team and Institutional Information</h2>
                                          <h3 class="fs-subtitle">Proposing Institution</h3>
                                          <p>The proposing institution receives and manages the project funds provided by the IDRC. Please indicate the contact information of
      the administration office to which funds may be dispensed should this application be accepted.</p>
                                          <div class="col-md-10 no-margin">
                                            <input type="hidden" id="institution_research_id" name="researcher_id" value="<?php if ($present) {echo $researcher_id;}?>"/>
                                            <div class="form-group">
                                              <label for="piION">Institution/ Organization name</label><br/>
                                              <input type="text" name="name" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="piMA">Mailing Address</label><br/>
                                              <p class="lable-description">Including office or departmental name</p><br/>
                                              <textarea name="mailaddress" class="form-control ckeditor" rows="3"> </textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="piTN">Telephone Number</label><br/>
                                              <input type="text" name="phone" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="piE">Email</label><br/>
                                              <input type="text" name="email" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="piOE">Office Address</label><br/>
                                              <textarea name="addresses" placeholder="" rows="3" class="form-control ckeditor"></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="piFoN">Finance Officer’s name</label><br/>
                                              <p class="lable-description" >Name for the main point of contact for financials</p><br/>
                                              <input type="text" name="financename" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="piFoPN">Finance Officer phone number</label><br/>
                                              <p class="lable-description" >Phone number for the main point of contact for financials</p><br/>
                                              <input type="text" name="financephone" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="piFoE">Finance Officer Email</label><br/>
                                              <p class="lable-description" >Email address for the main point of contact for financials</p><br/>
                                              <input type="text" name="financeemail" placeholder="" class="form-control"/>
                                            </div>
                                              <button type="submit" class="btn btn-default">Save</button>
                                          </div><br/>
                                      </fieldset>
                                      </form>
                                  </section>
                                  <h3>Participating Institutions</h3>
                                  <section>
                                       <form class="institution-supporting-info" action="<?php echo base_url();?>index.php/proposal/institutionparticipatinginfo">
                                        <fieldset>
                                          <h2 class="fs-title">Research Team and Institutional Information</h2>
                                          <h3>Participating Institutions</h3>
                                          <p>Participating institutions put forward the research proposal under the leadership of the proposing institution. Note that all funding will
      be disbursed directly to the proposing institution only.</p>
                                          <div class="col-md-10 no-margin">
                                             <input type="hidden" id="institution__supportresearch_id" name="researcher_id" value="<?php if ($present) {echo $researcher_id;}?>"/>
                                            <div class="form-group">
                                              <label for="pi3IN">Institution name</label><br/>
                                              <input type="text" name="name" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pi3TN">Telephone Number </label><br/>
                                              <input type="number" name="phone" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pi3E">Email</label><br/>
                                              <input type="email" name="email" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdOa">Office Address</label><br/>
                                              <textarea name="address" class="form-control ckeditor" placeholder="" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="pi3MA">Mailing Address</label><br/>
                                              <p class="lable-description">Including office or departmental name</p><br/>
                                                <textarea name="mailingaddress" class="form-control ckeditor" rows="3"> </textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="pi3MA">Role in the project</label><br/>
                                              <textarea name="role" placeholder="" rows="3" class="form-control ckeditor"></textarea><br/>
                                              <hr/>
                                            </div>
                                           

                                                        <button type="submit" class="btn btn-default">
                                                            Save and Add New
                                                        </button>
                                                    </fieldset>
                                                </form>
                                            </section>
                                            
                                        </div>
                                    </div>
                                    <div id="step-3">
                                        <h2 class="StepTitle">Step 3 Content</h2>
                                        <section>
                                            <form role="form" class="proposed-study-info" action="<?php echo base_url(); ?>index.php/proposal/stepthree">
                                                <input type="hidden" name="proposal_id" value="<?php if ($present) { echo $id;} ?>"/>
                                                 <div class="form-group">
                                                    <label for="researcherName">Research Project Abstract </label>
                                                    <br/>
                                                    <p>
                                                        Should not exceed 250 words
                                                    </p>
                                                    <textarea name="researchproject" class="form-control ckeditor" rows="3"><?php
                                                    if ($present) {
                                                        echo $research_project_abstract;
                                                    }
                                                ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="researcherName">Research Problem, Significance and Justification </label>
                                                    <br/>
                                                    <p>
                                                        WORD LIMIT: 1,000. Please provide a brief overview of relevant literature and highlight the knowledge gaps that this project will address. Indicate the size
                                                        and scope of the problem, as well as how the problem relates to the purpose and goals OCSDNet; broader national development priorities, and the research
                                                        and capacity needs of the countries involved.
                                                    </p>
                                                    <textarea name="researchproblem" class="form-control ckeditor" rows="3"><?php
                                                    if ($present) {
                                                        echo $research_problem_significance_and_justification;
                                                    }
                                                                                                                    ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="researcherName">Research Questions and Objectives</label>
                                                    <br/>
                                                    <p>
                                                        WORD LIMIT: 500. Outline your project’s central research question(s), subquestions, and objectives. There must be congruency between the questions,
                                                        objectives, research design and methods. You should highlight how the study’s questions and objectives will contribute to the research themes of the
                                                        OCSDNet.
                                                    </p>
                                                    <textarea name="researchquestions" class="form-control ckeditor" rows="3"><?php
                                                    if ($present) {
                                                        echo $research_questions_and_objectives;
                                                    }
                                                                                                                    ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                  <label for="researcherName">Stakeholders</label>
                                                  <p>WORD LIMIT: 250. Identify and briefly describe your project's stakeholders. How will your project respond to their needs and interests?</p>
                                                  <textarea name="stakeholders" class="form-control ckeditor" rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="researcheDandM">Research Design and Methods</label>
                                                    <br/>
                                                    <p>
                                                        WORD LIMIT: 1,000. In this section, applicants should clearly indicate and justify the proposed study design. You should discuss how you intend to collect
                                                        the data that you will need to achieve the study’s objectives and answer the project’s research questions.  You should clearly outline how each data collection
                                                        activity will contribute to the study objectives.
                                                    </p>
                                                    <textarea name="researchdesign" class="form-control ckeditor" rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="researcherName">Analysis and Synthesis</label>
                                                    <br/>
                                                    <p>
                                                        WORD LIMIT: 1,000. Describe how you intend to organize, examine and model data to arrive at conclusions and insights.
                                                    </p>
                                                    <textarea name="analysissynthesis" class="form-control ckeditor" rows="3"><?php
                                                    if ($present) {
                                                        echo $analysis_and_synthesis;
                                                    }
                                                                                                                    ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="researcherName">Outcomes and Outputs</label>
                                                    <br/>
                                                    <p>
                                                        WORD LIMIT: 700. Describe the major project outputs and intended outcomes. Your project outputs should creatively reflect the
                                                        principles of open and collaborative science.
                                                    </p>
                                                    <textarea name="outcomesoutputs" class="form-control ckeditor" rows="3"><?php
                                                    if ($present) {
                                                        echo $outcomes_and_outputs;
                                                    }
                                                                                                                    ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="researcherName">Knowledge Translation and Dissemination</label>
                                                    <br/>
                                                    <p>
                                                        WORD LIMIT: 700. Describe how you will disseminate your outputs. To ensure that the results of your study are applied to address
                                                        development challenges, explain how you intend to package, disseminate and promote the application of your findings amongst
                                                        relevant stakeholder groups
                                                    </p>
                                                    <textarea name="translationdissemination" class="form-control ckeditor" rows="3"><?php
                                                    if ($present) {
                                                        echo $knowledge_translation_and_dissemination;
                                                    }
                                                                                                                    ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="researcherName">Network Connections and Interactions</label>
                                                    <br/>
                                                    <p>
                                                        WORD LIMIT: 500. Illustrate how you will contribute to the overall OCSDNet framework and themes. Draw on other initiatives and
                                                        approaches discussed at the OCSDNet workshop, if applicable.
                                                    </p>
                                                    <textarea name="networkconnetions" class="form-control ckeditor" rows="3"><?php
                                                    if ($present) {
                                                        echo $network_connections_and_interactions;
                                                    }
                                                                                                                    ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="bibliography">Bibliography</label>
                                                    <br/>
                                                    <p>
                                                        APA style
                                                    </p>
                                                    <textarea type="text" name="bibliography" class="form-control ckeditor" id="bibliography" rows="3" value="<?php
                                                    if ($present) {
                                                        echo $bibliography;
                                                    }
                                                    ?>" ></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-default">
                                                    Save
                                                </button>
                                                 </form>
                                        </section>

                                    </div>
                                    <div id="step-4">
                                        <h3>Research Administration</h3>
                                        <section>
                                            <h2>Research Administration</h2>
                                            <form role="form" class="research-administration" action="<?php echo base_url(); ?>index.php/proposal/stepfour">
                                                <input type="hidden" name="proposal_id" value="<?php
                                                if ($present) {
                                                    echo $id;
                                                }
                        ?>" />
                        <div class="form-group">
                          <label for="projectTimeline">Project Timeline </label>
                          <br/>
                          <p>
                            Upload the completed template document and use it to outline the key milestones and deadlines of your project. Each activity included in the schedule should
                            relate to a project objective and should provide a financial estimate that is corresponds with the proposed budget in Section 5
                          </p>
                                                 <a href="<?php echo base_url(); ?>public/templates/ProjectTimelineTemplate.docx" class="btn btn-default " download>Download Timeline Template</a><br/><br/>
                          <input type="file" name="projecttimeline" id="projectTimeline"><br/>

                        </div>
                        <div class="form-group">
                          <label for="researchEthics">Research Ethics</label>
                          <br/>
                          <p>
                            WORD LIMIT: 500. Provide a plan for how you will obtain research ethics approval. All projects that include human subjects must ensure that their privacy,
                            dignity, and integrity are protected. An independent ethical review committee must approve the protocols. Funding will be contingent on the provision of a
                            formal written approval. Projects that will collect corporate or personal information must detail how informed consent will be obtained and confidentiality
                            maintained.
                          </p>
                          <textarea class="form-control ckeditor" name="researchethics" rows="3"><?php
                                                    if ($present) {
                                                        echo $research_ethics;
                                                    }
                                                                                                                    ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="internalPCM">Internal Project Communication and Management</label>
                                                    <br/>
                                                    <p>
                                                        WORD LIMIT: 500. Describe how the principal investigator and project collaborators will interact with one another on a regular basis. Explain how funds
                                                        will be managed and how administrative matters will be addressed.
                                                    </p>
                                                    <textarea class="form-control ckeditor" name="internalproject" rows="3"><?php
                                                    if ($present) {
                                                        echo $internal_project_communication_and_management;
                                                    }
                                                                                                                    ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ChallengesAndRisks">Challenges and Risks</label>
                                                    <br/>
                                                    <p>
                                                        WORD LIMIT: 500. Describe any challenges or foreseeable risks that may arise and affect your project's progress. Explain how your project team will
                                                        manage these concerns should they arise. Outline the mechanisms that are in place to cope with any unforeseeable complications.
                                                    </p>
                                                    <textarea class="form-control ckeditor" name="challengesandrisks" rows="3"><?php
                                                    if ($present) {
                                                        echo $challenges_and_risks;
                                                    }
                                                                                                                    ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="MandEplan">Monitoring and Evaluation Plan</label>
                                                    <br/>
                                                    <p>
                                                        WORD LIMIT: 500. Outline how you will consistently examine and assess your project throughout its life course. Your outline should
                                                        include your monitoring and evaluation questions and objectives, as well as a description of your data collection methods and the
                                                        data sources that you will use. Your outline should correspond with your project timeline
                                                    </p>
                                                    <textarea class="form-control ckeditor"name="monitoringevaluation" rows="3"><?php
                                                    if ($present) {
                                                        echo $monitoring_and_evaluation;
                                                    }
                                                                                                                    ?></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-default">
                                                    Save
                                                </button>
                                            </form>
                                        </section>

                  </div>
                  <div id="step-5">
                    <h2 class="StepTitle">Step 5 Content</h2>
                    <h3>Budget</h3>
                    <div id="wizardsub"  class="wizardsub clearfix">
                      <h3>Budget</h3>
                      <section>
                        <form role="form" action="<?php echo base_url(); ?>index.php/proposal/budget" class="budget-info" enctype="multipart/form-data">
                          <h2>Budget</h2>
                          <div class="form-group">
                            <input type="hidden" value="<?php
                                                        if ($present) {
                                                            echo $id;
                                                        }
                            ?>" id="budget_proposal" name="proposal_id"/>
                            <label for="parallelFunds">Parallel Funds</label>
                            <br/>   
                            <a href="<?php echo base_url(); ?>public/templates/OCSDNetBudgetTemplate.xlsx" download="OCSDNetBudgetTemplate.xlsx" class="btn btn-default">Download Budget Template</a><br/>
                          </div>
                          <input type="file" id="budget" name="budget" value=""/><br/>
                          <button type="submit" class="btn btn-default">
                            Upload
                          </button>
                        </form>
                      </section>
                      <h3>Parallel Funds</h3>
                      <section>
                        <form role="form" action="<?php echo base_url(); ?>index.php/proposal/funding" class="funding-info">
                          <h2>Parallel Funding Source</h2>
                          <p>
                              Parallel funds are funds for your project that are donated from other international donors or funding agencies.
                            </p>
                          <input type="hidden" value="<?php if ($present) { echo $id;}?>" id="budget_proposal" name="proposal_id"/>
                                                    
                                                    <div class="form-group">
                                                        <label for="donor">Donor</label>
                                                        <input type="text" name="donor" class="form-control" id="donor" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="amount">Amount</label>
                                                        <input type="text" name="amount" class="form-control" id="amount" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="currency">Currency</label>
                                                        <input type="text"  name="currency"class="form-control" id="currency" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="timeFrame">Timeframe</label>
                                                        <input type="text"  name="timeframe" class="form-control" id="timeFrame" placeholder="">
                                                    </div>
                                                         <button type="submit" class="btn btn-default">
                                                                Save and Add New
                                                            </button>
                                                </form>
                                                 <!-- <button type="submit" id="add-funding" class="btn btn-default">
                                                                Add new Funding Source
                                                            </button> -->
                                            </section>
                                           
                                                   
                                                <form role="form" action="<?php echo base_url(); ?>index.php/proposal/funding"  id="optionTemplate" class="funding-info form-group hide" >
                                                    <h2>Parallel Funding Source</h2>
                                                    <input type="hidden" value="<?php if ($present) { echo $id;}?>" id="budget_proposal" name="proposal_id"/>
                                                    
                                                    <div class="form-group">
                                                        <label for="donor">Donor</label>
                                                        <input type="text" name="donor" class="form-control" id="donor" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="amount">Amount</label>
                                                        <input type="text" name="amount" class="form-control" id="amount" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="currency">Currency</label>
                                                        <input type="text"  name="currency"class="form-control" id="currency" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="timeFrame">Timeframe</label>
                                                        <input type="text"  name="timeframe" class="form-control" id="timeFrame" placeholder="">
                                                    </div>
                                                         <button type="submit" class="btn btn-default">
                                                                Save
                                                            </button>
                                                </form>
                                                
                                            
                                          
                                    </div>
                                </div><!-- End SmartWizard Content --></td>
                            </tr>
                        </table>
<script type="text/javascript" src="<?php echo base_url(); ?>public/new/js/jquery-2.0.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/new/js/jquery.smartWizard.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/new/js/jquery.steps.min.js"></script>


<script>
            $("#wizard").steps({
                          headerTag: "h3",
                          bodyTag: "section",
                          transitionEffect: "slideLeft",
                titleTemplate: '<span class="numbers">Step 2.#index#</span><br/><p class="titlle">#title#</p>',
                          autoFocus: false,
                            labels: {
                            cancel: "Cancel",
                            current: "",
                            pagination: "Pagination",
                            finish: "Finish",
                            next: "Next",
                            previous: "Prev",
                            loading: "Loading ..."
                          }
                          });
    </script>
    <script>
            $("#wizardsub").steps({
                          headerTag: "h3",
                          bodyTag: "section",
                          transitionEffect: "slideLeft",
                titleTemplate: '<span class="numbers">Step 5.#index#</span><br/><p class="titlle">#title#</p>',
                          autoFocus: false,
                            labels: {
                            cancel: "Cancel",
                            current: "",
                            pagination: "Pagination",
                            finish: "Finish",
                            next: "Next",
                            previous: "Prev",
                            loading: "Loading ..."
                          }
                          });
    </script>



        <script type="text/javascript">
            $(document).ready(function() {
                // Smart Wizard
                $('#wizardmain').smartWizard();
                CKEDITOR.replaceClass = 'ckeditor';
                //  var editor = $('.ckeditor').ckeditor().editor;
                // //
                // //  var editor = CKEDITOR.instances['ckeditor'];

                //  editor.on( 'keyup', function( event ) {
                //      alert( e.getData() );
                //  });
                $('.buttonFinish').on('click',function(){
                    alert('Your proposal has been saved. We will provided you with a preview page that will allow you to make edits in the next 24 hrs');
                });
                
                
            });

        </script>
        <script src="<?php echo base_url(); ?>public/new/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>public/new/bootstrapvalidator/dist/js/bootstrapValidator.min.js"></script>
        <script src="<?php echo base_url(); ?>public/new/js/custom/osdnet_validator.js"></script>
        <script src="<?php echo base_url(); ?>public/new/js/custom/autosave.js"></script>
        <script src="<?php echo base_url(); ?>public/js/ckeditor/ckeditor.js"></script>
        <script src="<?php echo base_url(); ?>public/new/js/jquery.prettyPhoto.js"></script>
        <!-- jQuery easing plugin -->
        <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/new/js/main.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="<?php echo base_url(); ?>public/new/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>


<br /><br /><br /><br />   
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="PIheading<?php echo $i ?>">
              <h4 class="panel-title">
                <?php if($i==1){ ?>
                <a data-toggle="collapse" data-parent="#PIaccordion" href="#PIcollapse<?php echo $i ?>" aria-expanded="true" aria-controls="PIcollapse<?php echo $i ?>">
                  Institution <?php echo $i ?>
                </a> 
                <?php }else{ ?>
                    <a class="collapsed" data-toggle="collapse" data-parent="#PIaccordion" href="#PIcollapse<?php echo $i ?>" aria-expanded="true" aria-controls="PIcollapse<?php echo $i ?>"></a>
                 <?php }?>
                <a class="pull-right" href="<?php echo base_url(); ?>index.php/user/edit/<?php echo $user['id']; ?>">Edit</a>
              </h4>
            </div>
            <div id="PIcollapse<?php echo $i ?>" class="<?php if($i==1){ ?>panel-collapse collapse in<?php }else{ ?>panel-collapse collapse<?php } ?>" role="tabpanel" aria-labelledby="heading<?php echo $i ?>">
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
                        <th colspan="2" >Mailing Address</th> <td><p><?php echo $user['mailing_address'] ?></p></td>
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
          <?php

class Proposal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$user_data = $this -> session -> userdata("user_data");

        $this->load->model("proposal/proposal_model");
        $this->load->model("users/user_model");
        $this->load->model("proposal/budget_model");
    }

    public function index() {

        $user_data = $this->session->userdata("user_data");

        $id = $user_data['id'];
        $this->data['active_menu'] = 1;
        $this->data['form'] = $this->proposal_model->get_researchers($id);
        $proposal = $this->proposal_model->get_proposals($id);

        $data = array();
        if ($proposal) {
            $data = $proposal[0];
            $data['present'] = 1;
        } else {
            $data['present'] = 0;
        }

        $data['researcher_id'] = $id;
        

        $this->load->view("new-proposal/proposal_form", $data);
    }

    public function projectinfo() {
        $user_data = $this->session->userdata("user_data");
        $id = $user_data['id'];
        $data['id'] = $_POST['proposal_id'];
        $data['researcher_id'] = $id;
        $data['title'] = $_POST['title'];
        $data['duration'] = $_POST['duration'];
        $data['countries_covered'] = $_POST['countries'];
        $data['regions'] = json_encode($_POST['regions']);
        $data['research_themes'] = json_encode($_POST['themes']);
        $data['justification_of_research_themes'] = $_POST['justifythemes'];
         $data['other_themes'] = $_POST['otherthemes'];
        $data['budget'] = $_POST['budget'];
        $proposal_id = $this->proposal_model->save_study_info($data);
        echo json_encode($proposal_id);
    }

    public function stepthree() {
        $data['id'] = $_POST['proposal_id'];
        $data['research_project_abstract'] = $_POST['researchproject'];
        $data['research_problem_significance_and_justification'] = $_POST['researchproblem'];
        $data['research_questions_and_objectives'] = $_POST['researchquestions'];
        $data['research_design_and_methods'] = $_POST['researchdesign'];
        $data['analysis_and_synthesis'] = $_POST['analysissynthesis'];
        $data['stakeholders'] = $_POST['stakeholders'];
        $data['outcomes_and_outputs'] = $_POST['outcomesoutputs'];
        $data['knowledge_translation_and_dissemination'] = $_POST['translationdissemination'];
        $data['network_connections_and_interactions'] = $_POST['networkconnetions'];
        $data['bibliography'] = $_POST['bibliography'];
        
        $proposal_id = $this->proposal_model->save_study_info($data);
        echo json_encode($proposal_id);
    }

    public function stepfour() {

        $data['id'] = $_POST['proposal_id'];
        $uploaddir = realpath(dirname(__DIR__));
        $upload_array=explode("/application", $uploaddir);
        $uploaddir = $upload_array[0]."/uploads";
        $upload_path=base_url()."uploads";
        $tmp_name = $_FILES["projecttimeline"]["tmp_name"];
        
        $name = $_FILES["projecttimeline"]["name"];
        $name_array=explode('.',$name);
        
        $name_path=$name_array[0].time();
        $file_name=$name_path.".".$name_array[1];
        
        $path = $upload_path.'/'.$file_name;
        $data["project_timelines"] = "";
        
        if (move_uploaded_file($tmp_name, "$uploaddir/$file_name")) {
            $data["project_timelines"] = $path;
        }
        $data['research_ethics'] = $_POST['researchethics'];
        $data['internal_project_communication_and_management'] = $_POST['internalproject'];
        $data['challenges_and_risks'] = $_POST['challengesandrisks'];
        $data['monitoring_and_evaluation'] = $_POST['monitoringevaluation'];
        $proposal_id = $this->proposal_model->save_study_info($data);
        echo json_encode($proposal_id);
    }

    public function researchinfo() {
        $data['first_name'] = $_POST['researchername'];
        $data['gender'] = $_POST['researchergender'];
        $data['email'] = $_POST['researcheremail'];
        $data['telephone'] = $_POST['researcherphone'];
        $data['designation'] = $_POST['researcherdesignation'];
        $data['organization'] = $_POST['researcherorganization'];
        $data['country_of_incorporation'] = $_POST['researchercountryincorporation'];
        $data['office_address'] = $_POST['researcheraddress'];
        $data['idrc_affiliation'] = $_POST['researcheraffliation'];
        $data['country_of_citizenship'] = $_POST['researchercountrycitizenship'];
        $data['website'] = $_POST['researcherwebsite'];
        $data['idrc_affiliation'] = $_POST['researcheraffliation'];
        $data['country_of_residence'] = $_POST['researchercountryresidence'];
        $data['expertise'] = $_POST['researcherexpertise'];
        $data['relevant_publications'] = $_POST['researcherpublications'];
        $data['user_role_id']=1;
        $uploaddir = realpath(dirname(__DIR__));
        $upload_array=explode("/application", $uploaddir);
        $uploaddir = $upload_array[0]."/uploads";
        $upload_path=base_url()."uploads";
        $tmp_name = $_FILES["researchercv"]["tmp_name"];
        
        $name = $_FILES["researchercv"]["name"];
        $name_array=explode('.',$name);
        
        $name_path=$name_array[0].time();
        $file_name=$name_path.".".$name_array[1];
        
        $path = $upload_path.'/'.$file_name;
        $data["qualifications_and_experience"] = "";
        
        if (move_uploaded_file($tmp_name, "$uploaddir/$file_name")) {
            $data["qualifications_and_experience"] = $path;
        }

        $user_data = $this->session->userdata("user_data");
        $id = $user_data['id'];

        $researcher_id = $this->user_model->save($data, $id);
        echo json_encode($researcher_id);
    }

    public function collaboratorinfo() {
        $data['first_name'] = $_POST['name'];
        $data['gender'] = $_POST['gender'];
        $data['email'] = $_POST['email'];
        $data['telephone'] = $_POST['phone'];
        $data['designation'] = $_POST['designation'];
        $data['organization'] = $_POST['organization'];
        $data['country_of_incorporation'] = $_POST['countryincorporation'];
        $data['office_address'] = $_POST['address'];
        $data['country_of_citizenship'] = $_POST['citizenship'];
        $data['website'] = $_POST['website'];
        $data['idrc_affiliation'] = $_POST['affliation'];
        $data['country_of_residence'] = $_POST['residence'];
        $data['expertise'] = $_POST['expertise'];
        $data['relevant_publications'] = $_POST['publications'];
        $data['researcher_id'] = $_POST['researcher_id'];
        $data['role_in_project'] = $_POST['role'];
        $data['user_role_id']=5;
        $uploaddir = realpath(dirname(__DIR__));
        $upload_array=explode("/application", $uploaddir);
        $uploaddir = $upload_array[0]."/uploads";
        $upload_path=base_url()."uploads";
        $tmp_name = $_FILES["qualification"]["tmp_name"];
        
        $name = $_FILES["qualification"]["name"];
        $name_array=explode('.',$name);
        
        $name_path=$name_array[0].time();
        $file_name=$name_path.".".$name_array[1];
        
        
        $path = $upload_path.'/'.$file_name;
        $data["qualifications_and_experience"] = "";      
        if (move_uploaded_file($tmp_name, "$uploaddir/$file_name")) {
            $data["qualifications_and_experience"] = $path;
        }
        $collaborator_id = $this->user_model->save($data);
        echo json_encode($collaborator_id);
    }

    public function institutioninfo() {
        $data['first_name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['telephone'] = $_POST['phone'];
        $data['mailing_address'] = $_POST['mailaddress'];
        $data['finance_name'] = $_POST['financename'];
        $data['office_address'] = $_POST['addresses'];
        $data['finance_email'] = $_POST['financeemail'];
        $data['finance_phone'] = $_POST['financephone'];
        $data['researcher_id'] = $_POST['researcher_id'];
        $data['user_role_id']=6;
        $institution_id = $this->user_model->save($data);
        echo json_encode($institution_id);
    }

    public function institutionparticipatinginfo() {
        $data['first_name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['telephone'] = $_POST['phone'];
        $data['mailing_address'] = $_POST['mailingaddress'];
        $data['office_address'] = $_POST['address'];
        $data['role_in_project'] = $_POST['role'];
        $data['researcher_id'] = $_POST['researcher_id'];
        $data['user_role_id']=7;
        $institution_id = $this->user_model->save($data);
        
        echo json_encode($institution_id);
    }

    public function budget() {
        
        $uploaddir = realpath(dirname(__DIR__));
        $upload_array=explode("/application", $uploaddir);
        $uploaddir = $upload_array[0]."/uploads";
        $upload_path=base_url()."uploads";
        $tmp_name = $_FILES["budget"]["tmp_name"];
        $name = $_FILES["budget"]["name"];
        $name_array=explode('.',$name);
        $name_path=$name_array[0].time();
        $file_name=$name_path.".".$name_array[1];
        $path = $upload_path.'/'.$file_name;
        $data["budget_url"] = "";
        $data['id']= $_POST['proposal_id'];
        
        if (move_uploaded_file($tmp_name, "$uploaddir/$file_name")) {
            $data["budget_url"] = $path;
            
        }
       $proposal_id=$this->proposal_model->save_study_info($data);
       echo json_encode($proposal_id);
       
        

    }
    public function funding() {
        $data['donor'] = $_POST['donor'];
        $data['amount'] = $_POST['amount'];
        $data['currency'] = $_POST['currency'];
        $data['timeframe'] = $_POST['timeframe'];
        $data['proposal_id'] = $_POST['proposal_id'];
        $id = $this->budget_model->save($data);
        echo json_encode($id);
    }
     public function submit(){
        $proposal_id=$this->uri->segment(3);
        
        if($proposal_id){
            $data['status']=1;
            $proposal=$this->proposal_model->updateStatus($proposal_id,$data);
        }
        $user_data = $this->session->userdata("user_data");
        $id = $user_data['id'];
        
         $user=$this->user_model->getUser($id);
         
         $data['present'] = 0;
         if($user){
            $data['present'] = 1;
         }
         
        $data['user']=$user;
       
        
        $this->load->view("new-proposal/thank_you",$data);
       
        
    }

}

