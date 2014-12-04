<?php
class Advisors extends CI_Controller {

	protected $data = array("title" => "Advisors");
	protected $tab_divs = array(".tab1", ".tab2", ".tab3", ".tab4", ".tab5");

	function __construct() {
		parent::__construct();

		//Check if session has been set
		$user_data = $this -> session -> userdata("user_data");

		$role_id = $user_data['user_role_id'];

		if ($role_id == 2) {
			$this -> load -> library('email');
			$this -> data['active_menu'] = NULL;
			$this -> load -> library('password');
			$this -> load -> library('pdf');
			$this -> load -> model("users/advisors_model");

			//$this->output->enable_profiler(TRUE);

		} else {
			//If no session
			$this -> session -> set_flashdata('auth_message', 'Please login.');
			redirect("auth");
		}

	}

	function index() {
		$this -> data['active_menu'] = 1;
		$user_data = $this -> session -> userdata("user_data");
		$reviewer_id = $user_data['id'];
		$this -> data["reviewer_status"] = $this -> advisors_model -> reviewer_status($reviewer_id);
		$this -> data["proposals"] = $this -> advisors_model -> get_proposals($reviewer_id);
		$this -> template -> load('user', "advisors/reviewer_proposals", $this -> data);
	}

	function save_edits() {
		$valid = $this -> validate_user_edits();
		$id = $_POST['user_id'];
		$this -> data['active_menu'] = 2;

		if ($valid) {
			$this -> advisors_model -> save_user($id);
			redirect("advisors");
		} else {
			$this -> data['form'] = $this -> advisors_model -> get_advisor();
			$this -> template -> load('user', "advisors/user_form", $this -> data);
		}
	}

	function panel() {
		$this -> data['form'] = $this -> advisors_model -> get_advisor();
		$this -> data['active_menu'] = 2;
		$this -> template -> load('user', "advisors/user_form", $this -> data);
	}

	function review() {
		$tab_id = 1;
		$id = $this -> uri -> segment(3);
		$this -> data['tab_menu'] = 1;
		$this -> data['active_menu'] = 1;
		$this -> data["css"] = div_selector($this -> tab_divs, ".tab1");
		$this -> data["tab_data"] = $this -> advisors_model -> get_tab_data($tab_id);
		$this -> session -> unset_userdata("proposal_id");
		//$rewiew_data = $this -> advisors_model -> get_review_data($id);
		$this -> data['review_data'] = $this -> advisors_model -> get_review_data($id);
		$this -> session -> set_userdata("proposal_id", $id);
		$reviews = $this -> advisors_model -> get_proposal_review($id);
		$this -> data["reviews"] = $reviews;
		$this -> template -> load('review', "advisors/review_tabs", $this -> data);
	}

	function review_tab() {
		$tab_id = $this -> uri -> segment(3);
		$this -> data['tab_menu'] = $tab_id;
		$this -> data['active_menu'] = 1;
		$css_tab = ".tab" . $tab_id;
		$this -> data["css"] = div_selector($this -> tab_divs, $css_tab);
		$proposal_id = $this -> session -> userdata("proposal_id");
		$reviews = $this -> advisors_model -> get_proposal_review($proposal_id);
		$this -> data["reviews"] = $reviews;
		$this -> data["comments"] = $this -> advisors_model -> get_comments($proposal_id);
		$this -> data["tab_data"] = $this -> advisors_model -> get_tab_data($tab_id);
		$this -> data['review_data'] = $this -> advisors_model -> get_review_data($proposal_id);
		$this -> template -> load('review', "advisors/review_tabs", $this -> data);
	}

