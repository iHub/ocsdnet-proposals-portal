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
		$data['id'] = $_POST['proposal_id'];
		$data['study_title'] = $_POST['title'];
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
        
        // $uploaddir = realpath(dirname(__DIR__));
        // $upload_array=explode("/application", $uploaddir);
        // $uploaddir = $upload_array[0]."/uploads";
        // $upload_path=base_url()."uploads";
        // $tmp_name = $_FILES["researchercv"]["tmp_name"];
//         
        // $name = $_FILES["researchercv"]["name"];
        // $name_array=explode('.',$name);
//         
        // $name_path=$name_array[0].time();
        // $file_name=$name_path.".".$name_array[1];
        // echo $file_name;
        // exit;
//         
        // $path = $upload_path.'/'.$file_name;
        // $data["project_timelines"] = "";
//         
        // if (move_uploaded_file($tmp_name, "$uploaddir/$file_name")) {
            // $data["project_timelines"] = $path;
        // }

		$user_data = $this->session->userdata("user_data");
		$id = $user_data['id'];

		$researcher_id = $this->user_model->save($data, $id);
		echo json_encode($id);
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
		$data['country_of_residence'] = $_POST['countryresidence'];
		$data['expertise'] = $_POST['expertiseandinterests'];
		$data['relevant_publications'] = $_POST['revelantpublications'];
		$data['researcher_id'] = $_POST['researcher_id'];
		$data['role_in_project'] = $_POST['role'];
        
        $uploaddir = realpath(dirname(__DIR__));
        $upload_array=explode("/application", $uploaddir);
        $uploaddir = $upload_array[0]."/uploads";
        $upload_path=base_url()."uploads";
        $tmp_name = $_FILES["projecttimeline"]["tmp_name"];
        
        $name = $_FILES["projecttimeline"]["name"];
        $name_array=explode('.',$name);
        
        $name_path=$name_array[0].time();
        $file_name=$name_path.".".$name_array[1];
        echo $file_name;
        exit;
        
        $path = $upload_path.'/'.$file_name;
        $data["project_timelines"] = "";
        
        if (move_uploaded_file($tmp_name, "$uploaddir/$file_name")) {
            $data["project_timelines"] = $path;
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
		$data['office_address'] = $_POST['address'];
		$data['finance_email'] = $_POST['financeemail'];
		$data['finance_phone'] = $_POST['financephone'];
		$data['researcher_id'] = $_POST['researcher_id'];
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

	}

}
