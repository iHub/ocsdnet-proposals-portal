<?php
class Submit_proposal extends CI_Controller {

	protected $data = array("title" => "Submit proposal");

	protected $form = array();

	function __construct() {
		parent::__construct();
		//Check if session has been set
		$user_data = $this -> session -> userdata("user_data");
		
		$this -> load -> model("proposal/proposal_model");
		
		if ($user_data) {
			
			//If not registerd
			if (empty($user_data['user_role_id'])) {
				$this -> session -> set_flashdata('message', 'Please login.');
				redirect("auth");
			}
				
			$this -> data['countries'] = $this -> proposal_model -> get_countries();
			
			$this -> data['gender_array'] = $this -> proposal_model -> get_gender();
			
			$user_id = $user_data['id'];


			//IF submited
			if ($this -> proposal_model -> has_submitted($user_data['id'])) {
				redirect("completed");
			} 

			

			$this -> data['has_proposal'] = $this -> proposal_model -> has_proposal($user_data['id']);

		} else {
			//If no session
			$this -> session -> set_flashdata('auth_message', 'Please login.');
			redirect("auth");
		}

	}



function index() {
	$user_data = $this -> session -> userdata("user_data");
	$id = $user_data['id'];
	$this -> data['active_menu'] = 1;
	$this -> data['form'] = $this -> proposal_model -> get_researchers($id);
	$this -> template -> load('default', "proposal/researcher_form", $this -> data);
}

function view_collaborators() {
	//$this->output->enable_profiler(TRUE);
	$user_data = $this -> session -> userdata("user_data");
	$researcher_id = $user_data['id'];
	$this -> data['collaborators'] = $this -> proposal_model -> get_collaborators(null, $researcher_id);
	$this -> data['active_menu'] = 2;
	$this -> template -> load('default', "proposal/collaborators", $this -> data);
}

//Add research collaborator section
function add_collaborator() {
	$this -> session -> unset_userdata("collaborator_id");
	$this -> data['active_menu'] = 2;
	$this -> template -> load('default', "proposal/collaborators_form", $this -> data);
}

//Edit collaborator
function edit_collaborator() {
	$this -> session -> unset_userdata("collaborator_id");
	$id = $this -> uri -> segment(3);
	$this -> session -> set_userdata("collaborator_id", $id);
	$this -> data['form'] = $this -> proposal_model -> get_collaborators($id, null);
	$this -> data['active_menu'] = 2;
	$this -> template -> load('default', "proposal/collaborators_form", $this -> data);
}

//Delete collaborator
function delete_collaborator() {
	$id = $this -> uri -> segment(3);
	if (isset($id)) {
		$this -> proposal_model -> delete_table("collaborators", $id);
	}
	redirect("submit_proposal/view_collaborators");
}

//View user proposals
function view_study_info() {
	//$this->output->enable_profiler(TRUE);
	$user_data = $this -> session -> userdata("user_data");
	$researcher_id = $user_data['id'];
	$this -> data['study_data'] = $this -> proposal_model -> get_study_data(null, $researcher_id);
	$this -> data['active_menu'] = 3;
	$this -> template -> load('default', "proposal/view_study_info", $this -> data);

}

//Edit study info
function edit_study_info() {
	$this -> data['active_menu'] = 3;
	$id = $this -> uri -> segment(3);
	$exist = $this -> proposal_model -> proposal_exists($id);
	$completed = $this -> proposal_model -> check_complete($id);
	if ($completed || !$exist) {
		redirect("submit_proposal/view_study_info");
	} else {
		$user_data = $this -> session -> userdata("user_data");
		$researcher_id = $user_data['id'];
		$this -> data['form'] = $this -> proposal_model -> get_study_data($id, $researcher_id);
		$this -> template -> load('default', "proposal/study_info", $this -> data);
	}

}

//Function load study Information section
function load_study_info() {
	if ($this -> data["has_proposal"]) {
		redirect("submit_proposal/view_study_info");
	} else {
		$this -> data['active_menu'] = 3;
		$this -> template -> load('default', "proposal/study_info", $this -> data);
	}

}

function delete_study() {
	$id = $this -> uri -> segment(3);
	if (isset($id)) {
		$this -> proposal_model -> delete_table("proposals", $id);
	}
	redirect("submit_proposal/view_study_info");

}

//Attach documents
function get_proposals() {
	$user_data = $this -> session -> userdata("user_data");
	$researcher_id = $user_data['id'];
	$this -> data['active_menu'] = 4;
	$this -> data['proposals'] = $this -> proposal_model -> get_proposals($researcher_id);
	$this -> template -> load('default', "proposal/proposals", $this -> data);
}

//Preview proposal
function preview() {

	$this -> data['active_menu'] = 4;
	$user_data = $this -> session -> userdata("user_data");
	$researcher_id = $user_data['id'];
	$proposal_id = $this -> uri -> segment(3);
	//Check status
	$this -> proposal_model -> status($researcher_id, $proposal_id);
	$this -> data["preview_data"] = $this -> proposal_model -> get_all($proposal_id);
	$this -> template -> load('default', "proposal/preview", $this -> data);

}

//Save researcher details
function save_researchers() {
	$valid = $this -> validate_researchers();
	$this -> data['active_menu'] = 1;
	if ($valid) {
		$user_data = $this -> session -> userdata("user_data");
		$id = $user_data['id'];
		$this -> proposal_model -> save_researcher("users", $id);
		redirect('submit_proposal/view_collaborators');
	} else {
		$countries = $this -> data["countries"];
		(isset($_POST['gender']) ? $this -> form['gender'] = $_POST['gender'] : "");
		(isset($_POST['country_of_incorporation']) ? $this -> form['country_of_incorporation'] = $countries[$_POST['country_of_incorporation']] : "");
		(isset($_POST['country_of_residence']) ? $this -> form['country_of_residence'] = $countries[$_POST['country_of_residence']] : "");
		(isset($_POST['country_of_citizenship']) ? $this -> form['country_of_citizenship'] = $countries[$_POST['country_of_citizenship']] : "");
		$this -> data["form"] = $this -> form;
		$this -> template -> load('default', "proposal/researcher_form", $this -> data);
	}

}

//Save research collaborator details
function save_collaborators() {
	$valid = $this -> validate_researchers();
	$this -> data['active_menu'] = 2;
	if ($valid) {

		$user_data = $this -> session -> userdata("user_data");
		$fk = $user_data['id'];
		$id = null;

		if (isset($_POST['collaborator_id'])) {
			$id = $_POST['collaborator_id'];
		}

		$this -> proposal_model -> save_researcher("collaborators", $id, $fk);
		redirect('submit_proposal/view_collaborators');
	} else {
		$countries = $this -> data["countries"];
		(isset($_POST['collaborator_id']) ? $this -> form['id'] = $_POST['collaborator_id'] : "");
		(isset($_POST['gender']) ? $this -> form['gender'] = $_POST['gender'] : "");
		(isset($_POST['country_of_incorporation']) ? $this -> form['country_of_incorporation'] = $countries[$_POST['country_of_incorporation']] : "");
		(isset($_POST['country_of_residence']) ? $this -> form['country_of_residence'] = $countries[$_POST['country_of_residence']] : "");
		(isset($_POST['country_of_citizenship']) ? $this -> form['country_of_citizenship'] = $countries[$_POST['country_of_citizenship']] : "");
		$this -> data["form"] = $this -> form;
		$this -> template -> load('default', "proposal/collaborators_form", $this -> data);
	}

}

//Save study info
function save_study_info() {
	$this -> data['active_menu'] = 3;

	$valid = $this -> validate_study_info();

	if ($valid) {
		//Save
		$id = null;
		$upload_response = array();
		(isset($_POST['proposal_id']) ? $id = $_POST['proposal_id'] : "");
		$user_data = $this -> session -> userdata("user_data");

		$data = array();
		$data['skills_summary'] = $_POST['skills_summary'];
		$data['study_title'] = $_POST['study_title'];
		$data['countries_covered'] = $_POST['countries_covered'];
		$data['abstract'] = $_POST['abstract'];
		$data['design_and_methodologies'] = $_POST['design_and_methodologies'];
		$data['outcomes_and_relevance'] = $_POST['outcomes_and_relevance'];
		$data['monitoring_and_evaluation'] = $_POST['monitoring_and_evaluation'];
		$data['total_budget_cost'] = $_POST['total_budget_cost'];
		$data['researcher_id'] = $user_data['id'];

		if (isset($_POST['endorsment_letter'])) {
			$file = $_POST['endorsment_letter'];
			$data['endorsment_letter'] = base_url() . "uploads/endorsments/$file";
		}

		if (isset($_POST['budget'])) {
			$file = $_POST['budget'];
			$data['budget'] = base_url() . "uploads/budgets/$file";
		}

		$this -> proposal_model -> save_study_info($data, $id);

		redirect("submit_proposal/view_study_info");

	} else {
		$this -> study_info_error_redirect();
	}

}

function study_info_error_redirect() {
	/*
	 * Preserve hidden id, budget and endorsment fieds
	 * in case of validation errors.
	 */

	if (isset($_POST['proposal_id'])) {
		$this -> form['id'] = $_POST['proposal_id'];
		$this -> data['form'] = $this -> form;
	}

	if (isset($_POST['old_budget'])) {
		$this -> form['budget'] = $_POST['old_budget'];
		$this -> data['form'] = $this -> form;
	}

	if (isset($_POST['old_endorsment'])) {
		$this -> form['endorsment_letter'] = $_POST['old_endorsment'];
		$this -> data['form'] = $this -> form;
	}

	$this -> template -> load('default', "proposal/study_info", $this -> data);
}

//Submit the application
function complete() {
	$valid = $this -> validate_preview();

	if ($valid) {
		$this -> data['active_menu'] = NULL;
		$this -> proposal_model -> complete();
		$this -> template -> load('default', "proposal/success", $this -> data);
	} else {
		$this -> data['active_menu'] = 4;
		$user_data = $this -> session -> userdata("user_data");
		$researcher_id = $user_data['id'];
		$proposal_id = $_POST['proposal_id'];
		//Check status

		$this -> proposal_model -> status($researcher_id, $proposal_id);
		$this -> data["preview_data"] = $this -> proposal_model -> get_all($proposal_id);

		$this -> template -> load('default', "proposal/preview", $this -> data);

	}

}

//Function validate researchers/Collaborators
function validate_researchers() {
	$this -> form_validation -> set_rules('first_name', 'First name', 'trim|required|xss_clean');
	$this -> form_validation -> set_rules('designation', 'Designation', 'trim|xss_clean');
	$this -> form_validation -> set_rules('gender', 'Gender', 'trim|required|xss_clean|callback_check_gender');
	$this -> form_validation -> set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
	$this -> form_validation -> set_rules('last_name', 'Last name', 'trim|required|xss_clean');
	$this -> form_validation -> set_rules('telephone', 'Telephone', 'trim|required|xss_clean');
	$this -> form_validation -> set_rules('website', 'Website', 'trim|xss_clean');
	$this -> form_validation -> set_rules('country_of_incorporation', 'Country of incorporation', 'trim|required|xss_clean|callback_check_country');
	$this -> form_validation -> set_rules('country_of_residence', 'Country of residence', 'trim|required|xss_clean|callback_check_country');
	$this -> form_validation -> set_rules('country_of_citizenship', 'Country of citizenship', 'trim|required|xss_clean|callback_check_country');
	$this -> form_validation -> set_rules('organization', 'Organization', 'trim|required|xss_clean');
	$this -> form_validation -> set_rules('expertise', 'Expertise', 'trim|required|xss_clean');
	$this -> form_validation -> set_rules('publications', 'Publications', 'trim|required|xss_clean');
	$this -> form_validation -> set_rules('office_address', 'Office address', 'trim|required|xss_clean');
	$this -> form_validation -> set_rules('role_in_project', 'Role in project', 'trim|xss_clean');
	$this -> form_validation -> set_rules('idrc_affiliation', 'IDRC affiliation', 'trim|xss_clean');
	return $this -> form_validation -> run();

}

function validate_study_info() {
	$this -> form_validation -> set_rules('skills_summary', 'Skills summary', 'trim|required|xss_clean|callback_summary_check');
	$this -> form_validation -> set_rules('study_title', 'Study title', 'trim|required|xss_clean');
	$this -> form_validation -> set_rules('countries_covered', 'Countries covered', 'trim|required|xss_clean');
	$this -> form_validation -> set_rules('abstract', 'Abstract', 'trim|required|xss_clean|callback_abstract_check');
	$this -> form_validation -> set_rules('design_and_methodologies', 'Design and methodologies', 'trim|required|xss_clean|callback_check_methodologies');
	$this -> form_validation -> set_rules('outcomes_and_relevance', 'Outcomes and relevance', 'trim|required|xss_clean|callback_check_relevance');
	$this -> form_validation -> set_rules('monitoring_and_evaluation', 'Monitoring and evaluation', 'trim|required|xss_clean|callback_check_monitoring');
	$this -> form_validation -> set_rules('total_budget_cost', 'Total budget cost', 'trim|required|xss_clean|callback_check_budget');
	$this -> form_validation -> set_rules('endorsment_letter', 'Letter of endorsment', 'xss_clean|callback_upload_endorsment');
	$this -> form_validation -> set_rules('budget', 'Budget', 'xss_clean|callback_upload_budget');
	//$this->form_validation->set_rules('image', 'Image', 'callback_handle_upload');
	return $this -> form_validation -> run();
}

//Count Summary and skills
function summary_check($text) {
	$words = preg_match_all('/[ ]/', $text, $matches);
	$limit = 500;
	if ($words > $limit) {
		$this -> form_validation -> set_message('summary_check', "The field %s has a limit of $limit words");
		return false;
	} else {
		return true;
	}
}

//Count abstract
function abstract_check($text) {
	$words = preg_match_all('/[ ]/', $text, $matches);

	$limit = 750;

	if ($words > $limit) {
		$this -> form_validation -> set_message('abstract_check', "The field %s has a limit of $limit words");
		return false;
	} else {
		return true;
	}
}

//Count design and methodologies
function check_methodologies($text) {
	$words = preg_match_all('/[ ]/', $text, $matches);

	$words = $words + 1;

	$limit = 750;

	if ($words > $limit) {

		$this -> form_validation -> set_message('check_methodologies', "The field %s has a limit of $limit words");
		return false;
	} else {
		return true;
	}
}

//Count outcomes and relevance
function check_relevance($text) {
	$words = preg_match_all('/[ ]/', $text, $matches);

	$words = $words + 1;

	$limit = 500;

	if ($words > $limit) {

		$this -> form_validation -> set_message('check_relevance', "The field %s has a limit of $limit words");
		return false;
	} else {
		return true;
	}
}

//Count monitoring and evaluation
function check_monitoring($text) {
	$words = preg_match_all('/[ ]/', $text, $matches);

	$words = $words + 1;

	$limit = 500;

	if ($words > $limit) {

		$this -> form_validation -> set_message('check_monitoring', "The field %s has a limit of $limit words");
		return false;
	} else {
		return true;
	}
}

function check_country($country) {

	if ($country == 0) {
		$this -> form_validation -> set_message('check_country', "Please select %s");
		return false;
	} else {
		return true;
	}
}

function check_gender($gender) {
	if (strcasecmp($gender, "0") == 0) {

		$this -> form_validation -> set_message('check_gender', "Please select %s");
		return false;
	} else {
		return true;
	}
}

function check_budget($budget) {
	if (preg_match("/^[0-9,]+$/", $budget)) {
		$budget = str_replace(',', '', $budget);
	}
	if ($budget > 80000) {
		$this -> form_validation -> set_message('check_budget', "Total budget cannot exceed 80,000 CAD");
		return false;
	} else {
		return true;
	}
}

function validate_preview() {
	$this -> form_validation -> set_rules('attending_workshop', "Workshop attendance", 'required|xss_clean|trim');
	return $this -> form_validation -> run();
}

//Upload endorsment
function upload_endorsment() {
	$config['upload_path'] = "uploads/endorsments/";
	$config['allowed_types'] = 'pdf';
	$config['max_size'] = 0;
	$this -> load -> library('upload');
	$this -> upload -> initialize($config);

	if (isset($_FILES['endorsment_letter']) && !empty($_FILES['endorsment_letter']['name'])) {
		if ($this -> upload -> do_upload('endorsment_letter')) {
			// set a $_POST value for 'image' that we can use later
			$upload_data = $this -> upload -> data();
			$_POST['endorsment_letter'] = $upload_data['file_name'];
			return true;
		} else {
			// possibly do some clean up ... then throw an error
			$this -> form_validation -> set_message('upload_endorsment', "Endorsement letter upload error");
			$this -> session -> set_flashdata('endorsement_upload_error', $this -> upload -> display_errors());
			return false;
		}
	} else {
		if (isset($_POST['old_endorsment'])) {
			return true;
		} else {
			// throw an error because nothing was uploaded
			$this -> form_validation -> set_message('upload_endorsment', "You must attach a %s!");
			return false;
		}
	}
}

//Upload budget
function upload_budget() {
	$config['upload_path'] = "uploads/budgets/";
	$config['allowed_types'] = '*';
	$config['max_size'] = 0;
	$this -> load -> library('upload');
	$this -> upload -> initialize($config);
	if (isset($_FILES['budget']) && !empty($_FILES['budget']['name'])) {
		if ($this -> upload -> do_upload('budget')) {
			// set a $_POST value for 'image' that we can use later
			$upload_data = $this -> upload -> data();
			$_POST['budget'] = $upload_data['file_name'];
			return true;
		} else {
			// possibly do some clean up ... then throw an error
			$this -> form_validation -> set_message('upload_budget', "Budget file upload error");
			$this -> session -> set_flashdata('budget_upload_error', $this -> upload -> display_errors());
			return false;
		}
	} else {
		if (isset($_POST['old_budget'])) {
			return true;
		} else {
			// throw an error because nothing was uploaded
			$this -> form_validation -> set_message('upload_budget', "You must attach a %s!");
			return false;
		}
	}
}

//Delete file
function delete_file($file) {
	if (file_exists($file)) {
		try {
			unlink($file);
		} catch (Exception $e) {
		}
	}
}

function get_approved(){
		
		$this -> data['active_menu'] = 1;
		$this-> data['approved'] = $this -> proposal_model -> get_approved_proposals();
		
		//$this -> template -> load('default', "proposal/approved", $this -> data);
		
	}

}