	function save_tab() {
		$tab_id = $this -> uri -> segment(3);
		$this -> data['tab_menu'] = $tab_id;
		$this -> data['active_menu'] = 1;

		$proposal_id = $this -> session -> userdata("proposal_id");
		$reviews = $this -> advisors_model -> get_proposal_review($proposal_id);
		$this -> data["reviews"] = $reviews;

		$tab_data = $this -> advisors_model -> get_tab_data($tab_id);
		$this -> data["tab_data"] = $tab_data;
		$this -> data['review_data'] = $this -> advisors_model -> get_review_data($proposal_id);

		$valid = false;
		if ($tab_id == 5) {
			//Final tab
			$valid = $this -> validate_tab5();
		} else {
			//Question tabs
			$valid = $this -> validate_tabs($tab_data);
		}

		if ($valid) {
			if ($tab_id == 5) {
				//Save tab
				$this -> advisors_model -> submit_review();
				redirect("advisors");

			} else {
				$this -> advisors_model -> save_tabs($tab_id);
				$new_tab = $tab_id + 1;
				redirect("advisors/review_tab/$new_tab");
			}

		} else {
			$css_tab = ".tab" . $tab_id;
			$this -> data["css"] = div_selector($this -> tab_divs, $css_tab);
			$this -> data["error_msg"] = "<p> Answer all questions as required..! </p>";
			$this -> template -> load('user', "advisors/review_tabs", $this -> data);
		}

	}

    //Display review form
    
    function print_preview_forms(){
    	$this -> data['active_menu'] = 3;
    	$this->data["tabs"] = $this->advisors_model->complete_form();
    	//$this -> pdf($this -> data, "review_form", 'print_preview/review_forms');
    	//$this -> template -> load('user', "print_preview/review_forms", $this -> data);
    	$this->load->view("print_preview/review_forms", $this->data);	
    }
	

	function print_preview_proposal(){
		$this -> data['active_menu'] = 2;
		$proposal_id = $this -> uri->segment(3);
		$this -> data['review_data'] = $this -> advisors_model -> get_review_data($proposal_id);
		//$this -> pdf($this -> data, "review_form", 'print_preview/proposal');
		
		$this->load->view("print_preview/proposal", $this->data);
		//$this -> template -> load('user', "print_preview/proposal", $this -> data);	
		
	}

	function validate_tabs($tab_data) {
		$review_tab = $tab_data["review_tab"];
		$questions = $tab_data["questions"];
		$question_options = $tab_data["question_options"];

		$response = array();

		foreach ($questions as $question_id => $question_data) {

			$type_id = $question_data["type_id"];

			$options = $question_options[$question_id];

			for ($i = 0; $i < count($options); $i++) {
				$opt_id = $options[$i]["id"];

				$index = ($type_id == 1 ? "r" . $question_id : "c" . $opt_id);

				$response[$question_id] = false;

				if (isset($_POST[$index])) {

					$response[$question_id] = true;

					break;
				}
			}

		}

		foreach ($response as $key => $value) {
			if (!$value) {
				return false;
				break;
			} else {
				return true;
			}
		}

	}

	function validate_tab5() {
		$this -> form_validation -> set_rules('reviewer_comments', 'Reviewer comments', 'trim|xss_clean');
		return $this -> form_validation -> run();
	}

	//Validate user edits
	function validate_user_edits() {
		$this -> form_validation -> set_rules('first_name', 'First name', 'trim|required|xss_clean');
		$this -> form_validation -> set_rules('last_name', 'Last name', 'trim|required|xss_clean');
		return $this -> form_validation -> run();
	}
	
	function pdf($data, $file_name, $view) {
		$this -> load -> helper(array('dompdf', 'file'));
		// page info here, db calls, etc.
		$html = $this -> load -> view($view, $data, true);
		pdf_create($html, $file_name);
		//or
		/*
		 $data = pdf_create($html, '', false);
		 write_file('name', $data);
		 */
		//if you want to write it to disk and/or send it as an attachment

	}
	
	//Preview
	function preview() {
		$this -> data['active_menu'] = 1;
		$proposal_id = $this -> uri -> segment(3);
		$this -> data['proposal_id'] = $proposal_id;
		$this -> data['preview_data'] = $this -> advisors_model -> get_all($proposal_id);
		$this -> template -> load('user', "advisors/preview", $this -> data);
	}
	
	
		function shortlisted(){
		
		$this -> data['active_menu'] = 1;
		$this -> load -> model("proposal/proposal_model");
		$this-> data['approved'] = $this -> proposal_model -> get_approved_proposals();		
		
		// print_r($this -> data['approved']);
		// exit;
		$this -> template -> load('default', "advisors/approved", $this -> data);


	}
	

}
